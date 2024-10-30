<?php

namespace App\Services\Payments;

class PayPalPayment implements PaymentMethodInterface
{
    /**
     * Summary of processPayment
     * @param float $amount
     * @param string $currency
     * @return string
     */
    public function processPayment(float $amount, string $currency): string
    {
        // Simulating payment process using PayPal API
        return "Payment processed using PayPal for $amount $currency";
    }
}
