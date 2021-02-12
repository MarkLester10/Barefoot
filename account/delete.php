<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/SettingsController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Barefoot | Account Deletion</title>
  <?php include ROOT_PATH . '/app/includes/head.php' ?>
</head>

<body>
  <div id="app">
    <?php include ROOT_PATH . '/app/includes/loader.php' ?>
    <button @click="toggleDarkMode" id="switchTheme" class="darkmode-btn" href="#">
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

    <!--Delete Account Area -->
    <div :class="isDarkModeOn ? 'bg__img__dark' : 'bg__img__light'">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full"
              src="<?php echo BASE_URL . '/assets/imgs/auth/delete-account.png' ?>" alt="Delete Account" />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Delete Account Confirmation
              </h1>
              <?php include ROOT_PATH . '/app/includes/messages.php' ?>
              <p class="py-2 text-sm text-gray-400">
                Please verify your password
              </p>
              <form action="delete.php" class="mt-6" method="post">
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Password</span>
                  <input
                    class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('password', $errors)) ? 'border border-red-500' : '' ?>"
                    placeholder="********" type="password" name="password" />
                  <?php if (count($errors) > 0 && array_key_exists('password', $errors)) : ?>
                  <small class="block mt-2 text-red-500"><?php echo $errors['password'] ?></small>
                  <?php endif; ?>
                </label>

                <button type="submit" class="mt-4 w-full danger__btn hover:bg-red-400" name="delete-account">
                  Delete Account
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts Area -->
  <?php include ROOT_PATH . '/app/includes/scripts.php' ?>
</body>

</html>