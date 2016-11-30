<?php

class Config {
    /* config params*/
    private static $params;

    // get Params
    private static function getParams() {
      if (self::$params == null) {

        $paramsFile = "Config/params.ini";
        self::$params = parse_ini_file($paramsFile);

      }
      return self::$params;
    }

    public static function get($name) {
        self::getParams();
      return self::$params[$name];
    }

}
