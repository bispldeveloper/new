<?php namespace EyeCore\Modules\PageTemplates\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\PageTemplates\Models\PageTemplate;

/**
 * Class PageTemplateRepository
 * @package EyeCore\Modules\PageTemplates\Repositories
 */
class PageTemplateRepository extends EloquentRepository implements PageTemplateInterface
{
    /**
     * @var PageTemplate
     */
    private $model;

    /**
     * @param PageTemplate $model
     */
    function __construct(PageTemplate $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
