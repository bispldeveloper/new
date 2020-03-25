<?php namespace EyeCore\Modules\Usergroups\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class UsergroupPresenter
 * @package EyeCore\Modules\Usergroups\Presenters
 */
class UsergroupPresenter extends Presenter
{
    /**
     * @return mixed
     */
    public function getName()
    {
        return ucwords($this->name);
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
