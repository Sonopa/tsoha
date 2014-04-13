<?php
require_once 'libs/tietokantayhteys.php';
require_once 'libs/common.php';
require_once 'libs/models/user.php';

$id = (int)$_GET['id'];
$user = User::getUserById($id);

if ($user->getId() != $_SESSION['user_id']) {
    $_SESSION['message'] = "You need to be logged in as the right user";
    header('Location: index.php');
    exit;
}

naytaNakyma('editUser.php', array('user'=>$user));

