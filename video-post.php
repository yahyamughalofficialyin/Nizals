
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
<link rel="stylesheet" href="css/video-post.css">
</head>

<body>
  
<?php include "sidebar.php" ?>
<?php
include "config.php";
if (isset($_GET['video_id'])) {
    $video_id = $_GET['video_id'];
} else {
    // Handle the case when no video ID is provided
    echo "Video ID not provided.";
    exit;
}

$video_query = "SELECT p.*, c.first_name, c.last_name, c.dp FROM post p
                INNER JOIN client c ON p.cl_id = c.c_id
                WHERE p.post_id = '$video_id' AND p.type ='video' ";
$video_result = mysqli_query($conn, $video_query);

if ($row = mysqli_fetch_assoc($video_result)) {
   
?>
  <a href="account.php">
    <div class="account-and-caption-in-video-post-main">
      <img src="<?php echo $row['dp']; ?>" alt="">
      <h4><?php echo $row['first_name'] . " " . $row['last_name']; ?></h4>
    </div>
  </a>
  <div class="account-and-caption-in-video-post">
    <p><?php echo $row['caption'] ?></p>
  </div>

  <div class="video-player-in-video-post">
    <div class="custom-container custom-show-controls">
      <div class="custom-wrapper">
        <div class="custom-video-timeline">
          <div class="custom-progress-area">
            <span>00:00</span>
            <div class="custom-progress-bar"></div>
          </div>
        </div>
        <ul class="custom-video-controls">
          <li class="custom-options custom-left">
            <button class="custom-volume"><i class="fa-solid fa-volume-high"></i></button>
            <input type="range" min="0" max="1" step="any">
            <div class="custom-video-timer">
              <p class="custom-current-time">00:00</p>
              <p class="custom-separator"> / </p>
              <p class="custom-video-duration">00:00</p>
            </div>
          </li>
          <li class="custom-options custom-center">
            <button class="custom-skip-backward"><i class="fas fa-backward"></i></button>
            <button class="custom-play-pause"><i class="fas fa-play"></i></button>
            <button class="custom-skip-forward"><i class="fas fa-forward"></i></button>
          </li>
          <li class="custom-options custom-right">
            <div class="custom-playback-content">
              <button class="custom-playback-speed"><span class="material-symbols-rounded">slow_motion_video</span></button>
              <ul class="custom-speed-options">
                <li data-speed="2">2x</li>
                <li data-speed="1.5">1.5x</li>
                <li data-speed="1" class="custom-active">Normal</li>
                <li data-speed="0.75">0.75x</li>
                <li data-speed="0.5">0.5x</li>
              </ul>
            </div>
            <button class="custom-pic-in-pic"><span class="material-icons">picture_in_picture_alt</span></button>
            <button class="custom-fullscreen"><i class="fa-solid fa-expand"></i></button>
          </li>
        </ul>
      </div>
      <video src="admin/upload/post/video/<?php echo $row['post']; ?>"></video>
    </div>

  </div>
  <?php
}
// Close the database connection
mysqli_close($conn);
?>
  



  <script>
    const container = document.querySelector(".custom-container"),
      mainVideo = container.querySelector("video"),
      videoTimeline = container.querySelector(".custom-video-timeline"),
      progressBar = container.querySelector(".custom-progress-bar"),
      volumeBtn = container.querySelector(".custom-volume i"),
      volumeSlider = container.querySelector(".custom-left input");
    currentVidTime = container.querySelector(".custom-current-time"),
      videoDuration = container.querySelector(".custom-video-duration"),
      skipBackward = container.querySelector(".custom-skip-backward i"),
      skipForward = container.querySelector(".custom-skip-forward i"),
      playPauseBtn = container.querySelector(".custom-play-pause i"),
      speedBtn = container.querySelector(".custom-playback-speed span"),
      speedOptions = container.querySelector(".custom-speed-options"),
      pipBtn = container.querySelector(".custom-pic-in-pic span"),
      fullScreenBtn = container.querySelector(".custom-fullscreen i");
    let timer;

    const hideControls = () => {
      if (mainVideo.paused) return;
      timer = setTimeout(() => {
        container.classList.remove("custom-show-controls");
      }, 3000);
    }
    hideControls();

    container.addEventListener("mousemove", () => {
      container.classList.add("custom-show-controls");
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
        return `${minutes}:${seconds}`
      }
      return `${hours}:${minutes}:${seconds}`;
    }

    videoTimeline.addEventListener("mousemove", e => {
      let timelineWidth = videoTimeline.clientWidth;
      let offsetX = e.offsetX;
      let percent = Math.floor((offsetX / timelineWidth) * mainVideo.duration);
      const progressTime = videoTimeline.querySelector("span");
      offsetX = offsetX < 20 ? 20 : (offsetX > timelineWidth - 20) ? timelineWidth - 20 : offsetX;
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
    }

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
        speedOptions.querySelector(".custom-active").classList.remove("custom-active");
        option.classList.add("custom-active");
      });
    });

    document.addEventListener("click", e => {
      if (e.target.tagName !== "SPAN" || e.target.className !== "material-symbols-rounded") {
        speedOptions.classList.remove("show");
      }
    });

    fullScreenBtn.addEventListener("click", () => {
      container.classList.toggle("custom-fullscreen");
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
    playPauseBtn.addEventListener("click", () => mainVideo.paused ? mainVideo.play() : mainVideo.pause());
    videoTimeline.addEventListener("mousedown", () => videoTimeline.addEventListener("mousemove", draggableProgressBar));
    document.addEventListener("mouseup", () => videoTimeline.removeEventListener("mousemove", draggableProgressBar));
  </script>

  <script>
    // Get all the video links
    const videoLinks = document.querySelectorAll(".video-link");

    // Function to play the video without sound and reset to time 0
    const playVideoWithoutSound = (video) => {
      video.currentTime = 0; // Reset video to time 0
      video.muted = true; // Set video to play without sound
      video.play();
    };

    // Function to pause the video and reset the muted property
    const pauseVideo = (video) => {
      video.muted = false; // Reset muted property to false
      video.pause();
    };

    // Add event listeners to each video link
    videoLinks.forEach((videoLink) => {
      const video = videoLink.querySelector("video");

      // Pause the video when the page loads
      pauseVideo(video);

      // Event listener to play the video without sound when hovered
      videoLink.addEventListener("mouseover", () => playVideoWithoutSound(video));

      // Event listener to pause the video and reset the muted property when mouse moves out
      videoLink.addEventListener("mouseout", () => pauseVideo(video));
    });
  </script>

</body>

</html>