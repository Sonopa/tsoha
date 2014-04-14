<?php

require_once "libs/models/user.php";
require_once "libs/tietokantayhteys.php";

//Lista asioista array-tietotyyppiin laitettuna:
$lista = User::etsiKaikkiKayttajat();
?><!DOCTYPE HTML>
<html>
    <head>
        <title>Listaustesti</title>
    </head>
    <body>
        <h1>Users</h1>
        <ul>
            <?php foreach($lista as $asia): ?>
            <li><?php echo $asia->getUsername(); ?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>

