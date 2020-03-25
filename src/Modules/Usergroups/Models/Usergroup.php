<?php namespace EyeCore\Modules\Usergroups\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use EyeCore\Modules\Users\Models\User;
use Karl456\Presenter\Traits\PresentableTrait;

/**
 * Class Usergroup
 * @package EyeCore\Modules\Usergroups\Models
 */
class Usergroup extends Eloquent
{
    use SoftDeletes;
    use PresentableTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'permissions'
    ];

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'usergroups';

    /**
     * @var string
     */
    protected $presenter = 'EyeCore\Modules\Usergroups\Presenters\UsergroupPresenter';

    /**
     * User relation
     * @return mixed
     */
    public function user()
    {
        return $this->hasMany(User::class, 'usergroup_id');
    }

    /**
     * Get user permissions
     * @param $permissions
     * @return mixed
     */
    public function getPermissionsAttribute($permissions)
    {
        return json_decode($permissions, true);
    }

    /**
     * Set user permissions
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
        if(auth()->user()->usergroup_id != 1) {
            $defined_permissions = config('permissions');
            if(in_array_r($routeName, $defined_permissions)) {
                $usergroup = Usergroup::where('id', '=', auth()->user()->usergroup_id)->first();
                if(!isset($usergroup->permissions[$routeName])) {
                    return false;
                }
                return true;
            }
            return true;
        }
        return true;
    }
}
