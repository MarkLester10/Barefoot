<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/SettingsController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";
?>
<!doctype html>
<html lang="en">


<head>
  <title>Barefoot | Profile Settings</title>
  <?php include ROOT_PATH . '/app/includes/head.php' ?>

</head>

<body>
  <div class="app" id="app">
    <?php include ROOT_PATH . '/app/includes/loader.php' ?>
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

    <!-- Sidebar Area -->
    <?php include ROOT_PATH . '/app/includes/sidebar.php' ?>

    <!-- Main area -->
    <main class="xl:flex-1 xl:overflow-x-hidden">
      <section class="profile__area py-6 px-4 xl:px-0 xl:pr-4">
        <h1 class="title__text text__adaptive">Profile Settings</h1>
        <form action="settings.php" method="post" enctype="multipart/form-data">
          <div class="profile__banner border">
            <div>
              <label for="bannerImage">
                <svg class="w-6 h-6 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </label>
              <input type="file" name="banner_image" id="bannerImage">
            </div>
            <div>
              <input type="text" name="banner_title" id="bannerTitle">
            </div>
            <button type="submit" name="save-banner" class="primary-btn hover:bg-gray-800">Save</button>
          </div>
        </form>
      </section>
    </main>
  </div>
  <!-- End Main Area -->
  </div>

  <!-- Scripts Area -->
  <?php include ROOT_PATH . '/app/includes/scripts.php' ?>
</body>

</html>