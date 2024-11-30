<?php
if (isset($_POST["keyword"])) {
    $keyword = $_POST["keyword"];

    $query = "
        SELECT DISTINCT ?name ?artist ?thumbnail WHERE {
            ?d a muzzy:song;
                rdfs:label ?name;
                muzzy:artist ?artist;
                muzzy:genre ?genre;
                muzzy:recordLabel ?record;
                muzzy:thumbnail ?thumbnail;
                muzzy:released ?date;
                muzzy:writer ?writer;
                muzzy:album ?album;
                muzzy:producer ?producer .
            FILTER ( REGEX (?name, '$keyword', 'i') ||
                    REGEX (?artist, '$keyword', 'i') ||
                    REGEX (?genre, '$keyword', 'i') ||
                    REGEX (?record, '$keyword', 'i') ||
                    REGEX (?date, '$keyword', 'i') ||
                    REGEX (?writer, '$keyword', 'i') ||
                    REGEX (?album, '$keyword', 'i') ||
                    REGEX (?producer, '$keyword', 'i')) .
        }
        ORDER BY ?name
    ";

    $result = $sparqlJena->query($query);
} else {
    $query = "
        SELECT DISTINCT ?name ?artist ?thumbnail WHERE {
            ?d a muzzy:song;
                rdfs:label ?name;
                muzzy:artist ?artist;
                muzzy:thumbnail ?thumbnail.
        }
        ORDER BY ?name
    ";

    $result = $sparqlJena->query($query);
}
?>

<!--==================== SEARCH BAR ====================-->
<div class="search__container">
    <form method="POST" class="search" id="search-bar">
        <input type="text" placeholder="Search song..." name="keyword" class="search__input">

        <div class="search__button" id="search-button">
            <i class="ri-search-2-line search__icon"></i>
            <i class="ri-close-line search__close"></i>
        </div>
    </form>
</div>

<!--==================== ALL SONG ====================-->
<section class="section trick" id="trick">
    <!-- <h2 class="section__title">About Us</h2> -->

    <div class="trick__container container grid">

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
</section>