<?php

namespace App\Services\Notifications;

class NotificationSenderService
{
    protected $notification;

    /**
     * Summary of __construct
     * @param \App\Services\Notifications\NotificationInterface $notification
     */
    public function __construct(NotificationInterface $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Summary of sendNotification
     * @param string $message
     * @return string
     */
    public function sendNotification(string $message): string
    {
        return $this->notification->send($message);
    }
}
