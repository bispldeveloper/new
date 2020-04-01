<?php namespace EyeCore;

use App;

/**
 * Class EloquentRepository
 * @package EyeCore
 */
abstract class EloquentRepository implements EloquentInterface {

    /**
     * @var
     */
    private $model;

    /**
     * @var
     */
    private $errors;

    /**
     * @param $model
     */
    function __construct($model)
    {
        $this->model = $model;;
    }

    /**
     * Store a new instance of an object
     *
     * @param $data
     * @return bool
     */
    public function create($data)
    {
        $this->model->fill($data);
        if (! $this->model->save())
        {
            return false;
        }

        return $this->model;
    }

    /**
     * Update an existing object
     *
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {

        $existingModel = $this->model->findOrFail($id);

        $existingModel->fill($data);

        if ( ! $existingModel->save())
        {
            return false;
        }

        return $existingModel;
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
        $existingModel = $this->model->withTrashed()->findOrFail($id);

        if($permanent)
        {
            $existingModel->forceDelete();
            return true;
        }

        if (! $existingModel->delete())
        {
            $this->errors = $existingModel->getErrors();
            return false;
        }

        return true;
    }

    /**
     * Restore a soft-deleted object
     *
     * @param $id
     * @return bool
     */
    public function restore($id)
    {
        $existingModel = $this->model->withTrashed()->findOrFail($id);

        if (! $existingModel->restore())
        {
            $this->errors = $existingModel->getErrors();
            return false;
        }

        return true;
    }

    /**
     * Return any errors associated with failure of repository method
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
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
        if ($with)
        {
            return $this->model->withTrashed()->with($with)->findOrFail($id);
        }

        return $this->model->withTrashed()->findOrFail($id);
    }

    /**
     * returns an object by where
     *
     * @param $where
     * @param bool $with
     * @return mixed
     */
    public function getBy($where, $with = false) {

        if ($with)
        {
            return $this->model->with($with)->where($where)->first();
        }

        return $this->model->where($where)->first();
    }

    /**
     * Returns an object from a slug
     *
     * @param $slug
     * @param bool $with
     * @param bool $abort
     * @return mixed
     */
    public function getBySlug($slug, $with = false, $abort = true)
    {
        $query = $this->model->where('slug', '=', $slug);
        if($with) {
            $query->with($with);
        }
        $result = $query->first();

        if($result) {
            return $result;
        }

        if($abort)
        {
            App::abort('404');
        }
    }

    /**
     * Get all filtered objects
     *
     * @param bool $filter
     * @param bool $paginate
     * @param bool $sort_by
     * @param bool $sort_direction
     *
     * @return mixed
     */
    public function getAllFiltered($filter = false, $paginate = false, $sort_by = null, $sort_direction = null)
    {
        if(! is_string($sort_by)) {
            $sort_by = 'id';
        }
        if(! is_string($sort_direction)) {
            $sort_direction = 'desc';
        }
        if($filter == 'hidden')
        {
            if($paginate)
            {
                return $this->getAll($paginate, $sort_by, $sort_direction, ['published' => '0']);
            }

            return $this->getAll(false,  $sort_by, $sort_direction, ['published' => '0']);
        }

        if($filter == 'published')
        {
            if($paginate)
            {
                return $this->getAll($paginate, $sort_by, $sort_direction, ['published' => '1']);
            };

            return $this->getAll(false,  $sort_by, $sort_direction, ['published' => '1']);
        }

        if($filter == 'deleted')
        {

            if($paginate)
            {
                return $this->getAllDeleted($paginate, $sort_by, $sort_direction);
            }

            return $this->getAllDeleted(false,  $sort_by, $sort_direction);

        }

        if($paginate)
        {
            return $this->getAll($paginate, $sort_by, $sort_direction);
        }

        return $this->getAll(false, $sort_by, $sort_direction);


    }

