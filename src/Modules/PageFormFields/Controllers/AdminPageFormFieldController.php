<?php namespace EyeCore\Modules\PageFormFields\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\PageFormFieldFieldTypes\Repositories\PageFormFieldFieldTypeRepository;
use EyeCore\Modules\PageFormFields\Models\PageFormField;
use EyeCore\Modules\PageFormFields\Repositories\PageFormFieldRepository;
use EyeCore\Modules\PageFormFields\Requests\UpdatePageFormFieldRequest;

/**
 * Class AdminPageFormFieldController
 * @package EyeCore\Modules\PageFormFields\Controllers
 */
class AdminPageFormFieldController extends Controller
{
    /**
     * @var PageFormFieldRepository
     */
    private $pageFormFieldRepo;

    /**
     * AdminPageFormFieldController constructor.
     * @param PageFormFieldRepository $pageFormFieldRepo
     */
    function __construct(PageFormFieldRepository $pageFormFieldRepo)
    {
        $this->pageFormFieldRepo = $pageFormFieldRepo;
    }

    /**
     * @param PageFormField $pageformfield
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(PageFormField $pageformfield)
    {
        $pageformfield->load('fieldtype');

        return view('PageFormFields::Admin.edit', compact('pageformfield'));
    }

    /**
     * @param PageFormField $pageformfield
     * @param UpdatePageFormFieldRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PageFormField $pageformfield, UpdatePageFormFieldRequest $request)
    {
        if($pageformfield = $this->pageFormFieldRepo->update($pageformfield->id, $request->input())) {
            return redirect()->back()
                ->with('flash_message', 'The page form update was completed successfully.')
                ->with('flash_message_type', 'success');
        }

        return redirect()->back()->withInput()->withErrors();
    }

    /**
     * @param PageFormField $pageformfield
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PageFormField $pageformfield)
    {
        if($pageformfield->delete($pageformfield->id)) {
            return redirect()->route('mc-admin.pageforms.edit', $pageformfield->form_id)
                ->with('flash_message', 'The field was deleted')
                ->with('flash_message_type', 'success');
        }

        return back();
    }

    /**
     * @param PageFormField $pageformfield
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(PageFormField $pageformfield)
    {
        $destroyRoute = route('mc-admin.pageformfields.destroy', $pageformfield->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));

        abort(404);
    }

}
