<?php
class User {
  
  private $user_id;
  private $password;
  private $name;

  public function __construct($user_id, $password, $name) {
    $this->user_id = $user_id;
    $this->password = $password;
    $this->name = $name;
  }

  public static function etsiKaikkiKayttajat() {
  $sql = "SELECT user_id, password, name FROM users";
  $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute();
    
  $tulokset = array();
  foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
    $user = new User();
    $user->setId($tulos->user_id);
    $user->setPassword($tulos->password);
    $user->setName($tulos->name);
    //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
    //Se vastaa melko suoraan ArrayList:in add-metodia.
    $tulokset[] = $user;
  }
  return $tulokset;
}
    
    public function getName() {
        return $this->name;
    }
    
    public function setId($id) {
        $this->user_id = $id;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
}

