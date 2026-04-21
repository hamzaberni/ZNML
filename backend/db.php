<?php
$host = "localhost";
$dbname = "drszarka_zweb";
$username = "drszarka_zweb";
$password = "ci)jNhIZL6FT~zvw";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>