<?php


session_start();

if (!isset($_SESSION['c_id'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/update-account.css">
    <title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="img/update1.jpg" alt="">
                <div class="text">
                    <span class="text-1">Connect Watch and <br> Socialize</span>
                    <span class="text-2">Nizals</span>
                </div>
            </div>
            <div class="back">
                <img class="backImg" src="img/jene-stephaniuk-83y3d6Ou6vE-unsplash.jpg" alt="">
                <div class="text">
                    <span class="text-1">Complete miles of journey <br> with one step</span>
                    <span class="text-2">Let's get started</span>
                </div>
            </div>
        </div>
        <?php

        include "config.php";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if c_id parameter is present in the URL
        if (isset($_GET['c_id'])) {
            $c_id = $_GET['c_id'];

            // Query the database to fetch the user's account details based on c_id
            $sql = "SELECT * FROM client WHERE c_id = '$c_id'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $firstName = $row['first_name'];
                $lastName = $row['last_name'];
                $profilePicture = $row['dp'];

        ?>
                <div class="forms">
                    <div class="form-content">
                        <div class="login-form">
                            <div class="title">Update Details</div>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="input-boxes">
                                    <div class="input-box">
                                        <i class="fas fa-envelope"></i>
                                        <input type="text" placeholder="Update First Name" value="<?php echo $firstName ?>" name="fname" required>
                                    </div>
                                    <div class="input-box">
                                        <i class="fas fa-lock"></i>
                                        <input type="text" placeholder="Update Last Name" value="<?php echo $lastName ?>" name="lname" required>
                                    </div>

                                    <div class="input-box">
                                        <i class="fas fa-lock"></i>
                                        <input type="file" placeholder="Update Profile Picture" value="" name="dp" required>
                                    </div>
                                    <div class="button input-box">
                                        <input type="submit" name="update" value="Update">
                                    </div>
                                    <div class="text sign-up-text">Want to Update Password <label for="flip">Click Here</label></div>
                                </div>
                            </form>
                        </div>

                <?php }
        } ?>
                <?php
                if (isset($_POST["update"])) {
                    $c_id = $_GET["c_id"];
                    $fname = $_POST["fname"];
                    $lname = $_POST["lname"];

                    // Handle the profile picture upload
                    if ($_FILES["dp"]["error"] == UPLOAD_ERR_OK) {
                        $uploadDir = "admin/upload/client/";
                        $uploadFile = $uploadDir . basename($_FILES["dp"]["name"]);

                        // Move the uploaded file to the desired directory
                        if (move_uploaded_file($_FILES["dp"]["tmp_name"], $uploadFile)) {
                            // Update the profile picture in the database
                            $query = "UPDATE `client` SET `first_name`='$fname', `last_name`='$lname', `dp`='$uploadFile' WHERE `c_id`= '{$c_id}'";

                            mysqli_query($conn, $query);

                            echo "<script>
                alert('Profile updated successfully.');
                window.location.href = 'logout.php';
              </script>";
                        } else {
                            echo "File upload failed.";
                        }
                    } else {
                        echo "Error uploading file.";
                    }
                }
                ?>
                <div class="signup-form">
                    <div class="title">Password Update</div>
                    <form action="#" method="POST">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Enter Old Password" name="oldpwd" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Enter New Password" name="newpwd" required>
                            </div>

                            <div class="button input-box">
                                <input type="submit" value="Update Password" name="updatepwd">
                            </div>
                            <div class="text sign-up-text">Update Other Details? <label for="flip">Click Here</label></div>
                        </div>
                    </form>
                </div>


                <?php 
              
              if (isset($_POST["updatepwd"])) {
                $c_id = $_SESSION["c_id"];
                $oldPassword = $_POST["oldpwd"];
                $newPassword = $_POST["newpwd"];
            
                $sql = "SELECT password FROM client WHERE c_id = '$c_id'";
                $result = $conn->query($sql);
            
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $hashedPassword = $row['password'];
            
                    if (password_verify($oldPassword, $hashedPassword)) {
                        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
                        $updateQuery = "UPDATE `client` SET `password`='$hashedNewPassword' WHERE `c_id`= '{$c_id}'";
                        mysqli_query($conn, $updateQuery);
            
                        echo "<script>
                            alert('Password updated successfully.');
                            window.location.href = 'logout.php';
                          </script>";
                    } else {
                        echo "<script>
                            alert('Old password is incorrect.');
                          </script>";
                    }
                } else {
                    echo "<script>
                        alert('User not found.');
                      </script>";
                }
            }
            
              
                ?>


                    </div>
                </div>
    </div>
</body>

</html>