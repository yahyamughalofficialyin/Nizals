
<title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["post_id"])) {
    // Get the current user's ID from the session
    $clientId = $_SESSION["c_id"];
    // Get the post ID from the AJAX request
    $postId = $_POST["post_id"];

    // Check if the user already liked the post
    $checkQuery = "SELECT * FROM likes WHERE client_id = $clientId AND post_id = $postId";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) === 0) {
        // If the user hasn't liked the post yet, insert a like
        $insertQuery = "INSERT INTO likes (post_id, likes, client_id) VALUES ($postId, 1, $clientId)";
        if (mysqli_query($conn, $insertQuery)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "Database error"]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "User already liked this post"]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
}
?>
