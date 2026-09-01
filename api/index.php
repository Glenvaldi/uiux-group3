<?php
// Nyalakan radar PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Panggil Laravel
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    echo "<h1 style='color:red;'>ERROR TERTANGKAP!</h1>";
    
    // Ini error luarnya (Target class view)
    echo "<b>Pesan Error:</b> " . $e->getMessage() . "<br><br>";
    
    // INI YANG PALING PENTING: Menangkap error aslinya!
    if ($e->getPrevious()) {
        echo "<h2 style='color:purple;'>AKAR MASALAH SEBENARNYA:</h2>";
        echo "<b>Pesan Asli:</b> " . $e->getPrevious()->getMessage() . "<br>";
        echo "<b>File Asli:</b> " . $e->getPrevious()->getFile() . " (Baris: " . $e->getPrevious()->getLine() . ")<br><br>";
    }
    
    echo "<b>Terjadi di File:</b> " . $e->getFile() . " (Baris: " . $e->getLine() . ")<br>";
}