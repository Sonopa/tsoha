<?php
require_once 'libs/models/option.php';
require_once 'libs/common.php';
require_once 'libs/models/poll.php';
require_once 'libs/tietokantayhteys.php'; 

if (!isLoggedIn()) {
    $_SESSION['message'] = "You need to be logged in to create a poll";
    header('Location: index.php');
    exit;
}

$new_poll = new Poll();
$new_poll->setTopic($_POST['topic']);
$new_poll->setDescription($_POST['description']);
$new_poll->setStartDate(date("Y-m-d"));
$new_poll->setEndDate($_POST['end_date']);
$new_poll->setUserId($_SESSION['user_id']);

$options = array();
foreach ($_POST['options'] as $option) {
    if ($option != "") {
        $new_option = new Option();
        $new_option->setOptionName($option);
        $new_option->setVoteCount(0);
        $options[] = $new_option; 
    }       
}

/* tarkistetaan ovatko kaikki annetut vaihtoehdot oikein */
$options_valid = true;
foreach ($options as $option) {
    if (!$option->isValid()) {        
        $options_valid = false;
    }
}

/* validoidaan äänestyksen tiedot, vaihtoehtojen määrä ja muoto */
if ($new_poll->isValid() and (sizeof($options) > 1) and $options_valid ) {
    $new_poll->addIntoDatabase();
    foreach ($options as $option) {
        if ($option->isValid()) {
            $option->setPollId($new_poll->getId());
            $option->addIntoDatabase();
        }
    }   
    $_SESSION['message'] = "Poll created successfully";
    header('Location: index.php');
}else if(sizeof($options) <= 1) {
    $errors = array("You need to give at least 2 options");
    naytaNakyma('newpoll.php', array('poll'=> $new_poll, 'errors'=>$errors));    
}else {
    $errors = $new_poll->getErrors();
    foreach ($options as $option) {
    if (!$option->isValid()) {
        $errors += $option->getErrors(); 
    }}
    naytaNakyma('newpoll.php', array('poll'=> $new_poll, 'errors'=>$errors));    
}
