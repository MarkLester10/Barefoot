<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/SettingsController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";

$title = "Barefoot Travel Blog";
include ROOT_PATH . '/app/includes/layoutTop.php';
?>

<!--Delete Account Area -->
<div class="p-6" :class="isDarkModeOn ? 'bg__img__dark' : 'bg__img__light'">
  <div class="flex-1 max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
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
<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>