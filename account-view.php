<?php include "sidebar.php" ?>
<?php
include "config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the client ID from the URL parameter
if (isset($_GET['c_id']) && is_numeric($_GET['c_id'])) {
    $client_id = $_GET['c_id'];

    // Fetch client details from the database
    $client_query = "SELECT * FROM client WHERE c_id = $client_id";
    $client_result = mysqli_query($conn, $client_query);
    $client_row = mysqli_fetch_assoc($client_result);

    // Fetch posts uploaded by the selected client
    $post_imgquery = "SELECT * FROM post WHERE cl_id = $client_id AND type = 'picture'  ORDER BY `post_id` DESC";
    $post_imgresult = mysqli_query($conn, $post_imgquery);


    $post_vidquery = "SELECT * FROM post WHERE cl_id = $client_id AND type = 'video' ORDER BY `post_id` DESC";
    $post_vidresult = mysqli_query($conn, $post_vidquery);
}
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <head>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
        <style>
            body {
                cursor: default;
                position: relative;
            }

            .image-profile-container {
                width: 100%;
                padding-left: 13%;
            }

            .profile-cover-photo-container {
                width: 80%;
                height: 500px;
                position: absolute;
                overflow: hidden;
                z-index: -1;
                box-shadow: 0 40px 80px rgba(0, 0, 0, 0.25), 0 30px 30px rgba(0, 0, 0, 0.22);
            }

            .profile-cover-photo {
                position: absolute;
                width: 100%;
                height: auto;
                overflow: hidden;
                z-index: -1;
                box-shadow: 0 40px 80px rgba(0, 0, 0, 0.25), 0 30px 30px rgba(0, 0, 0, 0.22);
                object-fit: cover;
            }

            .profile-photo-container {
                width: 100%;
                padding-top: 25%;
            }

            .profile-photo {
                z-index: 1;
                width: 200px;
                height: 200px;
                border-radius: 100%;
                border: 2px solid gainsboro;
                box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
                object-fit: cover;
            }

            .profile-photo:hover {
                transition: 0.3s ease-in-out;
                box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            }

            .account-nav-main {
                width: 100%;
            }

            .account-nav {
                width: 100%;
                height: 80px;
                padding-top: 2%;
                background-color: aliceblue;
                box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            }

            .account-nav-ul {
                padding-left: 10%;
                display: inline;
                color: black;
            }

            .account-nav-ul li {
                display: inline;
                padding-left: 10%;
                font-weight: 1000;
                font-family: 'Times New Roman';
                color: aqua;
            }

            .account-nav-ul li a {
                color: aqua;
            }

            .account-nav-ul li a:hover {
                font-weight: 500;
                color: #11101D;
                transition: 0.3s ease-in-out;
            }

            .account-thumbnail-main {
                padding-left: 10%;
                padding-top: 5%;
                width: 90%;
                height: auto;
            }

            .account-thumbnail {
                width: 100%;
                height: auto;
                background-color: #fff;
            }

            .account-about {
                padding: 10%;
            }


            .account-video {
                padding: 10%;
            }

            .account-video a video {
                display: inline-block;
                width: 320px;
                padding-left: 5%;
            }


            .account-video h3 {
                padding-top: 10%;
                padding-left: 45%;
                padding-bottom: 5%;
            }

            .account-photo {
                padding: 10%;
            }

            .account-photo a img {
                display: inline-block;
                width: 320px;
                height: 200px;
                padding-left: 5%;
            }


            .account-photo h3 {
                padding-top: 10%;
                padding-left: 45%;
                padding-bottom: 5%;
            }



            /* Account Friends Section  */


            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

            * {
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            ::selection {
                background: #8e44ad;
                color: #fff;
            }

            .unique-container {
                max-width: 1100px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                padding: 20px;
            }

            .unique-box {
                width: calc(33% - 10px);
                background: #fff;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 20px 30px;
                border-radius: 5px;
            }

            .unique-box .quote i {
                margin-top: 10px;
                font-size: 45px;
                color: #17c0eb
            }

            .unique-container .unique-box .unique-image {
                margin: 10px 0;
                height: 150px;
                width: 150px;
                padding: 3px;
                border-radius: 50%;
            }

            .unique-box .unique-image img {
                height: 100%;
                width: 100%;
                border-radius: 50%;
                object-fit: cover;
                border: 2px solid #fff;
            }

            .unique-box p {
                text-align: justify;
                margin-top: 8px;
                font-size: 16px;
                font-weight: 400;
            }

            .unique-box .unique-name_job {
                margin: 10px 0 3px 0;
                color: #11101D;
                font-size: 18px;
                font-weight: 600;
            }

            .unique-rating i {
                font-size: 18px;
                color: #11101D;
                margin-bottom: 5px;
            }

            .unique-btns {
                margin-top: 20px;
                margin-bottom: 5px;
                display: flex;
                justify-content: space-between;
                width: 100%;
            }

            .unique-btns button {
                background: linear-gradient(to bottom right, #3a8bcd, #408ec6, #49a2bf, #5ab8ba, #71ceb5, #83d8b0, #94e2ab, #a6eca6);
                width: 100%;
                padding: 9px 0px;
                outline: none;
                border: 2px solid #11101D;
                border-radius: 5px;
                cursor: pointer;
                font-size: 18px;
                font-weight: 400;
                color: aqua;
                transition: all 0.3s linear;
            }

            .unique-btns button:first-child {
                background: none;
                margin-right: 5px;
            }

            .unique-btns button:last-child {
                color: #fff;
                margin-left: 5px;
            }

            .unique-btns button:first-child:hover {
                background: linear-gradient(to bottom right, #3a8bcd, #408ec6, #49a2bf, #5ab8ba, #71ceb5, #83d8b0, #94e2ab, #a6eca6);
                color: #11101D;
            }

            .unique-btns button:hover {
                color: #11101D;
            }


            .account-friends h3 {
                padding-top: 5%;
                padding-left: 45%;
                padding-bottom: 5%;
            }

            @media (max-width:1045px) {
                .unique-container .unique-box {
                    width: calc(50% - 10px);
                    margin-bottom: 20px;
                }
            }

            @media (max-width:710px) {
                .unique-container .unique-box {
                    width: 100%;
                }
            }



            .title-main {
                width: 100%;
                padding-left: 5%;
            }

            .title {
                width: 100%;
                height: 100px;
                padding-left: 5%;
                padding-top: 2%;
                background-color: #fff;
            }

            .title h3 {
                display: inline;
            }

            .title h3:hover {
                color: #6ccdb5;
                transition: 0.3s ease-in-out;
            }

            .title-account-options {
                padding-left: 50%;
                display: inline-block;
            }

            .title-account-options-form {
                display: inline-block;
            }

            .title-account-options-form button {
                width: 200px;
                height: 50px;
                border-radius: 30px;
                background: linear-gradient(to bottom right, #3a8bcd, #408ec6, #49a2bf, #5ab8ba, #71ceb5, #83d8b0, #94e2ab, #a6eca6);
                border: 0;
                font-size: 16px;
            }

            .title-account-options-form button:hover {
                border-radius: 35px;
                background: #11101D;
                transition: 0.3s ease-in-out;
                color: aqua;
            }

            .title-account-options-form button i {
                display: none;
            }

            .same-line-account-1 div {
                display: inline-block;
                padding-right: 20%;
                padding-bottom: 2%;
            }

            .same-line-account-2 div {
                display: inline-block;
                padding-right: 27%;
                padding-bottom: 10%;
            }

            .same-line-account-2 div p {
                display: inline-block;
            }



            .same-line-account-3 div {
                display: inline-block;
                padding-right: 20%;
                padding-bottom: 2%;
            }

            .same-line-account-4 div {
                display: inline-block;
                padding-right: 21%;
                padding-bottom: 10%;
            }

            .same-line-account-4 div p {
                display: inline-block;
            }


            .account-message {
                display: inline-block;
                width: 200px;
                height: 50px;
                border-radius: 30px;
                background: linear-gradient(to bottom right, #3a8bcd, #408ec6, #49a2bf, #5ab8ba, #71ceb5, #83d8b0, #94e2ab, #a6eca6);
                border: 0;
                font-size: 16px;
            }

            .account-message:hover {
                border-radius: 35px;
                background: #11101D;
                transition: 0.3s ease-in-out;
                color: aqua;
            }

            .account-message i {
                display: none;
            }

            #unfollow {
                display: none;
            }

            .account-table {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                margin-top: 20px;
            }

            .personal-info-table {
                border-collapse: collapse;
                width: 100%;
                /* Set the table to occupy the full width */
                max-width: 45%;
                /* Limit the table width on larger screens */
                margin-bottom: 20px;
                /* Add some spacing between the tables */
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            th,
            td {
                padding: 15px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
                font-weight: bold;
            }

            i {
                margin-right: 8px;
                font-size: 18px;
            }

            td {
                border-top: 1px solid #f2f2f2;
            }

            td:first-child {
                border-top: none;
            }


            .account-post {
                display: inline-table;
                padding: 0;
                width: 100%;
                padding-left: 10%;
                padding-top: 5%;
            }



            /* Import Google font - Poppins */
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            body {
                min-height: 100vh;
                background: #E3F2FD;
            }


            .caption-video-account {
                max-width: 900px;
                height: auto;
                background-color: #fff;
                box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
            }

            .video-post-dp {
                display: inline-block;
                padding-left: 3%;
                padding-top: 2%;
            }

            .video-post-dp img {
                display: inline-block;
                width: 45px;
                height: 45px;
                border-radius: 100%;
                vertical-align: middle;
                object-fit: cover;
            }

            .video-post-dp h3 {
                display: inline-block;
                vertical-align: middle;
            }

            .video-caption {
                padding-left: 4%;
                padding-top: 1%;
                padding-bottom: 1%;
            }

            .video-caption h4 {
                font-family: 'Lobster';
                font-weight: 100;
            }


            .video-post-container,
            .video-post-wrapper,
            .video-post-controls,
            .video-post-timer,
            .video-post-options {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .video-post-container {
                width: 98%;
                height: auto;
                user-select: none;
                overflow: hidden;
                max-width: 900px;
                background: #000;
                aspect-ratio: 16 / 9;
                position: relative;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                z-index: 0;
            }

            .video-post-container.fullscreen {
                max-width: 100%;
                width: 100%;
                height: 100vh;
                border-radius: 0px;
            }

            .video-post-wrapper {
                position: absolute;
                left: 0;
                right: 0;
                z-index: 1;
                opacity: 0;
                bottom: -15px;
                transition: all 0.08s ease;
            }

            .video-post-container.show-controls .video-post-wrapper {
                opacity: 1;
                bottom: 0;
                transition: all 0.13s ease;
            }

            .video-post-wrapper::before {
                content: "";
                bottom: 0;
                width: 100%;
                z-index: -1;
                position: absolute;
                height: calc(100% + 35px);
                pointer-events: none;
                background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            }

            .video-timeline {
                height: 7px;
                width: 100%;
                cursor: pointer;
            }

            .video-post-container .video-timeline .progress-area {
                height: 3px;
                position: relative;
                background: rgba(255, 255, 255, 0.6);
            }

            .video-post-container .progress-area span {
                position: absolute;
                left: 50%;
                top: -25px;
                font-size: 13px;
                color: #fff;
                pointer-events: none;
                transform: translateX(-50%);
            }

            .video-post-container .progress-area .progress-bar {
                width: 0%;
                height: 100%;
                position: relative;
                background: #2289ff;
            }

            .video-post-container .progress-bar::before {
                content: "";
                right: 0;
                top: 50%;
                height: 13px;
                width: 13px;
                position: absolute;
                border-radius: 50%;
                background: #2289ff;
                transform: translateY(-50%);
            }

            .video-post-container .progress-bar::before,
            .video-post-container .progress-area span {
                display: none;
            }

            .video-post-container .video-timeline:hover .progress-bar::before,
            .video-post-container .video-timeline:hover .progress-area span {
                display: block;
            }

            .video-post-wrapper .video-post-controls {
                padding: 5px 20px 10px;
            }

            .video-post-controls .video-post-options {
                width: 100%;
            }

            .video-post-controls .video-post-options:first-child {
                justify-content: flex-start;
            }

            .video-post-controls .video-post-options:last-child {
                justify-content: flex-end;
            }

            .video-post-options button {
                height: 40px;
                width: 40px;
                font-size: 19px;
                border: none;
                cursor: pointer;
                background: none;
                color: #efefef;
                border-radius: 3px;
                transition: all 0.3s ease;
            }

            nn .video-post-options button :where(i, span) {
                height: 100%;
                width: 100%;
                line-height: 40px;
            }

            .video-post-options button:hover :where(i, span) {
                color: #fff;
            }

            .video-post-options button:active :where(i, span) {
                transform: scale(0.9);
            }

            .video-post-options button span {
                font-size: 23px;
            }

            .video-post-options input {
                height: 4px;
                margin-left: 3px;
                max-width: 75px;
                accent-color: #0078FF;
            }

            .video-post-options .video-post-timer {
                color: #efefef;
                margin-left: 15px;
                font-size: 14px;
            }

            .video-post-timer .separator {
                margin: 0 5px;
                font-size: 16px;
                font-family: "Open sans";
            }

            .playback-content {
                display: flex;
                position: relative;
            }

            .playback-content .speed-options {
                position: absolute;
                list-style: none;
                left: -40px;
                bottom: 40px;
                width: 95px;
                overflow: hidden;
                opacity: 0;
                border-radius: 4px;
                pointer-events: none;
                background: rgba(255, 255, 255, 0.9);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                transition: opacity 0.13s ease;
            }

            .playback-content .speed-options.show {
                opacity: 1;
                pointer-events: auto;
            }

            .speed-options li {
                cursor: pointer;
                color: #000;
                font-size: 14px;
                margin: 2px 0;
                padding: 5px 0 5px 15px;
                transition: all 0.1s ease;
            }

            .speed-options li:where(:first-child, :last-child) {
                margin: 0px;
            }

            .speed-options li:hover {
                background: #dfdfdf;
            }

            .speed-options li.active {
                color: #fff;
                background: #3e97fd;
            }

            .video-post-container video {
                width: 100%;
                box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
                object-fit: cover;
            }


            .account-video-post {
                width: 100%;
                padding-left: 10%;
                padding-top: 10%;
                padding-right: 5%;
                padding-bottom: 5%;
            }

            .action-video-account {
                width: 900px;
                height: 50px;
                background-color: #fff;
                box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
                border-radius: 5px;
            }

            .action-video-account .bx {
                padding-top: 1%;
                padding-left: 2%;
                font-size: 30px;
                color: aqua;
            }

            #video-liked-btn {
                display: none;
                color: red;
            }





            .account-picture-post {
                width: 100%;
                padding-left: 10%;
                padding-top: 0.5%;
                padding-right: 5%;
                padding-bottom: 5%;
            }

            .account-picture-post img {
                width: 900px;
                height: 600px;
                object-fit: contain;
                background-color: #000;
            }


            .action-picture-account {
                max-width: 900px;
                height: 50px;
                background-color: #fff;
                box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
                border-radius: 5px;
            }

            .action-picture-account .bx {
                padding-top: 1%;
                padding-left: 2%;
                font-size: 30px;
                color: aqua;
            }

            #picture-liked-btn {
                display: none;
                color: red;
            }

            .picture-post-caption-main {
                padding-left: 10%;
            }

            .picture-post-caption {
                max-width: 900px;
                background-color: #fff;
                padding-left: 1%;
                padding-top: 1%;
            }

            .picture-post-caption img {
                width: 45px;
                height: 45px;
                border-radius: 100%;
                display: inline-block;
                vertical-align: middle;
                object-fit: cover;
            }

            .picture-post-caption h4 {
                display: inline-block;
                vertical-align: middle;
            }

            .picture-post-caption p {
                font-weight: 500;
                padding-bottom: 1%;
                padding-top: 1%;
            }


            @media screen and (max-width: 540px) {
                .video-post-wrapper .video-post-controls {
                    padding: 3px 10px 7px;
                }

                .video-post-options input,
                .video-post-container .progress-area span {
                    display: none !important;
                }

                .video-post-options button {
                    height: 30px;
                    width: 30px;
                    font-size: 17px;
                }

                .video-post-options .video-post-timer {
                    margin-left: 5px;
                }

                .video-post-timer .separator {
                    font-size: 14px;
                    margin: 0 2px;
                }

                .video-post-options button :where(i, span) {
                    line-height: 30px;
                }

                .video-post-options button span {
                    font-size: 21px;
                }

                .video-post-options .video-post-timer,
                .video-post-container .progress-area span,
                .speed-options li {
                    font-size: 12px;
                }

                .playback-content .speed-options {
                    width: 75px;
                    left: -30px;
                    bottom: 30px;
                }

                .speed-options li {
                    margin: 1px 0;
                    padding: 3px 0 3px 10px;
                }

                .video-post-options .right .pic-in-pic {
                    display: none;
                }


                .account-video {
                    padding: 5%;
                }

                .account-video a video {
                    width: 100%;
                    padding-left: 0;
                    box-shadow: none;
                }

                .account-video h3 {
                    padding-top: 5%;
                    padding-left: 0;
                    text-align: center;
                }


                .account-photo {
                    padding: 5%;
                }

                .account-photo a img {
                    width: 100%;
                    height: 130px;
                    padding-left: 0;
                    box-shadow: none;
                }

                .account-photo h3 {
                    padding-top: 5%;
                    padding-left: 0;
                    text-align: center;
                }
            }



            @media (max-width: 768px) {
                .image-profile-container {
                    padding-left: 0;
                }

                .profile-cover-photo-container {
                    width: 100%;
                    height: 200px;
                    box-shadow: none;
                    overflow: hidden;
                    z-index: -1;
                }

                .profile-cover-photo {
                    position: absolute;
                    width: 100%;
                    overflow: hidden;
                    height: 200px;
                    z-index: -1;
                    box-shadow: 0 40px 80px rgba(0, 0, 0, 0.25), 0 30px 30px rgba(0, 0, 0, 0.22);
                }

                .profile-photo-container {
                    padding-top: 40%;
                }

                .profile-photo {
                    width: 100px;
                    height: 100px;
                }


                .account-nav-main {
                    padding-top: 5%;
                }

                .account-nav {
                    padding-top: 10%;
                }

                .account-nav-ul {
                    padding-left: 0;
                    text-align: center;
                    font-size: 12px;
                }

                .title-account-options-form button {
                    width: 45px;
                    height: 45px;
                    color: #fff;
                    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
                }

                .title-account-options {
                    padding-left: 5%;
                    display: inline-block;
                }

                .title-account-options-form button i {
                    display: block;
                    font-size: 30px;
                    color: #11101D;
                }

                .title-account-options-form button p {
                    display: none;
                }

                .account-message {
                    width: 45px;
                    height: 45px;
                    color: #fff;
                    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
                }

                .account-message i {
                    display: block;
                    font-size: 30px;
                    color: #11101D;
                }

                .account-message p {
                    display: none;
                }

                .account-table {
                    flex-direction: column;
                    /* Change the flex direction to stack the tables vertically */
                }

                .personal-info-table {
                    max-width: 100%;
                    /* Set the table to occupy the full width on smaller screens */
                    margin-bottom: 10px;
                    /* Reduce the spacing between the tables on smaller screens */
                }

                th,
                td {
                    font-size: 10px;
                    padding: 10px;
                    /* Reduce the padding for better visibility on smaller screens */
                }

                th {
                    font-size: 14px;
                    /* Reduce the font size for better visibility on smaller screens */
                }

                i {
                    font-size: 16px;
                    /* Adjust the font size for better visibility on smaller screens */
                    margin-right: 5px;
                    /* Reduce the margin to make icons closer to the text on smaller screens */
                }


                .account-post {
                    padding: 0;
                    max-width: 100%;
                }






                .action-video-account {
                    width: 310px;
                    height: 50px;
                    background-color: #fff;
                    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
                }

                .action-video-account .bx {
                    padding-top: 2%;
                    padding-left: 2%;
                    font-size: 30px;
                    color: aqua;
                }

                #video-liked-btn {
                    display: none;
                    color: red;
                }





                .account-picture-post {
                    width: 100%;
                    padding-left: 10%;
                    padding-top: 10%;
                    padding-right: 5%;
                    padding-bottom: 5%;
                }

                .account-picture-post img {
                    width: 280px;
                    height: 300px;
                    object-fit: cover;
                    background-color: #000;
                }


                .action-picture-account {
                    width: 310px;
                    height: 50px;
                    background-color: #fff;
                    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
                    border-radius: 5px;
                }

                .action-picture-account .bx {
                    padding-top: 1%;
                    padding-left: 2%;
                    font-size: 30px;
                    color: aqua;
                }

                #picture-liked-btn {
                    display: none;
                    color: red;
                }

                .caption-video-account {
                    width: 310px;
                    font-size: 10px;
                }


                .picture-post-caption-main {
                    padding-left: 10%;
                }

                .picture-post-caption {
                    width: 310px;
                    background-color: #fff;
                    padding-left: 1%;
                    padding-top: 1%;
                }

                .picture-post-caption img {
                    width: 40px;
                    height: 40px;
                    border-radius: 100%;
                    display: inline-block;
                    vertical-align: middle;
                }

                .picture-post-caption h4 {
                    display: inline-block;
                    vertical-align: middle;
                    font-size: 12px;
                }

                .picture-post-caption p {
                    font-weight: 500;
                    padding-bottom: 1%;
                    padding-top: 1%;
                    font-size: 12px;
                }


                .account-picture-post {
                    padding-top: 1%;
                }

                .account-picture-post img {
                    width: 310px;
                }


            }
        </style>
    </head>

<body>

    <br><br><br>
    <div class="image-profile-container">
        <div class="profile-cover-photo-container">
            <img src="<?php echo $client_row['dp'] ?>" alt="" class="profile-cover-photo">
        </div>
        <div class="profile-photo-container">
            <img src="<?php echo $client_row['dp'] ?>" alt="" class="profile-photo">
        </div>
    </div>
    <div class="title-main">
        <div class="title">
            <h3><?php echo $client_row['first_name'] . ' ' . $client_row['last_name']; ?></h3>
            <div class="title-account-options">

                <a href="message.php?msg_id=<?php echo $client_row['c_id'] ?>"><button class="account-message"><i class='bx bxs-message-rounded'></i>
                        <p>Message</p>
                    </button></a>
            </div>
        </div>
    </div>
    <div class="account-nav-main">
        <div class="account-nav">
            <ul class="account-nav-ul">
                <!-- <li class="about"><a>About</a></li> -->
                <li class="video"><a>Videos</a></li>
                <li class="photo"><a>Photos</a></li>
                <!-- <li class="friends"><a>Friends</a></li> -->
            </ul>
        </div>
    </div>
    <div class="account-thumbnail-main">
        <div class="account-thumbnail">

            <!-- Account About Section Starts Here -->

            <!-- <div class="account-about" hidden>
        <div class="account-table">
          <table>
            <tr>
              <th> First Name</th>
              <th> Last Name</th>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
          </table>
          <table>
            <tr>
              <th> Place Lived</th>
              <th> Joined</th>
              <th> Birthday</th>
            </tr>
            <tr>
              <td>Karachi, Pakistan</td>
              <td>18-7-23</td>
              <td>5-10-2004</td>
            </tr>
          </table>
        </div>

      </div> -->


            <!-- Account About Section Ends Here -->




            <!-- Account Videos Section Starts Here -->

            <?php
            while ($post_vidrow = mysqli_fetch_assoc($post_vidresult)) {
            ?>
                <div class="account-video" hidden>
                    <a href="video-post.php?video_id=<?php echo $post_vidrow['post_id'] ?>"><video src="admin/upload/post/video/<?php echo $post_vidrow['post']; ?>"></video></a>
                </div>
            <?php } ?>
            <!-- Account Videos Section Ends Here -->




            <!-- Account Photo Section Starts Here -->



            <div class="account-photo" hidden>
                <?php
                while ($post_imgrow = mysqli_fetch_assoc($post_imgresult)) {
                ?>
                    <a href=""><img src="admin/upload/post/image/<?php echo $post_imgrow['post']; ?>" alt=""></a>

                <?php } ?>
            </div>


            <!-- Account Photos Section Ends Here -->





            <!-- Account Friends Section Starts Here -->




            <!-- <div class="account-friends" hidden>

        <div class="unique-container">
          <div class="unique-box">
            <div class="unique-image">
              <img src="img/IMG_7627.JPG">
            </div>
            <div class="unique-name_job">Yahya Ahmed Mughal</div>
            <div class="unique-btns">
              <button>View</button>
              <button>Follow Up</button>
            </div>
          </div>

          <div class="unique-box">
            <div class="unique-image">
              <img src="img/IMG_7627.JPG">
            </div>
            <div class="unique-name_job">Yahya Ahmed Mughal</div>
            <div class="unique-btns">
              <button>View</button>
              <button>Follow Up</button>
            </div>
          </div>

          <div class="unique-box">
            <div class="unique-image">
              <img src="img/IMG_7627.JPG">
            </div>
            <div class="unique-name_job">Yahya Ahmed Mughal</div>
            <div class="unique-btns">
              <button>View</button>
              <button>Follow Up</button>
            </div>
          </div>
        </div>





      </div> -->

            <!-- Account Friends Section Ends Here -->

        </div>
    </div>
    <div class="account-post">
        <?php include "post.php" ?>
    </div>
    <?php
include "config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the client ID from the URL parameter
if (isset($_GET['c_id']) && is_numeric($_GET['c_id'])) {
    $client_id = $_GET['c_id'];

    // Fetch client details from the database
    $client_query = "SELECT * FROM client WHERE c_id = $client_id";
    $client_result = mysqli_query($conn, $client_query);
    $client_row = mysqli_fetch_assoc($client_result);

    // Fetch posts uploaded by the selected client
    $post_imgquery = "SELECT * FROM post WHERE cl_id = $client_id AND type = 'picture'  ORDER BY `post_id` DESC";
    $post_imgresult = mysqli_query($conn, $post_imgquery);


    $post_vidquery = "SELECT * FROM post WHERE cl_id = $client_id AND type = 'video' ORDER BY `post_id` DESC";
    $post_vidresult = mysqli_query($conn, $post_vidquery);
}
?>

    <?php
    while ($post_vidrow = mysqli_fetch_assoc($post_vidresult)) {
    ?>
        <div class="account-video-post">
            <div class="caption-video-account">
                <div class="video-post-dp">
                    <img src="<?php echo $client_row['dp']; ?>" alt="">
                    <h3><?php echo $client_row['first_name'] . ' ' . $client_row['last_name']; ?></h3>
                </div>
                <div class="video-caption">
                    <h4><?php echo $post_vidrow['caption']; ?></h4>
                </div>
            </div>
            <div class="video-post-container show-controls">
                <div class="video-post-wrapper">
                    <div class="video-timeline">
                        <div class="progress-area">
                            <span>00:00</span>
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                    <ul class="video-post-controls">
                        <li class=" video-post-options  left">
                            <button class=" volume"><i class="fa-solid fa-volume-high"></i></button>
                            <input type="range" min="0" max="1" step="any">
                            <div class=" video-timer">
                                <p class=" current-time">00:00</p>
                                <p class=" separator"> / </p>
                                <p class=" video-duration">00:00</p>
                            </div>
                        </li>
                        <li class="video-post-options  center">
                            <button class=" skip-backward"><i class="fas fa-backward"></i></button>
                            <button class=" play-pause"><i class="fas fa-play"></i></button>
                            <button class=" skip-forward"><i class="fas fa-forward"></i></button>
                        </li>
                        <li class="video-post-options  right">
                            <div class=" playback-content">
                                <button class=" playback-speed"><span class="material-symbols-rounded">slow_motion_video</span></button>
                                <ul class=" speed-options">
                                    <li data-speed="2">2x</li>
                                    <li data-speed="1.5">1.5x</li>
                                    <li data-speed="1" class=" active">Normal</li>
                                    <li data-speed="0.75">0.75x</li>
                                    <li data-speed="0.5">0.5x</li>
                                </ul>
                            </div>
                            <button class=" pic-in-pic"><span class="material-icons">picture_in_picture_alt</span></button>
                            <button class=" fullscreen"><i class="fa-solid fa-expand"></i></button>
                        </li>
                    </ul>
                </div>
                <video src="admin/upload/post/video/<?php echo $post_vidrow['post']; ?>"></video>
            </div>
            <form class="action-video-account">
                <i class='bx bx-heart' id="video-like-btn"></i>
                <i class='bx bxs-heart' id="video-liked-btn"></i>
            </form>
        </div>
    <?php } ?>


    <?php
                while ($post_imgrow = mysqli_fetch_assoc($post_imgresult)) {
                ?>
    <div class="picture-post-caption-main">
        <div class="picture-post-caption">
            <img src="<?php echo $client_row['dp']; ?>" alt="">
            <h4><?php echo $client_row['first_name'] . ' ' . $client_row['last_name']; ?></h4>
            <p><?php echo $post_imgrow['caption']; ?></p>
        </div>
    </div>
    <div class="account-picture-post">
        <img src="admin/upload/post/image/<?php echo $post_imgrow['post']; ?>" alt="">
        <div class="action-picture-account">
            <i class='bx bx-heart' id="picture-like-btn"></i>
            <i class='bx bxs-heart' id="picture-liked-btn"></i>
        </div>
    </div>
<?php } ?>







    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.querySelector(".video-post-container"),
                mainVideo = container.querySelector("video"),
                videoTimeline = container.querySelector(".video-timeline"),
                progressBar = container.querySelector(".progress-bar"),
                volumeBtn = container.querySelector(".volume i"),
                volumeSlider = container.querySelector(".left input"),
                currentVidTime = container.querySelector(".current-time"),
                videoDuration = container.querySelector(".video-duration"),
                skipBackward = container.querySelector(".skip-backward i"),
                skipForward = container.querySelector(".skip-forward i"),
                playPauseBtn = container.querySelector(".play-pause i"),
                speedBtn = container.querySelector(".playback-speed span"),
                speedOptions = container.querySelector(".speed-options"),
                pipBtn = container.querySelector(".pic-in-pic span"),
                fullScreenBtn = container.querySelector(".fullscreen i");
            let timer;

            const hideControls = () => {
                if (mainVideo.paused) return;
                timer = setTimeout(() => {
                    container.classList.remove("show-controls");
                }, 3000);
            };
            hideControls();

            container.addEventListener("mousemove", () => {
                container.classList.add("show-controls");
                clearTimeout(timer);
                hideControls();
            });

            const formatTime = time => {
                let seconds = Math.floor(time % 60),
                    minutes = Math.floor(time / 60) % 60,
                    hours = Math.floor(time / 3600);

                seconds = seconds < 10 ? `0${seconds}` : seconds;
                minutes = minutes < 10 ? `0${minutes}` : minutes;
                hours = hours < 10 ? `0${hours}` : hours;

                if (hours == 0) {
                    return `${minutes}:${seconds}`;
                }
                return `${hours}:${minutes}:${seconds}`;
            };

            videoTimeline.addEventListener("mousemove", e => {
                let timelineWidth = videoTimeline.clientWidth;
                let offsetX = e.offsetX;
                let percent = Math.floor((offsetX / timelineWidth) * mainVideo.duration);
                const progressTime = videoTimeline.querySelector("span");
                offsetX = offsetX < 20 ? 20 : offsetX > timelineWidth - 20 ? timelineWidth - 20 : offsetX;
                progressTime.style.left = `${offsetX}px`;
                progressTime.innerText = formatTime(percent);
            });

            videoTimeline.addEventListener("click", e => {
                let timelineWidth = videoTimeline.clientWidth;
                mainVideo.currentTime = (e.offsetX / timelineWidth) * mainVideo.duration;
            });

            mainVideo.addEventListener("timeupdate", e => {
                let {
                    currentTime,
                    duration
                } = e.target;
                let percent = (currentTime / duration) * 100;
                progressBar.style.width = `${percent}%`;
                currentVidTime.innerText = formatTime(currentTime);
            });

            mainVideo.addEventListener("loadeddata", () => {
                videoDuration.innerText = formatTime(mainVideo.duration);
            });

            const draggableProgressBar = e => {
                let timelineWidth = videoTimeline.clientWidth;
                progressBar.style.width = `${e.offsetX}px`;
                mainVideo.currentTime = (e.offsetX / timelineWidth) * mainVideo.duration;
                currentVidTime.innerText = formatTime(mainVideo.currentTime);
            };

            volumeBtn.addEventListener("click", () => {
                if (!volumeBtn.classList.contains("fa-volume-high")) {
                    mainVideo.volume = 0.5;
                    volumeBtn.classList.replace("fa-volume-xmark", "fa-volume-high");
                } else {
                    mainVideo.volume = 0.0;
                    volumeBtn.classList.replace("fa-volume-high", "fa-volume-xmark");
                }
                volumeSlider.value = mainVideo.volume;
            });

            volumeSlider.addEventListener("input", e => {
                mainVideo.volume = e.target.value;
                if (e.target.value == 0) {
                    return volumeBtn.classList.replace("fa-volume-high", "fa-volume-xmark");
                }
                volumeBtn.classList.replace("fa-volume-xmark", "fa-volume-high");
            });

            speedOptions.querySelectorAll("li").forEach(option => {
                option.addEventListener("click", () => {
                    mainVideo.playbackRate = option.dataset.speed;
                    speedOptions.querySelector(".active").classList.remove("active");
                    option.classList.add("active");
                });
            });

            document.addEventListener("click", e => {
                if (e.target.tagName !== "SPAN" || e.target.className !== "material-symbols-rounded") {
                    speedOptions.classList.remove("show");
                }
            });

            fullScreenBtn.addEventListener("click", () => {
                container.classList.toggle("fullscreen");
                if (document.fullscreenElement) {
                    fullScreenBtn.classList.replace("fa-compress", "fa-expand");
                    return document.exitFullscreen();
                }
                fullScreenBtn.classList.replace("fa-expand", "fa-compress");
                container.requestFullscreen();
            });

            speedBtn.addEventListener("click", () => speedOptions.classList.toggle("show"));
            pipBtn.addEventListener("click", () => mainVideo.requestPictureInPicture());
            skipBackward.addEventListener("click", () => mainVideo.currentTime -= 5);
            skipForward.addEventListener("click", () => mainVideo.currentTime += 5);
            mainVideo.addEventListener("play", () => playPauseBtn.classList.replace("fa-play", "fa-pause"));
            mainVideo.addEventListener("pause", () => playPauseBtn.classList.replace("fa-pause", "fa-play"));
            playPauseBtn.addEventListener("click", () => (mainVideo.paused ? mainVideo.play() : mainVideo.pause()));
            videoTimeline.addEventListener("mousedown", () => videoTimeline.addEventListener("mousemove", draggableProgressBar));
            document.addEventListener("mouseup", () => videoTimeline.removeEventListener("mousemove", draggableProgressBar));

        });
    </script>


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



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const like = document.getElementById("picture-like-btn");
            const liked = document.getElementById("picture-liked-btn");

            like.addEventListener("click", function() {
                like.style.display = "none";
                liked.style.display = "inline-block";
                // You can also add code here to show a pop-up if needed
            });

            liked.addEventListener("click", function() {
                like.style.display = "inline-block";
                liked.style.display = "none";
                // Add any additional behavior you want when clicking bxs-heart again
            });
        });
    </script>

    <script>
        const videos = document.querySelectorAll(".account-video video");

        videos.forEach((video) => {
            video.addEventListener("mouseover", () => {
                video.play();
            });

            video.addEventListener("mouseout", () => {
                video.pause();
                video.currentTime = 0; // Reset video to the beginning when mouse leaves
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".about").click(function() {
                $(".account-about").toggle();
                $(".account-photo, .account-video, .account-friends").hide();
            });

            $(".photo").click(function() {
                $(".account-photo").toggle();
                $(".account-about, .account-video, .account-friends").hide();
            });

            $(".video").click(function() {
                $(".account-video").toggle();
                $(".account-about, .account-photo, .account-friends").hide();
            });

            $(".friends").click(function() {
                $(".account-friends").toggle();
                $(".account-about, .account-photo, .account-video").hide();
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const followUpButton = document.getElementById("followup");
            const followedButton = document.getElementById("followed");

            followUpButton.addEventListener("click", function() {
                followUpButton.style.display = "none";
                followedButton.style.display = "block";
            });

            followedButton.addEventListener("click", function() {
                followedButton.style.display = "none";
                followUpButton.style.display = "block";
            });
        });
    </script>





</body>

</html>