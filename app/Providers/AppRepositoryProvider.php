<?php

namespace App\Providers;

use App\Contracts\Repositories\RequestRepositoryContract;
use App\Models\Request;
use App\Repositories\RequestRepository;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    public function provides()
    {
        return [
            RequestRepositoryContract::class,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RequestRepositoryContract::class, function() {
            return new RequestRepository(
                new Request()
            );
        });
    }
}