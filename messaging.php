<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nizals | Conact through Nizal Chat</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			background: #E4E9F7;
			font-family: Arial;
		}

		#container {
			width: 750px;
			height: 600px;
			background: #fff;
			margin: 0 auto;
			font-size: 0;
			overflow: hidden;
		}

		aside {
			width: 260px;
			height: 600px;
			background-color: #11101D;
			display: inline-block;
			font-size: 15px;
			vertical-align: top;
		}

		main {
			width: 750px;
			height: 600px;
			display: inline-block;
			font-size: 15px;
			vertical-align: top;
		}

		aside header {
			padding: 30px 20px;
		}

		aside input {
			width: 100%;
			height: 50px;
			line-height: 50px;
			padding: 0 50px 0 20px;
			background-color: #5e616a;
			border: none;
			border-radius: 3px;
			color: #fff;
			background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_search.png);
			background-repeat: no-repeat;
			background-position: 170px;
			background-size: 40px;
		}

		aside input::placeholder {
			color: #fff;
		}

		aside ul {
			padding-left: 0;
			margin: 0;
			list-style-type: none;
			overflow-y: scroll;
			height: 690px;
		}

		aside li {
			padding: 10px 0;
		}

		aside li:hover {
			background-color: #5e616a;
		}

		h2,
		h3 {
			margin: 0;
		}

		aside li img {
			border-radius: 50%;
			margin-left: 20px;
			margin-right: 8px;
		}

		aside li div {
			display: inline-block;
			vertical-align: top;
			margin-top: 12px;
		}

		aside li h2 {
			font-size: 14px;
			color: #fff;
			font-weight: normal;
			margin-bottom: 5px;
		}

		aside li h3 {
			font-size: 12px;
			color: #7e818a;
			font-weight: normal;
		}

		.status {
			width: 8px;
			height: 8px;
			border-radius: 50%;
			display: inline-block;
			margin-right: 7px;
		}

		.green {
			background-color: #58b666;
		}

		.orange {
			background-color: #ff725d;
		}

		.blue {
			background-color: #6fbced;
			margin-right: 0;
			margin-left: 7px;
		}

		main header {
			height: 110px;
			padding: 30px 20px 30px 40px;
		}

		main header img {
			display: inline-block;
		}

		main header div h2 {
			display: inline-block;
		}



		main header img:first-child {
			display: inline-block;
			border-radius: 50%;
		}

		main header img:last-child {
			display: inline-block;
			width: 24px;
			margin-top: 8px;
		}

		main header div {
			display: inline-block;
			margin-left: 10px;
			margin-right: 145px;
		}

		main header h2 {
			font-size: 16px;
			margin-bottom: 5px;
		}

		main header h3 {
			font-size: 14px;
			font-weight: normal;
			color: #7e818a;
		}

		main header .div {
			padding-left: 18%;
		}

		main header .div a {
			display: inline-block;
		}


		#chat {
			padding-left: 0;
			margin: 0;
			list-style-type: none;
			overflow-y: scroll;
			height: 535px;
			border-top: 2px solid #fff;
			border-bottom: 2px solid #fff;
		}

		#chat li {
			padding: 10px 30px;
		}

		#chat h2,
		#chat h3 {
			display: inline-block;
			font-size: 13px;
			font-weight: normal;
		}

		#chat h3 {
			color: #bbb;
		}

		#chat .entete {
			margin-bottom: 5px;
		}

		#chat .message {
			padding: 20px;
			color: #fff;
			line-height: 25px;
			max-width: 90%;
			display: inline-block;
			text-align: left;
			border-radius: 5px;
		}

		#chat .me {
			text-align: right;
		}

		#chat .you .message {
			background: linear-gradient(to bottom right, #11101D, aqua);
		}

		#chat .me .message {
			background: linear-gradient(to bottom left, aquamarine, aqua);
		}

		#chat .triangle {
			width: 0;
			height: 0;
			border-style: solid;
			border-width: 0 10px 10px 10px;
		}

		#chat .you .triangle {
			border-color: transparent transparent #11101D transparent;
			margin-left: 15px;
		}

		#chat .me .triangle {
			border-color: transparent transparent aquamarine transparent;
			margin-left: 630px;
		}

		main .foot {
			padding: 0;
			position: fixed;
		}

		main .foot textarea {
			resize: none;
			border: none;
			display: block;
			width: 100%;
			height: 80px;
			border-radius: 3px;
			padding: 20;
			font-size: 13px;
			margin-bottom: 13px;
		}

		main .foot textarea::placeholder {
			color: #ddd;
		}

		main .foot img {
			height: 30px;
			cursor: pointer;
		}

		main .foot a {
			text-decoration: none;
			text-transform: uppercase;
			font-weight: bold;
			color: #6fbced;
			vertical-align: top;
			margin-left: 333px;
			margin-top: 5px;
			display: inline-block;
		}



		.message-main {
			display: inline-block;
			position: fixed;
			z-index: 1;
			padding-left: 0;
		}

		.message-main form input {
			display: inline-block;
			padding-top: 0.3%;
			padding-left: 1%;
			font-size: 12px;
			width: 1300px;
			height: 45px;
			border: 0;
			border-top-right-radius: 10px;
			border-bottom-right-radius: 10px;
		}

		.message-main p {
			font-size: 9px;
		}

		.pic {
			display: inline-block;
			background: transparent;
			border: 0;
			font-size: 20px;
			width: 35px;
			height: 35px;
		}

		.file {
			display: inline-block;
			background: transparent;
			border: 0;
			font-size: 20px;
			width: 35px;
			height: 35px;
		}

		.pic:hover {
			color: aqua;
		}

		.file:hover {
			color: aqua;
		}



		#send {
			width: 40px;
			height: 40px;
			background-color: aqua;
			color: #fff;
			font-size: 16px;
			border: none;
			border-radius: 100%;
			padding-top: 0.5%;
			cursor: pointer;
			transition: background-color 0.3s;
		}

		#send:hover {
			background-color: aquamarine;
		}



		.my-super-cool-btn {
			display: inline-block;
			position: relative;
			text-decoration: none;
			color: aqua;
			box-sizing: border-box;
		}

		.my-super-cool-btn span {
			position: relative;
			box-sizing: border-box;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 16px;
			width: 50px;
			height: 50px;
		}

		.my-super-cool-btn span:before {
			content: '';
			width: 100%;
			height: 100%;
			display: block;
			position: absolute;
			border-radius: 100%;
			border: 3px solid #11101D;
			box-sizing: border-box;
			transition: all .85s cubic-bezier(0.25, 1, 0.33, 1);
			box-shadow: 0 30px 85px rgba(0, 0, 0, 0.14), 0 15px 35px rgba(0, 0, 0, 0.14);
		}

		.my-super-cool-btn:hover span:before {
			transform: scale(0.8);
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.14), 0 5px 12px rgba(0, 0, 0, 0.14);
		}

		.my-super-cool-btn .dots-container {
			opacity: 0;
			animation: intro 1.6s;
			animation-fill-mode: forwards;
		}

		.my-super-cool-btn .dot {
			width: 2px;
			height: 2px;
			display: block;
			background-color: #F3CF14;
			border-radius: 100%;
			position: absolute;
			transition: all .85s cubic-bezier(0.25, 1, 0.33, 1);
		}

		.my-super-cool-btn .dot:nth-child(1) {
			top: 5px;
			left: 5px;
			transform: rotate(-140deg);
			animation: swag1-out 0.3s;
			animation-fill-mode: forwards;
			opacity: 0;
		}

		.my-super-cool-btn .dot:nth-child(2) {
			top: 50px;
			right: 50px;
			transform: rotate(140deg);
			animation: swag2-out 0.3s;
			animation-fill-mode: forwards;
			opacity: 0;
		}

		.my-super-cool-btn .dot:nth-child(3) {
			bottom: 50px;
			left: 50px;
			transform: rotate(140deg);
			animation: swag3-out 0.3s;
			animation-fill-mode: forwards;
			opacity: 0;
		}

		.my-super-cool-btn .dot:nth-child(4) {
			bottom: 50px;
			right: 50px;
			transform: rotate(-140deg);
			animation: swag4-out 0.3s;
			animation-fill-mode: forwards;
			opacity: 0;
		}

		.my-super-cool-btn:hover .dot:nth-child(1) {
			animation: swag1 0.3s;
			animation-fill-mode: forwards;
		}

		.my-super-cool-btn:hover .dot:nth-child(2) {
			animation: swag2 0.3s;
			animation-fill-mode: forwards;
		}

		.my-super-cool-btn:hover .dot:nth-child(3) {
			animation: swag3 0.3s;
			animation-fill-mode: forwards;
		}

		.my-super-cool-btn:hover .dot:nth-child(4) {
			animation: swag4 0.3s;
			animation-fill-mode: forwards;
		}

		@keyframes intro {
			0% {
				opacity: 0;
			}

			100% {
				opacity: 1;
			}
		}

		@keyframes swag1 {
			0% {
				top: 50px;
				left: 50px;
				width: 8px;
			}

			50% {
				width: 30px;
				opacity: 1;
			}

			100% {
				top: 20px;
				left: 20px;
				width: 8px;
				opacity: 1;
			}
		}

		@keyframes swag1-out {
			0% {
				top: 20px;
				left: 20px;
				width: 8px;
			}

			50% {
				width: 30px;
				opacity: 1;
			}

			100% {
				top: 50px;
				left: 50px;
				width: 8px;
				opacity: 0;
			}
		}

		@keyframes swag2 {
			0% {
				top: 50px;
				right: 50px;
				width: 8px;
			}

			50% {
				width: 30px;
				opacity: 1;
			}

			100% {
				top: 20px;
				right: 20px;
				width: 8px;
				opacity: 1;
			}
		}

		@keyframes swag2-out {
			0% {
				top: 20px;
				right: 20px;
				width: 8px;
			}

			50% {
				width: 30px;
				opacity: 1;
			}

			100% {
				top: 50px;
				right: 50px;
				width: 8px;
				opacity: 0;
			}
		}

		@keyframes swag3 {
			0% {
				bottom: 50px;
				left: 50px;
				width: 8px;
			}

			50% {
				width: 30px;
				opacity: 1;
			}

			100% {
				bottom: 20px;
				left: 20px;
				width: 8px;
				opacity: 1;
			}
		}

		@keyframes swag3-out {
			0% {
				bottom: 20px;
				left: 20px;
				width: 8px;
			}

			50% {
				width: 30px;
				opacity: 1;
			}

			100% {
				bottom: 50px;
				left: 50px;
				width: 8px;
				opacity: 0;
			}
		}

		@keyframes swag4 {
			0% {
				bottom: 50px;
				right: 50px;
				width: 8px;
			}

			50% {
				width: 30px;
				opacity: 1;
			}

			100% {
				bottom: 20px;
				right: 20px;
				width: 8px;
				opacity: 1;
			}
		}

		@keyframes swag4-out {
			0% {
				bottom: 20px;
				right: 20px;
				width: 8px;
			}

			50% {
				width: 30px;
				opacity: 1;
			}

			100% {
				bottom: 50px;
				right: 50px;
				width: 8px;
				opacity: 0;
			}
		}






		@media (max-width: 420px) {

			aside {
				display: none;
			}

			#container {
				width: 380px;
			}

			main {
				width: 350px;
			}

			main header {
				height: auto;
			}


			#chat .triangle {
				width: 0;
				height: 0;
				border-style: solid;
				border-width: 0 10px 10px 10px;
			}

			#chat .you .triangle {
				border-color: transparent transparent #11101D transparent;
				margin-left: 5px;
			}

			#chat .me .triangle {
				border-color: transparent transparent aquamarine transparent;
				margin-left: 250px;
			}
		}
	</style>
