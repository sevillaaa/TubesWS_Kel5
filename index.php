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
        const
            // image = document.getElementById('cover'),
            // title = document.getElementById('music-title'),
            // artist = document.getElementById('music-artist'),
            currentTimeEl = document.getElementById('current-time'),
            durationEl = document.getElementById('duration'),
            progress = document.getElementById('progress'),
            playerProgress = document.getElementById('player-progress'),
            prevBtn = document.getElementById('prev'),
            nextBtn = document.getElementById('next'),
            playBtn = document.getElementById('play'),
            background = document.getElementById('bg-img');

        const music = new Audio();

        const songs = [
            {
                path: 'assets/song/1.mp3',
                // displayName: 'The Charmer\'s Call',
                // cover: 'assets/img/mltr.jpg',
                // artist: 'Hanu Dixit',
            }
        ];

        let musicIndex = 0;
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
            // Change play button icon
            playBtn.classList.replace('fa-play', 'fa-pause');
            // Set button hover title
            playBtn.setAttribute('title', 'Pause');
            music.play();
        }

        function pauseMusic() {
            isPlaying = false;
            // Change pause button icon
            playBtn.classList.replace('fa-pause', 'fa-play');
            // Set button hover title
            playBtn.setAttribute('title', 'Play');
            music.pause();
        }

        function loadMusic(song) {
            music.src = song.path;
            // title.textContent = song.displayName;
            // artist.textContent = song.artist;
            // image.src = song.cover;
            // background.src = song.cover;
        }

        function changeMusic(direction) {
            musicIndex = (musicIndex + direction + songs.length) % songs.length;
            loadMusic(songs[musicIndex]);
            playMusic();
        }

        function updateProgressBar() {
            const { duration, currentTime } = music;
            const progressPercent = (currentTime / duration) * 100;
            progress.style.width = `${progressPercent}%`;

            const formatTime = (time) => String(Math.floor(time)).padStart(2, '0');
            durationEl.textContent = `${formatTime(duration / 60)}:${formatTime(duration % 60)}`;
            currentTimeEl.textContent = `${formatTime(currentTime / 60)}:${formatTime(currentTime % 60)}`;
        }

        function setProgressBar(e) {
            const width = playerProgress.clientWidth;
            const clickX = e.offsetX;
            music.currentTime = (clickX / width) * music.duration;
        }

        playBtn.addEventListener('click', togglePlay);
        prevBtn.addEventListener('click', () => changeMusic(-1));
        nextBtn.addEventListener('click', () => changeMusic(1));
        music.addEventListener('ended', () => changeMusic(1));
        music.addEventListener('timeupdate', updateProgressBar);
        playerProgress.addEventListener('click', setProgressBar);

        loadMusic(songs[musicIndex]);
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