<?php namespace EyeCore\Modules\Admingroups\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\Admingroups\Models\Admingroup;
use Auth;

/**
 * Class AdmingroupRepository
 * @package EyeCore\Modules\Admingroups\Repositories
 */
class AdmingroupRepository extends EloquentRepository implements AdmingroupInterface
{
    /**
     * @var Admingroup
     */
    private $model;

    /**
     * AdmingroupRepository constructor.
     * @param Admingroup $model
     */
    function __construct(Admingroup $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    /**
     * @param $filter
     * @return mixed
     */
    public function getAllFilteredByAdmin($filter = false)
    {
        $admin = auth()->guard('admins')->user();

        $model = $this->model->where('id', '>=', $admin->admingroup_id)->whereNotIn('id', [1]);

        if($filter == 'deleted') {
            $model->onlyTrashed();
        }

        return $model->get();
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getAvailablePermissions()
    {
        return config('permissions');
    }
}
