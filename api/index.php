<?php

define('LARAVEL_START', microtime(true));

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

// ─── Boot the application ─────────────────────────────────────────────────────
require __DIR__ . '/../public/index.php';
