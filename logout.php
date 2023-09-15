<?php
session_start();

if (!isset($_SESSION['c_id'])) {
    header("Location: login.php");
    exit();
}

$_SESSION = array();

session_destroy();
header("Location: login.php");
exit;
?>