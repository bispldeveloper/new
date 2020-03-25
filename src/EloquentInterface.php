<?php namespace EyeCore;

/**
 * Interface EloquentInterface
 * @package EyeCore
 */
interface EloquentInterface {
    /**
     * Store a new instance of an object
     *
     * @param $data
     * @return bool
     */
    public function create($data);

    /**
     * Update an existing object
     *
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data);

    /**
     * Delete an existing object (Soft delete only)
     *
     * @param $id
     * @param bool $permanent
     * @return bool
     */
    public function delete($id, $permanent = false);

    /**
     * Restore a soft-deleted object
     * @param $id
     * @return bool
     */
    public function restore($id);

    /**
     * Return any errors associated with failure of repository method
     *
     * @return mixed
     */
    public function getErrors();

    /**
     * returns an object from an id
     *
     * @param $id
     * @param bool $with
     * @return mixed
     */
    public function getById($id, $with = false);

    /**
     * returns an object by where
     *
     * @param $where
     * @param bool $with
     * @return mixed
     */
    public function getBy($where, $with = false);

    /**
     * Returns an object from a slug
     *
     * @param $slug
     * @param bool $with
     * @return mixed
     */
    public function getBySlug($slug, $with = false);

    /**
     * Get all filtered objects
     *
     * @param (array) $filter
     * @param $paginate
     * @param $sort_by
     * @param $sort_direction
     */
    public function getAllFiltered($filter, $paginate = false, $sort_by = 'id', $sort_direction = 'asc');

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
    public function getAll($paginate = false, $sort_by = 'id', $sort_direction = 'asc', $where = false, $with = false);

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
    public function getAllDeleted($paginate = false, $sort_by = 'id', $sort_direction = 'asc', $where = false, $with = false);

    /**
     * Gets the latest entries from the database
     *
     * @param string $limit
     * @param string $updateField
     * @param string $direction
     * @param bool   $with
     *
     * @return mixed
     */
    public function getLatest($limit = '1', $updateField = 'updated_at', $direction = 'desc', $with = false);
}
