<?php namespace EyeCore\Modules\Admins\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\Admins\Models\Admin;
use Auth;

/**
 * Class AdminRepository
 * @package EyeCore\Modules\Admins\Repositories
 */
class AdminRepository extends EloquentRepository implements AdminInterface
{
    /**
     * @var Admin
     */
    private $model;

    /**
     * AdminRepository constructor.
     * @param Admin $model
     */
    function __construct(Admin $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    /**
     * @param $filter
     * @param $paginate
     * @return mixed
     */
    public function getAllFilteredByAdmingroup($filter, $paginate)
    {
        $admin = auth()->guard('admins')->user();

        $model = $this->model->orderBy('created_at', 'desc')->where('admingroup_id', '>=', $admin->admingroup_id);

        if($filter == 'deleted') {
            $model->onlyTrashed();
        }

        return $model->paginate($paginate);
    }
}
