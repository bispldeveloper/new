<?php namespace EyeCore\Modules\EnvironmentVariables\Models;

use File;

/**
 * Class EnvironmentVariable
 * @package EyeCore\Modules\EnvironmentVariables\Models
 */
class EnvironmentVariable
{
    /**
     * @var array
     */
    protected $guarded = [
        'DB_HOST',
        'DB_PORT',
        'DB_USERNAME',
        'DB_PASSWORD',
        'DB_DATABASE',
        'MAIL_DRIVER',
        'APP_LOG_LEVEL',
        'APP_KEY',
        'SMTP_HOST',
        'SMTP_PORT'
    ];

    /**
     * Get all environment variables
     * @param bool|true $remove_guarded
     * @return array
     */
    public function all($remove_guarded = true)
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
}
