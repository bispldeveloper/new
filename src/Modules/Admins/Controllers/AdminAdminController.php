<?php namespace EyeCore\Modules\Admins\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\Admingroups\Repositories\AdmingroupRepository;
use EyeCore\Modules\Admins\Models\Admin;
use EyeCore\Modules\Admins\Repositories\AdminRepository;
use EyeCore\Modules\Admins\Requests\CreateAdminRequest;
use EyeCore\Modules\Admins\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;

/**
 * Class AdminAdminController
 * @package EyeCore\Modules\Admins\Controllers
 */
class AdminAdminController extends Controller
{
    /**
     * @var AdminRepository
     */
    private $adminRepo;

    /**
     * @var AdmingroupRepository
     */
    private $admingroupRepo;

    /**
     * AdminAdminController constructor.
     * @param AdminRepository $adminRepo
     * @param AdmingroupRepository $admingroupRepo
     */
    function __construct(AdminRepository $adminRepo, AdmingroupRepository $admingroupRepo)
    {
        $this->adminRepo = $adminRepo;
        $this->admingroupRepo = $admingroupRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $filter = request()->has('filter') ? request()->input('filter') : false;

        $admins = $this->adminRepo->getAllFilteredByAdmingroup($filter, 15);

        return view('Admins::Admin.index', compact('admins', 'filter'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        $admingroups = $this->admingroupRepo->getAllFilteredByAdmin()->pluck('name', 'id');

        return view('Admins::Admin.create', compact('admingroups'));
    }

    /**
     * @param CreateAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAdminRequest $request)
    {
        $admin_details = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'admingroup_id' => $request->input('admingroup_id'),
            'password' => bcrypt($request->input('password'))
        ];

        if($admin = $this->adminRepo->create($admin_details)) {
            return redirect()
                ->route('mc-admin.admins.edit', $admin->id)
                ->with('flash_message', 'The admin was added successfully.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param Admin $admin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(Admin $admin)
    {
        if($admin->admingroup->id < auth()->guard('admins')->user()->admingroup_id) {
            return back()
                ->with('flash_message', 'You do not have permission to edit this admin')
                ->with('flash_message_type', 'warning');
        }

        $admingroups = $this->admingroupRepo->getAllFilteredByAdmin()->pluck('name', 'id');

        return view('Admins::Admin.edit', compact('admin', 'admingroups'));
    }

    /**
     * @param Admin $admin
     * @param UpdateAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Admin $admin, UpdateAdminRequest $request)
    {
        if($this->adminRepo->update($admin->id, $request->input())) {
            return redirect()
                ->route('mc-admin.admins.edit', $admin->id)
                ->with('flash_message', 'The admin update was completed.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param Admin $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Admin $admin)
    {
        if($admin->id != 1) {
            if($this->adminRepo->delete($admin->id)) {
                return redirect()
                    ->route('mc-admin.admins.index')
                    ->with('flash_message', 'The admin was deleted successfully.')
                    ->with('flash_message_type', 'success');
            }
        }
        return back();
    }

    /**
     * @param Admin $admin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(Admin $admin)
    {
        $destroyRoute = route('mc-admin.admins.destroy', $admin->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword($id, Request $request)
    {
        if($admin = $this->adminRepo->update($id, ['password' => bcrypt($request->input('password'))])) {
            return redirect()
                ->route('mc-admin.admins.edit', $admin->id)
                ->with('flash_message', 'The password was changed successfully.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        if($this->adminRepo->restore($id)) {
            return redirect()
                ->route('mc-admin.admins.index')
                ->with('flash_message', 'The admin was restored')
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
        $admin = $this->adminRepo->getById($id);
        $restoreRoute = route('mc-admin.admins.restore', $admin->id);
        return view('Admins::Admin.partials.confirm-restore', compact('restoreRoute'));
    }

    /**
     * @return mixed
     */
    public function search()
    {
        $terms = request()->input('terms');

        $results = $this->adminRepo->searchAdmins($terms, 10)->each(function($item, $key) {
            $item->id = $item->id;
            $item->value = $item->email;
        });

        if(request()->ajax()) {
            return $results;
        }
    }
}
