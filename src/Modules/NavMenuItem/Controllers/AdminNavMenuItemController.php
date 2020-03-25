<?php namespace EyeCore\Modules\NavMenuItem\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\NavMenu\Repositories\NavMenuRepository;
use EyeCore\Modules\NavMenuItem\Models\NavMenuItem;
use EyeCore\Modules\NavMenuItem\Repositories\NavMenuItemRepository;
use EyeCore\Modules\Pages\Page;
use EyeCore\Modules\NavMenuItem\Requests\NavMenuItemRequest;

/**
 * Class AdminNavMenuItemController
 * @package EyeCore\Modules\NavMenuItem\Controllers
 */
class AdminNavMenuItemController extends Controller
{
    /**
     * @var NavMenuRepository|NavMenuRepo
     */
    private $navmenuRepo;

    /**
     * @var NavMenuItemRepo|NavMenuItemRepository
     */
    private $navmenuItemRepo;

    /**
     * AdminNavMenuItemController constructor.
     * @param NavMenuRepository $navmenuRepo
     * @param NavMenuItemRepository $navmenuItemRepo
     */
    function __construct(NavMenuRepository $navmenuRepo, NavMenuItemRepository $navmenuItemRepo)
    {
        $this->navmenuRepo = $navmenuRepo;
        $this->navmenuItemRepo = $navmenuItemRepo;
    }

    /**
     * @param NavMenuItemRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NavMenuItemRequest $request)
    {
        if($menuitem = $this->navmenuItemRepo->create($request->input())) {
            return back()->with('flash_message', 'The menu item was added.')->with('flash_message_type', 'success');
        }
    }

    /**
     * @param NavMenuItem $menuitem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(NavMenuItem $menuitem)
    {
        $navmenus = $this->navmenuRepo->getRoutesList();
        $navmenu_id = $menuitem->navmenu_id;

        return view('NavMenuItem::Admin.edit', compact('menuitem', 'navmenus', 'navmenu_id'));
    }

    /**
     * @param NavMenuItem $menuitem
     * @param NavMenuItemRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NavMenuItem $menuitem, NavMenuItemRequest $request)
    {
        if($this->navmenuItemRepo->update($menuitem->id, $request->input())) {
            return back()
                ->with('flash_message', 'The menu item update was completed.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param NavMenuItem $menuitem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(NavMenuItem $menuitem)
    {
        if($this->navmenuItemRepo->delete($menuitem->id)) {
            return redirect()
                ->route('mc-admin.navmenus.edit', $menuitem->navmenu_id)
                ->with('flash_message', 'The menu item was deleted')
                ->with('flash_message_type', 'success');
        }
        return back();
    }

    /**
     * @param NavMenuItem $menuitem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(NavMenuItem $menuitem)
    {
        $destroyRoute = route('mc-admin.navmenuitems.destroy', $menuitem->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
    }
}
