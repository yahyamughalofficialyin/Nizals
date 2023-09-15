<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
    <title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
  <style>
    /* Import Google Font - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    .main-container-post {
      padding-left: 30%;
    }

    ::selection {
      color: #fff;
      background: #1a81ff;
    }

    .post-container {
      width: 500px;
      height: 480px;
      overflow: hidden;
      background: #fff;
      border-radius: 10px;
      transition: height 0.2s ease;
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
    }

    .post-container.active {
      height: 590px;
    }

    .post-container .post-wrapper {
      width: 1000px;
      display: flex;
    }

    .post-container .post-wrapper section {
      width: 500px;
      background: #fff;
    }

    .post-container img {
      cursor: pointer;
    }

    .post-container .post {
      transition: margin-left 0.18s ease;
    }

    .post-container.active .post {
      margin-left: -500px;
    }

    .post header {
      font-size: 22px;
      font-weight: 600;
      padding: 17px 0;
      text-align: center;
      border-bottom: 1px solid #bfbfbf;
    }

    .post .post-form {
      margin: 20px 25px;
    }

    .post .post-form .content,
    .audience .list li .column {
      display: flex;
      align-items: center;
    }

    .post .post-form .content img {
      cursor: default;
      max-width: 52px;
    }

    .post .post-form .content .details {
      margin: -3px 0 0 12px;
    }

    .post-form .content .details p {
      font-size: 17px;
      font-weight: 500;
    }

    .content .details .privacy {
      display: flex;
      height: 25px;
      cursor: pointer;
      padding: 0 10px;
      font-size: 11px;
      margin-top: 3px;
      border-radius: 5px;
      align-items: center;
      max-width: 98px;
      background: #E4E6EB;
      justify-content: space-between;
    }

    .details .privacy span {
      font-size: 13px;
      margin-top: 1px;
      font-weight: 500;
    }

    .details .privacy i:last-child {
      font-size: 13px;
      margin-left: 1px;
    }

    .post-form :where(textarea, button) {
      width: 100%;
      outline: none;
      border: none;
    }

    .post-form textarea {
      resize: none;
      font-size: 18px;
      margin-top: 30px;
      min-height: 100px;
    }

    .post-form textarea::placeholder {
      color: #858585;
    }

    .post-form textarea:focus::placeholder {
      color: #b3b3b3;
    }

    .post-form :where(.theme-emoji, .options) {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .theme-emoji img:last-child {
      max-width: 24px;
    }

    .post-form .options {
      height: 57px;
      margin: 15px 0;
      padding: 0 15px;
      border-radius: 7px;
      border: 1px solid #B9B9B9;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .post-form .options :where(.list, li),
    .audience :where(.arrow-back, .icon, li .radio) {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .post-form .options p {
      color: #595959;
      font-size: 15px;
      font-weight: 500;
      cursor: default;
    }

    .post-form .options .list {
      list-style: none;
    }

    .options .list li {
      height: 42px;
      width: 42px;
      margin: 0 -1px;
      cursor: pointer;
      border-radius: 50%;
    }

    .options .list li:hover {
      background: #f0f1f4;
    }

    .options .list li img {
      width: 23px;
    }

    .post-form button {
      height: 53px;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      cursor: pointer;
      color: #BCC0C4;
      cursor: no-drop;
      border-radius: 7px;
      background: #e2e5e9;
      transition: all 0.3s ease;
    }

    .post-form textarea:valid~button {
      color: #fff;
      cursor: pointer;
      background: #4599FF;
    }

    .post-form textarea:valid~button:hover {
      background: #1a81ff;
    }

    .container .audience {
      opacity: 0;
      transition: opacity 0.12s ease;
    }

    .container.active .audience {
      opacity: 1;
    }

    .audience header {
      padding: 17px 0;
      text-align: center;
      position: relative;
      border-bottom: 1px solid #bfbfbf;
    }

    .audience header .arrow-back {
      position: absolute;
      left: 25px;
      width: 35px;
      height: 35px;
      cursor: pointer;
      font-size: 15px;
      color: #747474;
      border-radius: 50%;
      background: #E4E6EB;
    }

    .audience header p {
      font-size: 22px;
      font-weight: 600;
    }

    .audience .content {
      margin: 20px 25px 0;
    }

    .audience .content p {
      font-size: 17px;
      font-weight: 500;
    }

    .audience .content span {
      font-size: 14px;
      color: #65676B;
    }

    .audience .list {
      margin: 15px 16px 20px;
      list-style: none;
    }

    .audience .list li {
      display: flex;
      cursor: pointer;
      margin-bottom: 5px;
      padding: 12px 10px;
      border-radius: 7px;
      align-items: center;
      justify-content: space-between;
    }

    .list li.active,
    .audience .list li.active:hover {
      background: #E5F1FF;
    }

    .audience .list li:hover {
      background: #f0f1f4;
    }

    .audience .list li .column .icon {
      height: 50px;
      width: 50px;
      color: #333;
      font-size: 23px;
      border-radius: 50%;
      background: #E4E6EB;
    }

    .audience .list li.active .column .icon {
      background: #cce4ff;
    }

    .audience .list li .column .details {
      margin-left: 15px;
    }

    .list li .column .details p {
      font-weight: 500;
    }

    .list li .column .details span {
      font-size: 14px;
      color: #65676B;
    }

    .list li .radio {
      height: 20px;
      width: 20px;
      border-radius: 50%;
      position: relative;
      border: 1px solid #707070;
    }

    .list li.active .radio {
      border: 2px solid #4599FF;
    }

    .list li .radio::before {
      content: "";
      width: 12px;
      height: 12px;
      border-radius: inherit;
    }

    .list li.active .radio::before {
      background: #4599FF;
    }


    @media screen and (max-width: 800px) {
  .main-container-post {
    padding-left: 10%;
  }

  .post-container {
    width: 90%;
    max-width: 500px;
    margin: 20px auto;
    height: auto;
  }

  .post-container.active {
    height: auto;
  }

  .post-container .post-wrapper {
    width: 100%;
    display: block;
  }

  .post-container .post-wrapper section {
    width: 100%;
    background: #fff;
  }

  .post-form textarea {
    margin-top: 20px;
  }

  .post-form .options {
    margin: 10px 0;
    padding: 0 10px;
  }

  .options .list li {
    height: 36px;
    width: 36px;
  }

  .options p {
    font-size: 14px;
  }

  .post-form button {
    height: 45px;
    font-size: 16px;
  }

  .container .audience header .arrow-back {
    left: 10px;
  }

  .audience header p {
    font-size: 18px;
  }

  .audience .content p {
    font-size: 15px;
  }

  .audience .content span {
    font-size: 13px;
  }

  .audience .list li .column .icon {
    font-size: 20px;
  }

  .list li .column .details p {
    font-size: 16px;
  }

  .list li .column .details span {
    font-size: 12px;
  }

  .list li .radio {
    height: 18px;
    width: 18px;
  }
}

@media screen and (max-width: 400px) {
  .main-container-post {
    padding-left: 5%;
  }

  .post-container {
    width: 90%;
    max-width: 350px;
    margin: 10px auto;
  }

  .post-container .post-wrapper {
    width: 100%;
    display: block;
  }

  .post-container .post-wrapper section {
    width: 100%;
    background: #fff;
  }

  .post-form textarea {
    margin-top: 15px;
  }

  .post-form .options {
    margin: 10px 0;
    padding: 0 10px;
  }

  .options .list li {
    height: 30px;
    width: 30px;
  }

  .options p {
    font-size: 13px;
  }

  .post-form button {
    height: 40px;
    font-size: 14px;
  }

  .container .audience header .arrow-back {
    left: 10px;
  }

  .audience header p {
    font-size: 16px;
  }

  .audience .content p {
    font-size: 14px;
  }

  .audience .content span {
    font-size: 12px;
  }

  .audience .list li .column .icon {
    font-size: 18px;
  }

  .list li .column .details p {
    font-size: 14px;
  }

  .list li .column .details span {
    font-size: 11px;
  }

  .list li .radio {
    height: 16px;
    width: 16px;
  }




}
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- FontAweome CDN Link for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  <div class="main-container-post">
    <div class="post-container">
      <div class="post-wrapper">
        <section class="post">
          <header>Create Post</header>
          <form method="post" class="post-form" enctype="multipart/form-data">
            <div class="content">
              <img src="<?php echo $_SESSION['dp'] ?>" alt="logo" style="border-radius: 100%; width:50px; height: 50px;" >
              <div class="details">
                <p><?php echo $_SESSION['first_name'] ?> <?php echo $_SESSION['last_name'] ?></p>
                
              </div>
            </div>
            <textarea placeholder="Share Your Thoughts, <?php echo $_SESSION['first_name'] ?>?" spellcheck="false" name="caption" required></textarea>
            <p id="filename-display-gallery"></p> <!-- Unique ID for the file name display -->
  <div class="theme-emoji">
    <i id="emoji-icon"></i> <!-- Unique ID for the emoji icon -->
  </div>
            <div class="options">
              <p>Add to Your Post</p>
              <ul class="list">
                <input type="file" name="post" id="gallery" hidden>
                <li><img src="icons/gallery.svg" alt="gallery" id="gallery-svg"></li>
              </ul>
            </div>
            <button type="submit" name="save" id="post-button" disabled>Post</button>
          </form>
        </section>
        
      </div>
    </div>
  </div>

  

  <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['save'])) {
    // Get session data (you might need to adjust this depending on your actual session structure)
    $cl_id = $_SESSION['c_id'];
    $caption = $_POST['caption'];
    $type = '';
    $file_name = '';

    if(isset($_FILES['post']) && $_FILES['post']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['post']['name'];
        $file_tmp = $_FILES['post']['tmp_name'];

        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Define allowed image and video extensions
        $allowed_image_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $allowed_video_extensions = array('mp4', 'avi', 'mov');
        
        if (in_array($file_extension, $allowed_image_extensions)) {
            $type = 'picture';
            $upload_path = 'admin/upload/post/image/' . $file_name;  // Update path for images
        } elseif (in_array($file_extension, $allowed_video_extensions)) {
            $type = 'video';
            $upload_path = 'admin/upload/post/video/' . $file_name;  // Update path for videos
        } else {
            // Unsupported file format, show an alert box and exit
            echo "<script>alert('Sorry, can't upload this file format.');</script>";
            exit;
        }

        move_uploaded_file($file_tmp, $upload_path);
    }

    include "config.php";

    $insert_sql = "INSERT INTO `post`(`post`, `caption`, `type`, `cl_id`) 
                   VALUES ('$file_name','$caption','$type','$cl_id')";
    
    if($conn->query($insert_sql) === TRUE) {
        echo "<script>alert('Post inserted successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->$error . "');</script>";
    }

    $conn->close();
}
?>

<script>
  // Function to enable or disable the "Post" button based on input
  function updatePostButton() {
    const galleryInput = document.getElementById("gallery");
    const captionInput = document.querySelector('textarea[name="caption"]');
    const postButton = document.getElementById("post-button");
    const filenameDisplay = document.getElementById("filename-display-gallery");

    // Check if either the caption or the gallery input has a value
    const enablePostButton = captionInput.value.trim() !== "" || galleryInput.files.length > 0;

    // Update the filename display based on the selected file
    if (galleryInput.files.length > 0) {
      const fileExtension = galleryInput.files[0].name.split('.').pop().toLowerCase();
      const allowedExtensions = ["jpg", "jpeg", "png", "gif", "mp4", "avi", "mov"];

      if (!allowedExtensions.includes(fileExtension)) {
        alert("Unsupported file format. Please upload a valid image (jpg, jpeg, png, gif) or video (mp4, avi, mov).");
        galleryInput.value = ""; // Clear the input field
        filenameDisplay.textContent = ""; // Clear the filename display
        return;
      }
    }

    // Enable or disable the button based on the condition
    postButton.disabled = !enablePostButton;
  }

  // Add event listeners to the input fields to trigger the function
  document.getElementById("gallery").addEventListener("change", updatePostButton);
  document.querySelector('textarea[name="caption"]').addEventListener("input", updatePostButton);

  // Trigger the update on page load
  window.addEventListener("DOMContentLoaded", updatePostButton);
</script>


<script>
  // Function to enable or disable the "Post" button based on input
  function updatePostButton() {
    const galleryInput = document.getElementById("gallery");
    const captionInput = document.querySelector('textarea[name="caption"]');
    const postButton = document.getElementById("post-button");

    // Check if either the caption or the gallery input has a value
    const enablePostButton = captionInput.value.trim() !== "" || galleryInput.files.length > 0;

    // Enable or disable the button based on the condition
    postButton.disabled = !enablePostButton;
  }

  // Add event listeners to the input fields to trigger the function
  document.getElementById("gallery").addEventListener("change", updatePostButton);
  document.querySelector('textarea[name="caption"]').addEventListener("input", updatePostButton);

  // Trigger the update on page load
  window.addEventListener("DOMContentLoaded", updatePostButton);
</script>

<script>
  // Function to update the filename display
  function updateFilenameDisplay() {
    const galleryInput = document.getElementById("gallery");
    const filenameDisplay = document.getElementById("filename-display-gallery");

    if (galleryInput.files.length > 0) {
      // Get the first selected file's name
      const filename = galleryInput.files[0].name;
      filenameDisplay.textContent = filename;
    } else {
      // No file selected, clear the display
      filenameDisplay.textContent = "";
    }
  }

  // Add an event listener to the file input
  document.getElementById("gallery").addEventListener("change", updateFilenameDisplay);

  // Trigger the update on page load (if there's a pre-selected file)
  window.addEventListener("DOMContentLoaded", updateFilenameDisplay);
</script>



<script>
  document.getElementById("gallery-svg").addEventListener("click", function() {
  document.getElementById("gallery").click();
});

</script>

  <script>
    const container = document.querySelector(".post-container"),
      privacy = container.querySelector(".post .privacy"),
      arrowBack = container.querySelector(".audience .arrow-back");

    privacy.addEventListener("click", () => {
      container.classList.add("active");
    });

    arrowBack.addEventListener("click", () => {
      container.classList.remove("active");
    });

    document.getElementById("gallery-svg").addEventListener("click", function() {
      document.getElementById("gallery").click();
    });






  </script>

</body>

</html>