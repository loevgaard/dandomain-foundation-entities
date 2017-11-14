<?php
namespace Loevgaard\DandomainFoundation;

use Money\Currency;
use Money\Money;

/**
 * Creates a Money object
 *
 * @param string $currency
 * @param int $amount
 * @return Money|null
 */
function createMoney(string $currency, int $amount = 0) : ?Money
{
    if (!$currency) {
        return null;
    }

    return new Money($amount, new Currency($currency));
}

/**
 * Creates a Money object from a float/string
 *
 * @param string $currency
 * @param float|string $amount
 * @return Money|null
 */
function createMoneyFromFloat(string $currency, $amount = 0.0) : ?Money
{
    return createMoney($currency, intval(100 * $amount));
}

function objectToArray($obj) : array
{
    if ($obj instanceof \stdClass) {
        $obj = json_decode(json_encode($obj), true);
    }

    return (array)$obj;
}
