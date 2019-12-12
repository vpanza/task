<?php

namespace TASK\models;

use Exception;
use League\Csv\Reader;

class Customer
{
     /**
	 * @var CurrencyConverter
	 */
    private $converter;

      /**
	 * @param  CurrencyConverter    $converter
	 */

    public function __construct($converter)
    {
        $this->converter = $converter;
    }

      /**
	 *
	 * @return array
	 */

    public function getTransactions()
    {
        $transactions = [];
        $allegato_percorsodisco = 'data.csv';
        if (is_readable($allegato_percorsodisco)) {

            $offset = 1;

            $reader = Reader::createFromPath($allegato_percorsodisco, 'r');

            $reader->setDelimiter(';');
            $reader->setEnclosure('"');
            $reader->setEscape('\\');
            $reader->setNewline("\r\n");
            $reader->setInputEncoding('utf-8');
            $keys = ['customer', 'date', 'value'];
            $results = $reader->fetchAssoc($keys);

            $i = 0;
            
            try {
                foreach ($results as $row) {

                    if ($i >= 1 && trim($row['customer']) != "" && trim($row['date']) != "" && trim($row['value']) != "") {

                        $customer = trim($row['customer']);
                        $date = trim($row['date']);
                        $value = trim($row['value']);

                        //converte il valore in EURO
                        $new_value = $this->converter->convert($value);

                        array_push($transactions, ['customer' => $customer, 'date' => $date, 'value' => $new_value]);
                    }
                    $i = $i + 1;
                }
            } catch (Exception $e) {

            }
        }

        return $transactions;
    }

}
