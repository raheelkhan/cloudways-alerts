<?php

namespace Cloudways\Notification;

interface Notifiable {
    
    public function notify(array $stats);
    
}