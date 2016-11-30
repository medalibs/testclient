<?php

require 'Framework/Controller.php';
require 'Models/User.php';
/**
 * Class User.
 *
 * @author Dali
 */
class UserController extends Controller
{
  private $user;

  function __construct(){
    $this->user = new User();
  }

  // users list
  public function index() {

    $users = $this->user->getConnected();
    $this->generateView('user',array('users' => $users));
  }

  // users list
  public function inscription() {

    $users = $this->user->getConnected();
    $this->generateView('inscription',array());
  }

  // add user
  public function add() {

    $login = $_POST['login'];
    $pwd = $_POST['pwd'];
    //$user = $this->user->Add($login, $pwd);
    $this->user->Add($login, $pwd);
    //go to login view
    $this->generateView('login',array());
  }


  // user login
  public function login() {

    $this->generateView('login',array());
  }
  // user connect
  public function connect() {

    $login = (isset($_POST['login']))?$_POST['login']:$this->getUserLogin();
    $pwd = (isset($_POST['pwd']))?$_POST['pwd']:$this->getUserPwd();

    $res = $this->user->getByLoginPwd($login, $pwd);

    if($res){

      $id = $res['id'];
      $login = $res['username'];
      $pwd = $res['pwd'];
      //set Session
      $this->startSession($id, $login, $pwd);
      //update status
      $this->user->setConnected($id);
      //GO TO HOME INTERFACE
      $users = $this->user->getConnected();

      $this->generateView('home',array('login' => $login,'users' => $users));

    }else{
      throw new Exception("User Not Found");
    }
  }

}
