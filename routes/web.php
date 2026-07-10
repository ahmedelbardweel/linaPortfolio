<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\ReelController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\TipController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ProfileController;
use App\Models\HeroSection;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $hero = HeroSection::where('is_active', true)->latest()->first();
    return view('welcome', compact('hero'));
});

Route::get('/reels', function () {
    $reels = \App\Models\Reel::where('is_active', true)->orderBy('order')->get();
    return view('reels', compact('reels'));
})->name('reels');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('reels', ReelController::class);
    Route::patch('reels/{reel}/toggle', [ReelController::class, 'toggle'])->name('reels.toggle');

    Route::resource('stories', StoryController::class);
    Route::patch('stories/{story}/toggle', [StoryController::class, 'toggle'])->name('stories.toggle');

    Route::resource('tips', TipController::class);
    Route::patch('tips/{tip}/toggle', [TipController::class, 'toggle'])->name('tips.toggle');

    Route::resource('portfolios', PortfolioController::class);
    Route::patch('portfolios/{portfolio}/toggle', [PortfolioController::class, 'toggle'])->name('portfolios.toggle');

    Route::resource('hero', HeroSectionController::class)->except('show');
    Route::patch('hero/{heroSection}/toggle', [HeroSectionController::class, 'toggle'])->name('hero.toggle');

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});

Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');

require __DIR__.'/auth.php';
