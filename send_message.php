
<title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
<?php
session_start();
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $receiver_id = $_POST['receiver_id'];
    $message_content = $_POST['message_content'];
    $sender_id = $_SESSION['c_id']; // Assuming this is the user's ID

    // Check if a conversation already exists between sender and receiver
    $conversation_query = "SELECT conversation_id FROM conversations WHERE (user1_id = $sender_id AND user2_id = $receiver_id) OR (user1_id = $receiver_id AND user2_id = $sender_id)";
    $conversation_result = mysqli_query($conn, $conversation_query);

    if (mysqli_num_rows($conversation_result) > 0) {
        $conversation_row = mysqli_fetch_assoc($conversation_result);
        $conversation_id = $conversation_row['conversation_id'];
    } else {
        // If no conversation exists, create a new conversation and get its ID
        $create_conversation_query = "INSERT INTO conversations (user1_id, user2_id) VALUES ($sender_id, $receiver_id)";
        mysqli_query($conn, $create_conversation_query);
        $conversation_id = mysqli_insert_id($conn);
    }

    // Insert the message with the obtained conversation_id
    $insert_message_query = "INSERT INTO messages (conversation_id, sender_id, receiver_id, message_content) VALUES ($conversation_id, $sender_id, $receiver_id, '$message_content')";
    mysqli_query($conn, $insert_message_query);

    // Redirect back to the messaging page
    header("Location: message.php?msg_id=$receiver_id");
    exit();
}
?>
