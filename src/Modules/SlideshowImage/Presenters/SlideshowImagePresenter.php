<?php namespace EyeCore\Modules\Slideshow\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class SlideshowImagePresenter
 * @package EyeCore\Modules\Slideshow\Presenters
 */
class SlideshowImagePresenter extends Presenter
{
    /**
     * @return bool|string
     */
    public function getFilename()
    {
        return substr($this->image, strrpos($this->image, '/') + 1);
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
