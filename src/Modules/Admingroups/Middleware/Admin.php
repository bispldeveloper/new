<?php namespace EyeCore\Modules\Admingroups\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

/**
 * Class Admin
 * @package EyeCore\Modules\Admingroups\Middleware
 */
class Admin
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->guard('admins')->guest()) {
            if(!$request->is('mc-admin/login') && !$request->is('mc-admin/forgotten-password') && !$request->is('mc-admin/password/reset*')) {
                return redirect()->guest(route('mc-admin.login'));
            }
        }

        return $next($request);

    }
}
