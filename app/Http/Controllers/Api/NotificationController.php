<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Notifications\NotificationSenderService;
use App\Services\Notifications\EmailNotification;
use App\Services\Notifications\SmsNotification;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NotificationController extends Controller
{
    /**
     * Summary of sendNotification
     * @param \Illuminate\Http\Request $request
     * @param string $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendNotification(Request $request, string $type): JsonResponse
    {
        try {
            // Validate request and ensure type is valid
            $validated = $request->validate([
                'message' => 'required|string|max:255',
            ]);

            // Get notification instance based on type
            $notification = $this->resolveNotificationType($type);

            // Send notification
            $sender = new NotificationSenderService($notification);
            $responseMessage = $sender->sendNotification($validated['message']);

            return response()->json(['success' => $responseMessage], 200);
        } catch (ValidationException $e) {
            // Return a custom validation error response
            return response()->json([
                'status' => 'error',
                'errors' => $e->errors(),
                'message' => 'Validation failed',
            ], 422);
        } catch (Exception $e) {
            // Return a general error response for unexpected issues
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while sending the notification',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Summary of resolveNotificationType
     * @param string $type
     * @return EmailNotification|SmsNotification
     */
    private function resolveNotificationType(string $type)
    {
        return match ($type) {
            'email' => new EmailNotification(),
            'sms' => new SmsNotification(),
            default => throw new \InvalidArgumentException("Invalid notification type: $type"),
        };
    }
}
