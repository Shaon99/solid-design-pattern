<?php

namespace App\Services\Payments;

interface PaymentMethodInterface
{
    /**
     * Summary of processPayment
     * @param float $amount
     * @param string $currency
     * @return string
     */
    public function processPayment(float $amount, string $currency): string;
}
