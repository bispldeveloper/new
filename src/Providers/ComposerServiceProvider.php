<?php namespace EyeCore\Providers;

use EyeCore\Modules\NavMenu\Repositories\NavMenuRepository;
use Illuminate\Support\ServiceProvider;
use EyeCore\Modules\NavMenu\Models\NavMenu;
use Illuminate\Support\Str;

/**
 * Class ComposerServiceProvider
 * @package EyeCore\Providers
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * @param NavMenu $navMenu
     * @param NavMenuRepository $navmenuRepo
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot(NavMenu $navMenu, NavMenuRepository $navmenuRepo)
    {
        view()->composer('Pages::Frontend.partials.header', function($view) use ($navMenu) {
            $header_topbar = $navMenu->getTopbarHtml();
            $view->with('header_topbar', $header_topbar);
        });

        view()->composer('*', function($view) use ($navMenu) {
            if(!Str::contains($view->getName(), '::Admin.')) {
                $header_offcanvas = $navMenu->getOffcanvasHtml();
                $view->with('header_offcanvas', $header_offcanvas);
            }
        });

        view()->composer('Pages::Frontend.pages.homepage', function($view) {
            $headerClass = 'homepage';
            $view->with('headerClass', $headerClass);
        });

        view()->composer('Admins::Admin.scripts.tinymce-scripts', function($view) use ($navmenuRepo) {
            $pages = $navmenuRepo->getRoutesList();
            $view->with('pages', $pages);
        });

        view()->composer('Admins::Admin.partials.offcanvas', function($view) {
            $configs = config()->all();
            $adminNavGroups = [];
            foreach($configs as $config) {
                if(isset($config['adminnav'])) {
                    foreach($config['adminnav'] as $option) {
                        $adminNavGroups[$option['group']][] = $option;
                    }
                }
            }

            foreach($adminNavGroups as &$adminNavGroup) {
                uasort($adminNavGroup, function($a, $b) {
                    return $a['sort_order'] - $b['sort_order'];
                });
            }

            $view->with('adminNavGroups', $adminNavGroups);
        });
    }

    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        //
    }

}
