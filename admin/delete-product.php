<?php

$delete_id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `product` WHERE `p_id`= '{$delete_id}'";

mysqli_query($conn, $query);

echo "<script>
                alert('Product deleted successfully.');
                window.location.href = 'product.php';
              </script>";


?>