<?php

namespace Tests;

use TASK\models\CurrencyConverter;
use TASK\models\CurrencyWebservice;
use TASK\models\Customer;
use utilities\Software;

require_once __DIR__ . '/BaseTest.php';

class CustomerTest extends BaseTest
{
    public function testCustomer()
    {
        $software = new Software();
        $api = new CurrencyWebservice();
        $converter = new CurrencyConverter($api, $software);
        $customer = new Customer($converter);

        $customer_id = 1;
        $output = [];
        foreach ($customer->getTransactions() as $transaction) {
            if ($transaction['customer'] == $customer_id) {
                $output[] = $transaction;
            }
        }

        //print_r(count($output));

        $this->assertSame(4, count($output));
    }

}
