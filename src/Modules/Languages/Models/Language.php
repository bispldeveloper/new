<?php namespace EyeCore\Modules\Languages\Models;

use Eloquent, SoftDeletingTrait;
use Karl456\Presenter\Traits\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Language
 * @package EyeCore\Modules\Languages\Models
 */
class Language extends Eloquent
{
    use PresentableTrait;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $presenter = 'EyeCore\Modules\Languages\Presenters\LanguagePresenter';

    /**
     * @var string
     */
    protected $table = "languages";
    /**
     * @var array
     */
    protected $guarded = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
