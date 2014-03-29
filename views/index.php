<div class="container">
    <h2>Käynnissä olevat äänestykset</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Aihe</th>
                <th>Kuvaus</th>
                <th>Alkanut</th>
                <th>Päättyy</th>
            </tr>
        </thead>
        <tbody>                            
            <?php foreach($data->polls as $poll): ?>  
                <tr>
                    <td><a href="id.html"><?php echo $poll->getTopic(); ?></a></td>
                    <td><?php echo $poll->getDescription(); ?></td>
                    <td><?php echo $poll->getStartDate(); ?></td>
                    <td><?php echo $poll->getEndDate(); ?></td>                
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Päättyneet äänestykset</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Aihe</th>
                <th>Kuvaus</th>
                <th>Alkanut</th>
                <th>Päättynyt</th>
                <th>Tulos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data->expiredpolls as $poll): ?>  
                <tr>
                    <td><a href="id.html"><?php echo $poll->getTopic(); ?></a></td>
                    <td><?php echo $poll->getDescription(); ?></td>
                    <td><?php echo $poll->getStartDate(); ?></td>
                    <td><?php echo $poll->getEndDate(); ?></td>                
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if (isLoggedIn()): ?>
        <p><a href="newPoll.php" class="btn btn-primary">Luo uusi äänestys</a></p>
    <?php endif; ?>
</div>

