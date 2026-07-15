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
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    $hero = HeroSection::where('is_active', true)->latest()->first();
    $stories = \App\Models\Story::where('is_active', true)->orderBy('order')
        ->select(['id','title','content','type','bg_color','image_path','is_active','order'])->get();
    $tips = \App\Models\Tip::where('is_active', true)->orderBy('order')->get();
    $portfolios = \App\Models\Portfolio::where('is_active', true)->orderBy('order')
        ->select(['id','title','description','image_path','is_active','order'])->get();

    // Do not inline the heavy 214KB base64 hero image inside HTML, keeping the document size extremely lightweight for faster mobile load
    $mainImageInline = null;

    // Load all settings in one query instead of 10+ individual queries from the template
    $settingsAll = \App\Models\Setting::all()->pluck('value', 'key');
    \Illuminate\Support\Facades\View::share('settingsAll', $settingsAll);

    return view('welcome', compact('hero', 'stories', 'tips', 'portfolios', 'mainImageInline'));
});

Route::get('/reels', function () {
    $reels = \App\Models\Reel::where('is_active', true)->orderBy('order')->get();
    return view('reels', compact('reels'));
})->name('reels');

Route::get('/portfolios', function () {
    $portfolios = \App\Models\Portfolio::where('is_active', true)->orderBy('order')->get();
    return view('portfolios', compact('portfolios'));
})->name('portfolios');

Route::get('/stories', function () {
    $stories = \App\Models\Story::where('is_active', true)->orderBy('order')->get();
    return view('stories', compact('stories'));
})->name('stories');

Route::get('/tips', function () {
    $tips = \App\Models\Tip::where('is_active', true)->orderBy('order')->get();
    return view('tips', compact('tips'));
})->name('tips');

Route::get('/dashboard', function () {
    if (Auth::user()?->is_admin) {
        return redirect()->route('admin.dashboard');
    }
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

Route::get('img/{table}/{id}/{col}', function ($table, $id, $col) {
    $dataColumn = match ("$table.$col") {
        'hero.main' => 'main_image_data',
        'hero.right' => 'right_image_data',
        'story.image' => 'image_data',
        'portfolio.image' => 'image_data',
        'reel.thumbnail' => 'thumbnail_data',
        default => null,
    };
    if (!$dataColumn) abort(404);

    $cacheDir = env('VERCEL') ? '/tmp/img-cache' : storage_path('framework/cache/img');
    $cacheFile = "$cacheDir/$table.$id.$col";

    if (file_exists($cacheFile)) {
        $binary = file_get_contents($cacheFile);
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->buffer($binary) ?: 'image/webp';
        return response($binary, 200, [
            'Content-Type' => $mime,
            'Cache-Control' => 'public, max-age=31536000, immutable',
        ]);
    }

    $model = match ($table) {
        'hero' => \App\Models\HeroSection::class,
        'story' => \App\Models\Story::class,
        'portfolio' => \App\Models\Portfolio::class,
        'reel' => \App\Models\Reel::class,
        default => null,
    };
    if (!$model) abort(404);

    $data = $model::where('id', $id)->value($dataColumn);
    if (!$data) abort(404);

    preg_match('/^data:([^;]+);/', $data, $m);
    $mime = $m[1] ?? 'image/webp';
    $binary = base64_decode(explode(',', $data, 2)[1] ?? '');
    if (!$binary) abort(404);

    @mkdir($cacheDir, 0755, true);
    file_put_contents($cacheFile, $binary);

    return response($binary, 200, [
        'Content-Type' => $mime,
        'Cache-Control' => 'public, max-age=31536000, immutable',
    ]);
})->where('table', '[a-z]+')->where('col', '[a-z]+');

Route::get('storage/{path}', function (string $path) {
    if (!Storage::disk('public')->exists($path)) {
        abort(404);
    }
    return response()->file(Storage::disk('public')->path($path), [
        'Cache-Control' => 'public, max-age=31536000, immutable',
    ]);
})->where('path', '.*')->name('storage.serve');

Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/debug-paths', function () {
    return response()->json([
        'base_path' => base_path(),
        'public_path' => public_path(),
        'base_files' => scandir(base_path()),
        'public_exists' => is_dir(public_path()),
        'public_files' => is_dir(public_path()) ? scandir(public_path()) : null,
        'build_exists' => is_dir(public_path('build')) ? scandir(public_path('build')) : null,
        'env' => $_ENV,
    ]);
});

require __DIR__.'/auth.php';
