<?php session_start(); 

error_reporting(E_ALL);
ini_set('display_errors', '1');


?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
    <title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    .product-body-non {
      display: flex;
      width: 100%;
      height: 100vh;
      align-items: center;
      justify-content: center;
      background: #e6e6e6;
    }

    ::selection {
      background: #fee6eb;
    }

    .product-body-non:before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      clip-path: circle(55% at right 30%);
      background: #e6e6e6;
      background-image: linear-gradient(0deg, aqua 10%, #11101D 100%);
    }

    .product-container {
      display: flex;
      max-width: 750px;
      padding-bottom: 2%;
      background: #fff;
      border-radius: 12px;
      justify-content: space-between;
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.15);
      position: relative;
    }

    .product-container::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      border-radius: 12px;
      clip-path: circle(65% at right 35%);
      background-image: linear-gradient(135deg, aqua 10%, aquamarine 100%);
    }

    .product-container .box.one {
      padding: 35px 5px 0px 35px;
    }

    .box.one .details .topic {
      font-size: 30px;
      font-weight: 500;
    }

    .box.one .details p {
      color: #737373;
      font-size: 13px;
      font-weight: 500;
    }

    .box.one .rating {
      color: #fd9bb0;
      font-size: 14px;
      margin-top: 10px;
    }

    .box.one .price-box {
      margin-top: 16px;
    }

    .box.one .discount {
      font-size: 20px;
      margin: 10px 0 0 12px;
      position: relative;
      color: #00e6e6;
    }

    .box.one .discount:before {
      content: '';
      position: absolute;
      height: 1px;
      width: 100px;
      background: #00e6e6;
      top: 50%;
      left: -8px;
    }

    .box.one .price {
      color: #11101D;
      font-size: 30px;
    }

    .box.one .button1 {
      margin-top: 55px;
    }

    .box.one .button1 button {
      outline: none;
      border: none;
      padding: 8px 16px;
      border-radius: 6px;
      font-size: 18px;
      font-weight: 500;
      color: #fff;
      background: #00e6e6;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .button1 button:hover {
      transform: scale(0.98);
    }

    .product-container .box.two .image {
      position: relative;
      right: 0;
      top: 0;
      height: 340px;
      width: 430px;
    }

    .image img {
      height: 100%;
      width: 80%;
      object-fit: cover;
    }

    .product-container .box.two .image-box {
      position: relative;
      text-align: right;
      right: 0;
      bottom: 27px;
    }

    .box.two .image-box .info {
      margin: 0 35px 0 0;
    }

    .box.two .info .brand {
      font-size: 17px;
      font-weight: 600;
      color: #c9032e;
    }

    .box.two .info .name {
      font-size: 20px;
      font-weight: 500;
      color: #fff;
    }

    .box.two .info .shipping {
      font-size: 14px;
      font-weight: 400;
      color: #000;
    }

    .box.two .button2 {
      margin: 17px 0;
    }

    .button2 button {
      outline: none;
      color: #fff;
      border: 1px solid #fff;
      border-radius: 12px;
      padding: 8px 17px;
      background: transparent;
      font-size: 15px;
      font-weight: 400;
      cursor: pointer;
    }





    /* Responsive Product Styling */






    /* Google Fonts Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    .product-body-responsive {
      height: 100vh;
      display: none;
      align-items: center;
      justify-content: center;
      background-image: linear-gradient(135deg, #11101D 10%, aqua 100%);
    }

    .product-card {
      position: relative;
      max-width: 355px;
      width: 100%;
      border-radius: 25px;
      padding: 20px 30px 30px 30px;
      background: #fff;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      z-index: 3;
      overflow: hidden;
    }

    .product-card .logo-cart {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .product-card .logo-cart img {
      height: 60px;
      width: 60px;
      object-fit: cover;
    }

    .product-card .logo-cart i {
      font-size: 27px;
      color: #707070;
      cursor: pointer;
      transition: color 0.3s ease;
    }

    .product-card .logo-cart i:hover {
      color: #333;
    }

    .product-card .main-images {
      position: relative;
      height: 210px;
    }

    .product-card .main-images img {
      position: absolute;
      height: 300px;
      width: 300px;
      object-fit: cover;
      transform: rotate(18deg);
      left: 12px;
      top: -40px;
      z-index: -1;
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .product-card .main-images img.active {
      opacity: 1;
    }

    .product-card .shoe-details .shoe_name {
      font-size: 24px;
      font-weight: 500;
      color: #161616;
    }

    .product-card .shoe-details p {
      font-size: 12px;
      font-weight: 400;
      color: #333;
      text-align: justify;
    }

    .product-card .shoe-details .stars i {
      margin: 0 -1px;
      color: #333;
    }

    .product-card .color-price .color-option {
      display: flex;
      align-items: center;
    }

    .color-price {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
    }

    .color-price .color-option .color {
      font-size: 18px;
      font-weight: 500;
      color: #333;
      margin-right: 8px;
    }

    .color-option .circles {
      display: flex;
    }

    .color-option .circles .circle {
      height: 18px;
      width: 18px;
      background: #0071C7;
      border-radius: 50%;
      margin: 0 4px;
      cursor: pointer;
      transition: all 0.4s ease;
    }

    .color-option .circles .circle.blue.active {
      box-shadow: 0 0 0 2px #fff,
        0 0 0 4px #0071C7;
    }

    .color-option .circles .circle.pink {
      background: #FA1795;
    }

    .color-option .circles .circle.pink.active {
      box-shadow: 0 0 0 2px #fff,
        0 0 0 4px #FA1795;
    }

    .color-option .circles .circle.yellow {
      background: #F5DA00;
    }

    .color-option .circles .circle.yellow.active {
      box-shadow: 0 0 0 2px #fff,
        0 0 0 4px #F5DA00;
    }

    .color-price .price {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .color-price .price .price_num {
      font-size: 25px;
      font-weight: 600;
      color: #707070;
    }

    .color-price .price .price_letter {
      font-size: 10px;
      font-weight: 600;
      margin-top: -4px;
      color: #707070;
    }

    .product-card .button {
      position: relative;
      height: 50px;
      width: 100%;
      border-radius: 25px;
      margin-top: 30px;
      overflow: hidden;
    }

    .product-card .button .button-layer {
      position: absolute;
      height: 100%;
      width: 300%;
      left: -100%;
      background-image: linear-gradient(135deg, #11101D, aqua, aquamarine, aquamarine);
      transition: all 0.4s ease;
      border-radius: 25PX;
    }

    .product-card .button:hover .button-layer {
      left: 0;
    }

    .product-card .button button {
      position: relative;
      height: 100%;
      width: 100%;
      background: none;
      outline: none;
      border: none;
      font-size: 18px;
      font-weight: 600;
      letter-spacing: 1px;
      color: #fff;
    }














    @media (max-width: 768px) {
      .product-body-non {
        display: none;
      }

      .product-body-responsive {
        display: flex;
      }
    }
  </style>
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
    <div class="product-body-non">
      <div class="product-container">
        <div class="box one">
          <div class="details">
            <div class="topic">Description</div>
            <p><?php echo $row['description']; ?></p>
            <div class="price-box">
              <div class="discount">PKR. <?php echo $row['old_price']; ?></div>
              <div class="price">PKR. <?php echo $row['new_price']; ?></div>
            </div>
          </div>
          <form class="button1" method="post">
  <button type="submit" name="buy_now">Buy Now</button>
</form>
        </div>
        <div class="box two">
          <div class="image-box">
            <div class="image">
              <img src="admin/<?php echo $row['prod_pic']; ?>" alt="">
            </div>
            <div class="info">
              <div class="name"><?php echo $row['product_name']; ?></div>
              <div class="shipping">
                <?php
                if ($row['shippingprice'] == 0) {
                  echo 'Free Shipping';
                } else {
                  echo 'Delivery Charges : PKR. ' . $row['shippingprice'];
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php }

else{
  echo "Product No Found";
}

 ?>



<?php
include "config.php";

$pr_id = $_GET["id"];

$query  = "SELECT * FROM `product` WHERE `p_id` = '{$pr_id}'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);

?>


    <div class="product-body-responsive">

      <div class="product-card">
        <div class="logo-cart">
          <img src="img/icon/icon.png" alt="logo">
          <i class='bx bx-shopping-bag'></i>
        </div>
        <div class="main-images">
          <img id="blue" class="blue active" src="admin/<?php echo $row['prod_pic']; ?>" alt="blue">
        </div>
        <div class="shoe-details">
          <span class="shoe_name"><?php echo $row['product_name']; ?></span>
          <p> <?php
              if ($row['shippingprice'] == 0) {
                echo 'Free Shipping';
              } else {
                echo 'Delivery Charges : PKR. ' . $row['shippingprice'];
              }
              ?></p>

        </div>
        <div class="color-price">
          <div class="price">
            <span class="price_num">PKR. <?php echo $row['new_price']; ?></span>
          </div>
        </div>
        <form class="button" method="post">
          <div class="button-layer"></div>
          <button type="submit" onclick="getUserLocation()" >Buy Now</button>
            </form>
      </div>

    </div>
    <?php }

else{
  echo "Product No Found";
}

 ?>

<?php 

if (isset($_POST["buy_now"])) {
  if (isset($_SESSION["c_id"])) {
      $client_id = $_SESSION["c_id"];
      
      $current_date = date("Y-m-d");
      
      $delivery_date = date("Y-m-d", strtotime("+7 days", strtotime($current_date)));
      
      $user_location = "User's Location";
      
      $user_location = mysqli_real_escape_string($conn, $user_location);
      $insert_query = "INSERT INTO `orders` (`address`, `order_time`, `delivery_time`, `client_id`, `product_id`)
                       VALUES ('$user_location', '$current_date', '$delivery_date', $client_id, $pr_id)";
      
      if (mysqli_query($conn, $insert_query)) {
          echo "<script>window.location.href = 'order-confirmation.php';</script>";

      } else {
          echo "Error placing the order: " . mysqli_error($conn);
      }
  } else {
      echo "User ID not found. Please log in or create an account.";
  }
}


 ?>
<script>
  function getUserLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(saveUserLocation);
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  function saveUserLocation(position) {
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;

  $.ajax({
    type: "POST",
    url: "save-location.php", 
    data: { latitude: latitude, longitude: longitude },
    success: function(response) {
      console.log("Location saved successfully.");
    },
    error: function(error) {
      console.error("Error saving location: " + error);
    }
  });
}


</script>

  <script>
    let circle = document.querySelector(".color-option");
    circle.addEventListener("click", (e) => {
      let target = e.target;
      if (target.classList.contains("circle")) {
        circle.querySelector(".active").classList.remove("active");
        target.classList.add("active");
        document.querySelector(".main-images .active").classList.remove("active");
        document.querySelector(`.main-images .${target.id}`).classList.add("active");
      }
    });
  </script>








</body>

</html>