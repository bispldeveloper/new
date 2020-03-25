<?php namespace EyeCore\Modules\PageFormEnquiries\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\PageFormEnquiries\Models\PageFormEnquiry;

/**
 * Class PageFormEnquiryRepository
 * @package EyeCore\Modules\PageFormEnquiries\Repositories
 */
class PageFormEnquiryRepository extends EloquentRepository implements PageFormEnquiryInterface {

    /**
     * @var PageFormEnquiry
     */
    private $model;

    /**
     * @param PageFormEnquiry $model
     */
    function __construct(PageFormEnquiry $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

}
