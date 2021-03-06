<?php
require_once 'libs/tietokantayhteys.php';
require_once 'libs/common.php';
require_once 'libs/models/poll.php';
    
$id = (int)$_POST['id'];
$poll = Poll::findPoll($id);

if ($poll->getUserId() != $_SESSION['user_id']) {
    $_SESSION['message'] = "You need to be logged in as the right user";
    header('Location: index.php');
    exit;
}

$poll->setDescription($_POST['description']);
$poll->setEndDate($_POST['end_date']);

if ($poll->isValid()) {
    $poll->update();
    $_SESSION['message'] = "Poll updated successfully";
    header('Location: userPolls.php');
}else {
    naytaNakyma('editPoll.php', array('poll'=>$poll, 'errors'=>$poll->getErrors()));
}
