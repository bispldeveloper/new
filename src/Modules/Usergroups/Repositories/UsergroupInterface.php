<?php namespace EyeCore\Modules\Usergroups\Repositories;

use EyeCore\EloquentInterface;

/**
 * Interface UsergroupInterface
 * @package EyeCore\Modules\Usergroups\Repositories
 */
interface UsergroupInterface extends EloquentInterface
{
    /**
     * Get all available user permissions
     * @return mixed
     */
    public function getAvailablePermissions();
}
