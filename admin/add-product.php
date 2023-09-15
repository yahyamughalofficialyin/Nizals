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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-2 ml-2">
                <form class="bg-secondary rounded h-100 p-4" method="post" enctype="multipart/form-data">
                    <h6 class="mb-4">Add Product</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name">
                        <label for="floatingInput">Product Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" id="floatingInput" placeholder="Picture" name="pic">
                        <label for="floatingInput">Product Picture</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;" name="desc"></textarea>
                        <label for="floatingTextarea">Comments</label>
                    </div>
                    <br>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="Old Price" name="oldprice">
                        <label for="floatingInput">Old Price</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="New Price" name="newprice">
                        <label for="floatingInput">New Price</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="Shipping Fee" name="shipping fee">
                        <label for="floatingInput">Shipping Fee</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="cat">
                            <option selected disabled>Category</option>
                            <?php
                            // Fetch categories from the database using a JOIN
                            $categoriesQuery = "SELECT cat_id, name FROM category";
                            $categoriesResult = mysqli_query($conn, $categoriesQuery);

                            while ($category = mysqli_fetch_assoc($categoriesResult)) {
                                echo '<option value="' . $category['cat_id'] . '">' . $category['name'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="floatingSelect">Category</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="submit" class="form-control" id="floatingPassword" value="Add Product" name="save">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['save'])) {



        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $oldPrice = $_POST['oldprice'];
        $newPrice = $_POST['newprice'];
        $shippingFee = $_POST['shipping_fee'];
        $categoryID = $_POST['cat'];


        $targetDir = "upload/product/";
        $pic = $targetDir . basename($_FILES['pic']['name']);
        move_uploaded_file($_FILES['pic']['tmp_name'], $pic);
        if ($_FILES['pic']['error'] !== UPLOAD_ERR_OK) {
            die("File upload failed with error code: " . $_FILES['pic']['error']);
        }

        // Insert product details into the database
        $sql = "INSERT INTO `product`(`product_name`, `description`, `prod_pic`, `old_price`, `new_price`, `shippingprice`, `category_id`) 
        VALUES ('$name','$desc','$pic','$oldPrice','$newPrice','$shippingFee','$categoryID')";

        $queryResult = mysqli_query($conn, $sql);

        if ($queryResult) {
            echo "<script>alert('Product added successfully!')
            
            window.location.href = 'product.php';
            </script>";
        } else {
            echo "Error adding product: " . mysqli_error($conn); // Display any SQL errors
        }
    }
    ?>