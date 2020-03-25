<?php namespace EyeCore\Modules\Newsletters\Drivers;

use EyeCore\Modules\Newsletters\Interfaces\NewsletterInterface;

/**
 * Class NullDriver
 * @package EyeCore\Modules\Newsletters\Drivers
 */
class NullDriver implements NewsletterInterface
{
    /**
     * @param $list_id
     * @param array $fields
     * @return mixed
     */
    public function subscribe($list_id, $fields = [])
    {
        return true;
    }

}
