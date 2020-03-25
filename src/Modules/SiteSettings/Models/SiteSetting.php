<?php namespace EyeCore\Modules\SiteSettings\Models;

use Eloquent;

/**
 * Class SiteSetting
 * @package EyeCore\Modules\SiteSettings\Models
 */
class SiteSetting extends Eloquent
{
    /**
     * @var string
     */
    protected $table = "sitesettings";

    /**
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * @param $value
     */
    public function setSettingAttribute($value)
    {
        $this->attributes['setting'] = str_replace(' ', '_', strtolower($value));
    }
}
