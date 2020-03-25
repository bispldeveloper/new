<?php namespace EyeCore\Modules\PageTemplateBlocks\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class PageTemplateBlockPresenter
 * @package EyeCore\Modules\PageTemplateBlocks\Presenters
 */
class PageTemplateBlockPresenter extends Presenter
{
    /**
     * @return string
     */
    public function getName()
    {
        return ucwords($this->name);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ucfirst($this->type);
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
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
