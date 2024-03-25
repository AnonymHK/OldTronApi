# AnonymHK/TronApi
Tron ( TRX ) crypto currency API !
This library facilitates connectivity to the Tron network, enabling you to generate a personalized wallet address. This is achieved through utilization of the Tron API.

Component based on secondary development of Tak Pesar/Tron! Thank you for Tak Pesar's good work!


波场API 接口封装, 支持生成钱包地址, 转账, 查询余额等操作.
库基于官方Tron API实现, 除密码学ECC库外无第三方依赖引用.

组件基于Tak-Pesar/Tron二次开发！感谢原作者的出色作品！

Tips:  php版本最低支持8.0且需要安装GMP扩展!

## Installation
```bash
composer require anonymhk/tronapi
```

## Requirements

This package requires PHP 8 or later. GMP and curl extensions require this package

## Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use TronApi\API;

$tron = new API();

//生成钱包地址
$address = $tron->generateAddress();
var_dump($address);


$privatekey1 = 'd2fd310eff9fc9ac6b4b65ad042bcc9a592847e7d9a21c66c4e8dd57d1e60f3d';

//从私钥获取助记词
$phrase = $tron->getPhraseFromPrivateKey($privatekey1);
$privatekey2 = $tron->getPrivateKeyFromPhrase($phrase);
var_dump($privatekey1 === $privatekey2);
var_dump($phrase);

//获取钱包交易信息
$transactions = $tron->getTransactionsRelated(address : 'TJZfm2PSQ38WNwzPqSBpTbVAynZpMEmfKR',confirmed : true,limit : 5);

var_dump($transactions);

$tron = new API(privatekey : $address->privatekey,wallet : $address->wallet);
//查询钱包余额[转账、余额查询等需要私钥]
$balance = $tron->getBalance();
print 'balance : '.$balance;
print PHP_EOL;

try {
	//转账
	$send = $tron->sendTron(to : 'TJZfm2PSQ38WNwzPqSBpTbVAynZpMEmfKR',amount : 10.5);
	print 'transaction : '.var_export($send,true);
} catch(Throwable $e){
	print 'transaction error : '.$e->getMessage();
}

$tron = new API(wallet : 'TJZfm2PSQ38WNwzPqSBpTbVAynZpMEmfKR');
//获取钱包信息
$account = $tron->getAccount();
/*
$account = $tron->getAccount();
or
$account = $tron->getAccount('TJZfm2PSQ38WNwzPqSBpTbVAynZpMEmfKR');
*/

print 'account info : '.var_export($account,true);



```

> **Note**
> Please see [`examples`](./example) for more examples
> 更多示例请查看[`examples`](./example)

## License

The MIT License (MIT). Please see [`LICENSE`](./LICENSE) for more information.
