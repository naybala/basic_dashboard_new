<?php

namespace BasicDashboard\Foundations\Domain\Users\Providers;
use BasicDashboard\Foundations\Domain\Users\Repositories\Eloquent\UserRepository;
use BasicDashboard\Foundations\Domain\Users\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BindUserProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind([
            UserRepository::class,
            UserRepositoryInterface::class,
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
