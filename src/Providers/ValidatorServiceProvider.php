<?php namespace EyeCore\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

/**
 * Class ValidatorServiceProvider
 * @package EyeCore\Providers
 */
class ValidatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Date of Birth Validator
        Validator::extend('dob_valid', function($attribute, $value, $parameters) {
            $birthday = Carbon::parse(implode('-', request()->input('dob')))->format('Y-m-d');
            $todays_date = Carbon::now();
            if($todays_date->diffInYears($birthday) >= 18) {
                return true;
            }
            return false;
        });

        // Password Strength Validator
        Validator::extend('password_strength', function($attribute, $value, $parameters) {
            // check if string contains a number, a lowecase letter and uppercase letter
            if(preg_match('/^.*(?=.*[A-Z])(?=.*[0-9]).*$/', $value)) {
                return true;
            }
            return false;
        });
    }

    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        //
    }

}
