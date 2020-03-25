<?php namespace EyeCore\Modules\Languages\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\Languages\Repositories\LanguageRepository;
use EyeCore\Modules\Languages\Requests\LanguageRequest;
use EyeCore\Modules\Languages\Models\Language;
use EyeCore\Modules\Languages\Requests\UpdateLanguageRequest;

/**
 * Class AdminLanguageController
 * @package EyeCore\Modules\Languages\Controllers
 */
class AdminLanguageController extends Controller
{
    /**
     * @var LanguageRepository
     */
    private $languageRepo;

    /**
     * AdminLanguageController constructor.
     * @param LanguageRepository $languageRepo
     */
    function __construct(LanguageRepository $languageRepo)
    {
        $this->languageRepo = $languageRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $filter = request()->has('filter') ? request()->input('filter') : false;

        $languages = $this->languageRepo->getAllFiltered($filter, false, 'id', 'asc');

        return view('Languages::Admin.index', compact('languages', 'filter'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        return view('Languages::Admin.create');
    }

    /**
     * @param LanguageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LanguageRequest $request)
    {
        if($language = $this->languageRepo->create($request->input())) {
            return redirect()
                ->route('mc-admin.languages.index')
                ->with('flash_message', 'The language was added successfully.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param Language $language
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(Language $language)
    {
        return view('Languages::Admin.edit', compact('language'));
    }

    /**
     * @param Language $language
     * @param LanguageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Language $language, UpdateLanguageRequest $request)
    {
        if($language = $this->languageRepo->update($language->id, $request->input())) {
            return redirect()
                ->route('mc-admin.languages.index')
                ->with('flash_message', 'The language update was completed successfully .')
                ->with('flash_message_type', 'success');
        }

        return redirect()->back()->withInput()->withErrors();
    }

    /**
     * @param Language $language
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Language $language)
    {
        if($language->id != 1) {
            if($this->languageRepo->delete($language->id)) {
                return redirect()
                    ->route('mc-admin.languages.index')
                    ->with('flash_message', 'The language was deleted')
                    ->with('flash_message_type', 'success');
            }
        }
        return back();
    }

    /**
     * @param Language $language
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(Language $language)
    {
        if($language->id != 1) {
            $destroyRoute = route('mc-admin.languages.destroy', $language->id);
            return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
        }
        abort(404);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $language = $this->languageRepo->getById($id);
        if($this->languageRepo->restore($language->id)) {
            return redirect()
                ->route('mc-admin.languages.index')
                ->with('flash_message', 'The language was restored')
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
        $language = $this->languageRepo->getById($id);
        $restoreRoute = route('mc-admin.languages.restore', $language->id);
        return view('Admins::Admin.partials.confirm-restore', compact('restoreRoute'));
    }
}
