<?php namespace EyeCore\Modules\Users\Controllers;

use App\Http\Controllers\Controller;

/**
 * Class UserAccountController
 * @package EyeCore\Modules\Users\Controllers
 */
class UserAccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        return view('Users::Frontend.index');
    }
}
