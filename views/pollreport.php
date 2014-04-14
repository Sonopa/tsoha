<div class="container">
    <?php $poll = $data->poll ?>
    <h2><?php echo htmlspecialchars($poll->getTopic()) ?></h2>
    <p>
        <?php echo htmlspecialchars($poll->getDescription()) ?>
    </p>
    <p>
        Äänestys alkoi <?php echo $poll->getStartDate() ?> ja 
        <?php if (Poll::isActive($poll->getId())): ?>
            päättyy <?php echo $poll->getEndDate() ?>. Ääniä annettu <?php echo $poll->getVoteCount($poll->getId()) ?>.
        <?php else: ?>
            päättyi <?php echo $poll->getEndDate() ?>. Ääniä annettiin <?php echo $poll->getVoteCount($poll->getId()) ?>.
        <?php endif; ?>
    </p>
    
    
    <h4>Tulos: <?php foreach ($data->winners as $winner) {echo $winner->getOptionName() . ' ';} ?></h4>
    <div class="well well-large">
        <?php foreach ($data->results as $result): ?> <!-- results sisältää kaikki äänestyksen vaihtoehdot -->
            <div class="progress">
                <!-- lasketaan prosenttiosuus saaduista äänistä -->
                <?php $percent = round(($result->getVoteCount()/$data->total)*100, 2);
                        $name = $result->getOptionName(); ?> 
                <div class="progress-bar" style="width: <?php echo $percent*10 ?>;%"><p><font color="black"><?php echo "$name: $percent%" ?></font></p></div>
            </div>
        <?php endforeach; ?>
    </div>    
    
    <?php $votedates = Vote::getVoteDates($poll->getId()) ?>
    <h4>Päivittäinen aktiviteetti:</h4>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Päivämäärä </th>
                <th>Ääniä annettiin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($votedates as $date): ?>
                <tr>
                    <td><?php echo $date ?></td>
                    <td><?php echo Vote::getVoteCountByDate($date, $poll->getId()) ?></td>
                </tr>                
            <?php endforeach; ?>
        </tbody>
    </table>    
</div>
