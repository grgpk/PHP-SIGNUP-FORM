<?php

include('./classes/form-validation.php');
require_once('./db-connection.php');

$errors = [];

if (count($_POST) > 0) {
  $validator = new Validator($_POST);
  $errors = $validator->validateForm();

  if (count($errors) > 0) {
    echo json_encode($errors);
  } else {

    $sql_query = "INSERT INTO users (firstName, lastName, email) VALUES (?, ?, ?)";
    $prepared = $connection->prepare($sql_query);
    $prepared->execute([$_POST['firstName'], $_POST['lastName'], $_POST['email']]);

    echo 'success';
  }

  exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include('./templates/header.php'); ?>

<main>

  <section class="signup">

    <?php include('./sign-up.php'); ?>

  </section>

</main>


<?php include('./templates/footer.php'); ?>



</html>