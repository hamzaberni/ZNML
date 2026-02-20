<?php
require __DIR__ . "/backend/db.php";
    
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

echo "✅ Sikeres adatbázis kapcsolat!";
?>