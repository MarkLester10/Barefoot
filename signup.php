<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/style.css' ?>" />
  <title>Register</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-div">
        <form action="signup.php" method="post">
          <h2 class="text-center">Register</h2>

          <?php if (count($errors) > 0) : ?>
          <div class="alert alert-danger">
            <?php foreach ($errors as $error) : ?>
            <li><?php echo $error ?></li>
            <?php endforeach ?>
          </div>
          <?php endif; ?>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $username ?>" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $email ?>" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label for="passwordConf">Confirm Password</label>
            <input type="password" name="passwordConf" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">Sign Up</button>
          </div>
          <p class="text-center">Already have an account? <a href="login.php">Sign In</a></p>
        </form>
      </div>
    </div>
  </div>
</body>

</html>