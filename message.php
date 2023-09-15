<?php session_start(); 


if (!isset($_SESSION['c_id'])) {
    header("Location: login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: #E4E9F7;
        }

        .message-main {
            padding-top: 1%;
            padding-left: 1%;
        }

        .message-nav {
            width: 1550px;
            height: 80px;
            background: #fff;
            padding-left: 1%;
            padding-top: 1%;
        }

        .message-nav img {
            display: inline-block;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            object-fit: cover;
            vertical-align: middle;
        }

        .message-nav h3 {
            display: inline-block;
        }

        .message-space-dv {
            position: fixed;
            overflow: scroll;
        }

        .messaging-friend {
            padding-top: 2%;
            padding-left: 2%;
        }

        .messaging-friend img {
            display: inline-block;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            object-fit: cover;
            vertical-align: middle;
        }

        .messaging-friend p {
            display: inline-block;
        }


        .messaging-me {
            padding-top: 2%;
            padding-left: 2%;
        }

        .messaging-me img {
            display: inline-block;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            object-fit: cover;
            vertical-align: middle;
        }

        .messaging-me p {
            display: inline-block;
        }

        .mine-message {
            padding-top: 0.5%;
            padding-left: 1%;
            padding-bottom: 3.5%;
            background: linear-gradient(135deg, #00bcd4, #26c6da, #4dd0e1, #80deea, #b2ebf2);
            height: auto;
            border-top-left-radius: 40px;
            border-bottom-left-radius: 40px;
        }

        .message-input-main {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* Add this line */
        }

        .message-input-main img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .message-input {
            width: 1400px;
            flex: 1;
            padding: 8px;
            border: none;
            border-radius: 20px;
            outline: none;
            font-size: 16px;
        }

        .btn-send {
            padding: 8px 16px;
            background-color: #00bcd4;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
        }


        @media screen and (max-width: 768px) {
            .message-main {
                padding-top: 1%;
                padding-left: 1%;
            }

            .message-nav {
                width: 100%;
                padding-left: 1%;
                padding-top: 1%;
            }

            .message-input-main {
                position: fixed;
                width: 100%;
                padding: 10px;
                background-color: rgba(255, 255, 255, 0.9);
                box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.2);
                display: flex;
                flex-direction: column;
                /* Change to column layout */
                align-items: center;
                text-align: center;
            }

            .message-input {
                width: 100%;
                /* Adjust input width */
                margin-top: 10px;
                /* Add margin to separate input and button */
            }

            .btn-send {
                width: 100%;
                /* Adjust button width */
                margin-top: 10px;
                /* Add margin to separate input and button */
            }
        }
    </style>
</head>

<body>
<?php
include "config.php";
if (isset($_GET['msg_id'])) {
    $msg_id = $_GET['msg_id'];
    $client_query = "SELECT * FROM client WHERE c_id = $msg_id";
    $client_result = mysqli_query($conn, $client_query);
    $client_row = mysqli_fetch_assoc($client_result);

    // Fetch messages between user and client
    $user_id = $_SESSION['c_id']; // Assuming this is the user's ID
    $message_query = "SELECT * FROM messages WHERE (sender_id = $user_id AND receiver_id = $msg_id) OR (sender_id = $msg_id AND receiver_id = $user_id) ORDER BY message_id ASC";
    $message_result = mysqli_query($conn, $message_query);
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
    <div class="message-main">

        <div class="message-nav">
            <img src="<?php echo $client_row['dp']; ?>" alt="">
            <h3><?php echo $client_row['first_name'] . ' ' . $client_row['last_name']; ?></h3>

        </div>
        <!-- Display Messages Section -->
<div class="messages-section">
    <?php
    // Fetch and display messages for the selected client and user
    // Use a query to retrieve messages and loop through them
    while ($message_row = mysqli_fetch_assoc($message_result)) {
        if ($message_row['sender_id'] == $_SESSION['c_id']) {
            // Display user's sent messages
            echo '<div class="messaging-me">';
            echo '<img src="' . $_SESSION['dp'] . '" alt="">';
            echo '<p>' . $message_row['message_content'] . '</p>';
            echo '</div>';
        } else {
            // Display client's sent messages
            echo '<div class="messaging-friend">';
            echo '<img src="' . $client_row['dp'] . '" alt="">';
            echo '<p>' . $message_row['message_content'] . '</p>';
            echo '</div>';
        }
    }
    ?>
</div>


        <!-- Messaging form -->
        <div class="message-input-main">
            <img src="<?php echo $_SESSION['dp']; ?>" alt="">
            <form action="send_message.php" method="POST">
                <input type="hidden" name="receiver_id" value="<?php echo $_SESSION['c_id']; ?>">
                <input type="hidden" name="receiver_id" value="<?php echo $_GET['msg_id']; ?>">

                <input type="text" class="message-input" name="message_content" placeholder="Enter Your Message">
                <input type="submit" class="btn-send" value="Send">
            </form>
        </div>
    </div>
<?php } ?>
</body>

</html>