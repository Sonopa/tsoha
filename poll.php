<?php
require_once 'libs/common.php';
require_once 'libs/models/poll.php';
require_once 'libs/models/option.php';
require_once 'libs/tietokantayhteys.php';

$id = (int)$_GET['id'];
$poll = Poll::findPoll($id);

if ($poll != null) {
    naytaNakyma('poll.php', array('poll' => $poll));
}else {
    naytaNakyma('poll.php', array('poll' => null, 'error' => 'Poll was not found'));
}


