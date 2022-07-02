<?php

class Users
{

  public function addUser($connection)
  {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    $sql_query = "INSERT INTO users (firstName, lastName, email) VALUES (?, ?, ?)";
    $prepared = $connection->prepare($sql_query);
    if ($prepared->execute([$firstName, $lastName, $email])) {
      echo 'success';
    }
  }

  public function getUsers($connection)
  {
    $users = $connection->query("SELECT * FROM users")->fetchAll();
    return $users;
  }

  public function removeUser($connection)
  {
    if (count($_POST) > 0) {
      $id = $_POST['id'];

      $sql_query = "DELETE FROM users WHERE id = $id";
      $connection->query($sql_query);

      exit();
    }
  }
}