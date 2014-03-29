<div class="container">
    <h2>Kirjaudu sisään</h2>
    
    <form action="doLogin.php" method="POST">
        Username: <input type="text" name="username" value="<?php echo $data->user; ?>"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Kirjaudu">
    </form>
</div>


