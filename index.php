<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";
?>
<!doctype html>
<html lang="en">

<head>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barefoot | Reset Password</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/imgs/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/imgs/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
    <link rel="manifest" href="/assets/imgs/favicon/site.webmanifest" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/scss/vendors/tailwind.css' ?>" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  </head>

<body>
  <div class="container mx-auto mt-24 w-1/2">
    <div class="px-6 py-6 bg-gray-100">
      <?php include ROOT_PATH . "/app/includes/messages.php"; ?>
      <h3>Welcome, <?php echo $_SESSION['username'] ?> </h3>
      <a href="index.php?logout=1" class="text-red-400">Logout</a>
      <?php if ($_SESSION['verified']) : ?>
      <button class="px-2 py-3 rounded text-white mt-4 bg-green-400 block mx-auto">Your account has been verified! 🙂
      </button>
      <?php else : ?>
      <div class="text-gray-900 bg-yellow-300 px-4 py-6">
        You need to verify your account. 😞 <br><br>
        Sign in to your email account and click on the verification link that we've just emailed to you at
        <strong> <?php echo $_SESSION['email'] ?> </strong>
      </div>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>