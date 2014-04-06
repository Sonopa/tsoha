<div class="container">
    <h2>Omat äänestykset</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Aihe</th>
                <th>Kuvaus</th>
                <th>Alkanut</th>
                <th>Päättyy</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>                            
            <?php foreach($data->polls as $poll): ?>  
                <tr>
                    <td><a href="poll.php?id=<?php echo $poll->getId(); ?>"><?php echo $poll->getTopic(); ?></a></td>
                    <td><?php echo $poll->getDescription(); ?></td>
                    <td><?php echo $poll->getStartDate(); ?></td>
                    <td><?php echo $poll->getEndDate(); ?></td>   
                    <td><a href="editPoll.php?id=<?php echo $poll->getId(); ?>" class="btn btn-primary">Muokkaa</a></td>
                    <td>
                        <form action="deletePoll.php?id=<?php echo $poll->getId(); ?>" method="POST" onSubmit="return confirm('Oletko varma että haluat poistaa äänestyksen?')">
                            <input type="submit" value="Poista" class="btn btn-primary">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>        
    <p><a href="newPoll.php" class="btn btn-primary">Luo uusi äänestys</a></p>    
</div>

