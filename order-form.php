<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/orderform.css">
</head>
<body>
<?php
include "config.php";

if (isset($_POST['buy_now'])) {
  var_dump($_POST);
  $address = mysqli_real_escape_string($conn, $_POST['address']);

  $product_id = (int)$_POST['product_id'];
  if ($product_id <= 0) {
    echo "<script>alert('Invalid product ID.');</script>";
    exit();
  }

  $client_id = $_SESSION['c_id'];

  $order_time = date("Y-m-d"); 
  $delivery_time = date("Y-m-d", strtotime("+7 days"));

  $insert_query = "INSERT INTO `orders` (`address`, `order_time`, `delivery_time`, `client_id`, `product_id`)
                   VALUES ('$address', '$order_time', '$delivery_time', '$client_id', '$product_id')";

if (mysqli_query($conn, $insert_query)) {
  // Redirect to order-confirmation.php
  header("Location: order-confirmation.php");
  exit(); // Ensure no further code execution
} else {
  echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
}
}

$pr_id = $_POST["product_id"]; // Update to retrieve product ID from POST
?>
<div class="wrapper">
  <form method="post">
    <h2>Order <span>Form</span></h2>
    <div class="input-field">
      <input type="text" name="address" required>
      <label>Enter your Address</label>
    </div>
    <input type="hidden" name="product_id" value="<?php echo $pr_id; ?>">
    <button type="submit" name="buy_now">Order</button>
    <div class="register">
      <p>Don't want to order? <a href="shop.php">Continue Shopping</a></p>
    </div>
  </form>
</div>

</body>
</html>
