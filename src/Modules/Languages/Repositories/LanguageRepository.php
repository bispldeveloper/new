<?php namespace EyeCore\Modules\Languages\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\Languages\Models\Language;

/**
 * Class LanguageRepository
 * @package EyeCore\Modules\Languages\Repositories
 */
class LanguageRepository extends EloquentRepository implements LanguageInterface
{
    /**
     * @var Language
     */
    private $model;

    /**
     * LanguageRepository constructor.
     * @param Language $model
     */
    function __construct(Language $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
