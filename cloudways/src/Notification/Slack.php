<?php

namespace Cloudways\Notification;

use Cloudways\Notification\Notifiable;

class Slack implements Notifiable {
    
    public function notify(array $stats) {
        dump('Nofication from slack....');
    }
}