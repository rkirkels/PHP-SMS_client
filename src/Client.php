<?php
namespace RutgerKirkels\SMSclient;

/**
 * Class Client
 * @package RutgerKirkels\SMSclient
 */
class Client
{
    private $provider = null;
    private $connection = null;
    private $recipient = null;
    private $message = null;
    private $possibleCredentials = ['username', 'password', 'key'];

    public function __construct($provider = null, $credentials = null)
    {
        if ($this->checkIfProviderExists($provider)) {
            $this->initProvider();
        }

    }

    private function checkIfProviderExists($provider)
    {
        if (file_exists(__DIR__ . '/providers/'  . $provider . '.php')) {
            $this->provider = $provider;
            return true;
        }
        return false;
    }

    private function initProvider() {
        $provider = '\\RutgerKirkels\\SMSclient\\providers\\' . $this->provider;
        $this->connection = new $provider;
    }

    public function setCredentials(array $credentials) {
        foreach ($credentials as $credential => $value) {
            if (in_array($credential, $this->possibleCredentials)) {
                $this->connection->setCredential($credential, $value);
            }
        }
    }

    public function setRecipient($telephoneNumber) {
        $this->recipient = $telephoneNumber;
        return true;
    }

    public function setMessage($message) {
        $this->message = $message;
        return true;
    }
    public function send() {
        $this->connection->recipient = $this->recipient;
        $this->connection->message = $this->message;
        $this->connection->send();
    }
}