<?php

namespace App\Services\Payments;

class PaymentService
{
    protected PaymentMethodInterface $paymentMethod;

    /**
     * Summary of __construct
     * @param \App\Services\Payments\PaymentMethodInterface $paymentMethod
     */
    public function __construct(PaymentMethodInterface $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * Summary of processPayment
     * @param float $amount
     * @param string $currency
     * @return string
     */
    public function processPayment(float $amount, string $currency): string
    {
        return $this->paymentMethod->processPayment($amount, $currency);
    }
}
