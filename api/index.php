<?php
// 1. Nyalakan semua radar error PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Pasang jaring penangkap Laravel
try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    echo "<h1 style='color:red;'>ERROR TERTANGKAP!</h1>";
    echo "<b>Pesan Error:</b> " . $e->getMessage() . "<br><br>";
    echo "<b>Terjadi di File:</b> " . $e->getFile() . "<br>";
    echo "<b>Pada Baris:</b> " . $e->getLine() . "<br>";
}