<?php namespace EyeCore\Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Auth;
use Password;

/**
 * Class UserResetPasswordController
 * @package EyeCore\Modules\Users\Controllers
 */
class UserResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * @var string
     */
    protected $guard = 'web';

    /**
     * @var string
     */
    protected $broker = 'users';

    /**
     * @param \Illuminate\Http\Request $request
     * @param null $token
     * @return $this
     */
    public function showResetForm(Request $request, $token = null)
    {
        if(auth()->check()) {
            return redirect()->route('account.index');
        }
        return view('Users::Frontend.reset')->with([
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * Get the broker to be used during password reset.
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker($this->broker);
    }

    /**
     * Get the guard to be used during password reset.
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard($this->guard);
    }
}
