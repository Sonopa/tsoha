<?php
require_once 'libs/common.php';
require_once 'libs/models/poll.php';
require_once 'libs/tietokantayhteys.php'; 

$poll = Poll::findPoll($_GET['id']);

if ($poll->getUserId() == $_SESSION['user_id']) {
    $poll->delete();
    $_SESSION['message'] = "Poll successfully deleted";
    header('Location: index.php');
} else {
    naytaNakyma('index.php', array('errors'=>array("You must be logged in as the owner of this poll to delete it")));
}

