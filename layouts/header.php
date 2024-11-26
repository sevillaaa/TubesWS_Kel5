<!--==================== HEADER ====================-->
<header class="header" id="header">
            <nav class="nav">
                <div class="navv__logo">
                <a href="#" class="nav__logo">
                    <img src="./assets/img/Muzzy.png" alt="" class="nav__logo-img">
                    Muzzy
                </a>
                </div>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href=".layouts/.." class="nav__link <?= !isset($_GET['p']) ? 'active-link' : '' ?>">Home</a>
                        </li>

                        <li class="nav__item">
                            <a href="?p=allsongs" class="nav__link <?php if (isset($_GET['p']) && $_GET['p'] == 'allsongs') echo 'active-link'; ?>">All Song</a>
                        </li>

                        <li class="nav__item">
                            <a href="?p=about" class="nav__link <?php if (isset($_GET['p']) && $_GET['p'] == 'about') echo 'active-link'; ?>">About</a>
                        </li>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x'></i>
                    </div>

                    <img src="assets/img/nav-img.png" alt="" class="nav__img">
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>

            </nav>
        </header>