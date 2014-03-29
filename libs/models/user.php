<?php
class User {    
  
  private $user_id;
  private $password;
  private $username;

  public function __construct($user_id, $password, $username) {
    $this->user_id = $user_id;
    $this->password = $password;
    $this->username = $username;
  }
  
  public static function etsiKayttajaTunnuksilla($username, $password) {
    $sql = "SELECT user_id, username, password FROM users where username = ? AND password = ? LIMIT 1";
    $kysely = getTietokantayhteys()->prepare($sql);
    $kysely->execute(array($username, $password));

    $result = $kysely->fetchObject();
    if ($result == null) {
      return null;
    } else {
      $user = new User(); 
      $user->setId($result->user_id);
      $user->setUsername($result->username);
      $user->setPassword($result->password);

      return $user;
    }
  }

  public static function etsiKaikkiKayttajat() {
    $sql = "SELECT user_id, password, username FROM users";
    $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute();

    $tulokset = array();
    foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
      $user = new User();
      $user->setId($tulos->user_id);
      $user->setPassword($tulos->password);
      $user->setUsername($tulos->username);
      //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
      //Se vastaa melko suoraan ArrayList:in add-metodia.
      $tulokset[] = $user;
    }
    return $tulokset;
  }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function setId($id) {
        $this->user_id = $id;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }    
}

