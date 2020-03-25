<?php namespace EyeCore\Modules\Slideshow\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class SlideshowPresenter
 * @package EyeCore\Modules\Slideshow\Presenters
 */
class SlideshowPresenter extends Presenter
{
    /**
     * @return mixed
     */
    public function getName()
    {
        return ucwords($this->name);
    }

    /**
     * @return string
     */
    public function getPublished()
    {
        if($this->published == true) {
            return 'Published';
        }
        return 'Hidden';
    }

    /**
     * @return string
     */
    public function getPublishedLabel()
    {
        if($this->published == true) {
            return '<span class="label success">Published</span>';
        }
        return '<span class="label alert">Hidden</span>';
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->updated_at->format('d/m/Y - g:i A');
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
        return $this->updated_at->format('d/m/Y - g:i A');
    }
}
