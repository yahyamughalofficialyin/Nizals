<?php

$id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `orders` WHERE `o_id`= '{$id}'";

mysqli_query($conn, $query);

echo "<script>
                alert('Product Delivered successfully.');
                window.location.href = 'index.php';
              </script>";


?>