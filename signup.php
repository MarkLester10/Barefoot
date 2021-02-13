<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/middlewares/GuestsMiddleware.php";

$title = "Barefoot | Create Account";
include ROOT_PATH . '/app/includes/layoutTop.php';
?>



<!-- Signup Area -->
<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900 font-poppins">
  <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
    <div class="flex flex-col overflow-y-auto md:flex-row">
      <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full"
          src="<?php echo BASE_URL . '/assets/imgs/auth/create-account-office.jpeg' ?>" alt="Office" />
      </div>
      <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
          <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Create account
          </h1>
          <form action="signup.php" method="post">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Username</span>
              <input type="text"
                class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('username', $errors)) ? 'border border-red-500' : '' ?>"
                placeholder="janedoe" name="username" value="<?php echo $username ?>" />
              <?php if (count($errors) > 0 && array_key_exists('username', $errors)) : ?>
              <small class="block mt-2 text-red-500"><?php echo $errors['username'] ?></small>
              <?php endif; ?>
            </label>

            <label class="block text-sm mt-4">
              <span class="text-gray-700 dark:text-gray-400">Email</span>
              <input
                class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('email', $errors)) ? 'border border-red-500' : '' ?>"
                placeholder="janedoe@email.com" type="email" name="email" value="<?php echo $email ?>" />
              <?php if (count($errors) > 0 && array_key_exists('email', $errors)) : ?>
              <small class="block mt-2 text-red-500"><?php echo $errors['email'] ?></small>
              <?php endif; ?>

            </label>


            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Password</span>
              <input
                class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('password', $errors)) ? 'border border-red-500' : '' ?>"
                placeholder="***************" type="password" name="password" />
              <?php if (count($errors) > 0 && array_key_exists('password', $errors)) : ?>
              <small class="block mt-2 text-red-500"><?php echo $errors['password'] ?></small>
              <?php endif; ?>
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Confirm password
              </span>
              <input class="form__input" placeholder="***************" type="password" name="passwordConf" />
            </label>




            <button class="w-full mt-4 primary__btn" type="submit" name="signup-btn">
              Create account
            </button>
          </form>

          <hr class="my-8" />

          <p class="mt-4">
            <a class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline" href="login.php">
              Already have an account? Login
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>