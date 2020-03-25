<?php namespace EyeCore\Modules\Admins\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/**
 * Class AdminForgotPasswordController
 * @package EyeCore\Modules\Admins\Controllers
 */
class AdminForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * @var string
     */
    protected $guard = 'admins';

    /**
     * @var string
     */
    protected $broker = 'admins';

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function showLinkRequestForm()
    {
        return view('Admins::Admin.password');
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
