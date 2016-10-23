<?php

namespace RutgerKirkels\SMSclient;

/**
 * Class Connector
 * @package RutgerKirkels\SMSclient
 */
class Connector
{
    public $url = null;
    public $getVars = array();

    private $response = null;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function execute() {
        $url = $this->url;

        if (!empty($this->getVars)) {
            $getVars = array();
            foreach ($this->getVars as $key => $value) {
                $getVars[] = $key . '=' . rawurlencode($value);
            }
            $url .= '?' . implode('&',$getVars);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        $this->response = new Response();
        $this->response->setBody($response);
        $this->response->setHttpCode($info['http_code']);
        return true;
    }

    /**
     * @return null
     */
    public function getResponse()
    {
        return $this->response;
    }

}