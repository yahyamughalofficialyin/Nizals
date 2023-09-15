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
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- Spinner End -->


        <?php include "navbar.php" ?>
        <?php 

if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    echo "<script>window.location.href='product.php'</script>";
}

 ?>
        <?php
include "config.php";

// Fetch user details from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Users Table</h6>
                <a href="add-user.php"><button type="button" class="btn btn-success m-2"><i class="fa fa-plus">Add User</i></button></a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <th scope="row"><?php echo $row['u_id']; ?></th>
                                    <td><?php echo $row['uname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php if($row['role'] ==1){
                                        echo "Admin";
                                    }
                                    else if($row['role'] ==2){
                                        echo "Seller";
                                    }
                                      ?></td>
                                    <td>
                                        <a href="update-user.php?id=<?php echo $row["u_id"] ?>"><button type="button" class="btn btn-square btn-outline-info m-2"><i class="fa fa-edit"></i></button></a>
                                        <a href="delete-user.php?id=<?php echo $row["u_id"] ?>"><button type="button" class="btn btn-square btn-outline-primary m-2"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
