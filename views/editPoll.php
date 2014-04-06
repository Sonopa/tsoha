<div class="container">
    <h2>Muokkaa äänestystä</h2>
    <form action="doEditPoll.php?id=<?php echo $data->poll->getId(); ?>" method="POST">       
        Kuvaus: <br><textarea name="description" class="form-control"><?php echo $data->poll->getDescription(); ?></textarea><br>
        Äänestys päättyy: <input type="text" class="form-control" name="end_date" placeholder="Anna muodossa YYYY-MM-DD" value="<?php echo $data->poll->getEndDate(); ?>"><br>    
        <input type="hidden" name="id" value="<?php echo $data->poll->getId(); ?>">
        <input type="submit" value="Muokkaa" class="btn btn-primary">
    </form>
</div>

