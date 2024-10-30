<?php

namespace App\Services\Payments;

class CardPayment implements PaymentMethodInterface
{
    /**
     * Summary of processPayment
     * @param float $amount
     * @param string $currency
     * @return string
     */
    public function processPayment(float $amount, string $currency): string
    {
        // Simulate processing the payment using a card
        return "Card payment processed successfully for $amount $currency";
    }
}
