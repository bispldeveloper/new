<?php

return [
    'driver' => env('NEWSLETTER_DRIVER', 'null'),
    'campaignmonitor' => [
        'api_key' => env('CAMPAIGN_MONITOR_API_KEY', '')
    ],
    'mailchimp' => [
        'api_key' => env('MAILCHIMP_API_KEY', '')
    ]
];