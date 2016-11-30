<?php
require_once 'Framework/Model.php';
/**
 * Class Message.
 *
 * @author Dali
 */
class Message extends Model
{

    public function getAll(){

      $sql = 'select id, content, from_id, to_id FROM message';
      $users = $this->execSQL($sql);

      return $users;
    }

    public function getByUserId($userId,$senderId) {

      $sql = 'select id, content, from_id, to_id FROM message WHERE to_id = ? AND from_id = ? ';
      $users = $this->execSQL($sql, array($userId, $senderId));

      return $users;
    }

    public function add($content, $fromId, $toId) {

      $sql = 'insert into message(content, from_id, to_id)'
        . ' values(?, ?, ?)';

      $this->execSQL($sql, array($content, $fromId, $toId));
    }

}
