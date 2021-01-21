<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";

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
  <title>Home</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-div login">
        <?php include ROOT_PATH . "/app/includes/messages.php"; ?>
        <h3>Welcome, <?php echo $_SESSION['username'] ?> </h3>
        <a href="index.php?logout=1" class="logout">Logout</a>
        <?php if ($_SESSION['verified']) : ?>
        <button class="btn btn-block btn-success btn-md">Your account has been verified! 🙂 </button>
        <?php else : ?>
        <div class="alert alert-warning mt-3">
          You need to verify your account. 😞 <br><br>
          Sign in to your email account and click on the verification link that we've just emailed to you at
          <strong> <?php echo $_SESSION['email'] ?> </strong>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>

</html>