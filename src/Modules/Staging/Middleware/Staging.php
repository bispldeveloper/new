<?php namespace EyeCore\Modules\Staging\Middleware;

use Closure, File;

/**
 * Class Staging
 * @package Eyeweb\Staging\Middleware
 */
class Staging
{
    /**
     * Handle an incoming request.
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(getenv('APP_ENV') == 'staging') {
            if(! $request->is('imagecache*')) {
                return auth('admins')->onceBasic('username') ?: $next($request);
            }
        }
        return $next($request);
    }
}
