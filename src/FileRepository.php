<?php namespace EyeCore;

/**
 * Class FileRepository
 * @package EyeCore
 */
abstract class FileRepository implements FileInterface {

    /**
     * @var
     */
    private $model;

    /**
     * @var
     */
    private $errors;

    /**
     * FileRepository constructor.
     * @param $model
     */
    function __construct($model)
    {
        $this->model = $model;;
    }

    /**
     * Returns all objects (excludes deleted objects)
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

}
