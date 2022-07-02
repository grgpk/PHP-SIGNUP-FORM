<?php
include('./classes/user.php');
include('./classes/form-validation.php');
include_once('./classes/db-connection.php');

$errors = [];
$connection = Connect_db::connect();

if (count($_POST) > 0) {
  $validator = new Validator($_POST);
  $errors = $validator->validateForm();

  if (count($errors) > 0) {
    echo json_encode($errors);
  } else {
    $users = new Users();
    $users->addUser($connection);
  }
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('./templates/header.php'); ?>

<main>

  <div class="success-notification">
    Successful sign up
  </div>

  <section class="signup">

    <?php include('./sign-up.php'); ?>

  </section>

</main>


<?php include('./templates/footer.php'); ?>



</html>