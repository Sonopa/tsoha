<?php
require_once 'libs/tietokantayhteys.php';
require_once 'libs/common.php';
require_once 'libs/models/poll.php';

$id = (int)$_GET['id'];
$poll = Poll::findPoll($id);

if ($poll->getUserId() != $_SESSION['user_id']) {
    $_SESSION['message'] = "You need to be logged in as the right user";
    header('Location: index.php');
    exit;
}
naytaNakyma('editPoll.php', array('poll'=>$poll));

