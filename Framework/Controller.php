<?php

/**
 * Class Controller.
 *
 * @author Dali
 */
class Controller {

  // Action to execute
  private $action;

  // Execute Action
  public function executeAction($action) {
    if (method_exists($this, $action)) {
      $this->action = $action;
      $this->{$this->action}();
    }else{

      throw new Exception("Action '$action' not found");
    }
  }

  // generate View
  public function generateView($view,$params) {

    $viewFile = 'Views/'.$view.'View.php';
    if (file_exists($viewFile)) {
      extract($params);
      ob_start();
      require $viewFile;
      echo  ob_get_clean();
    }else{
      throw new Exception("View '$view' not found");
    }
  }

  public function startSession($id,$login,$pwd){


    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['login'] = $login;
    $_SESSION['pwd'] = $pwd;
    $_SESSION['isConnected'] = true;
    setcookie("id",$id);
    setcookie("login",$login);
    setcookie("pwd",$pwd);
    setcookie("isConnected",true);
  }

  public function endSession(){

    session_destroy();
    unset($_SESSION);
  }

  public function getUserLogin(){

    return $_COOKIE["login"];
  }

  public function isConnected(){

    return (isset($_COOKIE['isConnected'])&&$_COOKIE['isConnected']==true)?true:false;
  }

  public function getUserId(){

    return $_COOKIE['id'];
  }

  public function getUserPwd(){

    return $_COOKIE['pwd'];
  }






}
