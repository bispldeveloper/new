<?php namespace EyeCore\Modules\Admingroups\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

/**
 * Class AdminOrUser
 * @package EyeCore\Modules\Admingroups\Middleware
 */
class AdminOrUser
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        // is admin
        if (!auth()->guard('admins')->guest() && auth()->guest()) {
            return $next($request);
        }

        // is user
        if(auth()->guard('admins')->guest() && !auth()->guest()) {
            return $next($request);
        }

        // logged in both as a user and admin
        if(!auth()->guard('admins')->guest() && !auth()->guest()) {
            return $next($request);
        }

        abort(404);

    }
}
