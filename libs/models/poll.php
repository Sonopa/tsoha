<?php

class Poll {
    private $poll_id;
    private $topic;
    private $description;
    private $start_date;
    private $end_date;
    private $user_id;
    private $errors = array();
    
    public function __construct($poll_id, $topic, $description, $start_date, $end_date, $user_id) {
        $this->poll_id = $poll_id;
        $this->topic = $topic;
        $this->description = $description;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->user_id = $user_id;
    }
    
    public static function getAllActivePolls() {
        $sql = "SELECT poll_id, topic, description, start_date, end_date, user_id FROM polls WHERE current_date <= end_date";
        $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute();

        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
          $poll = new Poll($tulos->poll_id, $tulos->topic, $tulos->description, $tulos->start_date, $tulos->end_date, $tulos->user_id);

          $tulokset[] = $poll;
        }
        return $tulokset;
    }
    public static function getAllExpiredPolls() {
        $sql = "SELECT poll_id, topic, description, start_date, end_date, user_id FROM polls WHERE current_date > end_date";
        $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute();

        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
          $poll = new Poll($tulos->poll_id, $tulos->topic, $tulos->description, $tulos->start_date, $tulos->end_date, $tulos->user_id);

          $tulokset[] = $poll;
        }
        return $tulokset;
    }
    public static function getAllUsersPolls($user_id) {
        $sql = "SELECT poll_id, topic, description, start_date, end_date, user_id FROM polls WHERE user_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute(array($user_id));

        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
          $poll = new Poll($tulos->poll_id, $tulos->topic, $tulos->description, $tulos->start_date, $tulos->end_date, $tulos->user_id);

          $tulokset[] = $poll;
        }
        return $tulokset;
    }
    public static function findPoll($poll_id) {
        $sql = "SELECT poll_id, topic, description, start_date, end_date, user_id FROM polls WHERE poll_id = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute(array($poll_id));
        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $poll = new Poll($tulos->poll_id, $tulos->topic, $tulos->description, $tulos->start_date, $tulos->end_date, $tulos->user_id);
            return $poll;
        }
    }
    
    public function addIntoDatabase() {        
        $sql = "INSERT INTO polls(topic, description, start_date, end_date, user_id) VALUES(?,?,?,?,?) RETURNING poll_id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($this->getTopic(), $this->getDescription(), $this->getStartDate(), $this->getEndDate(), $this->getUserId()));
        
        if ($ok) {
          $this->poll_id = $kysely->fetchColumn();
        }
        return $ok;
    }
    
    public function update() {
        $sql = "UPDATE polls SET description = ?, end_date = ? WHERE poll_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getDescription(), $this->getEndDate(), $this->getId()));
    }
    
    public function delete() {
        $sql = "DELETE FROM polls WHERE poll_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getId()));
    }
    
    public static function getVoteCount($poll_id) {
        $sql = "SELECT COUNT(*) FROM votes WHERE poll_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute(array($poll_id));
        $tulos = $kysely->fetchObject();
        return $tulos->count;
    }
    
    public function getOptions() {
        $sql = "SELECT option_id, option_name, vote_count, poll_id FROM voteoptions WHERE poll_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql); 
        $kysely->execute(array($this->poll_id));             
        
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {            
          $option = new Option($tulos->option_id, $tulos->option_name, $tulos->vote_count, $tulos->poll_id);
          $tulokset[] = $option;
        }
        return $tulokset;
    }
    
    public function getId() {
        return $this->poll_id;        
    }
    public function setId($id) {
        $this->poll_id = $id;
    }
    
    public function getTopic() {
        return $this->topic;
    }
    public function setTopic($topic) {
        $this->topic = $topic;
        if (strlen($topic) < 3) {
            $this->errors['topic'] = "Topics length must be more than 2 characters";
        } else { 
            unset($this->errors['topic']);
        }
    }
    
    public function isValid() {
        return empty($this->errors);
    }
    public function getErrors() {
        return $this->errors;
    }
    
    public function getDescription() {
        return $this->description;        
    }
    public function setDescription($description) {
        $this->description = $description;        
    }
    
    public function getStartDate() {
        return $this->start_date;        
    }
    public function setStartDate($date) {
        $this->start_date = $date;
    }
    
    public function getEndDate() {
        return $this->end_date;        
    }
    public function setEndDate($date) {
        $this->end_date = $date;
    }
    
    public function getUserId() {
        return $this->user_id;        
    }
    public function setUserId($id) {
        $this->user_id = $id;
    }
}

