<?php namespace EyeCore\Modules\Users\Middleware;

use Closure;

class User
{
    /**
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(!auth()->check()) {
            return redirect()->route('account.login');
        }

        return $next($request);
    }
}
