<?php

namespace App\Services\Notifications;

class SmsNotification implements NotificationInterface
{
    /**
     * Summary of send
     * @param string $message
     * @return string
     */
    public function send(string $message): string
    {
        // Logic to send an email
        return "SMS sent with message: {$message}";
    }
}
