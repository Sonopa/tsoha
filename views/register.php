<div class="container">
    <h2>Rekisteröidy</h2>
    
    <?php if (!empty($data->error)): ?>
        <div class="alert alert-danger"><?php echo $data->error; ?></div>
    <?php endif; ?>
        
    <form action="doRegistration.php" method="POST">
        Username: <input type="text" name="username" class="form-control" value="<?php echo $data->user; ?>"><br>
        Password: <input type="password" name="password" class="form-control"><br>
        Password confirmation: <input type="password" name="passwordconf" class="form-control"><br>
        <input type="submit" value="Rekisteröidy" class="btn btn-primary">
    </form>
</div>

