<?php

use TronApi\API;

$tron = new API();

$address = $tron->generateAddress();

print 'wallet address base58 : '.$address->wallet;
print PHP_EOL;
print 'wallet address hex : '.$address->address;
print PHP_EOL;
print 'public key : '.$address->publickey;
print PHP_EOL;
print 'private key : '.$address->privatekey;
