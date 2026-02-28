<?php
session_start();
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        die("Minden mező kötelező!");
    }

    $stmt = $conn->prepare("SELECT id, email, password, is_admin FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["is_admin"] = $user["is_admin"];
            header("Location: ../index.php");
            //echo "Sikeres bejelentkezés!";
        } else {
            echo "Hibás jelszó!";
        }
    } else {
        echo "Nincs ilyen felhasználó!";
    }

    $stmt->close();
}
?>