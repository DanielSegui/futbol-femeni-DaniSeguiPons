<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EquipRepositoryInterface;
use App\Repositories\Eloquent\EquipRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EquipRepositoryInterface::class, EquipRepository::class);
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
