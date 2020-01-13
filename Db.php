<?php

Class Db {
    
    public static $db = false;
  
    public static function getConnection() {
      if (self::$db) {
        return self::$db;
      }
      require 'params.php';

      $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";";
      $opt = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
      ];
      self::$db = new PDO($dsn, USER, PASS, $opt);
      self::$db->exec("set names utf8;");
  
      return self::$db;
      }
  }

?>