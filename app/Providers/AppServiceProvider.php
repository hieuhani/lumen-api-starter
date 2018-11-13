<?php

namespace App\Providers;

use App\Contracts\Services\KiuCompanyServiceContract;
use App\Services\KiuCompanyService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function provides()
    {
        return [
          KiuCompanyServiceContract::class,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KiuCompanyServiceContract::class, function () {
            return new KiuCompanyService($this->app->request->header('Authorization'));
        });
    }
}
