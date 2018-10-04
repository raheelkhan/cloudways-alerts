<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Server;

class ServerRepository implements RepositoryInterface
{   
    /**
     * @var Server
     */
    private $server;
    
    /**
     * @param Server $server
     */
    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    /**
     * @param int $id
     * @return Server
     */
    public function show(int $id)
    {
        return $this->server->findOrFail($id);
    }

    /**
     * @return array
     */
    public function getColumns(): array
    {
        return array_diff_key($this->server->getTableColumns(), 
            array_flip(['created_at', 'updated_at']));   
    }
}