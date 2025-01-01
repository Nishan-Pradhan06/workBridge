<?php

namespace App\Providers;

use App\Http\Middleware\CheckUserStatus;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $router = $this->app->make('router');
        $router->middleware([CheckUserStatus::class])->group(base_path('routes/web.php'));
    }
}
