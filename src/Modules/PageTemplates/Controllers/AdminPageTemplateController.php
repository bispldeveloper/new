<?php namespace EyeCore\Modules\PageTemplates\Controllers;

use File;
use App\Http\Controllers\Controller;
use EyeCore\Modules\Pages\Repositories\PageRepository;
use EyeCore\Modules\PageTemplates\Repositories\PageTemplateRepository;
use EyeCore\Modules\PageTemplates\Requests\PageTemplateRequest;
use EyeCore\Modules\PageTemplates\Models\PageTemplate;

/**
 * Class AdminPageTemplateController
 * @package EyeCore\Modules\PageTemplates\Controllers
 */
class AdminPageTemplateController extends Controller
{
    /**
     * @var PageTemplateRepository
     */
    private $pageTemplateRepo;

    /**
     * @var PageRepository
     */
    private $pageRepo;

    /**
     * AdminPageTemplateController constructor.
     * @param PageTemplateRepository $pageTemplateRepo
     * @param PageRepository $pageRepo
     */
    function __construct(PageTemplateRepository $pageTemplateRepo, PageRepository $pageRepo)
    {
        $this->pageTemplateRepo = $pageTemplateRepo;
        $this->pageRepo = $pageRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $pagetemplates = $this->pageTemplateRepo->getAllFiltered(request()->input('filter'), false, request()->input('sort_by'), request()->input('sort_order'));

        return view('PageTemplates::Admin.index', compact('pagetemplates'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        $directoryArray = [];
        if(File::exists(base_path('modules/Pages/Resources/Views/Frontend'))) {
            $directoryArray[] = base_path('modules/Pages/Resources/Views/Frontend');
        }
        $directoryArray[] = base_path('vendor/eyeweb/eyecore/src/Modules/Pages/Resources/Views/Frontend');
        $pagetemplatefiles = File::files($directoryArray);

        $pagetemplates = [];
        foreach($pagetemplatefiles as $pagetemplatefile) {
            $pagetemplates[$pagetemplatefile->getFilename()] = $pagetemplatefile->getFilename();
        }

        return view('PageTemplates::Admin.create', compact('pagetemplates'));
    }

    /**
     * @param PageTemplateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PageTemplateRequest $request)
    {
        if($page = $this->pageTemplateRepo->create($request->input())) {
            return redirect()
                ->route('mc-admin.pagetemplates.index')
                ->with('flash_message', 'The template was added successfully.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param PageTemplate $pagetemplate
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(PageTemplate $pagetemplate)
    {
        $pagetemplate->load('blocks');

        $directoryArray = [];
        if(File::exists(base_path('modules/Pages/Resources/Views/Frontend'))) {
            $directoryArray[] = base_path('modules/Pages/Resources/Views/Frontend');
        }
        $directoryArray[] = base_path('vendor/eyeweb/eyecore/src/Modules/Pages/Resources/Views/Frontend');
        $pagetemplatefiles = File::files($directoryArray);

        $pagetemplates = [];
        foreach($pagetemplatefiles as $pagetemplatefile) {
            $pagetemplates[$pagetemplatefile->getFilename()] = $pagetemplatefile->getFilename();
        }

        return view('PageTemplates::Admin.edit', compact('pagetemplate', 'pagetemplates'));
    }

    /**
     * @param PageTemplate $pagetemplate
     * @param PageTemplateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PageTemplate $pagetemplate, PageTemplateRequest $request)
    {
        if($this->pageTemplateRepo->update($pagetemplate->id, $request->input())) {
            return back()
                ->with('flash_message', 'The page template update was completed.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param PageTemplate $pagetemplate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PageTemplate $pagetemplate)
    {
        if($this->pageTemplateRepo->delete($pagetemplate->id, false)) {
            return redirect()
                ->route('mc-admin.pagetemplates.index')
                ->with('flash_message', 'The page template was deleted')
                ->with('flash_message_type', 'success');
        }
        return back();
    }

    /**
     * @param PageTemplate $pagetemplate
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(PageTemplate $pagetemplate)
    {
        $destroyRoute = route('mc-admin.pagetemplates.destroy', $pagetemplate->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        if($this->pageTemplateRepo->restore($id)) {
            return redirect()
                ->route('mc-admin.pagetemplates.index')
                ->with('flash_message', 'The page template was restored')
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
        $page = $this->pageTemplateRepo->getById($id);
        $restoreRoute = route('mc-admin.pagetemplates.restore', $page->id);
        return view('Admins::Admin.partials.confirm-restore', compact('restoreRoute'));
    }
}
