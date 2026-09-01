<?php

// JURUS PAMUNGKAS: Mengalihkan folder bootstrap/cache ke /tmp Vercel
$_SERVER['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_SERVER['APP_EVENTS_CACHE'] = '/tmp/events.php';
$_SERVER['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_SERVER['APP_ROUTES_CACHE'] = '/tmp/routes.php';
$_SERVER['APP_SERVICES_CACHE'] = '/tmp/services.php';

// Panggil file index asli Laravel
require __DIR__ . '/../public/index.php';