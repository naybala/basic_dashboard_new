<?php

namespace BasicDashboard\Foundations\Domain\Roles\Providers;
use BasicDashboard\Foundations\Domain\Roles\Repositories\Eloquent\RoleRepository;
use BasicDashboard\Foundations\Domain\Roles\Repositories\RoleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BindRoleProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind([
            RoleRepository::class,
            RoleRepositoryInterface::class,
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
