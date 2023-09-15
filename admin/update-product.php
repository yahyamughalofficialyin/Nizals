<?php include "navbar.php" ?>
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

$pr_id = $_GET["id"];


$query  = "SELECT * FROM `product` WHERE `p_id` = '{$pr_id}'";

$result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)) {

        $row = mysqli_fetch_assoc($result);



        ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-2 ml-2">
                <form class="bg-secondary rounded h-100 p-4" method="post"  enctype="multipart/form-data" >
                    <h6 class="mb-4">Update Product</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name" value="<?php echo $row["product_name"]; ?>"  >
                        <label for="floatingInput">Product Name</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;" name="desc"><?php echo $row["description"]; ?></textarea>
                        <label for="floatingTextarea">Comments</label>
                    </div>
                    <br>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="Old Price" name="oldprice" value="<?php echo $row["old_price"]; ?>" >
                        <label for="floatingInput">Old Price</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="New Price" name="newprice" value="<?php echo $row["new_price"]; ?>" >
                        <label for="floatingInput">New Price</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="Shipping Fee" name="shipping fee" value="<?php echo $row["shippingprice"]; ?>">
                        <label for="floatingInput">Shipping Fee</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="submit" class="form-control" id="floatingPassword" value="Update User" name="update">
                    </div>
                </form>
                <?php

if (isset($_POST["update"])) {
    $pr_id = $_GET["id"];

    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $oldPrice = $_POST['oldprice'];
    $newPrice = $_POST['newprice'];
    $shippingFee = $_POST['shipping_fee'];

    $query = "UPDATE `product` SET `product_name`='$name',`description`='$desc',`old_price`='$oldPrice',`new_price`='$newPrice',`shippingprice`='$shippingFee' WHERE `p_id`= '{$pr_id}'";

    mysqli_query($conn, $query);

    echo "<script>
                alert('Product updated successfully.');
                window.location.href = 'product.php';
              </script>";


}



?>
            </div>
        </div>
    </div>
<?php } ?>