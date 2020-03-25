<?php namespace EyeCore\Modules\PageForms\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class PageFormPresenter
 * @package EyeCore\Modules\PageForms\Presenters
 */
class PageFormPresenter extends Presenter
{
    /**
     * @return mixed|string
     */
    public function getName()
    {
        return $this->name;
    }

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
