<?php namespace EyeCore\Modules\NavMenuItem\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use EyeCore\Modules\NavMenu\Models\NavMenu;

/**
 * Class NavMenuItem
 * @package EyeCore\Modules\NavMenuItem\Models
 */
class NavMenuItem extends Eloquent
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $table = "navmenuitems";

    /**
     * @var array
     */
    protected $guarded = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * @return mixed
     */
    public function navmenu()
    {
        return $this->belongsTo(NavMenu::class, 'navmenu_id');
    }
}
