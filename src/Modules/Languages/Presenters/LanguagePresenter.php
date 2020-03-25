<?php namespace EyeCore\Modules\Languages\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class LanguagePresenter
 * @package EyeCore\Modules\Languages\Presenters
 */
class LanguagePresenter extends Presenter
{
    /**
     * @return mixed|string
     */
    public function getName()
    {
        return ucwords($this->name);
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
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
