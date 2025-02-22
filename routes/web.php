<?php

use App\Http\Controllers\Admin\AboutConfigController;
use App\Http\Controllers\Admin\AboutItensController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioConfigController;
use App\Http\Controllers\admin\PortfolioItemController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceItemController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\TabCategoryController;
use App\Http\Controllers\Admin\TabItemController;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\PortfolioItem;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
});

Route::get('/portfolio-details', function () {
    return view('frontend.portfolio-details');
});

Route::get('/service-details', function () {
    return view('frontend.service-details');
});
Route::get('/portfolio/{slug}', [PortfolioItem::class, 'show'])->name('portfolio.details');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

/* Admin Panel Routes */
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    /* Hero */
    Route::resource('hero', HeroController::class);
    /* Client */
    Route::resource('client', ClientController::class);
    /* About Config */
    Route::resource('about-config', AboutConfigController::class);
    /* About Itens */
    Route::resource('about-itens', AboutItensController::class);
    /* Stat */
    Route::resource('stat', StatController::class);
    /* Tab Category */
    Route::resource('tab-category', TabCategoryController::class);
    /* Tab Item */
    Route::resource('tab-item', TabItemController::class);
    /* Service */
    Route::resource('service-config', ServiceController::class);
    /* Service Item */
    Route::resource('service-itens', ServiceItemController::class);
    /* Portfolio */
    Route::resource('portfolio-category', PortfolioCategoryController::class);
    /* Portfolio Item */
    Route::resource('portfolio-itens', PortfolioItemController::class);
    /* Portfolio Config */
    Route::resource('portfolio-config', PortfolioConfigController::class);
});
