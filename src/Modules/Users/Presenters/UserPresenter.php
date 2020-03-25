<?php

namespace EyeCore\Modules\Users\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class UserPresenter
 * @package EyeCore\Modules\Users\Presenters
 */
class UserPresenter extends Presenter
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
     * @return string
     */
    public function getInitials()
    {
        return substr($this->first_name, 0, 1) . substr($this->last_name, 0, 1);
    }
}
