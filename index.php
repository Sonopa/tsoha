<?php
  require_once 'libs/common.php';
  require_once 'libs/models/poll.php';
  require_once "libs/tietokantayhteys.php";  
  
  $polls = Poll::getAllActivePolls();
  $expiredpolls = Poll::getAllExpiredPolls();
  naytaNakyma('index.php', array('polls' => $polls));

