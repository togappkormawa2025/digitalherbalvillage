<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\TogaPlantController as AdminTogaController;
use App\Http\Controllers\Admin\TogaProductController as AdminProductController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\User\HomeController;

use App\Models\User;
use App\Models\News;
use App\Models\Message;
use App\Models\TogaPlant;
use App\Models\TogaProduct;

/*
|--------------------------------------------------------------------------
| ADMIN AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| ADMIN PROTECTED ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        $totalUsers    = User::count();
        $totalNews     = News::count();
        $totalMessages = Message::count();
        $totalPlants   = TogaPlant::count();
        $totalProducts = TogaProduct::count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalNews',
            'totalMessages',
            'totalPlants',
            'totalProducts'
        ));
    })->name('dashboard');

    // Profile
    Route::get('/profile', fn() => view('admin.profile'))->name('profile');

    // CRUD Tanaman TOGA
    Route::resource('toga', AdminTogaController::class);

    // CRUD Produk TOGA
    Route::resource('products', AdminProductController::class);

    // CRUD Berita
    Route::resource('news', AdminNewsController::class);

    // CRUD Pesan
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
});

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('user.dashboard');
Route::get('/berita/{id}', [HomeController::class, 'showNews'])->name('berita.show');

// Form kontak (kirim pesan user → admin)
Route::post('/pesan', [HomeController::class, 'storeMessage'])->name('pesan.store');
// Halaman semua produk
Route::get('/produk', [HomeController::class, 'allProducts'])->name('produk.all');
