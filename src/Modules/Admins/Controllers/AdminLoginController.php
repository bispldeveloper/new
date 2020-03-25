<?php namespace EyeCore\Modules\Admins\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminLoginController
 * @package EyeCore\Modules\Admins\Controllers
 */
class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @var string
     */
    protected $redirectTo = '/mc-admin';

    /**
     * @var string
     */
    protected $loginPath = '/mc-admin/login';

    /**
     * @var string
     */
    protected $guard = 'admins';

    /**
     * @var string
     */
    protected $broker = 'admins';

    /**
     * AdminLoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth.admin', ['except' => 'logout']);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getLogin()
    {
        return view('Admins::Admin.login');
    }

    /**
     * @return string
     */
    public function username()
    {
        return 'login';
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $login = $request->get('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return [
            $field => $login,
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
