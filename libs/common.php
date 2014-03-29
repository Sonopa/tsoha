<?php
  session_start();
  
  function naytaNakyma($sivu, $data = array()) {
      $data = (object)$data;
      require 'views/template.php';
      exit();
  }
  
  function isLoggedIn() {
      if (!empty($_SESSION['loggedin'])) {
          return true;
      }
  }

