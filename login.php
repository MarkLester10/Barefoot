<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/middlewares/GuestsMiddleware.php";
$title = "Barefoot | Login";
include ROOT_PATH . '/app/includes/layoutTop.php';
?>



<!-- login area -->
<div class="flex items-center justify-center dark:bg-gray-900 p-6">
  <div class="flex-1 max-w-4xl mx-auto overflow-hidden rounded-lg shadow-xl bg__adaptive">
    <div class="flex flex-col overflow-y-auto md:flex-row">
      <div class="h-32 md:h-full md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full"
          src="<?php echo BASE_URL . '/assets/imgs/auth/login.jpg' ?>" alt="Login" />
      </div>
      <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
          <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Login
          </h1>
          <form action="login.php" method="post">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Username or Email</span>
              <input type="text"
                class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('username', $errors)) ? 'border border-red-500' : '' ?>"
                placeholder=" janedoe" name="username" value="<?php echo $username ?>" />
              <?php if (count($errors) > 0 && array_key_exists('username', $errors)) : ?>
              <small class="block mt-2 text-red-500"><?php echo $errors['username'] ?></small>
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
            <button class="w-full mt-4 primary__btn" type="submit" name="login-btn">
              Login
            </button>
          </form>

          <hr class="my-8" />

          <p class="mt-4">
            <a class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline" href="forgot-password.php">
              Forgot your password?
            </a>
          </p>
          <p class="mt-1">
            <a class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline" href="signup.php">
              Create account
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="py-6 dark:bg-gray-900"></div>
<?php include ROOT_PATH . '/app/includes/footer.php' ?> -->
</div>
<!-- End of Sidebar -->
</div>
<!-- End of App -->

<!-- Scripts Area -->
<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>