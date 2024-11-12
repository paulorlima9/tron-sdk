<?php
include_once '../vendor/autoload.php';

$fullNode = new \TronSDK\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \TronSDK\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \TronSDK\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \TronSDK\Tron($fullNode, $solidityNode, $eventServer);
} catch (\TronSDK\Exception\TronException $e) {
    exit($e->getMessage());
}

$tron->setAddress('address');
$tron->setPrivateKey('privateKey');

try {
    $transfer = $tron->send( 'ToAddress', 1);
} catch (\TronSDK\Exception\TronException $e) {
    die($e->getMessage());
}

var_dump($transfer);