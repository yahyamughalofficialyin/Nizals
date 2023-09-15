<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include "sidebar.php" ?>
  <?php
  include "config.php";

  $query  = "SELECT p.*, c.first_name, c.last_name, c.dp FROM post p
  INNER JOIN client c ON p.cl_id = c.c_id
  WHERE p.type ='video' ";
  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
  ?>
  <div class="video-main-container" style="padding-top: 10%; padding-left: 10%;" >
  
  <center>
    <main class="video-container">
      <section class="main-video">
        <video src="admin/upload/post/video/<?php echo $row['post']; ?>" controls></video>
        <h3 class="title"><?php echo $row['caption'] ?></h3>
      </section>
    </main>
  </center>
  </div>
  <br><br><br>
  <?php } ?>
  <script src="js/video.js"></script>
</body>

</html>