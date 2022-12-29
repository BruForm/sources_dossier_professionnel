<?php
// Services pour la gestion de la connexion user

function checkCookieConnexion($db): bool
{
    if (((isset($_COOKIE['user']['id'], $_COOKIE['user']['email']))
            && ($_COOKIE['user']['id'] != "")
            && ($_COOKIE['user']['email'] != "")
        )
        || isset($_SESSION['user'])
    ) {
        if (!isset($_SESSION['user']) || $_SESSION['user']['id'] === "") {
            $user = getUserById($db, $_COOKIE['user']['id']);
            $_SESSION['user'] = $user;
        }
        return true;
    }
    return false;
}

function connexionCheck(PDO $db): bool
{
    if ((isset($_POST['email'], $_POST['password']))
        && ($_POST['email'] != "")
        && ($_POST['password'] != "")
    ) {
        $users = listUsers($db);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        foreach ($users as $user) {
            if ($user['email'] === $email) {
//                if (password_verify($password, $user['password'])) {
                if ($password == $user['password']) {
                    setcookie("user[id]", $user['id'], time() + 60 * 60 * 24 * 30, "/");
                    setcookie("user[email]", $user['email'], time() + 60 * 60 * 24 * 30, "/");
                    $_SESSION['user'] = $user;

                    addMessage("success", "Vous êtes connecté");
                    header('Location: ../index.php');
                    return true;
                }
            }
        }
    }
    addMessage("danger", "Erreur de connexion !");
    header('Location: ../views/connexion.php?action=connexion');
    return false;
}

function disconnexion(): bool
{
    if (
        isset($_COOKIE['user'])
        && ($_COOKIE['user']['id'] != "")
        && ($_COOKIE['user']['email'] != "")
    ) {
        setcookie("user[id]", "", time() - 3600, "/");
        setcookie("user[email]", "", time() - 3600, "/");
        $_SESSION = [];
        session_destroy();

        addMessage("warning", "Vous êtes déconnecté !");
        return true;
    }
    addMessage("danger", "Erreur de déconnexion !");
    // header('Location: ../views/connexion.php?action=connexion');
    return false;
}
