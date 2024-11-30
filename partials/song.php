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

    // $lyrics = nl2br(htmlspecialchars($result->lyrics));
    $lyrics = nl2br($result->lyrics);

?>

<section class="home container" id="home">
<!-- <div class="home__container bd-container bd-grid"> -->
</section>

<!--==================== SONG ====================-->
<section class="section discount">
<div class="discount__container container bd-grid">
    <div>
    <div class="music__container">
        <div class="player-img">
            <img src="./assets/img/mltr.jpg" class="active" id="cover">
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
            <td>Album</td>
            <td><?= $result->album ?></td>
        </tr>
        <tr>
            <td>Release Date</td>
            <td><?= $result->date ?></td>
        </tr>
        <tr>
            <td>Producer</td>
            <td><?= $result->producer ?></td>
        </tr>
        <tr>
            <td>Label</td>
            <td><?= $result->record ?></td>
        </tr>
        <tr>
            <td>Writer</td>
            <td><?= $result->writer ?></td>
        </tr>
    </table>
        <!-- <h2 class="song__lyrics">
            Album : Michael Learns to Rock <br>
            Release Date : 1991-11-11 <br>
            Producers : Oli Poulsen & Jens Hofman <br>
            Label : Impact Medley Records <br>
            Writer : Jascha Richter <br>
        </h2> -->
    </div>
    </div>
    
    <h2 class="song__lyrics">
        <?= $result->lyrics ?>
    </h2>
</div>
</section>
