<?php

namespace MShule\AfricasTalking\Exceptions;

class AfricastalkingPaymentException extends \Exception
{
    /**
     * Thrown when payments product is not set.
     *
     * @return static
     */
    public static function missingPaymentProduct()
    {
        return new static('Payment transaction not processed. Missing `payment_product`.');
    }

    /**
     * Thrown when payments currency code is not set.
     *
     * @return static
     */
    public static function missingCurrencyCode()
    {
        return new static('Payment transaction not processed. Missing `currency_code`.');
    }

    /**
     * Thrown when payments currency code is invalid.
     *
     * @return static
     */
    public static function invalidCurrencyCode()
    {
        return new static('Payment transaction not processed. Invalid `currency_code` set. Example KES');
    }
}

