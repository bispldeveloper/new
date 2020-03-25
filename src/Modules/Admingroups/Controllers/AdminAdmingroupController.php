<?php namespace EyeCore\Modules\Admingroups\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\Admingroups\Models\Admingroup;
use EyeCore\Modules\Admingroups\Repositories\AdmingroupRepository;
use EyeCore\Modules\Admingroups\Requests\AdmingroupRequest;

/**
 * Class AdminAdmingroupController
 * @package EyeCore\Modules\Admingroups\Controllers
 */
class AdminAdmingroupController extends Controller
{
    /**
     * @var AdmingroupRepository
     */
    private $admingroupRepo;

    /**
     * AdminAdmingroupController constructor.
     * @param AdmingroupRepository $admingroupRepo
     */
    function __construct(AdmingroupRepository $admingroupRepo)
    {
        $this->admingroupRepo = $admingroupRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $filter = request()->has('filter') ? request()->input('filter') : false;

        $admingroups = $this->admingroupRepo->getAllFilteredByAdmin($filter);

        return view('Admingroups::Admin.index', compact('admingroups', 'filter'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        $availablePermissions = $this->admingroupRepo->getAvailablePermissions();
        return view('Admingroups::Admin.create', compact('availablePermissions'));
    }

    /**
     * @param AdmingroupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdmingroupRequest $request)
    {
        if(!$request->has('permissions')) {
            $request->merge(['permissions' => NULL]);
        }
        if($admin = $this->admingroupRepo->create($request->input())) {
            return redirect()
                ->route('mc-admin.admingroups.edit', $admin->id)
                ->with('flash_message', 'The admin group was added.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param Admingroup $admingroup
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(Admingroup $admingroup)
    {
        $availablePermissions = $this->admingroupRepo->getAvailablePermissions();
        return view('Admingroups::Admin.edit', compact('admingroup', 'availablePermissions'));
    }

    /**
     * @param Admingroup $admingroup
     * @param AdmingroupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Admingroup $admingroup, AdmingroupRequest $request)
    {
        if(!$request->has('permissions')) {
            $request->merge(['permissions' => NULL]);
        }
        if($this->admingroupRepo->update($admingroup->id, $request->input())) {
            return redirect()
                ->route('mc-admin.admingroups.edit', $admingroup->id)
                ->with('flash_message', 'The admin group update was completed.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param Admingroup $admingroup
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Admingroup $admingroup)
    {
        if($this->admingroupRepo->delete($admingroup->id)) {
            return redirect()
                ->route('mc-admin.admingroups.index')
                ->with('flash_message', 'The admin group was successfully added.')
                ->with('flash_message_type', 'success');
        }
        return back();
    }

    /**
     * @param Admingroup $admingroup
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(Admingroup $admingroup)
    {
        $destroyRoute = route('mc-admin.admingroups.destroy', $admingroup->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        if($this->admingroupRepo->restore($id)) {
            return redirect()
                ->route('mc-admin.admingroups.index')
                ->with('flash_message', 'The admin group was restored')
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
        $admingroup = $this->admingroupRepo->getById($id);
        $restoreRoute = route('mc-admin.admingroups.restore', $admingroup->id);
        return view('Admins::Admin.partials.confirm-restore', compact('restoreRoute'));
    }
}
