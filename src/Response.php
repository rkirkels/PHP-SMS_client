<?php

/**
 * Created by PhpStorm.
 * User: rutgerkirkels
 * Date: 22-10-16
 * Time: 10:27
 */

namespace RutgerKirkels\SMSclient;


class Response
{
    private $httpCode = null;
    private $body = null;

    /**
     * @return null
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * @param null $httpCode
     */
    public function setHttpCode($httpCode)
    {
        $this->httpCode = $httpCode;
    }

    /**
     * @return null
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param null $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

}