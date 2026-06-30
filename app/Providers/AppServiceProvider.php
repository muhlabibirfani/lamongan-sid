<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        Gate::define('manage-kabupaten', fn ($user) => $user->hasRole('admin_kabupaten'));
        Gate::define('manage-kecamatan', fn ($user) => in_array($user->role, ['admin_kabupaten', 'petugas_kecamatan'], true));
        Gate::define('manage-desa', fn ($user) => in_array($user->role, ['admin_kabupaten', 'petugas_kecamatan', 'operator_desa'], true));
    }
}
