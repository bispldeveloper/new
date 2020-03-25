<?php namespace EyeCore\Modules\Newsletters\Managers;

use EyeCore\Modules\Newsletters\Drivers\CampaignMonitorDriver;
use EyeCore\Modules\Newsletters\Drivers\MailchimpDriver;
use EyeCore\Modules\Newsletters\Drivers\NullDriver;
use Illuminate\Support\Manager;

/**
 * Class NewsletterManager
 * @package EyeCore\Modules\Newsletters\Managers
 */
class NewsletterManager extends Manager
{
    /**
     * @return CampaignMonitorDriver
     */
    public function createCampaignMonitorDriver()
    {
        return new CampaignMonitorDriver();
    }

    /**
     * @return MailchimpDriver
     */
    public function createMailchimpDriver()
    {
        return new MailchimpDriver();
    }

    /**
     * @return NullDriver
     */
    public function createNullDriver()
    {
        return new NullDriver();
    }

    /**
     * Get the default newsletter driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->config->get('newsletter.driver');
    }

    /**
     * Set the default newsletter driver name.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->config->set('newsletter.driver', $name);
    }
}
