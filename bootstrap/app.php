<?php

use DI\Container;
use TASK\models\CurrencyConverter;
use TASK\models\CurrencyWebservice;
use TASK\models\Customer;
use utilities\Software;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../models/CurrencyWebservice.php';
require_once __DIR__ . '/../models/CurrencyConverter.php';
require_once __DIR__ . '/../models/Customer.php';

require_once __DIR__ . '/../utilities/FilterReplace.php';
require_once __DIR__ . '/../utilities/FilterTranscode.php';
require_once __DIR__ . '/../utilities/Software.php';

//DI Container
$container = new Container();

$software=new Software();
$container->set('software', $software);

//$container->set('client', new GuzzleHttp\Client());
$api = new CurrencyWebservice();
$container->set('api', $api);

$converter = new CurrencyConverter($api, $software);
$container->set('converter', $converter);
$container->set('customer', new Customer($converter));
