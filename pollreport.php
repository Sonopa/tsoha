<?php
require_once 'libs/common.php';
require_once 'libs/models/poll.php';
require_once 'libs/models/option.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/vote.php';

$id = (int)$_GET['id'];
$poll = Poll::findPoll($id);
$results = Option::getOptions($poll->getId());
$total = Poll::getVoteCount($poll->getId());
$winners = Poll::getResults($poll->getId());

if ($poll->getUserId() == $_SESSION['user_id']) {
    naytaNakyma('pollreport.php', array('poll' => $poll, 'results'=>$results, 'total'=>$total, 'winners'=>$winners));
}else {
    header('Location: index.php');
}


