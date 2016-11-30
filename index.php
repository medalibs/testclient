<?php

error_reporting(E_ALL); ini_set('display_errors', '1');


$controller = $_GET['controller'];
$action = $_GET['action'];

$controllerFile = "Controllers/{$controller}Controller.php";

if (file_exists($controllerFile)) {

  require $controllerFile;
  $controllerName = "{$controller}Controller";
  $controllerInstance = new $controllerName();

  $controllerInstance->{$action}();

}else{
  //echo "Controller $controller Not Found";
  //exit;
  throw new Exception("Controller $controller Not Found");

}
