<html>
    <head>
        <title>Voting system</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <ul class="nav nav-tabs nav-justified">
            <li><a href="index.php">Äänestykset</a></li>
        <?php if (!empty($_SESSION['loggedin'])): ?>
            <li><a href="user.php?id=<?php echo $_SESSION['user_id'] ?>">Oma sivu</a></li>
            <li><a href="logOut.php">Kirjaudu ulos</a></li>        
        <?php else: ?>
            <li><a href="login.php">Kirjaudu sisään</a></li>
            <li><a href="register.php">Rekisteröidy</a></li>
        <?php endif; ?>
        </ul>
                
        <div id="content">
            <?php if (!empty($data->errors)): ?>
                <?php foreach($data->errors as $error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty($_SESSION['message'])): ?>
                <div class="alert alert-success">
                  <?php echo $_SESSION['message']; ?>
                </div>
              <?php
                unset($_SESSION['message']); 
                endif;
              ?>
            <?php require 'views/'.$sivu; ?>
        </div>
    </body>
</html>


