<?php namespace EyeCore\Modules\UrlRedirects\Controllers;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use EyeCore\Exports\UrlRedirectsExport;
use EyeCore\Imports\UrlRedirectsImport;
use EyeCore\Modules\UrlRedirects\Models\UrlRedirect;
use EyeCore\Modules\UrlRedirects\Repositories\UrlRedirectRepository;
use EyeCore\Modules\UrlRedirects\Requests\UrlRedirectRequest;

/**
 * Class AdminUrlRedirectController
 * @package EyeCore\Modules\UrlRedirects\Controllers
 */
class AdminUrlRedirectController extends Controller
{
    /**
     * @var UrlRedirectRepository
     */
    private $urlredirectRepo;

    /**
     * AdminUrlRedirectController constructor.
     * @param UrlRedirectRepository $urlredirectRepo
     */
    function __construct(UrlRedirectRepository $urlredirectRepo)
    {
        $this->urlredirectRepo = $urlredirectRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $filter = request()->has('filter') ? request()->input('filter') : false;

        $urlredirects = $this->urlredirectRepo->getAllFiltered($filter, 30, 'id', 'asc');

        return view('UrlRedirects::Admin.index', compact('urlredirects', 'filter'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        return view('UrlRedirects::Admin.create');
    }

    /**
     * @param UrlRedirectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UrlRedirectRequest $request)
    {
        if($urlredirect = $this->urlredirectRepo->create($request->input())) {
            return redirect()
                ->route('mc-admin.urlredirects.create')
                ->with('flash_message', 'The url redirect was added successfully.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param UrlRedirect $urlredirect
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(UrlRedirect $urlredirect)
    {
        return view('UrlRedirects::Admin.edit', compact('urlredirect'));
    }

    /**
     * @param UrlRedirect $urlredirect
     * @param UrlRedirectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UrlRedirect $urlredirect, UrlRedirectRequest $request)
    {
        if($this->urlredirectRepo->update($urlredirect->id, $request->input())) {
            return back()
                ->with('flash_message', 'The url redirect update was completed successfully .')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param UrlRedirect $urlredirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(UrlRedirect $urlredirect)
    {
        if($this->urlredirectRepo->delete($urlredirect->id)) {
            return redirect()
                ->route('mc-admin.urlredirects.index')
                ->with('flash_message', 'The url redirect was deleted')
                ->with('flash_message_type', 'success');
        }
        return back();
    }

    /**
     * @param UrlRedirect $urlredirect
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(UrlRedirect $urlredirect)
    {
        $destroyRoute = route('mc-admin.urlredirects.destroy', $urlredirect->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        if($this->urlredirectRepo->restore($id)) {
            return redirect()
                ->route('mc-admin.urlredirects.index')
                ->with('flash_message', 'The url redirect was restored')
                ->with('flash_message_type', 'success');
        }
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmRestore($id)
    {
        $urlredirect = $this->urlredirectRepo->getById($id);
        $restoreRoute = route('mc-admin.urlredirects.restore', $urlredirect->id);
        return view('Admins::Admin.partials.confirm-restore', compact('restoreRoute'));
    }

    /**
     * @return mixed
     */
    public function export()
    {
        return Excel::download(new UrlRedirectsExport, 'urlredirects.xlsx');
    }

    /**
     * @return mixed
     */
    public function import()
    {
        Excel::import(new UrlRedirectsImport, request()->file('file'));

        return redirect()->route('mc-admin.urlredirects.index')
            ->with('flash_message', 'URL Redirects imported successfully.')
            ->with('flash_message_type', 'success');
    }
}
