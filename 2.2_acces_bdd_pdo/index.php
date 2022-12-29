<?php
$pageTitle = "index";
$customCssLinks = ["<link rel='stylesheet' href='./index.css'>"];

// Header
include_once "./partials/header.php";
?>

<!-- PAGE CODE -- DEBUT -->

<H1>Ma médiathèque</H1>


<ul>
    <li><a href="./views/list-medias.php?action=list-medias">Liste des média</a></li>
    <li><a href="./views/add-media.php?action=add-media">Ajouter un médium</a></li>
    <li><a href="./views/list-types.php?action=list-types">Liste des types</a></li>
    <li><a href="./views/add-type.php?action=add-type">Ajouter un type</a></li>
    <li><a href="./views/list-users.php?action=list-users">Liste des utilisateurs</a></li>
    <li><a href="./views/add-user.php?action=view-add-user">Ajouter un utilisateur</a></li>
    
</ul>

<!-- PAGE CODE -- FIN -->

<?php
include_once "./partials/footer.php"
?>