<?php
namespace utilities;

class Software
{

    /**
	 * @param   string    $amount
	 *
	 * @return char
	 */
    public function get_currency_symbol($string)
    {
        return mb_substr($string, 0, 1, 'utf-8');
    }

    /**
	 * @param   string    $money
	 *
	 * @return float
	 */
    public function getAmount($money)
    {
        $cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
        $onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);

        $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;

        $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
        $removedThousandSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '', $stringWithCommaOrDot);

        return (float) str_replace(',', '.', $removedThousandSeparator);
    }

}
