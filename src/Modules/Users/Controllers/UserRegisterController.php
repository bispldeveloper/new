<?php namespace EyeCore\Modules\Users\Controllers;

use EyeCore\Modules\Users\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserRegisterController
 * @package EyeCore\Modules\Users\Controllers
 */
class UserRegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var string
     */
    protected $guard = 'web';

    /**
     * @var string
     */
    protected $broker = 'users';

    /**
     * Where to redirect users after registration.
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Show the application registration form.
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        if(auth()->check()) {
            return redirect()->route('account.index');
        }
        return view('Users::Frontend.register');
    }

    /**
     * Get a validator for an incoming registration request.
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * @param array $data
     * @return User
     */
    protected function create($data)
    {
        $user = (object)$data;

        return User::create([
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => bcrypt($user->password)
        ]);
    }

    /**
     * Get the guard to be used during registration.
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard($this->guard);
    }
}
