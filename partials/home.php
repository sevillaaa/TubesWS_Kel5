<?php

    $query = "
        SELECT DISTINCT ?name ?artist ?thumbnail WHERE {
            ?d a muzzy:song;
                rdfs:label ?name;
                muzzy:artist ?artist;
                muzzy:thumbnail ?thumbnail.
        }   LIMIT 6
    ";

    $result = $sparqlJena->query($query);

?>

<!--==================== HOME ====================-->
<section class="section home" id="home">
    <div class="home__container container bd-grid">
        <div class="home__data">
            <h1 class="home__title">Muzzy</h1>
        <h2 class="home__subtitle">Life is Better with Music</h2>
        </div>
        <img src="./assets/img/home.png" alt="Uploaded Image" class="home__pic">
    </div>
</section>

<!--==================== SONGS ====================-->
<section class="section discount">
    <div class="discount__container container">
        <h2 class="section__title">Some of the Songs</h2>
        <div class="trick__container grid">

            <?php if (!isset($result->current()->name)) : ?>
                <div class="not-found-2">Data is not found!</div>
            <?php else : ?>
                <?php foreach ($result as $data) : ?>
                    <a class="trick__content" href="?p=song&keyword=<?= $data->name ?>">
                        <img src="<?= $data->thumbnail ?>" style="height: 150px" alt="" class="trick__img">
                        <div class="trick__sub">
                            <h3 class="trick__title"><?= $data->name ?></h3>
                            <span class="trick__artist"><?= $data->artist ?></span>
                        </div>
                    </a>
                <?php endforeach ?>
            <?php endif ?>
            
        </div>
    </div>
</section>