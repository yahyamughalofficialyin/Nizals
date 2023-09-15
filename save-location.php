<?php
// save_location.php

include "config.php"; // Include your database connection file

// Retrieve latitude and longitude from the AJAX request
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Assuming you have the user's ID in the session
if (isset($_SESSION["c_id"])) {
  $client_id = $_SESSION["c_id"];

  // Update the user's location in the database
  $update_query = "UPDATE `orders` SET `address` = '$latitude, $longitude' WHERE `client_id` = $client_id";
  
  if (mysqli_query($conn, $update_query)) {
    echo "Location saved successfully.";
  } else {
    // Error handling if the update fails
    echo "Error saving location: " . mysqli_error($conn);
  }
} else {
  // Session c_id is not set, handle this case as needed
  echo "User ID not found. Please log in or create an account.";
}
?>
