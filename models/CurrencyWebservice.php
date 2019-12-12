<?php

namespace TASK\models;

/**
 * Dummy web service returning random exchange rates
 *
 */
class CurrencyWebservice
{

    /**
	 * @param   string    $currency
	 *
	 * @return double
	 */
    public function getExchangeRate($currency)
    {
        switch ($currency) {
            case "GBP":
                $rate = 1.19;
                return $rate;
                break;

            case "USD":
                $rate = 0.90;
                return $rate;
                break;

            case "EUR":
                $rate = 1.00;
                return $rate;
                break;
        }
    }
}
