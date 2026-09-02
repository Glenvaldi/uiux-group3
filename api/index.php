<?php

// 1. MENCEGAH ERROR FOLDER READ-ONLY VERCEL (Bypass Cache)
$_SERVER['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_SERVER['APP_EVENTS_CACHE'] = '/tmp/events.php';
$_SERVER['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_SERVER['APP_ROUTES_CACHE'] = '/tmp/routes.php';
$_SERVER['APP_SERVICES_CACHE'] = '/tmp/services.php';

// 2. OBAT KUAT: Memaksa Maintenance Driver agar tidak string kosong ('')!
putenv('APP_MAINTENANCE_DRIVER=file');
$_ENV['APP_MAINTENANCE_DRIVER'] = 'file';
$_SERVER['APP_MAINTENANCE_DRIVER'] = 'file';

// 3. PANGGIL LARAVEL
require __DIR__ . '/../public/index.php';