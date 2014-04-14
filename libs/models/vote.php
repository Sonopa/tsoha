<?php

class vote {
    private $vote_id;
    private $cast_date;
    private $poll_id;
    private $user_id;
    
    public function __construct($vote_id, $cast_date, $poll_id, $user_id) {
        $this->vote_id = $vote_id;
        $this->cast_date = $cast_date;
        $this->poll_id = $poll_id;
        $this->user_id = $user_id;
    }
    
    public function addIntoDatabase($option_id) {
        $sql = "INSERT INTO votes(cast_date, poll_id, user_id) VALUES(current_date,?,?) RETURNING vote_id";
        $kysely = getTietokantayhteys()->prepare($sql);
        echo $this->getPollId(), $this->getUserId();
        $ok = $kysely->execute(array($this->getPollId(), $this->getUserId()));
        
        $sql = "UPDATE voteoptions SET vote_count = vote_count+1 WHERE option_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql); 
        $kysely->execute(array($option_id));
        
        if ($ok) {
          $this->vote_id = $kysely->fetchColumn();
        }
        return $ok;
    }
    
    public static function getVotes($poll_id) {
        $sql = "SELECT vote_id, cast_date, poll_id, user_id FROM votes WHERE poll_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($poll_id));
        
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
          $vote = new Vote($tulos->vote_id, $tulos->cast_date, $tulos->poll_id, $tulos->user_id);

          $tulokset[] = $vote;
        }
        return $tulokset;
    }
    
    /* hakee kaikki päivämäärät joina ääniä on annettu tietylle äänestykselle */
    public static function getVoteDates($poll_id) {
        $sql = "SELECT DISTINCT cast_date FROM votes WHERE poll_id = ? ORDER BY cast_date";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($poll_id));
        
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
          $tulokset[] = $tulos->cast_date;
        }
        return $tulokset;
    }
    /* laskee tiettynä päivänä tietyn äänestyksen saamat äänet */
    public static function getVoteCountByDate($cast_date, $poll_id) {
        $sql = "SELECT COUNT(*) FROM votes WHERE poll_id = ? AND cast_date = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($poll_id, $cast_date));
        
        $tulos = $kysely->fetchObject();
        return $tulos->count;
    }   

    /* tarkistaa onko samanlainen ääni jo olemassa */
    public function isValid() {        
        $sql = "SELECT user_id FROM votes WHERE user_id = ? AND poll_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getUserId(), $this->getPollId()));
        $tulos = $kysely->fetchObject();
        return $tulos == null;
    }
    
    public function getCastDate() {
        return $this->cast_date;
    }
    public function setCastDate($date) {
        $this->cast_date = $date;
    }
    
    public function getPollId() {
        return $this->poll_id;
    }
    public function setPollId($id) {
        $this->poll_id = $id;
    }
    
    public function getUserId() {
        return $this->user_id;        
    }
    public function setUserId($id) {
        $this->user_id = $id;
    }
    
    public function getVoteId() {
        return $this->vote_id;        
    }
    public function setVoteId($id) {
        $this->vote_id = $id;
    }
    
}

