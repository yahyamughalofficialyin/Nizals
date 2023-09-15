<?php include "navbar.php" ?>
<?php 

if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    echo "<script>window.location.href='product.php'</script>";
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<?php 

include "config.php";

$c_id = $_GET["id"];


$query  = "SELECT * FROM `category` WHERE `cat_id` = '{$c_id}'";

$result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)) {

        $row = mysqli_fetch_assoc($result);



        ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-2 ml-2">
                <form class="bg-secondary rounded h-100 p-4" method="post"  enctype="multipart/form-data" >
                    <h6 class="mb-4">Update Category</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Category" name="name" value="<?php echo $row["name"]; ?>" >
                        <label for="floatingInput">Category Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="submit" class="form-control" id="floatingPassword" value="Update User" name="update">
                    </div>
                </form>
                <?php

if (isset($_POST["update"])) {
    $c_id = $_GET["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $query = "UPDATE `category` SET `name`='{$name}' WHERE `cat_id`= '{$c_id}'";

    mysqli_query($conn, $query);

    echo "<script>
                alert('Category updated successfully.');
                window.location.href = 'category.php';
              </script>";


}



?>
            </div>
        </div>
    </div>
<?php } ?>