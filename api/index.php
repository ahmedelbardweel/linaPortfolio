<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

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

    // ─── Enable debug to see errors ────────────────────────────────────────────────
    $_ENV['APP_DEBUG'] = 'true';
    putenv('APP_DEBUG=true');

    // ─── Boot the application ─────────────────────────────────────────────────────
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo '<h1>Error</h1>';
    echo '<pre>' . htmlspecialchars((string) $e) . '</pre>';
    exit(1);
}
