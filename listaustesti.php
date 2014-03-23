<?php
//require_once sisällyttää annetun tiedoston vain kerran
require_once "libs/user.php";
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
            <li><?php echo $asia->getName(); ?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>

