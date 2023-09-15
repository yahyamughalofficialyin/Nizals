<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
    <style>
        .message-main-div {
            padding-left: 10%;
            padding-top: 5%;
        }

        .user-message {
            width: 1400px;
            padding: 1%;
            height: 80px;
            background-color: #fff;
            border-radius: 50px;
        }

        .user-message img {
            display: inline-block;
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 100%;
        }

        h4 {
            padding-top: 1%;
            display: inline-block;
            vertical-align: top;
        }

        .message-see {
            display: inline-block;
            padding-left: 78%;
            vertical-align: top;
            padding-top: 0.5%;
        }

        .message-seen {
            width: 45px;
            height: 45px;
            background: #11101D;
            border-radius: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s, transform 0.3s;
            cursor: pointer;
            font-size: 20px;
            color: #fff;
        }

        .message-seen:hover {
            background-color: aqua;
            transform: scale(1.1);
            color: #11101D;
        }


        @media screen and (max-width: 768px) {
           .user-message{
            width: 310px;
            padding: 2%;
            height: 65px;
           }
           .message-see{
            padding: 0;
           }
        }


    </style>
</head>

<body>

    <?php include "sidebar.php" ?>
     
    <br><br><br>
    <div class="message-main-div">
        <div class="user-message">
            <img src="img/IMG_7627.JPG" alt="">
            <h4>Yahya Ahmed Mughal</h4>
            <div class="message-see">
                <a href="message.php"><div class="message-seen"><i class='bx bx-envelope-open'></i></div></a>
            </div>
        </div>
        <br>
    </div>
</body>

</html>