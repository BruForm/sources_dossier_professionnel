<?php
$pageTitle = "list-medias";
$customCssLinks = ['<link rel="stylesheet" href="list-medias.css">'];

// Header
include_once $_SERVER['DOCUMENT_ROOT'] . "/partials/header.php";
?>

<!-- PAGE CODE -- DEBUT -->

<h1>Liste des média</h1>

<!-- <?= "<PRE>" . var_dump($db) . "</PRE>"; ?> -->

<div class="container-data">
    <?php foreach ($medias as $media) : ?>
        <form action="" class="one-row">
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="<?= $media['title'] ?>">
            <label for="creator">Créateur :</label>
            <input type="text" name="creator" id="creator" value="<?= $media['creator'] ?>">
            <label for="type_id">Type :</label>
            <input type="text" name="type_id" id="type_id" value="<?= $media['name'] ?>">
            <input type="hidden" name="id" id="id" value="<?= $media['id'] ?>" >
        </form>
    <?php endforeach ?>

    <a href="add-media.php?action=view-add-media"><button>Créer un medium</button></a>

</div>

<!-- PAGE CODE -- FIN -->

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/partials/footer.php";
?>