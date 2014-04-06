<?php
require_once 'libs/tietokantayhteys.php';
require_once 'libs/common.php';
require_once 'libs/models/user.php';

$id = (int)$_GET['id'];
$user = User::getUserById($id);

naytaNakyma('editUser.php', array('user'=>$user));

