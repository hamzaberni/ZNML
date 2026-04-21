<?php
session_start();


ini_set('display_errors', 1);
error_reporting(E_ALL);
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];


    if (empty($email) || empty($password) || empty($fullname) || empty($phone)) {
        die("Minden mező kötelező!");
    }

    if (strlen($password) < 6) {
        die("A jelszónak minimum 6 karakternek kell lennie.");
    }

     // Ellenőrizzük, létezik-e már
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        die("Ez az email már regisztrálva van.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (email, password, name, phone, is_admin) VALUES (?, ?, ?, ?, '0')");
    $stmt->bind_param("ssss", $email, $hashedPassword, $fullname, $phone);

    if ($stmt->execute()) {
        $userId = $stmt->insert_id;

        session_regenerate_id(true);

        $_SESSION["user_id"] = $userId;
        $_SESSION["email"] = $email;
        $_SESSION["user_name"] = $fullname;
        $_SESSION["phone"] = $phone;
        $_SESSION["is_admin"] = 0;

        header("Location: ../index.php");
        exit();

    } else {
        echo "Hiba történt.";
    }

    $stmt->close();
}
?>