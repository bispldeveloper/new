<?php namespace EyeCore\Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\Usergroups\Repositories\UsergroupRepository;
use EyeCore\Modules\Users\Repositories\UserRepository;
use EyeCore\Modules\Users\Requests\UpdateUserRequest;
use EyeCore\Modules\Users\Requests\UserRequest;
use EyeCore\Modules\Users\Models\User;

/**
 * Class AdminUserController
 * @package EyeCore\Modules\Users\Controllers
 */
class AdminUserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepo;

    /**
     * @var UsergroupRepository
     */
    private $usergroupRepo;

    /**
     * AdminUserController constructor.
     * @param UserRepository $userRepo
     * @param UsergroupRepository $usergroupRepo
     */
    function __construct(UserRepository $userRepo, UsergroupRepository $usergroupRepo)
    {
        $this->userRepo = $userRepo;
        $this->usergroupRepo = $usergroupRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $filter = request()->has('filter') ? request()->input('filter') : false;

        $users = $this->userRepo->getAllFiltered($filter, 15, 'id', 'desc');

        return view('Users::Admin.index', compact('users', 'filter'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        $usergroups = $this->usergroupRepo->getAll()->pluck('name', 'id');

        return view('Users::Admin.create', compact('usergroups'));
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user_details = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'usergroup_id' => $request->input('usergroup_id'),
            'password' => bcrypt($request->input('password'))
        ];

        if($user = $this->userRepo->create($user_details)) {
            return redirect()
                ->route('mc-admin.users.edit', $user->id)
                ->with('flash_message', 'The user was added successfully.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(User $user)
    {
        $usergroups = $this->usergroupRepo->getAll()->pluck('name', 'id');

        return view('Users::Admin.edit', compact('user', 'usergroups'));
    }

    /**
     * @param User $user
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        if($this->userRepo->update($user->id, $request->input())) {
            return redirect()
                ->route('mc-admin.users.edit', $user->id)
                ->with('flash_message', 'The user update was completed.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        if($this->userRepo->delete($user->id)) {
            return redirect()
                ->route('mc-admin.users.index')
                ->with('flash_message', 'The user was deleted successfully.')
                ->with('flash_message_type', 'success');
        }
        return back();
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(User $user)
    {
        $destroyRoute = route('mc-admin.users.destroy', $user->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
    }

    /**
     * @param User $user
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(User $user, UserRequest $request)
    {
        if($this->userRepo->update($user->id, ['password' => bcrypt($request->input('password'))])) {
            return redirect()
                ->route('mc-admin.users.edit', $user->id)
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
        if($this->userRepo->restore($id)) {
            return redirect()
                ->route('mc-admin.users.index')
                ->with('flash_message', 'The user was restored')
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
        $user = $this->userRepo->getById($id);
        $restoreRoute = route('mc-admin.users.restore', $user->id);
        return view('Admins::Admin.partials.confirm-restore', compact('restoreRoute'));
    }
}
