<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/middlewares/GuestsMiddleware.php";

$title = "Barefoot | Reset Password";
include ROOT_PATH . '/app/includes/layoutTop.php';
?>

<!-- Reset area -->
<div class="flex items-center p-6 h-full">
  <div class="flex-1 max-w-4xl mx-auto overflow-hidden rounded-lg shadow-xl bg__adaptive">
    <div class="flex flex-col overflow-y-auto md:flex-row">
      <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full"
          src="<?php echo BASE_URL . '/assets/imgs/auth/create-account-office.jpeg' ?>" alt="Reset" />
      </div>
      <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
          <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Reset password
          </h1>
          <form action="reset-password.php" method="post">

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">New Password</span>
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
                Confirm new password
              </span>
              <input class="form__input" placeholder="***************" type="password" name="passwordConf" />
            </label>
            <button class="w-full mt-4 primary__btn" type="submit" name="reset-password-btn">
              Reset Password
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<!-- End of App -->

<!-- Scripts Area -->

<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>