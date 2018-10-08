<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RepositoryInterface;
use App\Repositories\ServerRepository;
use App\Repositories\NotificationRepository;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\StatsController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(NotificationsController::class)
            ->needs(RepositoryInterface::class)
            ->give(NotificationRepository::class);

        $this->app->when(StatsController::class)
            ->needs(RepositoryInterface::class)
            ->give(ServerRepository::class);
    }
}
