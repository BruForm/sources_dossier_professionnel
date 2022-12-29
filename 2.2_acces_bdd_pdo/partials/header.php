<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $pageTitle ?></title>

    <link rel="stylesheet" href="../style.css">

    <?php
    if (isset($customCssLinks) && !empty($customCssLinks)) {
        foreach ($customCssLinks as $customCssLink) {
            echo $customCssLink;
        }
    }
    ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
    ?>
    <div class="nav-bar bg-dark">
        <div class="back-menu-btn">
            <a href="../index.php">
                <button type="button" class="btn btn-dark">
                    Menu
                </button>
            </a>
        </div>
        <div class="connexion-btn">
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="../index.php?action=disconnexion">
                    <button type="button" class="btn btn-dark">
                        Déconnexion
                    </button>
                </a>
            <?php else : ?>
                <a href="../views/connexion.php?action=connexion">
                    <button type="button" class="btn btn-dark">
                        Connexion
                    </button>
                </a>
            <?php endif ?>
            <div class="connexion-tag">
                <?php if (isset($_SESSION['user']['name']) && isset($_COOKIE['user']) && $_COOKIE['user']['id'] != "" && $_COOKIE['user']['email'] != "") : ?>
                    <span class="text-light">( <?= $_SESSION['user']['name'] ?> )</span>
                <?php endif ?>
            </div>
        </div>
    </div>

    <!-- <?= "<PRE>" . var_dump($_SESSION['messages']) . "</PRE>"; ?> -->
    <?php showMessage(); ?>

    <div class="container">
        <div class="row">
            <div class="col-12">