<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Log in - Log in to Nizals </title>
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

.text img{
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
        <form method="post">
          <input type="email" placeholder="Enter Your Registered Email" name="email" required>
          <input type="password" placeholder="Password" name="pwd" required>
          <div class="link">
            <button type="submit" name="login" class="login" >Login</button>
            <a href="#" class="forgot">Forgot password?</a>
          </div>
          <hr>
          <div class="button">
            <a href="signup.php">Create new account</a>
          </div>
        </form>
      </div>
    </div>


    <?php
session_start();

if (isset($_SESSION['c_id'])) {
  header("Location: index.php");
  exit();
}

include "config.php";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['pwd'];


    $sql = "SELECT * FROM client WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        

        if (password_verify($password, $row['password'])) {

            $_SESSION['c_id'] = $row['c_id'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['dp'] = $row['dp'];
            
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!')</script>";
        }
    } else {
        echo "<script>alert('Email not found!')</script>";
    }
}
else{
  echo "<script>alert('Error! Try Again Later')</script>";
}

$conn->close();
?>



  </body>
</html>