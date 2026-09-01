<?php

try {
    // Kita coba bangunkan Laravel
    require __DIR__ . '/../public/index.php';
    
} catch (\Throwable $e) {
    // Kalau Laravel pingsan/error, tangkap alasannya dan tampilkan!
    echo "<h1 style='color:red;'>LARAVEL ERROR KETANGKAP!</h1>";
    echo "<b>Pesan Error:</b> " . $e->getMessage() . "<br><br>";
    echo "<b>Terjadi di File:</b> " . $e->getFile() . "<br>";
    echo "<b>Pada Baris:</b> " . $e->getLine() . "<br>";
}