<?php namespace EyeCore\Modules\PageFormEnquiries\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class PageFormEnquiryPresenter
 * @package EyeCore\Modules\PageFormEnquiries\Presenters
 */
class PageFormEnquiryPresenter extends Presenter
{
    /**
     * @return string
     */
    public function getStatus()
    {
        return ucwords(str_replace('_', ' ', $this->status));
    }

    /**
     * @return string
     */
    public function getStatusLabel()
    {
        if($this->status == 'received') {
            return '<span class="label info">' . $this->getStatus() . '</span>';
        } elseif($this->status == 'in_progress') {
            return '<span class="label success">' . $this->getStatus() . '</span>';
        }
        return '<span class="label secondary">' . $this->getStatus() . '</span>';
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
