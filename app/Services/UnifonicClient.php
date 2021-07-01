<?php

namespace App\Services;

use GuzzleHttp\Client;
use Log;

class UnifonicClient
{
    /**
     * @var Client
     */
    private $client;

    private $appsId;

    public function __construct(string $baseUri, string $appsId)
    {
        $this->client = new Client([
            'base_uri' => $baseUri
        ]);
        $this->appsId = $appsId;
    }

    public function getCode($mobile, $message = null)
    {
        Log::debug('Sending getCode request to Unifonic: ', [
            'mobile' => $mobile,
            'message' => $message
        ]);

        $response = $this->client->request(
            'POST',
            'rest/Verify/GetCode',
            [
                'json' => [
                    'AppSid' => $this->appsId,
                    'Recipient' => $mobile,
                    'Body' => $message ? $message : ''
                ],
                'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json',]
            ]
        );

        \Log::debug("Unifonic Response", [
            'header' => $response->getHeader('content-type'),
            'body' => $response->getBody()
        ]);

        if ($response->getHeader('content-type')[0] == 'text/html; charset=utf-8') {
            // Parse to json
            return json_decode($response->getBody());
        } else {
            return $response->getBody();
        }
    }

    public function verifyNumber($mobile, $code)
    {

        Log::debug('Sending verify request to Unifonic: ', [
            'mobile' => $mobile,
            'code' => $code
        ]);

        $response = $this->client->request(
            'POST',
            'rest/Verify/VerifyNumber',
            [
                'json' => [
                    'AppSid' => $this->appsId,
                    'Recipient' => $mobile,
                    'PassCode' => $code
                ],
                'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json',]
            ]
        );

        \Log::debug("Unifonic Response", [
            'header' => $response->getHeader('content-type'),
            'body' => $response->getBody()
        ]);

        if ($response->getHeader('content-type')[0] == 'text/html; charset=utf-8') {
            // Parse to json
            return json_decode($response->getBody());
        } else {
            return $response->getBody();
        }
    }

    public function sendMessage($mobile, $body, bool $highPriority = false)
    {

        $data = [
            'AppSid' => $this->appsId,
            'Recipient' => $mobile,
            'Body' => $body,
        ];

        if ($highPriority) {
            $data['Priority'] = 'High';
        }

        $response = $this->client->request(
            'POST',
            'rest/Messages/Send',
            [
                'json' => $data,
                'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json',]
            ]
        );

        \Log::debug("Unifonic Response", [
            'header' => $response->getHeader('content-type'),
            'body' => $response->getBody()
        ]);

        if ($response->getHeader('content-type')[0] == 'text/html; charset=utf-8') {
            // Parse to json
            return json_decode($response->getBody());
        } else {
            return $response->getBody();
        }
    }

   
}
