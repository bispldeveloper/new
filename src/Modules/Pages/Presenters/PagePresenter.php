<?php namespace EyeCore\Modules\Pages\Presenters;

use Carbon\Carbon;
use Karl456\Presenter\Presenter;

/**
 * Class PagePresenter
 * @package EyeCore\Modules\Pages\Presenters
 */
class PagePresenter extends Presenter
{
    /**
     * @return mixed|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed|string
     */
    public function getSlug()
    {
        return $this->slug != '/' ? $slug = '/' . $this->slug : $this->slug;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return ucfirst($this->sub_title);
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        if($this->meta_title != '') {
            return ucfirst($this->meta_title);
        }
        return ucfirst($this->title);
    }

    /**
     * @return mixed
     */
    public function getMetaDescription()
    {
        if($this->meta_description != '') {
            return $this->meta_description;
        }
        return ucfirst($this->sub_title);
    }


    /**
     * @return mixed
     */
    public function getMetaCanonical()
    {
        if($this->meta_canonical != '') {
            return $this->meta_canonical;
        }
        return url()->current();
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
