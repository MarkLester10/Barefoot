<footer class="footer flex-col">
  <a href="/">
    <img src="<?php echo BASE_URL . '/assets/imgs/logo__dark.png"' ?> v-if=" !isDarkModeOn"
      class="w-1/2 lg:w-7/12 mx-auto" alt="Avatar Icon" />
    <img src="<?php echo BASE_URL . '/assets/imgs/logo__white.png' ?>" v-else class="w-1/2 lg:w-7/12 mx-auto"
      alt="Avatar Icon" />
  </a>
  <div class="text-2xl mt-3 flex items-center space-x-4 text-gray-500">
    <a class=" hover:text-gray-900" target="_blank" href="#"><i class="fab fa-github"></i></a>
    <a class=" hover:text-blue-400" target="_blank" href="#"><i class="fab fa-facebook"></i></a>
    <a class=" hover:text-blue-300" target="_blank" href="#"><i class="fab fa-twitter"></i></a>
    <a class=" hover:text-red-400" target="_blank" href="#"><i class="fab fa-instagram"></i></a>
  </div>
</footer>