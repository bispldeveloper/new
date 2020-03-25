<?php namespace EyeCore\Modules\Admingroups\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use EyeCore\Modules\Admins\Models\Admin;
use Karl456\Presenter\Traits\PresentableTrait;

/**
 * Class Admingroup
 * @package EyeCore\Modules\Admingroups\Models
 */
class Admingroup extends Eloquent
{
    use SoftDeletes;
    use PresentableTrait;

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'admingroups';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'permissions'
    ];

    /**
     * @var string
     */
    protected $presenter = 'EyeCore\Modules\Admingroups\Presenters\AdmingroupPresenter';

    /**
     * Admin relation
     * @return mixed
     */
    public function admin()
    {
        return $this->hasMany(Admin::class, 'admingroup_id');
    }

    /**
     * Get admin permissions
     * @param $permissions
     * @return mixed
     */
    public function getPermissionsAttribute($permissions)
    {
        return json_decode($permissions, true);
    }

    /**
     * Set admin permissions
     * @param $permissions
     */
    public function setPermissionsAttribute($permissions)
    {
        $this->attributes['permissions'] = (is_null($permissions) ? NULL : json_encode($permissions));
    }

    /**
     * Has Permissions
     * @param $routeName
     * @return bool
     */
    public function hasPermission($routeName)
    {
        if(auth()->guard('admins')->user()->admingroup_id != 1) {
            $defined_permissions = config('permissions');
            if(in_array_r($routeName, $defined_permissions)) {
                if(!isset($this->permissions[$routeName])) {
                    return false;
                }
                return true;
            }
            return true;
        }
        return true;
    }
}
