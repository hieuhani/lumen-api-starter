<?php

namespace App\Providers;

use Firebase\JWT\JWT;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\GenericUser;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            $token = $request->header('Authorization');
            if ($token) {
                $secret_key = env('SECRET_KEY');
                $decoded = (array) JWT::decode($token, $secret_key, array('HS256'));
                return new GenericUser(['id' => $decoded['id']]);
            }
        });
    }
}
