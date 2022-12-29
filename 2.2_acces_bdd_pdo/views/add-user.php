<?php
$pageTitle = "add-user";
$customCssLinks = ["<link rel='stylesheet' href='add-user.css'>"];

// Header
include_once "../partials/header.php";
?>

<!-- PAGE CODE -- DEBUT -->

<h1>Ajouter un utilisateur</h1>
<!-- <?= "<PRE>" . var_dump($db) . "</PRE>"; ?> -->

<div class="container-data">
    <form action="../loader.php?action=add-user" class="one-row" method="POST">
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="email">e-mail :</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="text" name="password" id="password">
        </div>
        <button type="submit">Enregistrer</button>
    </form>
</div>

<!-- PAGE CODE -- FIN -->

<?php
include_once "../partials/footer.php"
?>