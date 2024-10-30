<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Payments\CardPayment;
use App\Services\Payments\PaymentService;
use App\Services\Payments\PayPalPayment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $currency = "USD";

    /**
     * Summary of pay
     * @param \Illuminate\Http\Request $request
     * @param string $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function pay(Request $request, string $type): JsonResponse
    {
        try {
            // Validate the amount
            $validatedData = $request->validate([
                'amount' => 'required|numeric|min:0.01',
            ]);
            $amount = $validatedData['amount'];

            // Get the appropriate payment service based on the type
            $paymentService = $this->getPaymentService($type);

            // Check if the payment service is valid
            if (!$paymentService) {
                return response()->json(['error' => 'Invalid payment type'], 400);
            }

            // Process the payment
            $response = $paymentService->processPayment($amount, $this->currency);

            // Return success message
            return response()->json(['message' => $response]);
        } catch (ValidationException $e) {
            // Handle validation errors specifically
            return response()->json(['error' => $e->errors()], 422);
        } catch (Exception $e) {
            // Handle any other unexpected errors
            return response()->json(['error' => 'An unexpected error occurred. Please try again later.'], 500);
        }
    }

    /**
     * Summary of getPaymentService
     * @param string $type
     * @return PaymentService|null
     */
    protected function getPaymentService(string $type): ?PaymentService
    {
        try {
            // Instantiate the correct payment service based on the type
            switch ($type) {
                case 'card':
                    return new PaymentService(new CardPayment());
                case 'paypal':
                    return new PaymentService(new PayPalPayment());
                default:
                    return null; // Return null if the payment type is invalid
            }
        } catch (Exception $e) {
            // Log the exception for debugging purposes
            Log::error('Error getting payment service: ' . $e->getMessage());

            // Return null if an error occurs
            return null;
        }
    }
}
