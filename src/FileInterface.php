<?php namespace EyeCore;


/**
 * Interface FileInterface
 * @package EyeCore
 */
interface FileInterface {

    /**
     * Returns all objects (excludes deleted objects)
     *
     * @return mixed
     */
    public function getAll();

}
