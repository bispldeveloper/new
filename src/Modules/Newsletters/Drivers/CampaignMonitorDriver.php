<?php namespace EyeCore\Modules\Newsletters\Drivers;

use CS_REST_General;
use EyeCore\Modules\Newsletters\Interfaces\NewsletterInterface;

/**
 * Class CampaignMonitorDriver
 * @package EyeCore\Modules\Newsletters\Managers
 */
class CampaignMonitorDriver implements NewsletterInterface
{
    /**
     * @var CS_REST_General
     */
    private $client;

    /**
     * CampaignMonitorDriver constructor.
     */
    public function __construct()
    {
        $this->client = new CS_REST_General([
            'api_key' => app('config')->get('newsletter.campaignmonitor.api_key')
        ]);
    }

    /**
     * @param $list_id
     * @param array $fields
     * @return mixed
     */
    public function subscribe($list_id, $fields = [])
    {
        $customFields = $fields;

        $request = [
            'EmailAddress' => $fields['email_address'],
            'Name' => (isset($fields['first_name']) ? $fields['first_name'] : '') . (isset($fields['last_name']) ? ' ' . $fields['last_name'] : ''),
            'CustomFields' => collect($customFields)->except('email_address', 'first_name', 'last_name')->map(function($value, $key) {
                return ['Key' => studly_case($key), 'Value' => $value];
            })->values()->toArray(),
            'ConsentToTrack' => 'Yes',
            'Resubscribe' => true
        ];

        $response = $this->client->post_request($this->client->_base_route . 'subscribers/' . $list_id . '.json', $request);

        if($response->http_status_code == '201') {
            return true;
        }

        return false;
    }
}
