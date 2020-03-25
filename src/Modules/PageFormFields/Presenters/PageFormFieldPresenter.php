<?php namespace EyeCore\Modules\PageFormFields\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class PageFormFieldPresenter
 * @package EyeCore\Modules\PageFormFields\Presenters
 */
class PageFormFieldPresenter extends Presenter
{
    /**
     * @return mixed|string
     */
    public function getRequired()
    {
        return $this->required ? 'Yes' : 'No';
    }

    /**
     * @return string
     */
    public function getRequiredLabel()
    {
        if($this->required) {
            return '<span class="label success">Yes</span>';
        }
        return '<span class="label alert">No</span>';
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        if($this->label == '') {
            return $this->name;
        }

        return $this->label;
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
