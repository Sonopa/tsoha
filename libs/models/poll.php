<?php

class Poll {
    private $poll_id;
    private $topic;
    private $description;
    private $start_date;
    private $end_date;
    private $user_id;
    
    public function __construct($poll_id, $topic, $description, $start_date, $end_date, $user_id) {
        $this->poll_id = $poll_id;
        $this->topic = $topic;
        $this->description = $description;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->user_id = $user_id;
    }
    
    public static function getAllActivePolls() {
        $sql = "SELECT poll_id, topic, description, start_date, end_date, user_id FROM polls WHERE current_date >= start_date";
        $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute();

        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
          $poll = new Poll($tulos->poll_id, $tulos->topic, $tulos->description, $tulos->start_date, $tulos->end_date, $tulos->user_id);

          $tulokset[] = $poll;
        }
        return $tulokset;
    }
    public static function getAllExpiredPolls() {
        $sql = "SELECT poll_id, topic, description, start_date, end_date, user_id FROM polls WHERE current_date < start_date";
        $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute();

        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
          $poll = new Poll($tulos->poll_id, $tulos->topic, $tulos->description, $tulos->start_date, $tulos->end_date, $tulos->user_id);

          $tulokset[] = $poll;
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

