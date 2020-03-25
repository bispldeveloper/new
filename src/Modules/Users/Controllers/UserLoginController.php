<?php namespace EyeCore\Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserLoginController
 * @package EyeCore\Modules\Users\Controllers
 */
class UserLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * @var string
     */
    protected $loginPath = '/login';

    /**
     * @var string
     */
    protected $guard = 'web';

    /**
     * @var string
     */
    protected $broker = 'users';

    /**
     * Show the application login form.
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        if(auth()->check()) {
            return redirect()->route('account.index');
        }
        return view('Users::Frontend.login');
    }

    /**
     * Override for loginUsername
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Get the needed authorization credentials from the request.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
    }

    /**
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard($this->guard);
    }
}
