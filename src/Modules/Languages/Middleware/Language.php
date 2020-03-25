<?php namespace EyeCore\Modules\Languages\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

/**
 * Class Language
 * @package EyeCore\Modules\Languages\Middleware
 */
class Language
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Cookie::has('language')) {
            app()->setLocale(Cookie::get('language'));
        }

        return $next($request);
    }
}
