<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Notification;

class NotificationRepository implements RepositoryInterface
{   
    /**
     * @var Notification
     */
    private $notification;
    
    /**
     * @param Server $server
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * @param int $id
     * @return Server
     */
    public function show(int $id)
    {
        return $this->notification->findOrFail($id);
    }

    /**
     * @param int $offset
     * @param int $limit
     */
    public function index(int $limit)
    {
        return $this->notification
            ->orderBy('id','DESC')
            ->take($limit)
            ->get();
    }
}