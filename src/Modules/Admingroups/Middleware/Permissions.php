<?php namespace EyeCore\Modules\Admingroups\Middleware;

use Closure;
use EyeCore\Modules\Admingroups\Models\Admingroup;

/**
 * Class Permissions
 * @package EyeCore\Modules\Admingroups\Middleware
 */
class Permissions
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->is('mc-admin/login') && !$request->is('mc-admin/forgotten-password') && !$request->is('mc-admin/password/reset*')) {
            if(!auth()->guard('admins')->check()) {
                return redirect()->route('mc-admin.login');
            }

            if(auth()->guard('admins')->user()->admingroup_id != 1) {
                $defined_permissions = config('permissions');
                $currentRouteName = \Request::route()->getName();

                if(in_array_r($currentRouteName, $defined_permissions)) {
                    $admingroup = Admingroup::where('id', '=', auth()->guard('admins')->user()->admingroup_id)->first();
                    if(!isset($admingroup->permissions[$currentRouteName])) {
                        return redirect()
                            ->to('mc-admin')
                            ->with('flash_message', 'You don\'t have permission to view this area')
                            ->with('flash_message_type', 'warning');
                    }
                }
            }
        }

        return $next($request);
    }
}
