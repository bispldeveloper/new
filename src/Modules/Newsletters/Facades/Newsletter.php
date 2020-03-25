<?php namespace EyeCore\Modules\Newsletters\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Newsletter
 * @package EyeCore\Modules\Newsletters\Facades
 */
class Newsletter extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'newsletter';
    }
}
