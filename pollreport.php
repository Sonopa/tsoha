<?php
require_once 'libs/common.php';
require_once 'libs/models/poll.php';
require_once 'libs/models/option.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/vote.php';

$id = (int)$_GET['id'];
$poll = Poll::findPoll($id);

if ($poll->getUserId() == $_SESSION['user_id']) {
    naytaNakyma('pollreport.php', array('poll' => $poll));
}else {
    header('Location: index.php');
}


