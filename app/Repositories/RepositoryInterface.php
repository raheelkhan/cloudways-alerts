<?php 

namespace App\Repositories;

use App\Model;

interface RepositoryInterface
{
    public function index(int $limit);
    
    public function show(int $id);
}