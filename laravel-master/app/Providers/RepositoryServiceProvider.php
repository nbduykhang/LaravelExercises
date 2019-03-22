<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            '\App\Repositories\BaseRepository',
            '\App\Repositories\RepositoryInterface',
            '\App\Repositories\Permission\PermissionRepositoryInterface',
            '\App\Repositories\Permission\PermissionRepository',
            '\App\Repositories\Role\RoleRepositoryInterface',
            '\App\Repositories\Role\RoleRepository',
            '\App\Repositories\User\UserRepositoryInterface',
            '\App\Repositories\User\UserRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
