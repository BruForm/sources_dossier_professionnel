<?php
$byPage = 5;
$currentPage = 1;

try {
    $resultat = null;
    $db = connectBD('localhost', 'root', '', 'mediatheque');

    checkCookieConnexion($db);

    if (isset($_GET['action']) and $_GET['action'] != null) {
        if ($_GET['action'] == 'connexion') {
        } elseif ($_GET['action'] == 'connexion-check') {
            connexionCheck($db);
        } elseif ($_GET['action'] == 'disconnexion') {
            disconnexion();
        } elseif ($_GET['action'] == 'list-medias') {
            $medias = listMediasTypeName($db, $currentPage = 0, $parPage = 0);
        } elseif ($_GET['action'] == 'view-add-media') {
            $types = listTypes($db);
        } elseif ($_GET['action'] == 'add-media') {
            addMedia($db);
        } elseif ($_GET['action'] == 'list-types') {
            $types = listTypes($db);
        } elseif ($_GET['action'] == 'view-add-type') {
        } elseif ($_GET['action'] == 'add-type') {
            addType($db);
        } elseif ($_GET['action'] == 'list-users') {
            $users = listUsers($db);
        } elseif ($_GET['action'] == 'view-add-user') {
        } elseif ($_GET['action'] == 'add-user') {
            addUser($db);
        } else {
            header('Location: index.php');
        }
    }

    $db = null;
} catch (PDOException $e) {
    var_dump($e);
}
