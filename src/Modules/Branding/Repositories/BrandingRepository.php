<?php namespace EyeCore\Modules\Branding\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\Branding\Models\Branding;

/**
 * Class BrandingRepository
 * @package EyeCore\Modules\Branding\Repositories
 */
class BrandingRepository extends EloquentRepository implements BrandingInterface
{
    /**
     * @var Branding
     */
    private $model;

    /**
     * BrandingRepository constructor.
     * @param Branding $model
     */
    function __construct(Branding $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
