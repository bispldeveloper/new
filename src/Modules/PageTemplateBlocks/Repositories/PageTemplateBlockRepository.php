<?php namespace EyeCore\Modules\PageTemplateBlocks\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\PageTemplateBlocks\Models\PageTemplateBlock;

/**
 * Class PageTemplateBlockRepository
 * @package EyeCore\Modules\PageTemplateBlocks\Repositories
 */
class PageTemplateBlockRepository extends EloquentRepository implements PageTemplateBlockInterface
{
    /**
     * @var PageTemplateBlock
     */
    private $model;

    /**
     * PageTemplateBlockRepository constructor.
     * @param PageTemplateBlock $model
     */
    function __construct(PageTemplateBlock $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
