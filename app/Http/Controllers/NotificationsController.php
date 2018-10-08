<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NotificationsController extends Controller
{    
    /**
     * @var RepositoryInterface
     */
    private $repo;

    /**
     * @param RepositoryInterface $repo
     */
    public function __construct(RepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
    
    /**
     * @param int $limit
     */
    public function index(int $limit)
    {
        return $this->repo->index($limit);
    }
}