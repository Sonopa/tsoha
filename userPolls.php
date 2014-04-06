<?php
require_once 'libs/common.php';
require_once 'libs/models/poll.php';
require_once 'libs/tietokantayhteys.php';

$polls = Poll::getAllUsersPolls($_SESSION['user_id']);

naytaNakyma('userPolls.php', array('polls'=>$polls));


