<?php namespace EyeCore\Modules\Cloudflare;

use GuzzleHttp\Client;

/**
 * Class CloudflareAPI
 * @package EyeCore\Modules\Cloudflare
 */
class CloudflareAPI
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * CloudflareAPI constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->zone_id = env('CLOUDFLARE_ZONE_ID');
    }

    /**
     * Purge the cache
     * @return bool
     */
    public function purge()
    {
        $response = $this->client->delete('zones/' . $this->zone_id . '/purge_cache', ['json' => ['purge_everything' => true]]);
        if($response->getStatusCode() == 200) {
            return true;
        }

        return false;
    }
}
