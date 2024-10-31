<?php

namespace App\Services\Notifications;

interface NotificationInterface
{
    /**
     * Summary of send
     * @param string $message
     * @return string
     */
    public function send(string $message): string;
}
