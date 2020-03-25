<?php namespace EyeCore\Modules\Newsletters\Interfaces;

interface NewsletterInterface
{
    /**
     * @param $list_id
     * @param array $fields
     * @return mixed
     */
    public function subscribe($list_id, $fields = []);

}
