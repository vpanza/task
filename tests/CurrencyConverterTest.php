<?php

namespace Tests;

use TASK\models\CurrencyConverter;
use TASK\models\CurrencyWebservice;
use utilities\Software;

require_once __DIR__ . '/BaseTest.php';

class CurrencyConverterTest extends BaseTest
{
    public function testConvert_EUR()
    {
        $software = new Software();
        $api = new CurrencyWebservice();
        $converter = new CurrencyConverter($api, $software);
        $conv = $converter->convert('€3.00');
        //var_dump($conv);
        //print_r($conv);
        $this->assertEqualsWithDelta(3, $conv, 0.0001);
    }

    public function testConvert_USD()
    {
        $software = new Software();
        $api = new CurrencyWebservice();
        $converter = new CurrencyConverter($api, $software);
        $conv = $converter->convert('$1');

        $this->assertEqualsWithDelta(0.9, $conv, 0.0001);
    }

    public function testConvert_GBP()
    {
        $software = new Software();
        $api = new CurrencyWebservice();
        $converter = new CurrencyConverter($api, $software);
        $conv = $converter->convert('£1');

        $this->assertEqualsWithDelta(1.19, $conv, 0.0001);
    }
}
