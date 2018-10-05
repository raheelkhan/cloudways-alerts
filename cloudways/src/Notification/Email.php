<?php

namespace Cloudways\Notification;

use Cloudways\Notification\Notifiable;
use PHPMailer\PHPMailer\PHPMailer;
use Cloudways\Notification\MessageGenerator;
use Jenssegers\Blade\Blade;
use Cloudways\Notification\FieldsMapper;

class Email implements Notifiable {

    use FieldsMapper;

    /**
     * @var PHPMailer
     */
    private $client;

    /**
     * @var Blade
     */
    private $templateEngine;
    
    /**
     * @param PHPMailer $client
     * @param Blade $templateEngine
     */
    public function __construct(PHPMailer $client, Blade $templateEngine)
    {
        $this->client = $client;
        $this->templateEngine = $templateEngine;
    }
    
    /**
     * @return void
     */
    public function notify(array $data) 
    {
        $stats = [];
        foreach ($data as $key => $value) {
            if (array_key_exists($key, self::$fields)) {
                $stats[self::$fields[$key]] = $value;
            }
        }      
        $this->client->addAddress($data['email']);
        $this->client->msgHTML($this->templateEngine->make('alerts', ['stats' => $stats]));
        $this->client->send();
    }
}