    /**
     * Returns all objects (excludes deleted objects)
     *
     * @param bool $paginate
     * @param $sort_by
     * @param $sort_direction
     * @param bool $where
     * @param bool $with
     * @return mixed
     */
    public function getAll($paginate = false, $sort_by = false, $sort_direction = null, $where = null, $with = false)
    {
        if(! is_string($sort_by)) {
            $sort_by = 'id';
        }
        if(! is_string($sort_direction)) {
            $sort_direction = 'desc';
        }
        if($paginate)
        {

            if($where)
            {

                if($with)
                {
                    return $this->model->orderBy($sort_by, $sort_direction)->where($where)->with($with)->paginate($paginate);
                }

                return $this->model->orderBy($sort_by, $sort_direction)->where($where)->paginate($paginate);

            }

            if($with)
            {
                return $this->model->orderBy($sort_by, $sort_direction)->with($with)->paginate($paginate);
            }

            return $this->model->orderBy($sort_by, $sort_direction)->paginate($paginate);

        }

        if($where)
        {
            if($with)
            {
                return $this->model->orderBy($sort_by, $sort_direction)->where($where)->with($with)->get();
            }

            return $this->model->orderBy($sort_by, $sort_direction)->where($where)->get();
        }

        if($with)
        {
            return $this->model->orderBy($sort_by, $sort_direction)->with($with)->get();
        }

        return $this->model->orderBy($sort_by, $sort_direction)->get();

    }

    /**
     * Returns all deleted objects
     *
     * @param bool $paginate
     * @param $sort_by
     * @param $sort_direction
     * @param bool $where
     * @param bool $with
     * @return mixed
     */
    public function getAllDeleted($paginate = false, $sort_by = null, $sort_direction = null, $where = false, $with = false)
    {
        if(! is_string($sort_by)) {
            $sort_by = 'id';
        }
        if(! is_string($sort_direction)) {
            $sort_direction = 'desc';
        }
        if($paginate)
        {

            if($where)
            {

                if($with)
                {
                    return $this->model->onlyTrashed()->orderBy($sort_by, $sort_direction)->where($where)->with($with)->paginate($paginate);
                }

                return $this->model->onlyTrashed()->orderBy($sort_by, $sort_direction)->where($where)->paginate($paginate);

            }

            if($with)
            {
                return $this->model->onlyTrashed()->orderBy($sort_by, $sort_direction)->with($with)->paginate($paginate);
            }

            return $this->model->onlyTrashed()->orderBy($sort_by, $sort_direction)->paginate($paginate);

        }

        if($where)
        {
            if($with)
            {
                return $this->model->onlyTrashed()->orderBy($sort_by, $sort_direction)->where($where)->with($with)->get();
            }

            return $this->model->onlyTrashed()->orderBy($sort_by, $sort_direction)->where($where)->get();
        }

        if($with)
        {
            return $this->model->onlyTrashed()->orderBy($sort_by, $sort_direction)->with($with)->get();
        }

        return $this->model->onlyTrashed()->orderBy($sort_by, $sort_direction)->get();

    }


    /**
     * Get Latest record
     *
     * @param bool $limit
     * @param string $updateField
     * @param string $direction
     * @param bool $with
     * @param bool $where
     * @return mixed
     */
    public function getLatest($limit = false, $updateField = 'updated_at', $direction = 'desc', $with = false, $where = false)
    {
        if($limit == 1)
        {
            if ($with)
            {
                return $this->model->with($with)->orderBy($updateField, $direction)->first();
                if($where)
                {
                    return $this->model->where($where)->with($with)->orderBy($updateField, $direction)->first();
                }
            }
            if($where)
            {
                return $this->model->where($where)->orderBy($updateField, $direction)->first();
            }
            return $this->model->orderBy($updateField, $direction)->first();
        }
        if ($with)
        {
            return $this->model->with($with)->take($limit)->orderBy($updateField, $direction)->get();
            if($where)
            {
                return $this->model->where($where)->with($with)->take($limit)->orderBy($updateField, $direction)->get();
            }
        }
        if($where)
        {
            return $this->model->where($where)->take($limit)->orderBy($updateField, $direction)->get();
        }
        return $this->model->take($limit)->orderBy($updateField, $direction)->get();
    }


}
