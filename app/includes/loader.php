<div class="loader bg-white dark:bg-gray-900">
  <div class="loading__img">
    <img src="<?php echo BASE_URL . '/assets/imgs/logo__dark.png' ?>" v-if="!isDarkModeOn" class="animate-pulse"
      alt="Avatar Icon" />
    <img src="<?php echo BASE_URL . '/assets/imgs/logo__white.png' ?>" v-else class="animate-pulse" alt="Avatar Icon" />
  </div>
</div>