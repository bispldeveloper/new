<?php namespace EyeCore\Modules\Admins\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminResetPasswordController
 * @package EyeCore\Modules\Admins\Controllers
 */
class AdminResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * @var string
     */
    protected $redirectTo = '/mc-admin';

    /**
     * @var string
     */
    protected $guard = 'admins';

    /**
     * @var string
     */
    protected $broker = 'admins';

    /**
     * @param Request $request
     * @param null $token
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('Admins::Admin.reset')->with([
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * @return mixed
     */
    public function broker()
    {
        return Password::broker($this->broker);
    }

    /**
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard($this->guard);
    }
}
