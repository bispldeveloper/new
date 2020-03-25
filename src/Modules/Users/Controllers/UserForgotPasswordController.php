<?php namespace EyeCore\Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/**
 * Class UserForgotPasswordController
 * @package EyeCore\Modules\Users\Controllers
 */
class UserForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * @var string
     */
    protected $guard = 'web';

    /**
     * @var string
     */
    protected $broker = 'users';

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function showLinkRequestForm()
    {
        if(auth()->check()) {
            return redirect()->route('account.index');
        }
        return view('Users::Frontend.password');
    }

    /**
     * Override the broker so that it uses the admins broker
     * @return mixed
     */
    public function broker()
    {
        return Password::broker($this->broker);
    }
}
