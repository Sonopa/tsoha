<div class="container">
    <h2>Kirjaudu sisään</h2>
    
    <form action="doLogin.php" method="POST">
        Username: <input type="text" name="username" class="form-control" value="<?php echo $data->user; ?>"><br>
        Password: <input type="password" name="password" class="form-control"><br>
        <input type="submit" value="Kirjaudu" class="btn btn-primary">
    </form>
</div>


