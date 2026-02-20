<?php
session_start();

// Töröljük a session összes változóját
session_unset();

// Megsemmisítjük a session-t
session_destroy();

// Átirányítás a landing oldalra
header("Location: ../index.php");
exit();
?>