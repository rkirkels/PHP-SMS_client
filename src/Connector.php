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
        return $response;
    }
}