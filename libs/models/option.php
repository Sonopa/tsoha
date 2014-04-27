<?php

class option {
    private $option_id;
    private $option_name;
    private $vote_count;
    private $poll_id;
    private $errors = array();
    
    public function __construct($option_id, $option_name, $vote_count, $poll_id) {
        $this -> option_id = $option_id;
        $this -> option_name = $option_name;
        $this -> vote_count = $vote_count;
        $this -> poll_id = $poll_id;                
    }    
    
    public function addIntoDatabase() {
        $sql = "INSERT INTO voteoptions(option_name, vote_count, poll_id) VALUES(?,?,?) RETURNING option_id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($this->getOptionName(), $this->getVoteCount(), $this->getPollId()));
        if ($ok) {
          $this->option_id = $kysely->fetchColumn();
        }
        return $ok;
    }
    
    public function isValid() {
        return empty($this->errors);
    }
    public function getErrors() {
        return $this->errors;
    }
    
    public function getOptionName() {
        return $this->option_name;
    }
    public function setOptionName($name) {
        $this->option_name = $name;
        if (strlen($name) < 1 or strlen($name) > 50) {
            $this->errors['option_name'] = "Option name must be between 1 and 50 characters";            
        } else { 
            unset($this->errors['option_name']);
        }
    }
    
    public function getOptionId() {
        return $this->option_id;
    }
    
    public function getVoteCount() {
        return $this->vote_count;
    }
    public function setVoteCount($vote_count) {
        $this->vote_count = $vote_count;
    }
    
    public function getPollId() {
        return $this->poll_id;
    }
    public function setPollId($poll_id) {
        $this->poll_id = $poll_id;
    }
    
}

