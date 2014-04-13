<div class="container">
    <?php $poll = $data->poll ?>
    <h2><?php echo htmlspecialchars($poll->getTopic()) ?></h2>
    <p>
        <?php echo htmlspecialchars($poll->getDescription()) ?>
    </p>
    <?php $active = Poll::isActive($poll->getId()); ?>
    <?php $options = $poll->getOptions() ?>
    <?php if (!$active): ?>
        <?php $winners = Poll::getResults($poll->getId()); ?>    
        Äänestys on päättynyt.<br>
        Vaihtoehdot olivat: 
            <?php foreach($options as $option) {
                if ($option == end($options)) {echo $option->getOptionName();}
                else {echo $option->getOptionName() . ', ';}
            }?><br>
        Tulos: <?php foreach ($winners as $winner) {echo $winner->getOptionName() . ' ';} ?>
    <?php elseif(isLoggedIn()): ?>
        <form action="vote.php" method="POST">
            <?php foreach($options as $option): ?>
                <input type="radio" name="vote" value="<?php echo $option->getOptionId(); ?>"><?php echo $option->getOptionName(); ?><br>
            <?php endforeach; ?>
            <input type="hidden" name="poll_id" value="<?php echo $poll->getId(); ?>">
            <input type="submit" value="Äänestä" class="btn btn-primary">
        </form>   
    <?php else: ?>
        <a href="login.php">Kirjaudu sisään äänestääksesi</a>
    <?php endif; ?>
    
    <p>
        <br>
        Äänestys alkoi <?php echo $poll->getStartDate() ?> ja 
        <?php if ($active): ?>
            päättyy <?php echo $poll->getEndDate() ?>. Ääniä annettu <?php echo $poll->getVoteCount($poll->getId()) ?>.
        <?php else: ?>
            päättyi <?php echo $poll->getEndDate() ?>. Ääniä annettiin <?php echo $poll->getVoteCount($poll->getId()) ?>.
        <?php endif; ?>
    </p>
</div>
