<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nizals - Signup to Nizals </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Roboto', sans-serif;
    }

    .flex {
      display: flex;
      align-items: center;
    }

    .container {
      padding: 0 15px;
      min-height: 100vh;
      justify-content: center;
      background: #f0f2f5;
    }

    .facebook-page {
      justify-content: space-between;
      max-width: 1000px;
      width: 100%;
    }

    .facebook-page .text {
      margin-bottom: 90px;
    }

    .facebook-page h1 {
      color: #1877f2;
      font-size: 4rem;
      margin-bottom: 10px;
    }

    .facebook-page p {
      font-size: 1.75rem;
      white-space: nowrap;
    }

    form {
      display: flex;
      flex-direction: column;
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1),
        0 8px 16px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }

    form input {
      height: 55px;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-bottom: 15px;
      font-size: 1rem;
      padding: 0 14px;
    }

    form input:focus {
      outline: none;
      border-color: #1877f2;
    }

    ::placeholder {
      color: #777;
      font-size: 1.063rem;
    }

    .link {
      display: flex;
      flex-direction: column;
      text-align: center;
      gap: 15px;
    }

    .link .login {
      border: none;
      outline: none;
      cursor: pointer;
      background: #11101D;
      padding: 15px 0;
      border-radius: 6px;
      color: #fff;
      font-size: 1.25rem;
      font-weight: 600;
      transition: 0.2s ease;
    }

    .link .login:hover {
      background: aqua;
      color: #11101D;
    }

    form a {
      text-decoration: none;
    }

    .link .forgot {
      color: #1877f2;
      font-size: 0.875rem;
    }

    .link .forgot:hover {
      text-decoration: underline;
    }

    hr {
      border: none;
      height: 1px;
      background-color: #ccc;
      margin-bottom: 20px;
      margin-top: 20px;
    }

    .button {
      margin-top: 25px;
      text-align: center;
      margin-bottom: 20px;
    }

    .button a {
      padding: 15px 20px;
      background: #42b72a;
      border-radius: 6px;
      color: #fff;
      font-size: 1.063rem;
      font-weight: 600;
      transition: 0.2s ease;
    }

    .button a:hover {
      background: #3ba626;
    }

    .text img {
      width: 90%;
    }

    @media (max-width: 900px) {
      .facebook-page {
        flex-direction: column;
        text-align: center;
      }

      .facebook-page .text {
        margin-bottom: 30px;
      }
    }

    @media (max-width: 460px) {
      .facebook-page h1 {
        font-size: 3.5rem;
      }

      .facebook-page p {
        font-size: 1.3rem;
      }

      form {
        padding: 15px;
      }
    }
  </style>
</head>

<body>
  <div class="container flex">
    <div class="facebook-page flex">
      <div class="text">
        <img src="img/nav-logo-removebg-preview.png" alt="">
        <p>Connect Watch and Socialize</p>
      </div>
      <form method="post" enctype="multipart/form-data" name="signupForm" onsubmit="return validateForm()">

        <input type="text" placeholder="First Name" name="fname" required>
        <input type="text" placeholder="Last Name" name="lname" required>
        <input type="email" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="pwd" required>
        <input type="file" placeholder="Profile Picture" name="dp">
        <div class="link">
          <button type="submit" class="login" name="save">Create New Account</button>
          <a href="#" class="forgot">Forgot password?</a>
        </div>
        <hr>
        <div class="button">
          <a href="login.php">Log In</a>
        </div>
      </form>
    </div>
  </div>

  <?php

  include "config.php";


  $defaultDp = "admin/upload/user.png";

  if (isset($_POST['save'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['pwd'], PASSWORD_DEFAULT);


    if (isset($_FILES['dp']) && $_FILES['dp']['error'] === UPLOAD_ERR_OK) {
      $targetDir = "admin/upload/client/";
      $dp = $targetDir . basename($_FILES['dp']['name']);
      move_uploaded_file($_FILES['dp']['tmp_name'], $dp);
    } else {
      $dp = $defaultDp;
    }


    $sql = "INSERT INTO `client`(`first_name`, `last_name`, `email`, `password`, `dp`) 
    VALUES ('$fname','$lname','$email','$password','$dp')";

    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Account created successfully!')</script>";

      header("location: login.php");
      exit();
    } else {
      echo "<script>alert('Error: Already have an account with the same email')</script> ";
    }
  }


  $conn->close();
  ?>


<script>
function validateForm() {
  // Get form input values
  var fname = document.forms["signupForm"]["fname"].value;
  var lname = document.forms["signupForm"]["lname"].value;
  var email = document.forms["signupForm"]["email"].value;
  var pwd = document.forms["signupForm"]["pwd"].value;

  // Regular expressions for validation
  var nameRegex = /^[a-zA-Z\s]+$/; // Alphabetic characters and spaces only
  var emailRegex = /^[A-Za-z0-9._%+-]+@(gmail\.com|hotmail\.com|outlook\.com)$/; // Valid email domains
  var pwdRegex = /^(?=.*\d).{8,}$/; // At least one digit and 8 characters

  // Validation for first name
  if (!fname.match(nameRegex) || fname.length < 3) {
    alert("First name should contain at least 3 alphabetic characters and no special characters or numbers.");
    return false;
  }

  // Validation for last name
  if (!lname.match(nameRegex) || lname.length < 3) {
    alert("Last name should contain at least 3 alphabetic characters and no special characters or numbers.");
    return false;
  }

  // Validation for email
  if (!email.match(emailRegex)) {
    alert("Invalid email format. Please use a valid email address from supported domains.");
    return false;
  }

  // Validation for password
  if (!pwd.match(pwdRegex)) {
    alert("Password should contain at least one number and be at least 8 characters long.");
    return false;
  }

  return true; // Form is valid
}
</script>




</body>

</html>