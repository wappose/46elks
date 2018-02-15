<?php
namespace NotificationChannels\FortysixElks;

use Exception;
use Illuminate\Support\Arr;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;
use NotificationChannels\FortysixElks\Exceptions\CouldNotSendNotification;

class FortysixElks
{
    /**
     * FortysixElks API base URL.
     *
     * @var string
     */
    protected $baseUrl = 'https://api.46elks.com/a1/SMS';

    /**
     * API HTTP client.
     *
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * FortysixElks API sender name.
     *
     * @var string
     */
    protected $sender;

    /**
     * @param \GuzzleHttp\Client $httpClient
     * @param string $sender
     */
    public function __construct(HttpClient $httpClient, $sender)
    {
        $this->httpClient = $httpClient;
        $this->sender = $sender;
    }

    /**
     * Send a message.
     *
     * @param FortysixElksMessage $message
     *
     * @return array
     */
    public function send(FortysixElksMessage $message)
    {
        try {
        	$response = $this->httpClient->request( 'POST', $this->baseUrl, [
        		'form_params' => [
        			'from'     => ($message->sender ? $message->sender : $this->sender),
        			'message'  => $message->body,
        			'to'       => $message->receiver,
        			'flashsms' => ($message->isFlash  ? 'yes' : 'no')
        		],
        	] );
        } catch ( GuzzleHttp\Exception\BadResponseException $e ) {
        	$response = $e->getResponse();
        	throw CouldNotSendNotification::serviceRespondedWithAnError($response->getBody()->getContents(), $response->getStatusCode());
        }
        return $this;
    }
}
