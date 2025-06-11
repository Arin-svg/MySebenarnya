<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
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
        // Fallback untuk Vite jika manifest tidak ditemukan
        Vite::useCspNonce('vite-nonce');
        
        // Fallback jika manifest tidak ditemukan
        Vite::useIntegrityKey('integrity');
        
        // Tambahkan hot file jika dalam mode development
        if (file_exists(public_path('hot'))) {
            Vite::useHotFile('hot');
        }
    }
}
