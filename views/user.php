<div class="container">
    <h2><?php echo $data->user->getUsername() ?></h2>
    <div class="col-md-3">     
        <p><a href="editUser.php?id=<?php echo $_SESSION['user_id'] ?>" class="btn btn-primary">Vaihda salasana</a></p>
        <p><a href="userPolls.php" class="btn btn-primary">Omat äänestykset</a></p>
        <p>
            <form action="deleteUser.php?id=<?php echo $_SESSION['user_id'] ?>" method="POST" onSubmit="return confirm('Oletko varma että haluat poistaa käyttäjän?')">
                <input type="submit" value="Poista käyttäjä" class="btn btn-primary">
            </form>
        </p>
    </div>
</div>

