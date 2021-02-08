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
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>

<body>
  <div class="app" id="app">
    <!-- <?php include ROOT_PATH . '/app/includes/loader.php' ?> -->
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
        <p class="subtitle__text text__adaptive">Profile Settings</p>
        <form action="settings.php" class="py-4" method="post" enctype="multipart/form-data">
          <div class="banner">
            <?php include ROOT_PATH . '/app/includes/messages.php' ?>
            <div class="overlay rounded-md"></div>

            <div class="banner__image absolute inset-0">
              <label v-if="isBannerEdit"> <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                  </path>
                </svg>
                <input type="file" class="hidden" name="banner_image">
              </label>
              <img class="h-full w-full object-cover rounded-md" src="<?php echo $_SESSION['banner_image'] ?>" alt="" />
            </div>


            <div class="banner__title">
              <input v-if="isBannerEdit" type="text" name="banner_title"
                value="<?php echo $_SESSION['banner_title'] ?>">

              <h1 v-else class="title__text text-white">
                <?php echo $_SESSION['banner_title'] ?></h1>
            </div>

            <div class="banner__profile__img">
              <img class="profile-img w-20 h-20 shadow-lg" src="<?php echo $_SESSION['profile_image'] ?>" alt="" />
              <label v-if="isBannerEdit">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                    clip-rule="evenodd"></path>
                </svg>
                <input type="file" class="hidden" name="profile_image">
              </label>
            </div>


          </div>

          <div class="mt-6">
            <div v-if="isBannerEdit">
              <button type="submit" name="save-banner" class="primary__btn hover:bg-green-400">Save</button>
              <button type="button" @click="toggleBannerEdit" class="secondary__btn border border-black">Cancel</button>
            </div>
            <button type="button" v-else @click="toggleBannerEdit" class="primary__btn hover:bg-green-400">Edit</button>
          </div>
        </form>
      </section>
    </main>
  </div>
  <!-- End Main Area -->
  </div>

  <!-- Scripts Area -->
  <?php include ROOT_PATH . '/app/includes/scripts.php' ?>

  <!-- <script>
  CKEDITOR.replace('banner_title');
  </script> -->
</body>

</html>