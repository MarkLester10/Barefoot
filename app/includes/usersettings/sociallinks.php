<section class="account__socials py-6 px-4 xl:px-0 xl:pr-4">
  <form method="post" action="settings.php" class="py-6 bg__adaptive px-4 md:w-1/2 shadow-md">
    <h1 class="subtitle__text text__adaptive">Social Links</h1>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Facebook</span>
      <input type="text"
        class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('facebook', $errors)) ? 'border border-red-500' : '' ?>"
        name="facebook" value="<?php echo $facebook ?>" />
      <?php if (count($errors) > 0 && array_key_exists('facebook', $errors)) : ?>
      <small class=" block mt-2 text-red-500"><?php echo $errors['facebook'] ?></small>
      <?php endif; ?>
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Instagram</span>
      <input
        class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('instagram', $errors)) ? 'border border-red-500' : '' ?>"
        type="text" name="instagram" value="<?php echo $instagram ?>" />
      <?php if (count($errors) > 0 && array_key_exists('instagram', $errors)) : ?>
      <small class=" block mt-2 text-red-500"><?php echo $errors['instagram'] ?></small>
      <?php endif; ?>

    </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Twitter</span>
      <input
        class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('twitter', $errors)) ? 'border border-red-500' : '' ?>"
        type="text" name="twitter" value="<?php echo $twitter ?>" />
      <?php if (count($errors) > 0 && array_key_exists('twitter', $errors)) : ?>
      <small class="block mt-2 text-red-500"><?php echo $errors['twitter'] ?></small>
      <?php endif; ?>
    </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Youtube
      </span>
      <input class="form__input" type="text" value="<?php echo $youtube; ?>" name="youtube" />
      <?php if (count($errors) > 0 && array_key_exists('youtube', $errors)) : ?>
      <small class="block mt-2 text-red-500"><?php echo $errors['youtube'] ?></small>
      <?php endif; ?>
    </label>

    <div class="mt-6 relative">
      <button type="submit" name="save-socials" class="primary__btn hover:bg-green-400">Save</button>
    </div>
  </form>
</section>