<?php
require_once 'libs/tietokantayhteys.php'; 
require_once 'libs/models/user.php';
require_once 'libs/common.php';

if ($_POST['password'] == $_POST['passwordconf']) {
    $new_user = new User();
    $new_user->setUsername($_POST['username']);
    $new_user->setPassword($_POST['password']);

    if ($new_user->isValid()) {
        $new_user->addIntoDatabase();
        $_SESSION['message'] = "Registration successful";
        header('Location: login.php');
    } else {
        naytaNakyma('register.php', array('user'=> $new_user, 'errors'=>$new_user->getErrors())); 
    }
}


