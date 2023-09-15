<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
    <link rel="stylesheet" href="css/orderconfirm.css">
    <script src="js/orderconfirm.js" defer></script>
</head>
<body>
    <h1>Order <span></span></h1><br><br>
    <div class="button-main"><button class="button">Continue Shopping</button></div>


    <script>
  const button = document.querySelector(".button");
  button.addEventListener("click", (e) => {
    e.preventDefault();
    button.classList.add("animate");

    // Add a delay before redirecting to shop.php
    setTimeout(() => {
      button.classList.remove("animate");
      
      // Redirect to shop.php
      window.location.href = "shop.php";
    }, 600);
  });
</script>



</body>
</html>