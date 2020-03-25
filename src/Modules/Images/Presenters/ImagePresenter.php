<?php namespace EyeCore\Modules\Images\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class ImagePresenter
 * @package EyeCore\Modules\Images\Presenters
 */
class ImagePresenter extends Presenter
{
    /**
     * @return mixed
     */
    public function getAltText()
    {
        return $this->alt_text;
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
