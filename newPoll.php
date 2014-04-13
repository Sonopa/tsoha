<?php
require_once 'libs/common.php';
require_once 'libs/models/poll.php';

naytaNakyma('newpoll.php', array('poll'=> new Poll()));

function newOption($option_number) {
    echo 'Vaihtoehto '.$option_number.': <input type="text" class="form-control" name="option['.$option_number.']"><br>';
}