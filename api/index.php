<?php

// Daftar folder yang dibutuhkan Laravel di dalam /tmp Vercel
$directories = [
    '/tmp/app',
    '/tmp/framework/cache/data',
    '/tmp/framework/sessions',
    '/tmp/framework/testing',
    '/tmp/framework/views',
    '/tmp/logs'
];

// Buat foldernya jika belum ada
foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Panggil file index asli Laravel
require __DIR__ . '/../public/index.php';