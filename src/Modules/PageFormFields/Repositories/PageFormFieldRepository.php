<?php namespace EyeCore\Modules\PageFormFields\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\PageFormFields\Models\PageFormField;

/**
 * Class PageFormFieldRepository
 * @package EyeCore\Modules\PageFormFields\Repositories
 */
class PageFormFieldRepository extends EloquentRepository implements PageFormFieldInterface {

    /**
     * @var PageFormField
     */
    private $model;

    /**
     * @param PageFormField $model
     */
    function __construct(PageFormField $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

}
