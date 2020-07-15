<?php namespace EyeCore\Modules\Admins\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class AdminPresenter
 * @package EyeCore\Modules\Admins\Presenters
 */
class AdminPresenter extends Presenter
{
    /**
     * @return string
     */
    public function getFirstName()
    {
        return ucwords($this->first_name);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return ucwords($this->last_name);
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return ucwords($this->first_name . ' ' . $this->last_name);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return ucwords($this->email);
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
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

    /**
     * @return string
     */
    public function getInitials()
    {
        return substr($this->first_name, 0, 1) . substr($this->last_name, 0, 1);
    }
}
