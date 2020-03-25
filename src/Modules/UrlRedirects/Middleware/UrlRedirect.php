<?php namespace EyeCore\Modules\UrlRedirects\Middleware;

use Closure, File;
use EyeCore\Modules\UrlRedirects\Models\UrlRedirect as UrlRedirectModel;

/**
 * Class UrlRedirect
 * @package EyeCore\Modules\UrlRedirects\Middleware
 */
class UrlRedirect
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        if($urlredirect = UrlRedirectModel::where('from', request()->path())->first()) {
            return redirect()->to($urlredirect->to, 301);
        }

        return $next($request);
    }
}
