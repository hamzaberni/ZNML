<?php
require __DIR__ . "/backend/db.php";

// Kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// 2. SQL lekérdezés
$sql = "SELECT id, email, created_at FROM users";
$result = $conn->query($sql);

// 3. HTML tábla kiírása
if ($result->num_rows > 0) {
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