<?php

include('./classes/user.php');
include_once('./classes/db-connection.php');

$connection = Connect_db::connect();
$users = new Users();
$usersList = $users->getUsers($connection);

if (isset($_POST['id'])) {

  $users->removeUser($connection);
}


?>

<!DOCTYPE html>
<html lang="en">


<?php include('./templates/header.php') ?>


<section class="users">
  <h1>Users table</h1>
  <table>
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usersList as $user) : ?>
      <tr>
        <td><?= $user['firstName'] ?></td>
        <td><?= $user['lastName'] ?></td>
        <td><?= $user['email'] ?></td>
        <td>
          <button type="button" class="btn btn-delete" data-id="<?= $user['id'] ?>">Delete</button>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</section>

<?php include('./templates/footer.php') ?>

</html>