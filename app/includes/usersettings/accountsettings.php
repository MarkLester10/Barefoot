<section class="account__settings py-6 px-4 xl:px-0 xl:pr-4">
  <form method="post" action="settings.php" class="py-6 bg__adaptive px-4 md:w-1/2 shadow-md">
    <h1 class="subtitle__text text__adaptive">Account Settings</h1>
    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Username</span>
      <input type="text"
        class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('username', $errors)) ? 'border border-red-500' : '' ?>"
        placeholder="janedoe" name="username"
        value="<?php echo !empty($username) ? $username : $_SESSION['username']; ?>" />
      <?php if (count($errors) > 0 && array_key_exists('username', $errors)) : ?>
      <small class="block mt-2 text-red-500"><?php echo $errors['username'] ?></small>
      <?php endif; ?>
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Email</span>
      <input
        class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('email', $errors)) ? 'border border-red-500' : '' ?>"
        placeholder="janedoe@email.com" type="email" name="email"
        value="<?php echo !empty($email) ? $email : $_SESSION['email']; ?>" />
      <?php if (count($errors) > 0 && array_key_exists('email', $errors)) : ?>
      <small class=" block mt-2 text-red-500"><?php echo $errors['email'] ?></small>
      <?php endif; ?>

    </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Current Password</span>
      <input
        class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('current_password', $errors)) ? 'border border-red-500' : '' ?>"
        placeholder="***************" type="password" name="current_password" />
      <?php if (count($errors) > 0 && array_key_exists('current_password', $errors)) : ?>
      <small class="block mt-2 text-red-500"><?php echo $errors['current_password'] ?></small>
      <?php endif; ?>
    </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        New password
      </span>
      <input class="form__input" placeholder="***************" type="password" name="password" />
    </label>

    <div class="mt-6">
      <button type="submit" name="save-account" class="primary__btn hover:bg-green-400">Save</button>
    </div>
  </form>
</section>