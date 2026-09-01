<?php

// 1. SUPER GOD MODE: Paksa semua environment terbaca oleh Vercel & Laravel
$envs = [
    'APP_CONFIG_CACHE' => '/tmp/config.php',
    'APP_EVENTS_CACHE' => '/tmp/events.php',
    'APP_PACKAGES_CACHE' => '/tmp/packages.php',
    'APP_ROUTES_CACHE' => '/tmp/routes.php',
    'APP_SERVICES_CACHE' => '/tmp/services.php',
    'VIEW_COMPILED_PATH' => '/tmp/framework/views',
    'SESSION_DRIVER' => 'cookie',
    'CACHE_STORE' => 'array',
    'CACHE_DRIVER' => 'array',
    'LOG_CHANNEL' => 'stderr',
    'DB_CONNECTION' => 'sqlite', // Mencegah Laravel mencari MySQL
    'DB_DATABASE' => '/tmp/database.sqlite'
];

foreach ($envs as $key => $value) {
    putenv($key . '=' . $value);
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

// 2. BUAT FOLDER PENAMPUNGAN OTOMATIS
$directories = [
    '/tmp/app',
    '/tmp/framework/cache/data',
    '/tmp/framework/sessions',
    '/tmp/framework/testing',
    '/tmp/framework/views',
    '/tmp/logs'
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// 3. PANGGIL LARAVEL
require __DIR__ . '/../public/index.php';