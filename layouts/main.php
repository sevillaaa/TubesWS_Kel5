<?php

if ($_GET) {
    switch ($_GET['p']) {
        case "allsongs":
            include "./partials/allsongs.php";
            break;
        case "about":
            include "./partials/about.php";
            break;
        case "song":
            include "./partials/song.php";
            break;
        default:
            echo "
                <div class='not-found'>404 Page Not Found</div>
            ";
            break;
    }
} else {
    include "./partials/home.php";
}