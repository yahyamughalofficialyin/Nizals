<?php 

if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: product.php");
    exit(); 
}

 ?>
<?php

$user_id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `category` WHERE `cat_id`= '{$user_id}'";

mysqli_query($conn, $query);

echo "<script>
                alert('Category deleted successfully.');
                window.location.href = 'category.php';
              </script>";


?>