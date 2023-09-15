<?php include_once "sidebar.php"; ?>
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title> Nizals - Connect Watch and Socialize </title>
  <link rel="icon" type="image/x-icon" href="img/icon/icon.png">
  <link rel="stylesheet" href="css/product.css">
<style>
    .search-container-main {
        padding-top: 5%;
        padding-left: 6%;
    }

    .search-nav {
        width: 1480px;
        height: 80px;
        padding-top: 1.5%;
        padding-left: 2%;
        background: #fff;
    }

    .search-nav div {
        display: inline-block;
        border: 2px solid #11101D;
        border-radius: 20px;
        font-size: 28px;
        width: 700px;
        text-align: center;
        transition: background 0.3s, border 0.3s, color 0.3s;
    }

    .search-nav div:hover {
        background: #11101D;
        border: 2px solid #E4E9F7;
        color: aqua;
    }

    .search-account-section {
        padding-left: 0;
        padding-top: 0;
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


    .search-video-section {
        flex-wrap: nowrap;
        /* Prevent wrapping to multiple lines */
        overflow-x: auto;
        /* Allow horizontal scrolling if content overflows */
        padding-top: 2%;
    }

    .search-video-section a {
        display: inline-block;
        width: 400px;
        height: auto;
        background-color: #fff;
        margin-right: 10px;
        /* Add margin to create space between videos */
        padding-left: 2%;
        padding-top: 2%;
        padding-right: 1%;
    }

    .search-video-section a video {
        width: 100%;
        /* Make the video take the full width of its container */
        max-width: 400px;
        /* Limit the maximum width to 400px */
    }

    .search-video-nav {
        padding-left: 1%;
        padding-top: 1%;
        padding-bottom: 5%;
        width: 300px;
        height: 50px;
        background-color: #fff;
    }

    .search-video-nav img {
        display: inline-block;
        width: 30px;
        height: 30px;
        border-radius: 100%;
        vertical-align: middle;
    }

    .search-video-nav b {
        font-size: 16px;
    }

    @media screen and (max-width: 768px) {
        .search-container-main {
            padding-top: 20%;
        }

        .search-nav {
            width: 320px;
            height: 80px;
        }

        .search-nav div {
            display: inline-block;
            border: 2px solid #11101D;
            border-radius: 100%;
            font-size: 28px;
            width: 50px;
            height: 50px;
            padding-top: 2%;
            text-align: center;
            transition: background 0.3s, border 0.3s, color 0.3s;
        }

        .user-message {
            width: 310px;
            padding: 2%;
            height: 65px;
        }

        .message-see {
            padding: 0;
        }

        .search-video-section a {
            width: 320px;
        }

        .search-video-section a video {
            width: 100%;
            /* Make the video take the full width of its container */
            max-width: 320px;
            /* Limit the maximum width to 400px */
        }

        .search-video-nav {
            padding-left: 1%;
            padding-top: 1%;
            padding-bottom: 5%;
            width: 300px;
            height: 50px;
            background-color: #fff;
        }


    }
</style>

</head>

<body>


    <div class="search-container-main">
        <div class="search-nav">
            <div class="search-account"><i class='bx bxs-user-account'></i></div>
            <div class="search-video"><i class='bx bxs-videos'></i></div>
        </div>
        <?php
        include "config.php";

        if (isset($_GET['search'])) {
            $search = $_GET['search'];

            // Escape special characters to prevent SQL injection
            $search = mysqli_real_escape_string($conn, $search);

            // Query to search for videos in the post table
            $post_query = "SELECT p.*, c.first_name, c.last_name, c.dp 
                           FROM post p
                           JOIN client c ON p.cl_id = c.c_id
                           WHERE p.type = 'video' AND p.caption LIKE ?";
            
            // Use prepared statement for security
            $post_stmt = mysqli_prepare($conn, $post_query);
            $searchTerm = "%$search%"; // Add wildcards for partial matching
            mysqli_stmt_bind_param($post_stmt, "s", $searchTerm);
            mysqli_stmt_execute($post_stmt);
            $post_result = mysqli_stmt_get_result($post_stmt);

            // Query to search for clients in the client table
            $client_query = "SELECT * FROM client WHERE first_name LIKE ? OR last_name LIKE ?";
            
            // Use prepared statement for security
            $client_stmt = mysqli_prepare($conn, $client_query);
            $searchTerm = "%$search%"; // Add wildcards for partial matching
            mysqli_stmt_bind_param($client_stmt, "ss", $searchTerm, $searchTerm);
            mysqli_stmt_execute($client_stmt);
            $client_result = mysqli_stmt_get_result($client_stmt);

            echo "<div class='search-account-section'>";
            echo "<h2>Search Results from Clients:</h2><br>";
            ?>

<div class="searched-client-main">
    <div class="product-page-wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel">
            <?php
            // Initialize an array to keep track of fetched client IDs
            $fetchedClientIDs = [];

            while ($row = mysqli_fetch_assoc($client_result)) {
                // Check if the client ID has already been fetched
                $clientID = $row['c_id'];
                if (!in_array($clientID, $fetchedClientIDs)) {
                    // Add the client ID to the array and display the client data
                    $fetchedClientIDs[] = $clientID;
                    ?>
                    <a href="account-view.php?c_id=<?php echo $clientID ?>">
                        <li class="card">
                            <div class="img"><img src="<?php echo $row['dp'] ?>" alt="img" draggable="false"></div>
                            <h2><?php echo $row['first_name'] ?></h2>
                            <span><?php echo $row['last_name'] ?></span>
                        </li>
                    </a>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>


            <?php
            echo "</div>";

            echo "<div class='search-video-section' hidden >";
            echo "<h2>Search Results for Videos:</h2>";
            while ($row = mysqli_fetch_assoc($post_result)) {
                echo "<a href='video-post.php?video_id={$row['post_id']}'>";
                echo "<div class='search-video-nav'>";
                echo "<img src='{$row['dp']}' alt=''>";
                echo "<b>{$row['first_name']} {$row['last_name']}</b>";
                echo "<p>{$row['caption']}</p>";
                echo "</div>";
                echo "<br>";
                echo "<video src='admin/upload/post/video/{$row['post']}' ></video>";
                echo "</a>";
            }
            echo "</div>";

        } else {
            echo "Please provide a search term.";
        }

        mysqli_close($conn);
        ?>
    </div>



    <script>
        // Get references to the elements
        const searchAccount = document.querySelector('.search-account');
        const searchVideo = document.querySelector('.search-video');
        const accountSection = document.querySelector('.search-account-section');
        const videoSection = document.querySelector('.search-video-section');

        // Add click event listener to search-account
        searchAccount.addEventListener('click', () => {
            accountSection.style.display = 'block';
            videoSection.style.display = 'none';
        });

        // Add click event listener to search-video
        searchVideo.addEventListener('click', () => {
            videoSection.style.display = 'block';
            accountSection.style.display = 'none';
        });
    </script>


</div>
  <script>
    const wrapper = document.querySelector(".product-page-wrapper");
    const carousel = document.querySelector(".carousel");
    const firstCardWidth = carousel.querySelector(".card").offsetWidth;
    const arrowBtns = document.querySelectorAll(".product-page-wrapper i");
    const carouselChildrens = [...carousel.children];

    let isDragging = false,
      isAutoPlay = true,
      startX, startScrollLeft, timeoutId;

    // Get the number of cards that can fit in the carousel at once
    let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

    // Insert copies of the last few cards to beginning of carousel for infinite scrolling
    carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
      carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });

    // Insert copies of the first few cards to end of carousel for infinite scrolling
    carouselChildrens.slice(0, cardPerView).forEach(card => {
      carousel.insertAdjacentHTML("beforeend", card.outerHTML);
    });

    // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
    carousel.classList.add("no-transition");
    carousel.scrollLeft = carousel.offsetWidth;
    carousel.classList.remove("no-transition");

    // Add event listeners for the arrow buttons to scroll the carousel left and right
    arrowBtns.forEach(btn => {
      btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
      });
    });

    const dragStart = (e) => {
      isDragging = true;
      carousel.classList.add("dragging");
      // Records the initial cursor and scroll position of the carousel
      startX = e.pageX;
      startScrollLeft = carousel.scrollLeft;
    }

    const dragging = (e) => {
      if (!isDragging) return; // if isDragging is false return from here
      // Updates the scroll position of the carousel based on the cursor movement
      carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
    }

    const dragStop = () => {
      isDragging = false;
      carousel.classList.remove("dragging");
    }

    const infiniteScroll = () => {
      // If the carousel is at the beginning, scroll to the end
      if (carousel.scrollLeft === 0) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
        carousel.classList.remove("no-transition");
      }
      // If the carousel is at the end, scroll to the beginning
      else if (Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
      }

      // Clear existing timeout & start autoplay if mouse is not hovering over carousel
      clearTimeout(timeoutId);
      if (!wrapper.matches(":hover")) autoPlay();
    }

    const autoPlay = () => {
      if (window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
      // Autoplay the carousel after every 2500 ms
      timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
    }
    autoPlay();

    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
    carousel.addEventListener("scroll", infiniteScroll);
    wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
    wrapper.addEventListener("mouseleave", autoPlay);
  </script>
</body>

</html>