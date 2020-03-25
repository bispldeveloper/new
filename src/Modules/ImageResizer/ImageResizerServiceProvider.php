<?php namespace EyeCore\Modules\ImageResizer;

use EyeCore\Modules\ImageResizer\Models\ImageResizer;
use Illuminate\Support\ServiceProvider;

/**
 * Class ImageResizerServiceProvider
 * @package EyeCore\Modules\ImageResizer
 */
class ImageResizerServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->app->bind('imageresizer', function() {
            return new ImageResizer();
        });
    }
}
