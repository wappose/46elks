<?php

namespace NotificationChannels\FortysixElks;

use Illuminate\Notifications\Notification;

class FortysixElksChannel
{
    /**
     * @var \NotificationChannels\FortysixElks\FortysixElks
     */
    protected $service;

    /**
     * @param \NotificationChannels\FortysixElks\FortysixElks $service
     */
    public function __construct(FortysixElks $service)
    {
        $this->service = $service;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @return array
     *
     * @throws \NotificationChannels\FortysixElks\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        if(method_exists($notification, 'toFortysixElks')) {
            $message = $notification->toFortysixElks($notifiable);
            return $this->service->send($message);
        }
		else{
			throw CouldNotSendNotification::missingMethod();
		}
    }
}
