<?php
$pageTitle = "Connexion";
$customCssLinks = ["<link rel='stylesheet' href='connexion.css'>"];

// Header
include_once "../partials/header.php";
?>

<!-- PAGE CODE -- DEBUT -->

<h1>Page de connexion</h1>

<div class="container-data">
    <form action="../loader.php?action=connexion-check" class="one-row" method="POST">
        <div>
            <label for="email">E-mail :</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="text" name="password" id="password">
        </div>
        <button type="submit">Se connecter</button>
    </form>
</div>

<!-- PAGE CODE -- FIN -->

<?php
include_once "../partials/footer.php"
?>