</head>

<body>
	<div id="container">
		<!-- <aside>
			<header>
				<input type="text" placeholder="search">
			</header>
			<ul>
				<li>
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
					<div>
						<h2>Prénom Nom</h2>
						<h3>
							<span class="status orange"></span>
							offline
						</h3>
					</div>
				</li>
				<li>
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_02.jpg" alt="">
					<div>
						<h2>Prénom Nom</h2>
						<h3>
							<span class="status green"></span>
							online
						</h3>
					</div>
				</li>
				<li>
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_03.jpg" alt="">
					<div>
						<h2>Prénom Nom</h2>
						<h3>
							<span class="status orange"></span>
							offline
						</h3>
					</div>
				</li>
				<li>
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_04.jpg" alt="">
					<div>
						<h2>Prénom Nom</h2>
						<h3>
							<span class="status green"></span>
							online
						</h3>
					</div>
				</li>
				<li>
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_05.jpg" alt="">
					<div>
						<h2>Prénom Nom</h2>
						<h3>
							<span class="status orange"></span>
							offline
						</h3>
					</div>
				</li>
				<li>
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_06.jpg" alt="">
					<div>
						<h2>Prénom Nom</h2>
						<h3>
							<span class="status green"></span>
							online
						</h3>
					</div>
				</li>
				<li>
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_07.jpg" alt="">
					<div>
						<h2>Prénom Nom</h2>
						<h3>
							<span class="status green"></span>
							online
						</h3>
					</div>
				</li>
				<li>
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_08.jpg" alt="">
					<div>
						<h2>Prénom Nom</h2>
						<h3>
							<span class="status green"></span>
							online
						</h3>
					</div>
				</li>
				<li>
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_09.jpg" alt="">
					<div>
						<h2>Prénom Nom</h2>
						<h3>
							<span class="status green"></span>
							online
						</h3>
					</div>
				</li>
				<li>
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_10.jpg" alt="">
					<div>
						<h2>Prénom Nom</h2>
						<h3>
							<span class="status orange"></span>
							offline
						</h3>
					</div>
				</li>
			</ul>
		</aside> -->
		<main>
			<header>
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
				<div>
					<h2>Vincent</h2>
					<h3>already 1902 messages</h3>
				</div>
				<div class="div">
					<a href="login.php" class="my-super-cool-btn">
						
						<span><i class='bx bx-log-out'></i></span>
					</a>
					</i></a>
				</div>
			</header>
			<ul id="chat">
				<li class="you">
					<div class="entete">
						<span class="status green"></span>
						<h2>Vincent</h2>
						<h3>10:12AM, Today</h3>
					</div>
					<div class="triangle"></div>
					<div class="message">
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
					</div>
				</li>
				<li class="me">
					<div class="entete">
						<h3>10:12AM, Today</h3>
						<h2>Vincent</h2>
						<span class="status blue"></span>
					</div>
					<div class="triangle"></div>
					<div class="message">
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
					</div>
				</li>
				<li class="me">
					<div class="entete">
						<h3>10:12AM, Today</h3>
						<h2>Vincent</h2>
						<span class="status blue"></span>
					</div>
					<div class="triangle"></div>
					<div class="message">
						OK
					</div>
				</li>
				<li class="you">
					<div class="entete">
						<span class="status green"></span>
						<h2>Vincent</h2>
						<h3>10:12AM, Today</h3>
					</div>
					<div class="triangle"></div>
					<div class="message">
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
					</div>
				</li>
				<li class="me">
					<div class="entete">
						<h3>10:12AM, Today</h3>
						<h2>Vincent</h2>
						<span class="status blue"></span>
					</div>
					<div class="triangle"></div>
					<div class="message">
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
					</div>
				</li>
				<li class="me">
					<div class="entete">
						<h3>10:12AM, Today</h3>
						<h2>Vincent</h2>
						<span class="status blue"></span>
					</div>
					<div class="triangle"></div>
					<div class="message">
						OK
					</div>
				</li>
				<br><br>

			</ul>
			<!-- <form class="foot" >
			<textarea placeholder="Type your message"></textarea>
			<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_picture.png" alt="">
			<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_file.png" alt="">
			<a href="#">Send</a>
		</form> -->
		</main>

	</div>
	<div class="message-main">
		<p>sadasd</p>
		<form action="">
			<input type="text" placeholder="Type Your Chat...." name="msg">
			<input type="file" name="" id="" class="picupload" style="display: none;">
			<input type="file" name="" id="" class="fileupload" style="display: none;">
			<button type="button" class="pic"><i class='bx bx-image'></i></button>
			<button type="button" class="file"><i class='bx bxs-file-blank'></i></button>
			<button type="submit" id="send"><i class='bx bxs-send'></i></button>
		</form>
	</div>
</body>

</html>