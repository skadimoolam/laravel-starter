<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapBackendRoutes();
        $this->mapFrontendRoutes();
    }

    protected function mapApiRoutes()
    {
        Route::middleware(['api', 'profile.api'])
            ->domain('api.' . config('app.site_url'))
            ->namespace($this->namespace. '\Api')
            // ->name('api.')
            ->group(base_path('routes/api.php'));
    }

    protected function mapBackendRoutes()
    {
        Route::middleware('web')
            ->domain('admin.' . config('app.site_url'))
            ->namespace($this->namespace . '\Backend')
            ->name('backend.')
            ->group(base_path('routes/backend.php'));
    }

    protected function mapFrontendRoutes()
    {
        Route::middleware('web')
            ->domain(config('app.site_url'))
            ->namespace($this->namespace. '\Frontend')
            ->name('frontend.')
            ->group(base_path('routes/frontend.php'));
    }
}
