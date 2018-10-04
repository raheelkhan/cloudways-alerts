<?php

namespace App\Jobs;

use Cloudways\Notification\NotificationFacade;
use Exception;

class Notification extends Job
{
    /**
     * @var int
     */
    public $tries = 1;
    
    /**
     * @var array
     */
    private $stats = [];

    
    /**
     * @param array $stats
     * @return void
     */
    public function __construct(array $stats)
    {
        $this->stats = $stats;
    }

    /**
     * @param NotificationFacade $notifier
     * @return void
     */
    public function handle(NotificationFacade $notifier)
    {
        $notifier->process($this->stats);
    }

    /**
     * @param Exception $e
     */
    public function failed(Exception $e)
    {
        dd($e->getMessage());
    }
}
