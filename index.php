<?php

$errors = [];

include('./classes/form-validation.php');
if (count($_POST) > 0) {
  $validator = new Validator($_POST);
  $errors = $validator->validateForm();
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