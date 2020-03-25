<?php namespace EyeCore\Providers;

use Illuminate\Routing\Router;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;

/**
 * Class MiddlewareServiceProvider
 * @package EyeCore\Providers
 */
class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $middleware = [];

    /**
     * @var array
     */
    protected $middlewareGroups = [];

    /**
     * @var array
     */
    protected $routedMiddleware = [
        'urlredirects' => \EyeCore\Modules\UrlRedirects\Middleware\UrlRedirect::class,
        'auth.admin' => \EyeCore\Modules\Admingroups\Middleware\Admin::class,
        'auth.dev' => \EyeCore\Modules\Admingroups\Middleware\Dev::class,
        'auth.permissions' => \EyeCore\Modules\Admingroups\Middleware\Permissions::class,
        'auth.user' => \EyeCore\Modules\Users\Middleware\User::class,
        'staging' => \EyeCore\Modules\Staging\Middleware\Staging::class,
        'language' => \EyeCore\Modules\Languages\Middleware\Language::class,
    ];

    /**
     * @param Router $router
     * @param Kernel $kernel
     */
    public function boot(Router $router, Kernel $kernel)
    {

        //global middleware
        if(count($this->middleware) > 0) {
            foreach($this->middleware as $middleware) {
                $kernel->pushMiddleware($middleware);
            }
        }

        // grouped middleware
        if(count($this->middlewareGroups) > 0) {
            foreach($this->middlewareGroups as $middlewareGroupName => $middlewares) {
                foreach($middlewares as $middleware) {
                    $router->pushMiddlewareToGroup($middlewareGroupName, $middleware);
                }
            }
        }

        // route middleware
        if(count($this->routedMiddleware) > 0) {
            foreach($this->routedMiddleware as $name => $class) {
                $router->aliasMiddleware($name, $class);
            }
        }
    }
}
