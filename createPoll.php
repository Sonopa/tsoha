<?php
require_once 'libs/models/option.php';
require_once 'libs/common.php';
require_once 'libs/models/poll.php';
require_once 'libs/tietokantayhteys.php'; 

$new_poll = new Poll();
$new_poll->setTopic($_POST['topic']);
$new_poll->setDescription($_POST['description']);
$new_poll->setStartDate(date("Y-m-d"));
$new_poll->setEndDate($_POST['end_date']);
$new_poll->setUserId($_SESSION['user_id']);
  
$new_option = new Option();
$new_option->setOptionName($_POST['option1']);
$new_option->setVoteCount(0);      

$new_option2 = new Option();
$new_option2->setOptionName($_POST['option2']); 
$new_option2->setVoteCount(0);    

$new_option3 = new Option();
$new_option3->setOptionName($_POST['option3']);
$new_option3->setVoteCount(0);    


if ($new_poll->isValid() and $new_option->isValid() and $new_option2->isValid() and $new_option3->isValid()) {    
    $new_poll->addIntoDatabase();
    $new_option3->setPollId($new_poll->getId());
    $new_option2->setPollId($new_poll->getId());
    $new_option->setPollId($new_poll->getId());  
    $new_option->addIntoDatabase();    
    $new_option2->addIntoDatabase();
    $new_option3->addIntoDatabase();  
    $_SESSION['message'] = "Poll created successfully";
    header('Location: index.php');
}else {
    $errors = $new_poll->getErrors() + $new_option->getErrors() + $new_option2->getErrors() + $new_option3->getErrors();
    naytaNakyma('newpoll.php', array('poll'=> $new_poll, 'errors'=>$errors));    
}
