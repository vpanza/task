<?php

namespace TASK\models;

/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter
{
    /**
	 * @var CurrencyWebservice
	 */
    private $api;
    /**
	 * @var Software
	 */
    private $software;

    /**
	 * @param  CurrencyWebservice    $api
	 * @param  Software    $software
	 */
    public function __construct($api, $software)
    {
        $this->api=$api;
        $this->software=$software;
    }

    /**
	 * @param   string    $amount
	 *
	 * @return double
	 */

    public function convert($amount)
    {
        // per semplicità di esposizione la chiamata al web service è commentata

            // $res = $this->client->get('http://localhost:3000', [
            // ]);
            // $statusCode=$res->getStatusCode();           // 200
            // $cont=$res->getHeader('content-type'); // 'application/json; charset=utf8'
            // $body=$res->getBody();                 
            // $rate=$res->json();             // Outputs the JSON decoded data

        //estrae il simbolo dalla stringa $amount
        $from_currency=$this->software->get_currency_symbol($amount);
        
        switch ($from_currency)
        {
            case "£":
                $symbol="GBP";
                
            break;
        
            case "$":
                $symbol = "USD";
                
            break;

            case "€":
                $symbol = "EUR";
                
            break;
        }
        
        //e sostituita con questa
        $rate=$this->api->getExchangeRate($symbol);

        //conversione in EURO
        return $this->software->getAmount($amount) * $rate;
    }
}