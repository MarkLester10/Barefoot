<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";

?>
<!doctype html>
<html lang="en">


<head>
  <title>Barefoot Travel Blog</title>
  <?php include ROOT_PATH . '/app/includes/head.php' ?>
  <style>
  .scrollable-sidebar::-webkit-scrollbar {
    display: none;
  }
  </style>
</head>

<body>
  <div class="app" id="app">
    <?php include ROOT_PATH . '/app/includes/warning.php' ?>
    <button @click="toggleDarkMode" id="switchTheme" class="darkmode-btn block xl:hidden" href="#">
      <svg v-if="!isDarkModeOn" class="w-6 h-6 text-gray-800" id="moon" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
      </svg>

      <svg v-else class="w-6 h-6 text-yellow-400" id="sun" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
          clip-rule="evenodd"></path>
      </svg>
    </button>

    <!-- Header Area -->
    <?php include ROOT_PATH . '/app/includes/header.php' ?>
    <!-- End Header Area -->

    <!-- Sidebar Area -->
    <?php include ROOT_PATH . '/app/includes/sidebar.php' ?>
    <!-- End Sidebar Area -->

    TRENDING
  </div>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="./assets/js/init-vue.js"></script>
</body>

</html>