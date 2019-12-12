<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';
// Supponiamo che PHPUnit sia stato installato correttamente

abstract class BaseTest extends TestCase
{
    /**
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->createApplication();
    }

    /**
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
        unset($this->app);
        parent::tearDown();
    }

    protected function createApplication()
    {

        require_once __DIR__ . '/../utilities/FilterReplace.php';
        require_once __DIR__ . '/../utilities/FilterTranscode.php';
        require_once __DIR__ . '/../utilities/Software.php';

        require_once __DIR__ . '/../models/CurrencyWebservice.php';
        require_once __DIR__ . '/../models/CurrencyConverter.php';
        require_once __DIR__ . '/../models/Customer.php';

    }

}
