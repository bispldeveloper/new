<?php namespace EyeCore\Modules\NavMenuItem\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\NavMenuItem\Models\NavMenuItem;

/**
 * Class NavMenuItemRepository
 * @package EyeCore\Modules\NavMenuItem\Repositories
 */
class NavMenuItemRepository extends EloquentRepository implements NavMenuItemInterface
{
    /**
     * @var NavMenuItem
     */
    private $model;

    /**
     * NavMenuItemRepository constructor.
     * @param NavMenuItem $model
     */
    function __construct(NavMenuItem $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
