
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
        <link rel="stylesheet" href="css/swiper-bundle.min.css">
        <link rel="stylesheet" href="css/shop.css">
                                        
    </head>
    <body>
      
<?php include "sidebar.php" ?>
    <?php
include "config.php";
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

?>
<div class="shop-container-main">
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                  
<?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <img src="admin/<?php echo $row['prod_pic']; ?>" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name"><?php echo $row['product_name']; ?></h2>
                            <p class="description"><?php echo $row['description']; ?></p>

                            <a href="product.php?id=<?php echo $row["p_id"] ?>"><button class="button">View More</button></a>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
        </div>
      <script src="js/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 25,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints:{
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        },
    },
  });
</script>
</body>
</html>
