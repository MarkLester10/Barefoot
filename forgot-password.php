<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/middlewares/GuestsMiddleware.php";

$title = "Barefoot | Create Account";
include ROOT_PATH . '/app/includes/layoutTop.php';
?>



<!-- Forgot password Area -->
<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
  <div class="flex-1 max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
    <div class="flex flex-col overflow-y-auto md:flex-row">
      <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full"
          src="<?php echo BASE_URL . '/assets/imgs/auth/forgot-password.png' ?>" alt="Office" />
      </div>
      <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
          <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Recover your password
          </h1>
          <?php include ROOT_PATH . '/app/includes/messages.php' ?>
          <p class="py-2 text-sm text-gray-400">
            Please enter the email address you've registered in our website, so we can assist you in recovering your
            password.
          </p>
          <form action="forgot-password.php" class="mt-6" method="post">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Email</span>
              <input
                class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('email', $errors)) ? 'border border-red-500' : '' ?>"
                placeholder="janedoe@email.com" type="email" name="email" />
              <?php if (count($errors) > 0 && array_key_exists('email', $errors)) : ?>
              <small class="block mt-2 text-red-500"><?php echo $errors['email'] ?></small>
              <?php endif; ?>
            </label>

            <!-- You should use a button here, as the anchor is only used for the example  -->
            <button type="submit" class="w-full mt-4 primary__btn" name="forgot-password-btn">
              Recover password
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>