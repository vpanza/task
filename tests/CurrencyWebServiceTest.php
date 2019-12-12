<?php

namespace Tests;

use TASK\models\CurrencyWebservice;

require_once __DIR__ . '/BaseTest.php';

class CurrencyWebServiceTest extends BaseTest
{
    public function testCustomer()
    {
        $api = new CurrencyWebservice();
        $rate = $api->getExchangeRate('GBP');
        $this->assertEqualsWithDelta('1.19', $rate, 0.0001);
    }

}
