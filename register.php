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
            <title>Regisztráció</title>
        </head>
        <body>
            <div class="card">
                <h2>Regisztráció</h2>
                <form action="backend/register.php" method="POST">
                    <input type="email" name="email" placeholder="Email cím" required>
                    <input type="password" name="password" placeholder="Jelszó" required>
                    <input type="text" name="fullname" placeholder="Teljes név" required>
                    <input type="text" name="phone" placeholder="Telefonszám" required>
                    <button type="submit">Regisztrálok</button>
                </form>
                <div class="link">
                    Már van fiókod? <a href="login.php">Bejelentkezés</a>
                </div>
            </div>
        </body>
</html>