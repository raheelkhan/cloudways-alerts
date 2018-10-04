<?php

namespace Cloudways\Notification;

use Cloudways\Notification\Notifiable;
use PHPMailer\PHPMailer\PHPMailer;

class Email implements Notifiable {

    /**
     * @var PHPMailer
     */
    private $client;
    
    /**
     * @param PHPMailer $client
     */
    public function __construct(PHPMailer $client)
    {
        $this->client = $client;
    }
    
    public function notify(array $stats) {
        $this->client->addAddress($stats['email']);
        $this->client->Body = implode(",", $stats);
        $this->client->send();
    }
}