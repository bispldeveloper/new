<?php namespace EyeCore\Modules\PageForms\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\PageForms\Models\PageForm;

/**
 * Class PageFormRepository
 * @package EyeCore\Modules\PageForms\Repositories
 */
class PageFormRepository extends EloquentRepository implements PageFormInterface {

    /**
     * @var PageForm
     */
    private $model;

    /**
     * @param PageForm $model
     */
    function __construct(PageForm $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    /**
     * returns an object from an id
     *
     * @param $id
     * @param bool $with
     * @return mixed
     */
    public function getById($id, $with = false)
    {
        if($with) {
            return $this->model->with($with)->findOrFail($id);
        }

        return $this->model->findOrFail($id);
    }

    /**
     * Delete an existing object
     *
     * @param $id
     * @param bool $permanent
     * @return bool
     */
    public function delete($id, $permanent = false)
    {
        $existingModel = $this->model->findOrFail($id);

        if (! $existingModel->delete())
        {
            $this->errors = $existingModel->getErrors();
            return false;
        }

        return true;
    }

}
