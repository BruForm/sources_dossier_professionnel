<?php
$pageTitle = "add-media";
$customCssLinks = ['<link rel="stylesheet" href="add-media.css">'];

// Header
include_once "../partials/header.php";
?>

<!-- PAGE CODE -- DEBUT -->

<h1>Ajouter un medium</h1>
<!-- <?= "<PRE>" . var_dump($db) . "</PRE>"; ?> -->

<div class="container-data">
    <form action="../loader.php?action=add-media" class="one-row" method="POST">
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="creator">Créateur :</label>
            <input type="text" name="creator" id="creator">
        </div>
        <div>
            <label for="type_id">Type :</label>
            <select name="type_id" id="type_id">
                <?php foreach ($types as $type) : ?>
                    <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="submit">Enregistrer</button>
    </form>
</div>

<!-- PAGE CODE -- FIN -->

<?php
include_once "../partials/footer.php"
?>