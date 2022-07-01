<form method="POST" action="./index.php">
  <h2>Sign up</h2>
  <p class="input-field">
    <input type=" text" placeholder="First Name" name="firstName" value="<?php $name = $_POST['firstName'] ?? '';
                                                                          echo htmlspecialchars($name); ?>" autofocus>
    <?php if (isset($errors['firstName'])) : ?>
    <span class="error"><?php echo $errors['firstName'] ?></span>
    <?php endif ?>
  </p>

  <p class="input-field">
    <input type="text" placeholder="Last Name" name="lastName" value="<?php $surname = $_POST['lastName'] ?? '';
                                                                      echo htmlspecialchars($surname) ?>">
    <?php if (isset($errors['lastName'])) : ?>
    <span class="error"><?php echo $errors['lastName'] ?></span>
    <?php endif ?>
  </p>

  <p class="input-field">
    <input type="text" placeholder="Email" name="email" value="<?php $email = $_POST['email'] ?? '';
                                                                echo htmlspecialchars($email); ?>">
    <?php if (isset($errors['email'])) : ?>
    <span class="error"><?php echo $errors['email'] ?></span>
    <?php endif ?>
  </p>
  <button class="btn btn-signup" type="submit">Sign up</button>

</form>