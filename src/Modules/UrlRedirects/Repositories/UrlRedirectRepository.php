<?php namespace EyeCore\Modules\UrlRedirects\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\UrlRedirects\Models\UrlRedirect;

/**
 * Class UrlRedirectRepository
 * @package EyeCore\Modules\UrlRedirects\Repositories
 */
class UrlRedirectRepository extends EloquentRepository implements UrlRedirectInterface
{
    /**
     * @var UrlRedirect
     */
    private $model;

    /**
     * UrlRedirectRepository constructor.
     * @param UrlRedirect $model
     */
    function __construct(UrlRedirect $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
