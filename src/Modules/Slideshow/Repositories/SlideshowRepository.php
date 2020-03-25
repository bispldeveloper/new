<?php namespace EyeCore\Modules\Slideshow\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\Slideshow\Models\Slideshow;

/**
 * Class SlideshowRepository
 * @package EyeCore\Modules\Slideshow\Repositories
 */
class SlideshowRepository extends EloquentRepository implements SlideshowInterface
{
    /**
     * @var Slideshow
     */
    private $model;

    /**
     * SlideshowRepository constructor.
     * @param Slideshow $model
     */
    function __construct(Slideshow $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
