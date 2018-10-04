<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Jobs\Notification;

class StatsController extends Controller
{
    /**
     * @param Request $request request object
     * @param RepositoryInterface $repo
     * @return void
     */
    public function store(Request $request, RepositoryInterface $repo)
    {
        $rules = [
            'id' => 'integer',
            'cpu_usage' => 'integer',
            'load_average_15' => 'numeric',
            'wp_version_installed' => 'numeric',
            'wp_version_available' => 'numeric',
            'memory_peak_usage' => 'numeric'
        ];
        
        $this->validate($request, $rules);
        
        $stats = [];
        try {
            $server = $repo->show($request->id);
            foreach($repo->getColumns() as $column) {
                $stats[$column] = $server->{$column};
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'unable to locate server'], 404);
        }
        
        foreach($request->all() as $stat => $value) {
            if (array_key_exists($stat, $rules)) {
                $stats[$stat] = $value; 
            }
        }

        dispatch(new Notification($stats));
       
        return response()->json(['message' => 'created'], 201);
    }

}