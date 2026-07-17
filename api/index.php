<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

$_SERVER['HTTPS'] = 'on';

try {
    // ─── Vercel: create writable dirs in /tmp ────────────────────────────────────
    $tmpStorage = '/tmp/storage';
    $dirs = [
        "$tmpStorage/app/public",
        "$tmpStorage/framework/views",
        "$tmpStorage/framework/cache/data",
        "$tmpStorage/framework/sessions",
        "$tmpStorage/framework/testing",
        "$tmpStorage/logs",
    ];
    foreach ($dirs as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    }

    // ─── Point Laravel to /tmp/storage ───────────────────────────────────────────
    $_ENV['APP_STORAGE'] = $tmpStorage;
    putenv("APP_STORAGE=$tmpStorage");

    // ─── Set required .env vars (not deployed to Vercel) ──────────────────────────
    $_ENV['APP_DEBUG'] = 'true';
    putenv('APP_DEBUG=true');
    $_ENV['APP_KEY'] = 'base64:zR0RnC8vuS+ULmTokLgQ5n86mZK8rKNvdR+iNrraOcg=';
    putenv('APP_KEY=base64:zR0RnC8vuS+ULmTokLgQ5n86mZK8rKNvdR+iNrraOcg=');
    $_ENV['APP_URL'] = 'https://lina-portfolio-blue.vercel.app';
    putenv('APP_URL=https://lina-portfolio-blue.vercel.app');
    $_ENV['APP_ENV'] = 'production';
    putenv('APP_ENV=production');
    $_ENV['SESSION_DRIVER'] = 'cookie';
    putenv('SESSION_DRIVER=cookie');
    $_ENV['LOG_CHANNEL'] = 'stderr';
    putenv('LOG_CHANNEL=stderr');

    // ─── Override all cached paths to /tmp (read-only /var/task) ───────────────
    $cacheDir = "$tmpStorage/framework/cache";
    if (!is_dir($cacheDir)) {
        mkdir($cacheDir, 0777, true);
    }
    $_ENV['VIEW_COMPILED_PATH'] = "$tmpStorage/framework/views";
    putenv("VIEW_COMPILED_PATH=$tmpStorage/framework/views");
    $_ENV['APP_SERVICES_CACHE'] = "$cacheDir/services.php";
    putenv("APP_SERVICES_CACHE=$cacheDir/services.php");
    $_ENV['APP_PACKAGES_CACHE'] = "$cacheDir/packages.php";
    putenv("APP_PACKAGES_CACHE=$cacheDir/packages.php");
    $_ENV['APP_CONFIG_CACHE'] = "$cacheDir/config.php";
    putenv("APP_CONFIG_CACHE=$cacheDir/config.php");
    $_ENV['APP_ROUTES_CACHE'] = "$cacheDir/routes-v7.php";
    putenv("APP_ROUTES_CACHE=$cacheDir/routes-v7.php");

    // ─── Boot the application ─────────────────────────────────────────────────────
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo '<h1>Error</h1>';
    echo '<pre>' . htmlspecialchars((string) $e) . '</pre>';
    exit(1);
}
