<?php
  require_once 'libs/common.php';
  require_once 'libs/models/poll.php';
  require_once 'libs/models/option.php';
  require_once 'libs/tietokantayhteys.php';  
  
  $polls = Poll::getAllActivePolls();
  $expiredpolls = Poll::getAllExpiredPolls(); //päättyneet äänestykset
  naytaNakyma('index.php', array('polls' => $polls, 'expiredpolls' => $expiredpolls));

