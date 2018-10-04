<?php

namespace Cloudways\Notification;

use Cloudways\Notification\Notifiable;

class NotificationFacade
{
    /**
     * @param Notifiable[]
     */
    private $notifiables;

    /**
     * @param array $notifiables
     */
    public function __construct(array $notifiables)
    {
        $this->notifiables = $notifiables;
    }
    
    /**
     * @param array $stats
     * @return void
     */
    public function process(array $stats)
    {
        foreach($this->notifiables as $notifiable) {
            $notifiable->notify($stats);
        }
    }
}