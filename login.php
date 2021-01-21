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
  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-div login">
        <form action="login.php" method="post">
          <h2 class="text-center">Login</h2>
          <?php if (count($errors) > 0) : ?>
          <div class="alert alert-danger">
            <?php foreach ($errors as $error) : ?>
            <li><?php echo $error ?></li>
            <?php endforeach ?>
          </div>
          <?php endif; ?>
          <div class="form-group">
            <label for="username">Username or Email</label>
            <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Login</button>
          </div>
          <p class="text-center">Create One <a href="signup.php">Sign Up</a></p>
        </form>
      </div>
    </div>
  </div>
</body>

</html>