<?php
namespace RutgerKirkels\SMSClient\providers;

use RutgerKirkels\SMSclient\Connector;
use RutgerKirkels\SMSclient\Provider;

/**
 * Class VoipCheap
 * @package RutgerKirkels\SMSClient\providers
 */
class VoipCheap extends Provider
{

    const APIURL = 'https://www.voipcheap.com/myaccount/sendsms.php';
    public $credentials = array();
    public $recipient = null;
    public $message = null;
    public $response = null;
    private $connector = null;

    public function __construct()
    {

    }

    public function setCredential($credential, $value) {
        $this->credentials[$credential] = $value;
    }

    public function send() {
        $url = self::APIURL;
        $this->connector = new Connector($url);
        $this->connector->getVars = $this->credentials;
        $this->connector->getVars['to'] = $this->recipient;
        $this->connector->getVars['text'] = $this->message;
        $this->connector->execute();
        $this->response = $this->connector->getResponse();
        if (!$this->processResponse()) {
            return false;
        }
        return true;
    }

    private function processResponse() {
        if ($this->response->getHttpCode() !== 200) {
            return false;
        }
        $responseData = $this->xmlToArray($this->response->getBody());
        if (key_exists('result', $responseData) && intval($responseData['result']) === 1) {
            $this->succesfullySent = true;
        }

        if (key_exists('partcount', $responseData)) {
            $this->setParts(intval($responseData['partcount']));
        }
    }

    private function xmlToArray($xmlstring) {
        $xml = simplexml_load_string($xmlstring, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        return json_decode($json,TRUE);
    }


}