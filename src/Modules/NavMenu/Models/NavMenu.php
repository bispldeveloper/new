<?php namespace EyeCore\Modules\NavMenu\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use EyeCore\Modules\NavMenuItem\Models\NavMenuItem;

/**
 * Class NavMenu
 * @package EyeCore\Modules\NavMenu\Models
 */
class NavMenu extends Eloquent
{
	use SoftDeletes;
	
	/**
	 * @var array
	 */
	protected $dates = ['deleted_at'];
	
	/**
	 * @var string
	 */
	protected $table = "navmenus";
	
	/**
	 * @var array
	 */
	protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];
	
	/**
	 * @var
	 */
	private $navmenu;
	
	/**
	 * @return mixed
	 */
	public function menuitems()
	{
		return $this->hasMany(NavMenuItem::class, 'navmenu_id', 'id');
	}
	
	/**
	 * Get Topbar HTML
	 * @return string
	 */
	public function getTopbarHtml()
	{
		if(!$this->navmenu) {
			$this->navmenu = $this->where('id', 1)->with('menuitems')->first();
		}
		$navmenuItems = $this->navmenu->menuitems->keyBy('id');
		$navmenuStructure = json_decode($this->navmenu->tree_structure);
		return $this->generateTopbarHtml($navmenuStructure, $navmenuItems);
	}
	
	/**
	 * Generate Topbar HTML
	 * @param $navmenuStructure
	 * @param $navmenuItems
	 * @return string
	 */
	public function generateTopbarHtml($navmenuStructure, $navmenuItems)
	{
		$html = '';
		foreach($navmenuStructure as $navmenuItem) {
            if(isset($navmenuItems[$navmenuItem->id])) {
                $theNavmenuItem = $navmenuItems[$navmenuItem->id];
                $hasChildren = isset($navmenuItem->children) && count($navmenuItem->children) > 0;
                $isActive = (request()->is(($theNavmenuItem->filename == '/' ? $theNavmenuItem->filename : ltrim($theNavmenuItem->filename, '/') . '*')) ? true : false);
                $html .= '<li class="' . ($isActive ? ' active' : '') . '"><a href="' . $theNavmenuItem->filename . '"><span>' . $theNavmenuItem->title . '</span></a>';
                if($hasChildren) {
                    $html .= '<ul class="menu vertical submenu is-dropdown-submenu">';
                    $html .= $this->generateTopbarHtml($navmenuItem->children, $navmenuItems);
                    $html .= '</ul>';

                }
                $html .= '</li>';
            }
		}
		return $html;
	}
	
	/**
	 * Get Offcanvas HTML
	 * @return string
	 */
	public function getOffcanvasHtml()
	{
		if(!$this->navmenu) {
			$this->navmenu = $this->where('id', 1)->with('menuitems')->first();
		}
		$navmenuItems = $this->navmenu->menuitems->keyBy('id');
		$navmenuStructure = json_decode($this->navmenu->tree_structure);
		return $this->generateOffcanvasHtml($navmenuStructure, $navmenuItems);
	}
	
	/**
	 * Generate Offcanvas HTML
	 * @param $navmenuStructure
	 * @param $navmenuItems
	 * @return string
	 */
	public function generateOffcanvasHtml($navmenuStructure, $navmenuItems)
	{
		$html = '';
		foreach($navmenuStructure as $navmenuItem) {
            if(isset($navmenuItems[$navmenuItem->id])) {
                $theNavmenuItem = $navmenuItems[$navmenuItem->id];
                $hasChildren = isset($navmenuItem->children) && count($navmenuItem->children) > 0;
                $isActive = (request()->is(($theNavmenuItem->filename == '/' ? $theNavmenuItem->filename : ltrim($theNavmenuItem->filename, '/') . '*')) ? true : false);
                $html .= '<li class="' . ($isActive ? ' active' : '') . '"><a href="' . $theNavmenuItem->filename . '"><span>' . $theNavmenuItem->title . '</span></a>';
                if($hasChildren) {
                    $html .= '<ul class="vertical menu">';
                    $html .= $this->generateTopbarHtml($navmenuItem->children, $navmenuItems);
                    $html .= '</ul>';
                }
                $html .= '</li>';
            }
		}
		return $html;
	}
	
	/**
	 * @return string
	 */
	public function generateListHtml()
	{
		$navmenuItems = $this->menuitems->keyBy('id');
		$navmenuStructure = json_decode($this->tree_structure);
		$html = '';
		foreach($navmenuStructure as $navmenuItem) {
			$theNavmenuItem = $navmenuItems[$navmenuItem->id];
			$hasChildren = isset($navmenuItem->children) && count($navmenuItem->children) > 0;
			$isActive = (request()->is(($theNavmenuItem->filename == '/' ? $theNavmenuItem->filename : ltrim($theNavmenuItem->filename, '/') . '*')) ? true : false);
			$html .= '<li class="' . ($isActive ? ' active' : '') . '"><a href="' . $theNavmenuItem->filename . '"><span>' . $theNavmenuItem->title . '</span></a>';
			if($hasChildren) {
				$html .= '<ul>';
				$html .= $this->generateListHtml($navmenuItem->children, $navmenuItems);
				$html .= '</ul>';
			}
			$html .= '</li>';
		}
		return $html;
	}
}
