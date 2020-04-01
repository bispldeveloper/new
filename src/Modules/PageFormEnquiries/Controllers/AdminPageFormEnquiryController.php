<?php namespace EyeCore\Modules\PageFormEnquiries\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\PageFormEnquiries\Requests\AdminUpdatePageFormEnquiryRequest;
use EyeCore\Modules\PageFormEnquiryFields\Requests\CreatePageFormEnquiryFieldRequest;
use EyeCore\Modules\PageFormEnquiryFieldTypes\Repositories\PageFormEnquiryFieldTypeRepository;
use EyeCore\Modules\PageFormEnquiries\Models\PageFormEnquiry;
use EyeCore\Modules\PageFormEnquiries\Repositories\PageFormEnquiryRepository;
use EyeCore\Modules\PageFormEnquiries\Requests\UpdatePageFormEnquiryRequest;

/**
 * Class AdminPageFormEnquiryController
 * @package EyeCore\Modules\PageFormEnquiries\Controllers
 */
class AdminPageFormEnquiryController extends Controller
{
    /**
     * @var PageFormEnquiryRepository
     */
    private $pageFormEnquiryRepo;

    /**
     * AdminPageFormEnquiryController constructor.
     * @param PageFormEnquiryRepository $pageFormEnquiryRepo
     */
    function __construct(PageFormEnquiryRepository $pageFormEnquiryRepo)
    {
        $this->pageFormEnquiryRepo = $pageFormEnquiryRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $filter = request()->has('filter') && request()->input('filter') != '' ? ['status' => request()->input('filter')] : null;

        $pageformenquiries = $this->pageFormEnquiryRepo->getAll(20, request()->input('sort_by'), request()->input('sort_order'), $filter);

        return view('PageFormEnquiries::Admin.index', compact('pageformenquiries'));
    }

    /**
     * @param PageFormEnquiry $pageformenquiry
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(PageFormEnquiry $pageformenquiry)
    {
        return view('PageFormEnquiries::Admin.show', compact('pageformenquiry'));
    }

    /**
     * @param PageFormEnquiry $pageformenquiry
     * @param AdminUpdatePageFormEnquiryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PageFormEnquiry $pageformenquiry, AdminUpdatePageFormEnquiryRequest $request)
    {
        if($pageformenquiry = $this->pageFormEnquiryRepo->update($pageformenquiry->id, $request->input())) {
            return redirect()->route('mc-admin.pageformenquiries.show', $pageformenquiry->id)
                ->with('flash_message', 'The enquiry update was completed successfully.')
                ->with('flash_message_type', 'success');
        }

        return redirect()->back()->withInput()->withErrors();
    }

    /**
     * @param PageFormEnquiry $pageformenquiry
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PageFormEnquiry $pageformenquiry)
    {
        if($pageformenquiry->delete()) {
            return redirect()->route('mc-admin.pageformenquiries.index')
                ->with('flash_message', 'The enquiry was deleted')
                ->with('flash_message_type', 'success');
        }

        return back();
    }

    /**
     * @param PageFormEnquiry $pageformenquiry
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(PageFormEnquiry $pageformenquiry)
    {
        $destroyRoute = route('mc-admin.pageformenquiries.destroy', $pageformenquiry->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));

        abort(404);
    }

}
