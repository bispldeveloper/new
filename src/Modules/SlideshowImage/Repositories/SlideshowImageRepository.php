<?php namespace EyeCore\Modules\SlideshowImage\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\SlideshowImage\Models\SlideshowImage;

/**
 * Class SlideshowImageRepository
 * @package EyeCore\Modules\SlideshowImage\Repositories
 */
class SlideshowImageRepository extends EloquentRepository implements SlideshowImageInterface
{
    /**
     * @var SlideshowImage
     */
    private $model;

    /**
     * SlideshowImageRepository constructor.
     * @param SlideshowImage $model
     */
    function __construct(SlideshowImage $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
