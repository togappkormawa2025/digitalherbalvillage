<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Message;

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
        // Hitung jumlah pesan yang belum dibaca, kirim ke layout admin
    View::composer('layouts.admin', function ($view) {
        $unreadCount = Message::whereNull('read_at')->count();
        $view->with('unreadCount', $unreadCount);
    });
    }
}
