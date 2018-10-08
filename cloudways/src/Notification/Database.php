<?php

namespace Cloudways\Notification;

use Cloudways\Notification\Notifiable;
use Jenssegers\Blade\Blade;
use App\Notification;

class Database implements Notifiable {

    use FieldsMapper;

    /**
     * @var Notification
     */
    private $notification;
    
    /**
     * @var Blade
     */
    private $templateEngine;
    
      /**
     * @param Notification $notification
     * @param Blade $templateEngine
     */
    public function __construct(Notification $notification, Blade $templateEngine)
    {
        $this->templateEngine = $templateEngine;
        $this->notification = $notification;
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

        $this->notification->server_id = $data['id'];
        $this->notification->body =  $this->templateEngine->make('alerts', ['stats' => $stats]);
        $this->notification->save();   
    }
}