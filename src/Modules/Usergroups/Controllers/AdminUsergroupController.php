<?php namespace EyeCore\Modules\Usergroups\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\Usergroups\Repositories\UsergroupRepository;
use EyeCore\Modules\Usergroups\Requests\UsergroupRequest;
use EyeCore\Modules\Usergroups\Models\Usergroup;

/**
 * Class AdminUsergroupController
 * @package EyeCore\Modules\Usergroups\Controllers
 */
class AdminUsergroupController extends Controller
{
    /**
     * @var UsergroupRepository
     */
    private $usergroupRepo;

    /**
     * AdminUsergroupController constructor.
     * @param UsergroupRepository $usergroupRepo
     */
    function __construct(UsergroupRepository $usergroupRepo)
    {
        $this->usergroupRepo = $usergroupRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $filter = request()->has('filter') ? request()->input('filter') : false;

        $usergroups = $this->usergroupRepo->getAllFiltered($filter, false, 'id', 'desc');

        return view('Usergroups::Admin.index', compact('usergroups', 'filter'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        $availablePermissions = $this->usergroupRepo->getAvailablePermissions();
        return view('Usergroups::Admin.create', compact('availablePermissions'));
    }

    /**
     * @param UsergroupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UsergroupRequest $request)
    {
        if(!$request->has('permissions.*')) {
            $request->merge(['permissions' => NULL]);
        }
        if($user = $this->usergroupRepo->create($request->input())) {
            return redirect()
                ->route('mc-admin.usergroups.edit', $user->id)
                ->with('flash_message', 'The usergroup was added.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param Usergroup $usergroup
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(Usergroup $usergroup)
    {
        $availablePermissions = $this->usergroupRepo->getAvailablePermissions();

        return view('Usergroups::Admin.edit', compact('usergroup', 'availablePermissions'));
    }

    /**
     * @param Usergroup $usergroup
     * @param UsergroupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Usergroup $usergroup, UsergroupRequest $request)
    {
        if(!$request->has('permissions.*')) {
            $request->merge(['permissions' => NULL]);
        }
        if($this->usergroupRepo->update($usergroup->id, $request->input())) {
            return redirect()
                ->route('mc-admin.usergroups.edit', $usergroup->id)
                ->with('flash_message', 'The usergroup update was completed.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param Usergroup $usergroup
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Usergroup $usergroup)
    {
        if($this->usergroupRepo->delete($usergroup->id, false)) {
            return redirect()
                ->route('mc-admin.usergroups.index')
                ->with('flash_message', 'The usergroup was succesfully added.')
                ->with('flash_message_type', 'success');
        }
        return back();
    }

    /**
     * @param Usergroup $usergroup
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(Usergroup $usergroup)
    {
        $destroyRoute = route('mc-admin.usergroups.destroy', $usergroup->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        if($this->usergroupRepo->restore($id)) {
            return redirect()
                ->route('mc-admin.usergroups.index')
                ->with('flash_message', 'The user group was restored')
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
        $usergroup = $this->usergroupRepo->getById($id);
        $restoreRoute = route('mc-admin.usergroups.restore', $usergroup->id);
        return view('Admins::Admin.partials.confirm-restore', compact('restoreRoute'));
    }
}
