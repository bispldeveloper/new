<?php namespace EyeCore\Modules\SiteConfig\Models;

/**
 * Class SiteConfig
 * @package EyeCore\Modules\SiteConfig\Models
 */
class SiteConfig
{
    /**
     * @param bool $remove_guarded
     * @return array
     */
    public function allEnvVariables($remove_guarded = true)
    {
        $all_envs = trim(File::get(base_path() . '/.env'));
        $env_lines = explode(PHP_EOL, $all_envs);
        $environment_variables = [];
        foreach($env_lines as $key => $env_line) {
            $env_parts = explode('=', $env_line);
            if($remove_guarded) {
                if(in_array($env_parts[0], $this->guarded)) {
                    unset($env_lines[$key]);
                } else {
                    $environment_variables[$env_parts[0]] = $env_parts[1];
                }
            } else {
                $environment_variables[$env_parts[0]] = $env_parts[1];
            }

        }
        return $environment_variables;
    }

    /**
     * @param $name
     * @param $data
     * @return bool
     */
    public function updateExisting($name, $data)
    {
        $environmentvariables = $this->model->allEnvVariables(false);

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
}
