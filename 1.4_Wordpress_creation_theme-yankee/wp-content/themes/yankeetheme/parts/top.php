<?php
if (is_category()) {
    $title = "Catégorie : " . single_tag_title('', false);
} elseif (is_tag()) {
    $title = "Étiquette : " . single_tag_title('', false);
} elseif (is_search()) {
    $title = "Vous avez recherché : " . get_search_query();
} elseif (is_page()) {
    $title = get_the_title();
} else {
    $title = 'Actualités';
}

?>

<div class="container_top">
    <div class="title">
        <span>welcome to our company</span>
        <h1><?= $title; ?></h1>
    </div>
    <div class="menu">
        <!-- <span onclick="history.go(-1)">back</span> -->
        <a href="<?= home_url('/')?>">home</a>
        <div class="separ"></div>
        <a><?= $title; ?></a>
    </div>
</div>