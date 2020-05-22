<?php namespace EyeCore\Modules\Users\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\Users\Models\User;
use Auth;

/**
 * Class UserRepository
 * @package EyeCore\Modules\Users\Repositories
 */
class UserRepository extends EloquentRepository implements UserInterface
{
    /**
     * @var User
     */
    private $model;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    function __construct(User $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    /**
     * @param $title
     * @param bool $limit
     * @return bool
     */
    public function searchUsers($title, $limit = false)
    {
        if($title == '') {
            return false;
        }

        $query = $this->model->where(function($query) use ($title) {
            $query->where('email', 'like', '%' . $title . '%');
        });

        if($limit) {
            $query->take($limit);
        }

        return $query->get();
    }
}
