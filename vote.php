<?php
require_once 'libs/common.php';
require_once 'libs/models/vote.php';
require_once 'libs/models/option.php';
require_once 'libs/tietokantayhteys.php';

$vote = new Vote();
$vote->setPollId($_POST['poll_id']);
$vote->setUserId($_SESSION['user_id']);
$r = $_POST['poll_id'];
if ($vote->isValid()) {
    $vote->addIntoDatabase($_POST['vote']);
    $_SESSION['message'] = "Vote succesfully registered";    
    header("Location: poll.php?id=$r");
}else {   
    $_SESSION['message'] = "You have already given your vote for this poll";
    header("Location: poll.php?id=$r");
}


