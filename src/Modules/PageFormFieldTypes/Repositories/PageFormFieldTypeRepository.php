<?php namespace EyeCore\Modules\PageFormFieldTypes\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\PageFormFieldTypes\Models\PageFormFieldType;

/**
 * Class PageFormFieldTypeRepository
 * @package EyeCore\Modules\PageFormFieldTypes\Repositories
 */
class PageFormFieldTypeRepository extends EloquentRepository implements PageFormFieldTypeInterface {

    /**
     * @var PageFormFieldType
     */
    private $model;

    /**
     * @param PageFormFieldType $model
     */
    function __construct(PageFormFieldType $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

}
