<div class="container">
    <h2><?php echo $data->user->getUsername() ?></h2>
    <div class="col-md-3">     
        <p><a href="editUser.php?id=<?php echo $_SESSION['user_id'] ?>" class="btn btn-primary">Vaihda salasana</a></p>
        <p><a href="editUser.php?id=<?php echo $_SESSION['user_id'] ?>" class="btn btn-primary">Muuta tietoja</a></p>
        <p><a href="userPolls.php" class="btn btn-primary">Omat äänestykset</a></p>
        <p><a href="raportitid.html" class="btn btn-primary">Äänestysraportit</a></p>           
    </div>
</div>

