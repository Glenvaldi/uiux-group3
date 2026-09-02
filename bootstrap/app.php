<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // JURUS HACK: Cetak jejak langkah untuk mencari pelakunya!
        $exceptions->render(function (\Throwable $e) {
            echo "<h1 style='color:purple;'>BOS TERAKHIR DITEMUKAN!</h1>";
            echo "<b>Pesan Asli:</b> " . $e->getMessage() . "<br><br>";
            echo "<b>File Asli:</b> " . $e->getFile() . "<br>";
            echo "<b>Baris:</b> " . $e->getLine() . "<br><br>";
            echo "<b>JEJAK LANGKAH (STACK TRACE):</b><br>";
            echo "<pre style='background:#eee; padding:10px; font-size:12px; white-space:pre-wrap;'>" . $e->getTraceAsString() . "</pre>";
            die();
        });
    })->create();

// 1. Pindah storage ke /tmp
$app->useStoragePath('/tmp');

// 2. Buat folder-folder Vercel
$directories = [
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

return $app;