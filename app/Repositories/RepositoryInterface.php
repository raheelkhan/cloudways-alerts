<?php 

namespace App\Repositories;

use App\Model;

interface RepositoryInterface
{
    public function show(int $id);
}