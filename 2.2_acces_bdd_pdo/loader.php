<?php
session_start();
// var_dump($_SESSION, $_POST, $_GET);

// SERVICE
require_once $_SERVER['DOCUMENT_ROOT'] . "/services/bdd.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/services/flash_message.php";

// MODEL
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/media.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/type.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/user.php";

// CONTROLLER
require_once $_SERVER['DOCUMENT_ROOT'] . "/controlers/connexion.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/controlers/router.php";
