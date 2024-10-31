<?php

namespace App\Services\Notifications;

class EmailNotification implements NotificationInterface
{
    /**
     * Summary of send
     * @param string $message
     * @return string
     */
    public function send(string $message): string
    {
        // Logic to send an email
        return "Email sent with message: {$message}";
    }
}
