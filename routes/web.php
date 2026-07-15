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

    // ?s=sm → serve a smaller image for mobile devices
    $isSmall = request()->get('s') === 'sm';

    $cacheDir = env('VERCEL') ? '/tmp/img-cache' : storage_path('framework/cache/img');
    $cacheFile = "$cacheDir/$table.$id.$col" . ($isSmall ? '.sm' : '');

    if (file_exists($cacheFile)) {
        $binary = file_get_contents($cacheFile);
        $mime = 'image/webp';
        if (class_exists('finfo')) {
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->buffer($binary) ?: 'image/webp';
        }
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

    // Dynamic Image Resizing & WebP Compression to optimize payload for PageSpeed
    if (function_exists('imagecreatefromstring')) {
        $img = @imagecreatefromstring($binary);
        if ($img) {
            $ow = imagesx($img);
            $oh = imagesy($img);
            
            // Define targeted resolutions based on where the image is displayed
            $maxW = 640;
            $maxH = 640;
            if ($table === 'hero' && $col === 'main') {
                $maxW = $isSmall ? 400 : 800; // Mobile: 400px, Desktop: 800px
                $maxH = $isSmall ? 300 : 600;
            } elseif ($table === 'hero' && $col === 'right') {
                $maxW = $isSmall ? 200 : 400; // Small side hero image
                $maxH = $isSmall ? 200 : 400;
            } elseif ($table === 'portfolio') {
                $maxW = $isSmall ? 240 : 480; // Portfolio grid cards
                $maxH = $isSmall ? 180 : 360;
            } elseif ($table === 'story') {
                $maxW = $isSmall ? 160 : 320; // Story circle/cards
                $maxH = $isSmall ? 120 : 240;
            }

            $scale = min($maxW / $ow, $maxH / $oh, 1);
            if ($scale < 1) {
                $nw = (int)round($ow * $scale);
                $nh = (int)round($oh * $scale);
                $resized = imagecreatetruecolor($nw, $nh);
                
                // Maintain transparency for PNGs
                imagealphablending($resized, false);
                imagesavealpha($resized, true);
                
                imagecopyresampled($resized, $img, 0, 0, 0, 0, $nw, $nh, $ow, $oh);
                imagedestroy($img);
                $img = $resized;
            }
            
            $tmp = fopen('php://temp', 'r+');
            if ($tmp) {
                imagewebp($img, $tmp, 60); // 60% quality WebP is highly optimized and virtually indistinguishable
                rewind($tmp);
                $webpBinary = stream_get_contents($tmp);
                fclose($tmp);
                if ($webpBinary) {
                    $binary = $webpBinary;
                    $mime = 'image/webp';
                }
            }
            imagedestroy($img);
        }
    }

    try {
        @mkdir($cacheDir, 0755, true);
        @file_put_contents($cacheFile, $binary);
    } catch (\Exception $e) {
        // Ignore cache write errors
    }

    return response($binary, 200, [
        'Content-Type' => $mime,
        'Cache-Control' => 'public, max-age=31536000, immutable',
    ]);
})->where('table', '[a-z]+')->where('col', '[a-z]+');

Route::get('storage/{path}', function (string $path) {
    if (!Storage::disk('public')->exists($path)) {
        $binary = null;
        
        // Try searching Portfolio
        $portfolio = \App\Models\Portfolio::where('image_path', $path)->first();
        if ($portfolio && $portfolio->image_data) {
            $binary = @base64_decode(explode(',', $portfolio->image_data, 2)[1] ?? '');
        }
        
        // Try searching Story
        if (!$binary) {
            $story = \App\Models\Story::where('image_path', $path)->first();
            if ($story && $story->image_data) {
                $binary = @base64_decode(explode(',', $story->image_data, 2)[1] ?? '');
            }
        }
        
        // Try searching HeroSection
        if (!$binary) {
            $hero = \App\Models\HeroSection::where('main_image', $path)->first();
            if ($hero && $hero->main_image_data) {
                $binary = @base64_decode(explode(',', $hero->main_image_data, 2)[1] ?? '');
            } else {
                $hero = \App\Models\HeroSection::where('right_image', $path)->first();
                if ($hero && $hero->right_image_data) {
                    $binary = @base64_decode(explode(',', $hero->right_image_data, 2)[1] ?? '');
                }
            }
        }
        
        // Try searching Reel
        if (!$binary) {
            $reel = \App\Models\Reel::where('thumbnail', $path)->first();
            if ($reel && $reel->thumbnail_data) {
                $binary = @base64_decode(explode(',', $reel->thumbnail_data, 2)[1] ?? '');
            }
        }

        if ($binary) {
            try {
                if (!env('VERCEL')) {
                    Storage::disk('public')->put($path, $binary);
                }
            } catch (\Exception $e) {
                // Ignore write errors
            }

            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $mime = match (strtolower($extension)) {
                'webp' => 'image/webp',
                'png' => 'image/png',
                'jpg', 'jpeg' => 'image/jpeg',
                'gif' => 'image/gif',
                'svg' => 'image/svg+xml',
                default => 'image/webp',
            };
            return response($binary, 200, [
                'Content-Type' => $mime,
                'Cache-Control' => 'public, max-age=31536000, immutable',
            ]);
        } else {
            abort(404);
        }
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

// --- Temporary maintenance routes (protected by token) ---
Route::get('/fix-reels', function () {
    if (request()->get('token') !== 'lina_fix_2024') abort(403);

    $demoVideos = [
        'https://storage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4',
        'https://storage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4',
        'https://storage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4',
        'https://storage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4',
        'https://storage.googleapis.com/gtv-videos-bucket/sample/ForBiggerMeltdowns.mp4',
        'https://storage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
    ];

    $reels = \App\Models\Reel::all();
    $fixed = 0;
    foreach ($reels as $i => $reel) {
        // Only fix reels that have a broken local path (not a full URL)
        if (!str_starts_with($reel->video_path ?? '', 'http')) {
            $demo = $demoVideos[$i % count($demoVideos)];
            $reel->update(['video_path' => $demo]);
            $fixed++;
        }
    }

    return response()->json([
        'fixed' => $fixed,
        'total' => $reels->count(),
        'message' => "$fixed reel(s) updated with demo video URLs. Upload real videos from admin to replace them.",
    ]);
});

Route::get('/run-sync', function () {
    if (request()->get('token') !== 'lina_fix_2024') abort(403);
    \Illuminate\Support\Facades\Artisan::call('images:sync-blob');
    return '<pre>' . \Illuminate\Support\Facades\Artisan::output() . '</pre>';
});
// --- End maintenance routes ---

require __DIR__.'/auth.php';
