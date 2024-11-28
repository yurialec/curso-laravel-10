<?php

namespace App\Providers;

use App\Interfaces\SupportRepositoryInterface;
use App\Models\Support;
use App\Observers\SupportObserver;
use App\Repositories\SupportEloquentORM;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SupportRepositoryInterface::class,
            SupportEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Support::observe(SupportObserver::class);
    }
}
