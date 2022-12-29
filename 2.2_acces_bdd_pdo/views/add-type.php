<?php
$pageTitle = "add-type";
$customCssLinks = ['<link rel="stylesheet" href="add-type.css">'];

// Header
include_once "../partials/header.php";
?>

<!-- PAGE CODE -- DEBUT -->

<h1>Ajouter un type de media</h1>
<!-- <?= "<PRE>" . var_dump($db) . "</PRE>"; ?> -->

<div class="container-data">
    <form action="../loader.php?action=add-type" class="one-row" method="POST">
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name">
        </div>
        <button type="submit">Enregistrer</button>
    </form>
</div>

<!-- PAGE CODE -- FIN -->

<?php
include_once "../partials/footer.php"
?>
