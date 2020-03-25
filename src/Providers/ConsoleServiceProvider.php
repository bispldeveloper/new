<?php namespace EyeCore\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

/**
 * Class ConsoleServiceProvider
 * @package EyeCore\Providers
 */
class ConsoleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->booted(function() {
            $schedule = $this->app->make(Schedule::class);
            $schedule->command('generate:sitemap')->daily();
        });
    }

    public function register()
    {
        $this->commands([
            \EyeCore\Console\GenerateSitemap::class,
            \EyeCore\Console\ModuleCreate::class,
        ]);
    }
}
