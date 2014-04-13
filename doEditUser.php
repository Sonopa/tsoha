<?php
require_once 'libs/tietokantayhteys.php';
require_once 'libs/common.php';
require_once 'libs/models/user.php';

$id = (int)$_POST['id'];
$user = User::getUserById($id);

if ($user->getId() != $_SESSION['user_id']) {
    $_SESSION['message'] = "You need to be logged in as the right user";
    header('Location: index.php');
    exit;
}

$r = $_POST['id'];
if ($_POST['password'] == $user->getPassword() and $_POST['newpassword'] == $_POST['newpasswordconf']) {
    $user->setPassword($_POST['newpassword']);
    $user->update();
    
    $_SESSION['message'] = "Password changed successfully";
    header("Location: user.php?id=$r");
}else {
    naytaNakyma('editUser.php', array('user'=>$user, 'errors'=>array("Some password did not match")));
}


