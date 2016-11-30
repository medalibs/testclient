<?php
require_once 'Framework/Model.php';
/**
 * Class User.
 *
 * @author Dali
 */
class User extends Model
{

    public function getConnected(){

      $sql = 'select id, username from user'
      . ' where is_connected = 1';
      $users = $this->execSQL($sql);

      return $users;
    }

    public function Add($username, $pwd) {
      $sql = 'insert into user(username, pwd, is_connected)'
        . ' values(?, ?, ?)';

      return $this->execSQL($sql, array($username, $pwd, 0));
    }

    public function setConnected($userId) {
      $sql = 'update user set is_connected = ?'
        . ' WHERE id = ?';

      return $this->execSQL($sql, array(1, $userId));
    }

    public function setDisconnected($userId) {
      $sql = 'update user set is_connected = ?'
        . ' WHERE id = ?';

      return $this->execSQL($sql, array(0, $userId));
    }


    public function getByLoginPwd($login,$pwd){

      $sql = 'select id, username, pwd from user'
        . ' WHERE username = :username AND pwd = :pwd ';

      $stmt = self::getDB()->prepare($sql);
      $stmt->bindValue('username', $login, PDO::PARAM_STR);
      $stmt->bindValue('pwd', $pwd, PDO::PARAM_STR);
      $stmt->execute();

      return $stmt->fetch();
    }

}
