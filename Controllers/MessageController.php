<?php

require 'Framework/Controller.php';
require 'Models/Message.php';
/**
 * Class Message.
 *
 * @author Dali
 */
class MessageController extends Controller
{

  private $message;

  function __construct(){
    $this->message = new Message();
  }

  // message list
  public function getByUsersId() {

    $messages = $this->message->getByUserId($this->getUserId(),$_GET['userId']);
    $results = array();
    foreach ($messages as $message) {
      echo $message['content']."<br>";

    }
  }



  // message send
  public function send() {

    $this->message->add(htmlentities(trim($_GET['content'])), $_GET['userId'],$this->getUserId());
    $messages = $this->message->getByUserId($this->getUserId(),$_GET['userId']);
    foreach ($messages as $message) {
      echo $message['content']."<br>";

    }
  }

}
