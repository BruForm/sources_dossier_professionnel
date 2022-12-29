<?php
$pageTitle = "list-users";
$customCssLinks = ['<link rel="stylesheet" href="list-users.css">'];

// Header
include_once "../partials/header.php";
?>

<!-- PAGE CODE -- DEBUT -->

<h1>Liste des utilisateurs</h1>
<!-- <?= "<PRE>" . var_dump($db) . "</PRE>"; ?> -->

<div class="container-data">
    <?php foreach ($users as $user) : ?>
        <form action="" class="one-row">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="<?= $user['name'] ?>">
            <label for="email">e-mail</label>
            <input type="text" name="email" id="email" value="<?= $user['email'] ?>">
            <label for="password">Mot de passe</label>
            <input type="text" name="password" id="password" value="<?= $user['password'] ?>">
        </form>
    <?php endforeach ?>

    <a href="add-user.php?action=view-add-user"><button>Créer un utilisateur</button></a>

</div>

<!-- PAGE CODE -- FIN -->

<?php
include_once "../partials/footer.php"
?>