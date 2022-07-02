<?php

class Connect_db
{
  public static function connect()
  {
    $dbhost = "localhost";
    $dbname = "users_db";
    $dbuser = "test";
    $dbpassword = "test123";
    try {
      $connection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);

      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $error) {
      echo "Database connection problem: " . $error->getMessage();
      exit();
    }

    return $connection;
  }
}