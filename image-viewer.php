<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .image-viewer-main {
            padding-left: 5%;
            padding-top: 0.5%;
            height: 100%;
            opacity: 50%;
        }

        .image-viewer-main img {
            z-index: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            height: 100%;
            position: fixed;
            opacity: 30%;
        }

        .frame-image-viewer-main {
            padding-left: 8%;
            opacity: 100%;
            position: fixed;
            max-width: 900px;
        }

        .frame-image-viewer {
            width: 1400px;
            height: 500px;
            background: #000;
            padding-top: 0;
            padding-bottom: 0;
        }

        .frame-image-viewer img {
            width: 1400px;
            height: 500px;
            object-fit: contain;
        }

        .image-viewer-caption-and-id-main {
            padding-top: 5%;
            padding-left: 8%;
        }

        .image-viewer-caption-and-id {
            width: 1400px;
            height: auto;
            background-color: #fff;
            padding-top: 1%;
            padding-left: 1%;
        }

        .image-viewer-caption-and-id img {
            width: 45px;
            height: 45px;
            border-radius: 100%;
            object-fit: cover;
            display: inline-block;
            vertical-align: middle;
        }

        .image-viewer-caption-and-id h4 {
            display: inline-block;
            vertical-align: middle;
        }

        .image-viewer-caption-and-id p {
            padding-top: 1%;
            padding-bottom: 1%;
            font-weight: 500;
        }

        .like-btn-image-viewer-main {
            padding-left: 8%;
            padding-top: 31%;
            position: fixed;
        }

        .like-btn-image-viewer {
            width: 1400px;
            height: 50px;
            background-color: #fff;
        }

        .like-btn-image-viewer .bx {
        padding-top: 1%;
        padding-left: 2%;
        font-size: 30px;
        color: aqua;
      }

      #video-liked-btn {
        display: none;
        color: red;
      }
      @media screen and (max-width: 768px) {
            
        }
    </style>
</head>

<body>
    <?php include "sidebar.php" ?>
    <div class="image-viewer-caption-and-id-main">
        <div class="image-viewer-caption-and-id">
            <img src="img/IMG_7627.JPG" alt="">
            <h4>Yahya Ahmed Mughal</h4>
            <p>Caption</p>
        </div>
    </div>
    <div class="image-viewer-main">
        <img src="img/IMG_7627.JPG" alt="">
    </div>
    <div class="frame-image-viewer-main">
        <div class="frame-image-viewer">
            <img src="img/IMG_7627.JPG" alt="">
        </div>
    </div>
    <div class="like-btn-image-viewer-main">
        <div class="like-btn-image-viewer">

            <i class='bx bx-heart' id="video-like-btn"></i>
            <i class='bx bxs-heart' id="video-liked-btn"></i>
            
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bxHeartIcon = document.getElementById("video-like-btn");
            const bxsHeartIcon = document.getElementById("video-liked-btn");

            bxHeartIcon.addEventListener("click", function() {
                bxHeartIcon.style.display = "none";
                bxsHeartIcon.style.display = "inline-block";
                // You can also add code here to show a pop-up if needed
            });

            bxsHeartIcon.addEventListener("click", function() {
                bxHeartIcon.style.display = "inline-block";
                bxsHeartIcon.style.display = "none";
                // Add any additional behavior you want when clicking bxs-heart again
            });
        });
    </script>


</body>

</html>