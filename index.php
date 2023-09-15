
<title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
<link rel="stylesheet" href="css/picture.css">
<?php include "sidebar.php" ?>
 
<br><br><br><br><br>
      <?php include 'post.php' ?>
      
<br><br><br><br><br>
<?php
  include "config.php";

  $query  = "SELECT p.*, c.first_name, c.last_name, c.dp FROM post p
  INNER JOIN client c ON p.cl_id = c.c_id
  WHERE p.type ='picture'";


  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
  ?>
  <div class="main-picture">
    <div class="picture-post-caption-main">
      <div class="picture-post-caption">
        <img src="<?php echo $row['dp']; ?>" alt="">
        <h4><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h4>
        <p><?php echo $row["caption"]; ?></p>
      </div>
    </div>
    <div class="account-picture-post">
      <img src="admin/upload/post/image/<?php echo $row["post"]; ?>" alt="">
      <!-- <div class="action-picture-account">
        <i class='bx bx-heart' id="picture-like-btn"></i>
        <i class='bx bxs-heart' id="picture-liked-btn"></i>
      </div> -->
    </div>
    </div>
    <br><br><br>
  <?php
  }
  ?>