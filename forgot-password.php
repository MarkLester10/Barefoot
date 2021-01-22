<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/middlewares/GuestsMiddleware.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Barefoot | Forgot Password</title>
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
  <div id="app">
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

    <!-- Forgot password Area -->
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full"
              src="<?php echo BASE_URL . '/assets/imgs/auth/forgot-password-office.jpeg' ?>" alt="Office" />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Recover your password
              </h1>
              <?php if (isset($_SESSION['message'])) : ?>
              <p
                class="py-2 px-2 text-white rounded <?php echo ($_SESSION['type'] == 'success') ? 'bg-green-400' : 'bg-red-400' ?>">
                <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
                  unset($_SESSION['type']);
                  ?>
              </p>
              <?php else : ?>
              <p class="py-2 text-gray-400">
                Please enter the email address you've registered in our website, so we can assist you in recovering your
                password.
              </p>
              <?php endif; ?>
              <form action="forgot-password.php" class="mt-6" method="post">
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Email</span>
                  <input
                    class="block w-full mt-1 text-sm dark:bg-gray-700 focus:border-none focus:outline-none focus:shadow-outline-none dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                    <?php echo (count($errors) > 0 && array_key_exists('email', $errors)) ? 'border border-red-500' : '' ?>"
                    placeholder="janedoe@email.com" type="email" name="email" />
                  <?php if (count($errors) > 0 && array_key_exists('email', $errors)) : ?>
                  <small class="block mt-2 text-red-500"><?php echo $errors['email'] ?></small>
                  <?php endif; ?>
                </label>

                <!-- You should use a button here, as the anchor is only used for the example  -->
                <button type="submit"
                  class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-black border border-transparent rounded-lg active:bg-purple-600 hover:bg-gray-900 focus:outline-none focus:shadow-outline-none"
                  name="forgot-password-btn">
                  Recover password
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="<?php echo BASE_URL . '/assets/js/init-vue.js' ?>"></script>
</body>

</html>