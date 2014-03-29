<?php

class vote {
    private $vote_id;
    private $cast_date;
    private $poll_id;
    private $user_id;
    
    public function getCastDate() {
        return $this->cast_date;
    }
    public function setCastDate($date) {
        $this->cast_date = $date;
    }
    
    public function getUserId() {
        return $this->user_id;        
    }
    public function setUserId($id) {
        $this->user_id = $id;
    }
    
}

