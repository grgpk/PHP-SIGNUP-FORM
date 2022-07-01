<?php

$dbhost = "localhost";
$dbname = "users_db";
$dbuser = "test";
$dbpassword = "test123";

try {
  $connection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
} catch (PDOException $error) {
  echo "Database connection problem: " . $error->getMessage();
  exit();
}