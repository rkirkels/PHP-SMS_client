<?php
namespace RutgerKirkels\SMSClient\providers;

use RutgerKirkels\SMSclient\Connector;

/**
 * Class VoipCheap
 * @package RutgerKirkels\SMSClient\providers
 */
class VoipCheap
{

    const APIURL = 'https://www.voipcheap.com/myaccount/sendsms.php';
    public $credentials = array();
    public $recipient = null;
    public $message = null;

    private $response = array(
        'body' => null
    );
    public function __construct()
    {

    }

    public function setCredential($credential, $value) {
        $this->credentials[$credential] = $value;
    }

    public function send() {
        $url = self::APIURL;
        $connector = new Connector($url);
        $connector->getVars = $this->credentials;
        $connector->getVars['to'] = $this->recipient;
        $connector->getVars['text'] = $this->message;
        $this->response['body'] = $connector->execute();
    }

    private function processResponse() {

    }
}