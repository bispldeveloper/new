<?php namespace EyeCore\Modules\Images\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\Images\Models\Image;

/**
 * Class ImageRepository
 *
 * @package EyeCore\Modules\Images\Repositories
 */
class ImageRepository extends EloquentRepository implements ImageInterface
{
    /**
     * @var Image
     */
    private $model;

    /**
     * ImageRepository constructor.
     * @param Image $model
     */
    function __construct(Image $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
