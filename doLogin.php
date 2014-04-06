<?php
  require_once 'libs/common.php';
  require_once "libs/models/user.php";
  require_once "libs/tietokantayhteys.php";  
  
  if (empty($_POST["username"]) || empty($_POST["password"])) {
     /* Käytetään omassa kirjastotiedostossa määriteltyä näkymännäyttöfunktioita */
    naytaNakyma("login.php", array('user' => $_POST["username"], 'errors' => array("Can't log in. You need to fill the username and password fields")));
  }

  $username = $_POST["username"];
  $pw = $_POST["password"];
  
  /* Tarkistetaan onko parametrina saatu oikeat tunnukset */
  $user = User::etsiKayttajaTunnuksilla($username, $pw);
  if (!empty($user)) {    
    $_SESSION['loggedin'] = $user;
    $_SESSION['user_id'] = $user->getId();
    /* Jos tunnus on oikea, ohjataan käyttäjä indexiin. */
    header('Location: index.php');
  } else {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    naytaNakyma("login.php", array('user'=> $username, 'errors' => array("Wrong username or password")));
  }

