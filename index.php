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

    <!--=============== SCROLL REVEAL ===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>

    </body>
</html>