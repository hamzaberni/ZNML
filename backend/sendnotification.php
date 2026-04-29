<?php
session_start();
require __DIR__ . "/db.php";

$subject = trim($_POST['title'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($subject === '' || $message === '') {
    die('Hiányzó adatok.');
}

$stmt = $conn->prepare("INSERT INTO notifications (subject, message) VALUES (?, ?)");
$stmt->bind_param("ss", $subject, $message);
$stmt->execute();

header('Location: ../admin.php?status=ok');
exit;
?>