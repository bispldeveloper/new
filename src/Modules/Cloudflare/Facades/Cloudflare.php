<?php namespace EyeCore\Modules\Cloudflare\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Cloudflare
 * @package EyeCore\Modules\Cloudflare\Facades
 */
class Cloudflare extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cloudflare';
    }
}
