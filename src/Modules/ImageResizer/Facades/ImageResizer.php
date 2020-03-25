<?php namespace EyeCore\Modules\ImageResizer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class ImageResizer
 * @package EyeCore\Modules\ImageResizer\Facades
 */
class ImageResizer extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'imageresizer';
    }
}
