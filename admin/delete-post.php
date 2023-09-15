<?php

$p_id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `post` WHERE `post_id`= '{$p_id}'";

$conn->query($query);

header("location:post.php");
exit();


?>