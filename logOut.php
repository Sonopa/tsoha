<?php
session_start();

unset($_SESSION["loggedin"]);
unset($_SESSION["user_id"]);

header('Location: login.php');


