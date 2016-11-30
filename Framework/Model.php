<?php

require_once 'Config.php';

/**
 * Class Model.
 *
 * @author Dali
 */
abstract class Model {

    /** DB PDO */
    private static $db;

    /**
     * Get database
     *
     * @return PDO Objet
     */
    public static function getDB() {

        if (self::$db === null) {

            $dsn = Config::get("dsn");
            $login = Config::get("login");
            $pwd = Config::get("pwd");
            // Connect to database

            try {
                self::$db = new PDO($dsn, $login, $pwd);
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());

            }

        }
        return self::$db;
    }

    /**
     * SQL request
     *
     * @param string $sql
     * @param array $params
     * @return PDOStatement Result
     */
    protected function execSql($sql, $params = null) {
        try {
          if ($params == null) {
              $res = self::getDB()->query($sql);   // query
          }
          else {
              $res = self::getDB()->prepare($sql); // prepare
              $res->execute($params);
              //$res = self::getDB()->lastInsertId();
          }

        } catch (Exception $e) {
            $res = false;
        }


        return $res;
    }

}
