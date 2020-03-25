<?php namespace EyeCore\Modules\NavMenu\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\Pages\Page;
use EyeCore\Modules\NavMenu\Repositories\NavMenuRepository;
use EyeCore\Modules\NavMenuItem\Repositories\NavMenuItemRepository;
use EyeCore\Modules\NavMenu\Requests\NavMenuRequest;
use EyeCore\Modules\NavMenu\Models\NavMenu;

/**
 * Class AdminNavMenuController
 * @package EyeCore\Modules\NavMenu\Controllers
 */
class AdminNavMenuController extends Controller
{
    /**
     * @var NavMenuRepository
     */
    private $navmenuRepo;

    /**
     * @var NavMenuItemRepository
     */
    private $navmenuItemRepo;

    /**
     * AdminNavMenuController constructor.
     * @param NavMenuRepository $navmenuRepo
     * @param NavMenuItemRepository $navmenuItemRepo
     */
    function __construct(NavMenuRepository $navmenuRepo, NavMenuItemRepository $navmenuItemRepo)
    {
        $this->navmenuRepo = $navmenuRepo;
        $this->navmenuItemRepo = $navmenuItemRepo;
    }
	
	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
	 * @throws \Illuminate\Contracts\Container\BindingResolutionException
	 */
    public function index()
    {
    	$navmenus = $this->navmenuRepo->getAll(false, 'id', 'asc');
		return view('NavMenu::Admin.index', compact('navmenus'));
	}

    /**
     * @param NavMenu $navmenu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(NavMenu $navmenu)
    {
        $navmenu = $this->navmenuRepo->getById($navmenu->id, 'menuitems');
        $navmenu_id = $navmenu->id;
        $menuitems = $navmenu->menuitems->sortBy('title');

        $navmenus = $this->navmenuRepo->getRoutesList();

        $tree_structure = json_decode($navmenu->tree_structure, true);

        //Get Array of all values stored in nav menu JSON
        $output = preg_replace('/[^0-9]/', ' ', $navmenu->tree_structure);
        $stored_values = explode(" ", $output);
        foreach($stored_values as $key => $value) {
            if(empty($value)) {
                unset($stored_values[$key]);
            }
        }

        if(!empty($tree_structure)) {
            $output_nav_tree = $this->checkTreeStructure($tree_structure);
        }

        return view('NavMenu::Admin.edit', compact('navmenu', 'navmenus', 'navmenu_id', 'menuitems', 'tree_structure', 'stored_values', 'output_nav_tree'));
    }

    /**
     * @param $array
     * @return string
     */
    public function checkTreeStructure($array)
    {
        $all_items = $this->navmenuItemRepo->getAll();

        foreach($all_items as $item) {
            $itemnames[$item->id] = $item->title;
        }

        $html = '';
        foreach($array as $subarray) {
            if(array_key_exists($subarray['id'], $itemnames)) {
                foreach($subarray as $key => $value) {
                    if($key == 'id') {
                        $html .= '<li class="dd-item" data-id="' . $value . '">
                                  <span class="float-right">
                                      <a title="Edit Menu Item" href="' . route('mc-admin.navmenuitems.edit', $value) . '" class="icon-button trigger-reveal info"><i class="far fa-edit"></i></a>
                                      <a title="Remove Menu Item" href="' . route('mc-admin.navmenuitems.confirm-delete', $value) . '" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
                                  </span>
                                  <div class="dd-handle">' . $itemnames[$value] . ' </div>';
                    } else {
                        $html .= '<ol class="dd-list ">';
                        $html .= $this->checkTreeStructure($value);
                        $html .= '</ol>';
                    }
                }
                $html .= '</li>';
            }
        }

        return $html;
    }

    /**
     * @param NavMenu $navmenu
     * @param NavMenuRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NavMenu $navmenu, NavMenuRequest $request)
    {
        if($this->navmenuRepo->update($navmenu->id, $request->input())) {
            return redirect()
                ->route('mc-admin.navmenus.edit', $navmenu->id)
                ->with('flash_message', 'The nav menu update was completed.')
                ->with('flash_message_type', 'success');
        }
    }
}
