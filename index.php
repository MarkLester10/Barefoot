<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
// require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";
?>
<!doctype html>
<html lang="en">


<head>
  <title>Barefoot Travel Blog</title>
  <?php include ROOT_PATH . '/app/includes/head.php' ?>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="navbar__icon block lg:hidden mr-2">
        <i class='bx bx-menu'></i>
      </div>
      <div class="navbar__logo">
        <a href="#"> <img src="./assets/imgs/logo__dark.png" alt="Barefoot"></a>
      </div>
      <div class="navbar__search">
        <input
          class="hidden lg:block border border-transparent bg-gray-100 text-gray-900 rounded-lg pl-10 pr-4 py-4 focus:outline-none focus:bg-white focus:border-gray-100 focus:text-gray-900 w-full dark:bg-gray-800 dark:focus:bg-gray-700 dark:focus:text-gray-100 dark:text-gray-100"
          type="text" placeholder="Search by keywords" />
      </div>
      <div class="navbar__links">
        <ul class="space-x-8">
          <!-- <li><a href="#">Login</a></li>
          <li><a href="#">Register</a></li> -->
          <li class="profile space-x-6">
            <img src="./assets/imgs/auth/avatar.png" class="w-20 hidden md:block" alt="">
            <a href="#" class="flex items-center">Mark Lester<i class='bx bxs-chevron-down'></i></a>
            <div class="profile__dropdown">
              <ul>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="grid__container">
  </div>
</body>

</html>