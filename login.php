<?php
session_start();

// Ha már be van jelentkezve
if (isset($_SESSION["user_id"])) {
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
</head>
<body>

<div class="card">
    <h2>Bejelentkezés</h2>

    <form action="backend/login.php" method="POST">
        <input type="email" name="email" placeholder="Email cím" required>
        <input type="password" name="password" placeholder="Jelszó" required>
        <button type="submit">Belépés</button>
    </form>

    <div class="link">
        Nincs még fiókod? <a href="register.php">Regisztráció</a>
    </div>
</div>

</body>
</html>