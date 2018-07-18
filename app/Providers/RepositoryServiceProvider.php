<?php

namespace Site\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Site\Repositories\UserRepository::class, \Site\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\Site\Repositories\AdminRepository::class, \Site\Repositories\AdminRepositoryEloquent::class);
        $this->app->bind(\Site\Repositories\StateRepository::class, \Site\Repositories\StateRepositoryEloquent::class);
        $this->app->bind(\Site\Repositories\CityRepository::class, \Site\Repositories\CityRepositoryEloquent::class);
        //:end-bindings:
    }
}
