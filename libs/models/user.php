<?php
class User {    
  
    private $user_id;
    private $password;
    private $username;
    private $errors = array();

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

    public static function getUserById($user_id) {
      $sql = "SELECT user_id, username, password FROM users where user_id = ? LIMIT 1";
      $kysely = getTietokantayhteys()->prepare($sql);
      $kysely->execute(array($user_id));

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
    public static function getUserByUsername($username) {
      $sql = "SELECT user_id, username, password FROM users WHERE username = ? LIMIT 1";
      $kysely = getTietokantayhteys()->prepare($sql);
      $kysely->execute(array($username));

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
    
    public function addIntoDatabase() {
        $sql = "INSERT INTO users(username, password) VALUES(?,?) RETURNING user_id";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getUsername(), $this->getPassword()));
        if ($ok) {
          $this->user_id = $kysely->fetchColumn();
        }
        return $ok;
    }
    
    public function update() {
        $sql = "UPDATE users SET password = ? WHERE user_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getPassword(), $this->getId()));
    }
    
    public function delete() {
        $sql = "DELETE FROM users WHERE user_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getId()));
    }
    
    public function isValid() {
        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getUsername() {
        return $this->username;
    }
    public function getId() {
        return $this->user_id;
    }
    public function setId($id) {
        $this->user_id = $id;
    }

    public function setUsernameForRegistration($username) {
        $user = User::getUserByUsername($username);
        if(!$user == null) {
            $this->errors['username'] = "Username is already in use";
        }else {
            unset($this->errors['username']);
        }
        $this->username = $username;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function getPassword() {
        return $this->password;
    } 
    public function setPassword($password) {
        $this->password = $password;
    }    
}

