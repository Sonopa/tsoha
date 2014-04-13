<?php
require_once 'libs/common.php';
require_once 'libs/models/user.php';
require_once 'libs/tietokantayhteys.php';

$id = (int)$_GET['id'];
$user = User::getUserById($id);

if ($user->getId() == $_SESSION['user_id']) {
    if ($user != null) {
        naytaNakyma('user.php', array('user' => $user));
    }else {
        naytaNakyma('user.php', array('user' => null, 'error' => 'User was not found'));
    }
}else {
    header('Location: index.php');
}


