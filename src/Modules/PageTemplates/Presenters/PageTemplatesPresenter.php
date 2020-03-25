<?php namespace EyeCore\Modules\PageTemplates\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class PageTemplatesPresenter
 * @package Eyeweb\PageTemplates\Presenters
 */
class PageTemplatesPresenter extends Presenter
{
    /**
     * @return string
     */
    public function getName()
    {
        return ucwords($this->name);
    }

    /**
     * @return mixed
     */
    public function getViewFile()
    {
        return $this->view_file;
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
