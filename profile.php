<?php
session_start();

// 1️⃣ Ellenőrzés: csak bejelentkezett user
if (!isset($_SESSION["user_id"])) {
    // Vagy dobunk exception-t:
    // throw new Exception("Nincs bejelentkezve!");
    
    // Vagy egyszerűen átirányítjuk a login oldalra:
    header("Location: login.php");
    exit();
}

require __DIR__ . "/backend/db.php";

// Kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// 2️⃣ SQL lekérdezés a bejelentkezett userhez
$userId = intval($_SESSION["user_id"]);
$sql = "SELECT id, email, created_at FROM users WHERE id = $userId";
$result = $conn->query($sql);

// 3️⃣ HTML tábla kiírása
if ($result->num_rows > 0) {
    echo "<h1>Profilom</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Email</th><th>Created At</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nincs találat a users táblában.";
}

$conn->close();
?>