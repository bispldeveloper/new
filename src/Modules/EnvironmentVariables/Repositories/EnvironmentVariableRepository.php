<?php namespace EyeCore\Modules\EnvironmentVariables\Repositories;

use EyeCore\FileRepository;
use EyeCore\Modules\EnvironmentVariables\Models\EnvironmentVariable;
use File, App;

/**
 * Class EnvironmentVariableRepository
 * @package EyeCore\Modules\EnvironmentVariables\Repositories
 */
class EnvironmentVariableRepository extends FileRepository implements EnvironmentVariableInterface
{
    /**
     * @var EnvironmentVariable
     */
    private $model;

    /**
     * EnvironmentVariableRepository constructor.
     * @param EnvironmentVariable $model
     */
    function __construct(EnvironmentVariable $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    /**
     * returns an object from an name
     * @param $name
     * @return mixed
     */
    public function getByName($name)
    {
        $environmentvariables = $this->model->all();

        $return_array = [];
        if(array_key_exists($name, $environmentvariables)) {
            $this->model->name = $name;
            $this->model->value = $environmentvariables[$name];
            return $this->model;
        }
        return false;
    }

    /**
     * Update an existing object
     * @param $name
     * @param $data
     * @return bool
     */
    public function updateExisting($name, $data)
    {
        $environmentvariables = $this->model->all(false);
        if(array_key_exists($name, $environmentvariables)) {
            $environmentvariables[$name] = $data['value'];
            if($data['name'] != $name) {
                $environmentvariables[$data['name']] = $data['value'];
                unset($environmentvariables[$name]);
            }
        }
        foreach($environmentvariables as $key => $value) {
            $environmentvariablesstring[] = strtoupper($key) . '=' . $value . PHP_EOL;
        }
        $write_to_file = File::put(base_path() . '/.env', $environmentvariablesstring);

        if($write_to_file === false) {
            return false;
        }

        return true;
    }

    /**
     * Store a new instance of an object
     * @param $data
     * @return bool
     */
    public function createNew($data)
    {
        $environmentvariables = $this->model->all(false);
        $environmentvariables[$data['name']] = $data['value'];

        foreach($environmentvariables as $key => $value) {
            $environmentvariablesstring[] = strtoupper($key) . '=' . $value . PHP_EOL;
        }

        $write_to_file = File::put(base_path() . '/.env', $environmentvariablesstring);

        if($write_to_file === false) {
            return false;
        }

        return true;

    }

    /**
     * Delete an existing object (Soft delete only)
     * @param $name
     * @return bool
     */
    public function deleteExisting($name)
    {
        $environmentvariables = $this->model->all(false);

        unset($environmentvariables[$name]);

        foreach($environmentvariables as $key => $value) {
            $environmentvariablesstring[] = strtoupper($key) . '=' . $value . PHP_EOL;
        }
        $write_to_file = File::put(base_path() . '/.env', $environmentvariablesstring);
        if($write_to_file === false) {
            return false;
        }
        return true;
    }
}
