<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Repositories\Interfaces\ScheduleRepositoryInterface',
            'App\Repositories\ScheduleRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\ArchiveCallRepositoryInterface',
            'App\Repositories\ArchiveCallRepository'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
