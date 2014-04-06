<div class="container">
    <h2><?php echo $data->user->getUsername() ?></h2>
    <form action="doEditUser.php?id=<?php echo $data->user->getId(); ?>" method="POST">       
        Vanha salasana: <br><input type="password" name="password" class="form-control"><br>
        Uusi salasana: <input type="password" class="form-control" name="newpassword"><br>    
        Uudelleen: <input type="password" class="form-control" name="newpasswordconf"><br>  
        <input type="hidden" name="id" value="<?php echo $data->user->getId(); ?>">
        <input type="submit" value="Vaihda salasana" class="btn btn-primary">
    </form>
</div>

