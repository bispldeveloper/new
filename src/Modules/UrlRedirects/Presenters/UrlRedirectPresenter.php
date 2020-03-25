<?php namespace EyeCore\Modules\UrlRedirects\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class UrlRedirectPresenter
 * @package EyeCore\Modules\UrlRedirects\Presenters
 */
class UrlRedirectPresenter extends Presenter
{
    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at->format('d/m/Y - g:i A');
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at->format('d/m/Y - g:i A');
    }

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->deleted_at->format('d/m/Y - g:i A');
    }
}
