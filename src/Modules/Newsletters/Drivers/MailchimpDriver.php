<?php namespace EyeCore\Modules\Newsletters\Drivers;

use DrewM\MailChimp\MailChimp;
use EyeCore\Modules\Newsletters\Interfaces\NewsletterInterface;

/**
 * Class MailchimpDriver
 * @package EyeCore\Modules\Newsletters\Drivers
 */
class MailchimpDriver implements NewsletterInterface
{
    /**
     * @var
     */
    private $client;

    /**
     * CampaignMonitorDriver constructor.
     */
    public function __construct()
    {
        $this->client = new MailChimp(app('config')->get('newsletter.mailchimp.api_key'));
    }

    /**
     * @param $list_id
     * @param array $fields
     * @return mixed
     */
    public function subscribe($list_id, $fields = [])
    {
        $customFields = $fields;
        if(isset($fields['first_name'])) {
            $customFields['FNAME'] = $fields['first_name'];
        }
        if(isset($fields['last_name'])) {
            $customFields['LNAME'] = $fields['last_name'];
        }

        $request = [
            'email_address' => $fields['email_address'],
            'name' => (isset($fields['first_name']) ? $fields['first_name'] : '') . (isset($fields['last_name']) ? ' ' . $fields['last_name'] : ''),
            'status' => 'subscribed',
            'merge_fields' => collect($customFields)->except('email_address', 'first_name', 'last_name')->keyBy(function($value, $key) {
                return strtoupper($key);
            })->toArray(),
        ];

        $response = $this->client->post('lists/' . $list_id . '/members', $request);
        if($this->client->success()) {
            return true;
        }

        return false;
    }
}
