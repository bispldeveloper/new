<?php namespace EyeCore\Modules\Admins\Models;

use EyeCore\Modules\Admins\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Karl456\Presenter\Traits\PresentableTrait;
use EyeCore\Modules\Admingroups\Models\Admingroup;

/**
 * Class Admin
 * @package EyeCore\Modules\Admins\Models
 */
class Admin extends Authenticatable
{
    use PresentableTrait;
    use Notifiable;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'admins';

    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
        'admingroup_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admingroup()
    {
        return $this->belongsTo(Admingroup::class, 'admingroup_id');
    }

    /**
     * @var string
     */
    protected $presenter = 'EyeCore\Modules\Admins\Presenters\AdminPresenter';

    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
