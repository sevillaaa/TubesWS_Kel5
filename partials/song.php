<?php
    $keyword = $_GET['keyword'];

    $query = "
        SELECT DISTINCT ?name ?artist ?lyrics ?genre ?record ?thumbnail ?date ?writer ?album ?producer WHERE {
            ?d a muzzy:song;
                rdfs:label ?name;
                muzzy:artist ?artist;
                muzzy:lyrics ?lyrics;
                muzzy:genre ?genre;
                muzzy:recordLabel ?record;
                muzzy:thumbnail ?thumbnail;
                muzzy:released ?date;
                muzzy:writer ?writer;
                muzzy:album ?album;
                muzzy:producer ?producer .
            FILTER(?name = '$keyword') .
        }
    ";

    $result = $sparqlJena->query($query)->current();

    if ($result) {
        $songPath = "assets/song/" . str_replace(' ', '_', $result->name) . ".mp3";
    } else {
        die('Song not found!');
    }

?>

<section class="home container" id="home">
<!-- <div class="home__container bd-container bd-grid"> -->
</section>

<!--==================== SONG ====================-->
<section class="section discount">
<div class="discount__container container ">
    <div class="music__containerr">
    <div class="music__container">
        <div class="player-img">
            <img src="<?= $result->thumbnail ?>" class="active" id="cover">
        </div>

        <h2 id="" class="music__h2"><?= $result->name ?></h2>
        <h3 id="" class="music__h3"><?= $result->artist ?></h3>

        <div class="player-progress" id="player-progress">
            <div class="progress" id="progress"></div>
            <div class="music-duration">
                <span id="current-time">0:00</span>
                <span id="duration">0:00</span>
            </div>
        </div>

        <div class="player-controls">
            <!-- <i class="fa-solid fa-backward" title="Previous" id="prev"></i> -->
            <i class="fa-solid fa-play play-button" title="Play" id="play"></i>
            <!-- <i class="fa-solid fa-forward" title="Next" id="next"></i> -->
        </div>

    </div>

    <div class="song__data">
    <table class="song__info">
        <tr>
            <td>Genre</td>
            <td> : </td>
            <td><?= $result->genre ?></td>
        </tr>
        <tr>
            <td>Album</td>
            <td> : </td>
            <td><?= $result->album ?></td>
        </tr>
        <tr>
            <td>Release Date</td>
            <td> : </td>
            <td><?= $result->date ?></td>
        </tr>
        <tr>
            <td>Producer</td>
            <td> : </td>
            <td><?= $result->producer ?></td>
        </tr>
        <tr>
            <td>Label</td>
            <td> : </td>
            <td><?= $result->record ?></td>
        </tr>
        <tr>
            <td>Writer</td>
            <td> : </td>
            <td><?= $result->writer ?></td>
        </tr>
    </table>
    </div>
    </div>
    
    <h2 class="song__lyrics">
    <?= nl2br(htmlspecialchars($result->lyrics)) ?> <?= $result->lyrics ?>
    </h2>
</div>
</section>
