<?php
require_once 'libs/common.php';
require_once 'libs/models/user.php';
require_once 'libs/tietokantayhteys.php'; 

$user = User::getUserById($_GET['id']);

if ($user->getId() == $_SESSION['user_id']) {
    $user->delete();
    $_SESSION['message'] = "User successfully deleted";
    unset($_SESSION["loggedin"]);
    unset($_SESSION["user_id"]);
    header('Location: index.php');
} else {
    naytaNakyma('index.php', array('errors'=>array("You must be logged in as the right user")));
}

