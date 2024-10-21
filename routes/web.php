<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['visitor'])->group(function () {
    Route::get('/', [DashboardController::class, 'home'])->name('home');
    Route::get('/about',action: [DashboardController::class, 'about'])->name('about');
    Route::get('/service',action: [DashboardController::class, 'service'])->name('service');
    Route::get('/contact',action: [DashboardController::class, 'contact'])->name('contact');
    Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');
    Route::get('/portfolio',[PortfolioController::class,'project'])->name('project');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    Route::resource('/portfolios', PortfolioController::class);
});

Route::resource('/testimonials', TestimonialController::class);

Route::get('/login-page', [LoginController::class, 'showLoginForm'])->name('show.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/wa',[DashboardController::class, 'wa'])->name('wa');