<?php namespace EyeCore\Modules\FileManager\Controllers;

use App\Http\Controllers\Controller;

/**
 * Class AdminFileManagerController
 * @package EyeCore\Modules\FileManager\Controllers
 */
class AdminFileManagerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        return view('FileManager::Admin.media');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function frame()
    {
        return view('FileManager::Admin.mediaframed');
    }
}
