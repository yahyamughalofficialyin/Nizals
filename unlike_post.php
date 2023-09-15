<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["post_id"])) {
    // Get the current user's ID from the session
    $clientId = $_SESSION["c_id"];
    // Get the post ID from the AJAX request
    $postId = $_POST["post_id"];

    // Check if the user has liked the post
    $checkQuery = "SELECT * FROM likes WHERE client_id = $clientId AND post_id = $postId";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // If the user has liked the post, delete the like
        $deleteQuery = "DELETE FROM likes WHERE client_id = $clientId AND post_id = $postId";
        if (mysqli_query($conn, $deleteQuery)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "Database error"]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "User hasn't liked this post"]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
}
?>
