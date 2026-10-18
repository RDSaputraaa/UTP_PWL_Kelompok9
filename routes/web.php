<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Order;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\users\OrderController as UserOrderController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
    $totalMenu = Menu::count();
    $pesananMasuk = Order::where('status', 'masuk')->count();
    $totalPendapatan = Order::where('status', 'selesai')->sum('total_price');
    $recentOrders = Order::with(['user', 'menu'])->latest()->take(5)->get();
    return view('admin.dashboard', compact('totalMenu', 'pesananMasuk', 'totalPendapatan', 'recentOrders'));
})->name('dashboard');

    Route::resource('menus', MenuController::class)->names('menus');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::patch('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
});

Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', function () {
        $recommendedMenus = Menu::where('is_recommended', true)->latest()->get();

        return view('user.dashboard', compact('recommendedMenus'));
    })->name('dashboard');
    Route::get('/catalog', [MenuController::class, 'catalog'])->name('catalog');
    Route::get('/orders', [UserOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{menu}/create', [UserOrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [UserOrderController::class, 'store'])->name('orders.store');
    Route::delete('/orders/{order}', [UserOrderController::class, 'destroy'])->name('orders.destroy');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user && $user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware('auth')->name('dashboard');