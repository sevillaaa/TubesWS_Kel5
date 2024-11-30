<?php
error_reporting(E_ALL & ~E_DEPRECATED);
require "./include/functions.php";
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="assets/img/Muzzy.png" type="image/x-icon">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== SWIPER CSS ===============--> 
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

        <!--=============== CSS ===============--> 
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <title>Muzzy</title>
    </head>

    <body>
    <!--=============== NAVBAR ===============-->
    <?php include "./layouts/header.php" ?>
    <!-- Navbar End -->

    <!--=============== MAIN ===============-->
    <?php include "./layouts/main.php" ?>
    <!-- Main End -->

    <!--=============== FOOTER ===============-->
    <?php include "./layouts/footer.php" ?>
    <!-- Footer End -->


    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>

    <!--=============== SEARCH BAR JS ===============-->
    <script>
        const toggleSearch = (search, button) =>{
            const searchBar = document.getElementById(search),
            searchButton = document.getElementById(button) 
            
            searchButton.addEventListener('click', () =>{
                searchBar.classList.toggle('show-search')
            })
        }
        toggleSearch('search-bar', 'search-button')
    </script>

    <script>
        const songPath = <?= json_encode($songPath) ?>;
    </script>

    <script>
        const playBtn = document.getElementById('play');
        const currentTimeEl = document.getElementById('current-time');
        const durationEl = document.getElementById('duration');
        const progress = document.getElementById('progress');
        const playerProgress = document.getElementById('player-progress');

        const music = new Audio(songPath);

        let isPlaying = false;

        function togglePlay() {
            if (isPlaying) {
                pauseMusic();
            } else {
                playMusic();
            }
        }

        function playMusic() {
            isPlaying = true;
            playBtn.classList.replace('fa-play', 'fa-pause');
            playBtn.setAttribute('title', 'Pause');
            music.play();
        }

        function pauseMusic() {
            isPlaying = false;
            playBtn.classList.replace('fa-pause', 'fa-play');
            playBtn.setAttribute('title', 'Play');
            music.pause();
        }

        function updateProgressBar() {
            const { duration, currentTime } = music;
            const progressPercent = (currentTime / duration) * 100;
            progress.style.width = `${progressPercent}%`;

            const formatTime = (time) => {
                const minutes = Math.floor(time / 60);
                const seconds = Math.floor(time % 60).toString().padStart(2, '0');
                return `${minutes}:${seconds}`;
            };

            durationEl.textContent = duration ? formatTime(duration) : '0:00';
            currentTimeEl.textContent = formatTime(currentTime);
        }

        function setProgressBar(e) {
            const width = playerProgress.clientWidth;
            const clickX = e.offsetX;
            music.currentTime = (clickX / width) * music.duration;
        }

        playBtn.addEventListener('click', togglePlay);
        music.addEventListener('timeupdate', updateProgressBar);
        playerProgress.addEventListener('click', setProgressBar);
    </script>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== JS ===============-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/music.js"></script>

    </body>
</html>