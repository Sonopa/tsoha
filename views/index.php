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
                    <td><a href="poll.php?id=<?php echo $poll->getId(); ?>"><?php echo htmlspecialchars($poll->getTopic()); ?></a></td>
                    <td><?php echo htmlspecialchars($poll->getDescription()); ?></td>
                    <td><?php echo htmlspecialchars($poll->getStartDate()); ?></td>
                    <td><?php echo htmlspecialchars($poll->getEndDate()); ?></td>                
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
            <?php $winners = Poll::getResults($poll->getId()); ?> <!-- hakee äänestyksessä eniten ääniä saaneet -->
                <tr>
                    <td><a href="poll.php?id=<?php echo $poll->getId(); ?>"><?php echo htmlspecialchars($poll->getTopic()); ?></a></td>
                    <td><?php echo htmlspecialchars($poll->getDescription()); ?></td>
                    <td><?php echo htmlspecialchars($poll->getStartDate()); ?></td>
                    <td><?php echo htmlspecialchars($poll->getEndDate()); ?></td>                 
                    <td><?php foreach ($winners as $winner) {echo $winner->getOptionName() . ' ';} ?></td> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if (isLoggedIn()): ?>
        <p><a href="newPoll.php" class="btn btn-primary">Luo uusi äänestys</a></p>
    <?php endif; ?>
</div>

