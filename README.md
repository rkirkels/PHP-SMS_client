# SMS-client
-
*by Rutger Kirkels*

[![Latest Stable Version](http://img.shields.io/packagist/v/rutgerkirkels/smsclient.svg)](https://packagist.org/packages/rutgerkirkels/smsclient)
[![Total Downloads](http://img.shields.io/packagist/dt/rutgerkirkels/smsclient.svg)](https://packagist.org/packages/endroid/twitter)
[![Monthly Downloads](http://img.shields.io/packagist/dm/rutgrkirkels/smsclient.svg)](https://packagist.org/packages/rutgerkirkels/smsclient)
[![License](http://img.shields.io/packagist/l/rutgerkirkels/smsclient.svg)](https://packagist.org/packages/rutgerkirkels/smsclient)**

## Installation

Use [Composer](https://getcomposer.org/) to install the library:


``` bash
$ composer require rutgerkirkels/smsclient

```
## Usage
```php
<?php
use RutgerKirkels\SMSclient\Client;

// Initialize the client to send a message through VoipCheap
$client = new Client('VoipCheap');

// Add your credentials
$client->setCredentials(array('username' => '<username>', 'password' => '<password>'));

// Set the recipients telephone number in international format
$client->setRecipient('0031641443860');

// Set the text you want to send
$client->setMessage('zomaar een tekst');
$client->send();
?>
```