<?php

namespace RutgerKirkels\SMSclient;

class Provider
{
    protected $succesfullySent = false;
    protected $parts = 0;

    public function sentSuccesfully() {
        return $this->succesfullySent;
    }

    public function numberOfParts() {
        return $this->parts;
    }

    protected function setParts($parts) {
        $this->parts = $parts;
        return true;
    }
}