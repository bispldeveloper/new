<?php namespace EyeCore\Providers;

use EyeCore\Modules\Newsletters\Managers\NewsletterManager;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class NewsletterServiceProvider
 * @package EyeCore\Providers
 */
class NewsletterServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     *
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../Modules/Newsletters/Config/newsletter.php' => config_path('newsletter.php')
        ], 'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('newsletter', function ($app) {
            return new NewsletterManager($app);
        });

        $this->mergeConfigFrom(__DIR__ . '/../Modules/Newsletters/Config/newsletter.php', 'newsletter');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Newsletter::class];
    }

}
