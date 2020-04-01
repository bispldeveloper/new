<?php namespace EyeCore\Modules\PageForms\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\PageFormFields\Requests\CreatePageFormFieldRequest;
use EyeCore\Modules\PageFormFieldTypes\Repositories\PageFormFieldTypeRepository;
use EyeCore\Modules\PageForms\Models\PageForm;
use EyeCore\Modules\PageForms\Repositories\PageFormRepository;
use EyeCore\Modules\PageForms\Requests\CreatePageFormRequest;
use EyeCore\Modules\PageForms\Requests\UpdatePageFormRequest;

/**
 * Class AdminPageFormController
 * @package EyeCore\Modules\PageForms\Controllers
 */
class AdminPageFormController extends Controller
{
    /**
     * @var PageFormRepository
     */
    private $pageFormRepo;
    /**
     * @var PageFormFieldTypeRepository
     */
    private $pageFormFieldTypeRepo;

    /**
     * AdminPageFormController constructor.
     * @param PageFormRepository $pageFormRepo
     * @param PageFormFieldTypeRepository $pageFormFieldTypeRepo
     */
    function __construct(PageFormRepository $pageFormRepo, PageFormFieldTypeRepository $pageFormFieldTypeRepo)
    {
        $this->pageFormRepo = $pageFormRepo;
        $this->pageFormFieldTypeRepo = $pageFormFieldTypeRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $pageforms = $this->pageFormRepo->getAll(20, request()->input('sort_by'), request()->input('sort_order'));

        return view('PageForms::Admin.index', compact('pageforms'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        $fieldtypes = $this->pageFormFieldTypeRepo->getAll();

        return view('PageForms::Admin.create', compact('fieldtypes'));
    }

    /**
     * @param CreatePageFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePageFormRequest $request)
    {
        if($pageform = $this->pageFormRepo->create($request->input())) {

            if($pageform->has_newsletter) {
                $pageform->fields()->createMany([
                    [
                        'form_field_type_id' => 1,
                        'is_newsletter_field' => 1,
                        'name' => 'First Name',
                        'has_label' => 1,
                        'required' => 1
                    ],
                    [
                        'form_field_type_id' => 1,
                        'is_newsletter_field' => 1,
                        'name' => 'Last Name',
                        'has_label' => 1,
                        'required' => 1
                    ],
                    [
                        'form_field_type_id' => 4,
                        'is_newsletter_field' => 1,
                        'name' => 'Email Address',
                        'has_label' => 1,
                        'required' => 1
                    ],
                    [
                        'form_field_type_id' => 9,
                        'is_newsletter_field' => 1,
                        'name' => 'Agree Newsletter',
                        'has_label' => 1,
                        'label' => 'Please subscribe me to the newsletter'
                    ]
                ]);
            }

            return redirect()->route('mc-admin.pageforms.edit', $pageform->id)
                ->with('flash_message', 'The page form was added successfully.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param PageForm $pageform
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(PageForm $pageform)
    {
        $pageform->load('fields', 'fields.fieldtype');

        $fieldtypes = $this->pageFormFieldTypeRepo->getAll();

        return view('PageForms::Admin.edit', compact('pageform', 'fieldtypes'));
    }

    /**
     * @param PageForm $pageform
     * @param UpdatePageFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PageForm $pageform, UpdatePageFormRequest $request)
    {
        if($pageform = $this->pageFormRepo->update($pageform->id, $request->input())) {
            return redirect()->route('mc-admin.pageforms.edit', $pageform->id)
                ->with('flash_message', 'The page form update was completed successfully.')
                ->with('flash_message_type', 'success');
        }

        return redirect()->back()->withInput()->withErrors();
    }

    /**
     * @param PageForm $pageform
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PageForm $pageform)
    {
        if($this->pageFormRepo->delete($pageform->id, false)) {
            return redirect()->route('mc-admin.pageforms.index')
                ->with('flash_message', 'The page form was deleted')
                ->with('flash_message_type', 'success');
        }

        return back();
    }

    /**
     * @param PageForm $pageform
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(PageForm $pageform)
    {
        $destroyRoute = route('mc-admin.pageforms.destroy', $pageform->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));

        abort(404);
    }

    /**
     * @param PageForm $pageform
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function addField(PageForm $pageform)
    {
        $fieldtypes = $this->pageFormFieldTypeRepo->getAll();

        return view('PageForms::Admin.addfield', compact('pageform', 'fieldtypes'));
    }

    /**
     * @param PageForm $pageform
     * @param CreatePageFormFieldRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeField(PageForm $pageform, CreatePageFormFieldRequest $request)
    {
        $request = request();

        $request->merge(['form_id' => $pageform->id]);

        $pageform->fields()->create($request->input());

        return redirect()->back();
    }

}
