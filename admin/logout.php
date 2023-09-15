<?php
session_start();

if (!isset($_SESSION['u_id'])) {
    header("Location: login.php");
    exit();
}

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired page
header("Location: login.php");
exit;
?>