<?php namespace EyeCore\Modules\NavMenu\Repositories;

use Route;
use EyeCore\EloquentRepository;
use EyeCore\Modules\NavMenu\Models\NavMenu;

/**
 * Class NavMenuRepository
 * @package EyeCore\Modules\NavMenu\Repositories
 */
class NavMenuRepository extends EloquentRepository implements NavMenuInterface
{
    /**
     * @var NavMenu
     */
    private $model;

    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    private $cms_routes;

    /**
     * NavMenuRepository constructor.
     * @param NavMenu $model
     */
    function __construct(NavMenu $model)
    {
        parent::__construct($model);

        $this->model = $model;
        $this->cms_routes = config('navmenus');
    }

    /**
     * @param $title
     * @param bool $with
     * @return mixed
     */
    public function getByTitle($title, $with = false)
    {
        if($with) {
            return $this->model->where('title', '=', $title)->with($with)->first();
        }

        return $this->model->where('title', '=', $title)->first();
    }

    /**
     * Gets all routes and module items to populate the dropdown list
     * @return mixed
     */
    public function getRoutesList()
    {
        // Get all the routes
        $route_collection = new \Illuminate\Database\Eloquent\Collection;

        // Get all individual items based on navmenu config file (Config/NavMenus/navmenus.php)
        foreach($this->cms_routes as $classname => $where) {
            if($where != '') {
                $routes = $classname::where($where)->get();
                foreach($routes as $route) {
					$navmenu = new NavMenu();
					$navmenu->type = get_class($route);
					$navmenu->name = $route->present()->getTitle;
					$navmenu->slug = $route->present()->getSlug;
					$route_collection->add($navmenu);
                }
            } else {
                $routes = $classname::all();
                foreach($routes as $route) {
                    $navmenu = new NavMenu();
                    $navmenu->type = get_class($route);
                    $navmenu->name = $route->present()->getTitle;
                    $navmenu->slug = $route->present()->getSlug;
                    $route_collection->add($navmenu);
                }
            }
        }

        // Group them all by type
        $groups = $route_collection->groupBy('type');

        // Foreach to create an optgroup for dropdown lists
        foreach($groups as $classname => $group) {
            $classname_explode = explode('\\', $classname);
            $plural_name = $classname_explode[count($classname_explode) - 3];
            $navmenus[$plural_name] = $group->pluck('name', 'slug')->toArray();
        }

        return $navmenus;
    }
}
