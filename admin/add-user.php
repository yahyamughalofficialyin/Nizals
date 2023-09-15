
<?php include "navbar.php" ?>
<?php 

if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: product.php");
    exit(); 
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-2 ml-2">
                <form class="bg-secondary rounded h-100 p-4" method="post"  enctype="multipart/form-data" >
                    <h6 class="mb-4">Add User</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="uname">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="role">
                            <option selected>Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Seller</option>
                        </select>
                        <label for="floatingSelect">Role</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="submit" class="form-control" id="floatingPassword" value="Add User" name="save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

include "config.php";
    if (isset($_POST['save'])) {


        $username = $_POST['uname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        $role = $_POST['role'];

        // Perform the database insert
        $sql = "INSERT INTO `users`(`uname`, `email`, `password`, `role`) 
        VALUES ('$username','$email','$password','$role')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Account created successfully!'); window.location='users.php';</script>";

            exit();
        } else {
            echo "<script>alert(Error: Already have an account with the same email)</script> ";
        }
    }
    
    $conn->close();
    ?>