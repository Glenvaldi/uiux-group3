<?php

// 1. PAKSA PENGATURAN (Bypass Vercel Environment Variables)
$_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_ENV['APP_EVENTS_CACHE'] = '/tmp/events.php';
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_ENV['APP_ROUTES_CACHE'] = '/tmp/routes.php';
$_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/framework/views';
$_ENV['SESSION_DRIVER'] = 'cookie';
$_ENV['CACHE_STORE'] = 'array'; 
$_ENV['CACHE_DRIVER'] = 'array'; 
$_ENV['LOG_CHANNEL'] = 'stderr';

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