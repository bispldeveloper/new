<?php namespace EyeCore\Modules\NavMenu\Repositories;

use EyeCore\EloquentInterface;

/**
 * Interface NavMenuInterface
 * @package EyeCore\Modules\NavMenu\Repositories
 */
interface NavMenuInterface extends EloquentInterface
{
    /**
     * @param $title
     * @return mixed
     */
    public function getByTitle($title);
}
