<?php namespace EyeCore\Modules\Usergroups\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\Usergroups\Models\Usergroup;
use Auth;

/**
 * Class UsergroupRepository
 * @package EyeCore\Modules\Usergroups\Repositories
 */
class UsergroupRepository extends EloquentRepository implements UsergroupInterface
{
    /**
     * @var Usergroup
     */
    private $model;

    /**
     * UsergroupRepository constructor.
     * @param Usergroup $model
     */
    function __construct(Usergroup $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    /**
     * Get Available permissions
     * @return mixed
     */
    public function getAvailablePermissions()
    {
        return config('permissions');
    }
}
