<?php

$user_id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `users` WHERE `u_id`= '{$user_id}'";

$conn->query($query);

header("location:users.php");
exit();


?>