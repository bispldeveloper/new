<?php namespace EyeCore\Modules\Admingroups\Repositories;

use EyeCore\EloquentInterface;

/**
 * Interface AdmingroupInterface
 * @package EyeCore\Modules\Admingroups\Repositories
 */
interface AdmingroupInterface extends EloquentInterface
{
    /**
     * @param bool $filter
     * @return mixed
     */
    public function getAllFilteredByAdmin($filter = false);

    /**
     * Get all available admin permissions
     * @return mixed
     */
    public function getAvailablePermissions();
}
