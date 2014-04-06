<?php
require_once 'libs/tietokantayhteys.php';
require_once 'libs/common.php';
require_once 'libs/models/poll.php';

$id = (int)$_GET['id'];
$poll = Poll::findPoll($id);

naytaNakyma('editPoll.php', array('poll'=>$poll));

