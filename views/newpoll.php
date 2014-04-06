<div class="container">
    <h2>Luo uusi äänestys</h2>
    <form action="createPoll.php" method="POST">
        Aihe: <input type="text" class="form-control" name="topic" placeholder="Aihe" value="<?php echo $data->poll->getTopic(); ?>"><br>        
        Kuvaus: <br><textarea name="description" class="form-control" placeholder="Kuvaus" value="<?php echo $data->poll->getDescription(); ?>"></textarea><br>
        Äänestys päättyy: <input type="text" class="form-control" name="end_date" placeholder="Anna muodossa YYYY-MM-DD" value="<?php echo $data->poll->getEndDate(); ?>"><br>
        Vaihtoehto 1: <input type="text" class="form-control" name="option1"><br>
        Vaihtoehto 2: <input type="text" class="form-control" name="option2"><br>
        Vaihtoehto 3: <input type="text" class="form-control" name="option3"><br>
        <input type="submit" value="Luo äänestys" class="btn btn-primary">
    </form>
</div>

