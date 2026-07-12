<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/login', 'login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Protected routes – require authentication & role middleware
Route::middleware(['auth', 'role'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::view('/admin', 'dashboards.admin')->name('admin.dashboard');
    Route::view('/manager', 'dashboards.manager')->name('manager.dashboard');
    Route::view('/dispatcher', 'dashboards.dispatcher')->name('dispatcher.dashboard');
    Route::view('/safety', 'dashboards.safety')->name('safety.dashboard');
    Route::view('/finance', 'dashboards.finance')->name('finance.dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
?>
