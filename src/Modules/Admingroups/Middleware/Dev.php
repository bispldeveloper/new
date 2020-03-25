<?php namespace EyeCore\Modules\Admingroups\Middleware;

use Closure;

/**
 * Class Dev
 * @package EyeCore\Modules\Admingroups\Middleware
 */
class Dev
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        if(!auth()->guard('admins')->check()) {
            return redirect()->to('mc-admin');
        }

        if(auth()->guard('admins')->user()->admingroup_id != 1) {
            return redirect()
                ->to('mc-admin')
                ->with('flash_message', 'You don\'t have permission to view this area')
                ->with('flash_message_type', 'warning');
        }

        return $next($request);
    }
}
