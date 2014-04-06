<div class="container">
    <?php $poll = $data->poll ?>
    <h2><?php echo $poll->getTopic() ?></h2>
    <p>
        <?php echo $poll->getDescription() ?>
    </p>
    <form action="vote.php" method="POST">
        <?php foreach($poll->getOptions() as $option): ?>
            <input type="radio" name="vote" value="<?php echo $option->getOptionId(); ?>"><?php echo $option->getOptionName(); ?><br>
        <?php endforeach; ?>
        <input type="hidden" name="poll_id" value="<?php echo $poll->getId(); ?>">
        <input type="submit" value="Äänestä" class="btn btn-primary">
    </form>
    <p>
        Äänestys alkoi <?php echo $poll->getStartDate() ?> ja päättyy <?php echo $poll->getEndDate() ?>. Ääniä annettu <?php echo $poll->getVoteCount($poll->getId()) ?>.
    </p>
</div>
