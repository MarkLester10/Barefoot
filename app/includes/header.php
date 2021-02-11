<header class="header">
  <div class="px-4 py-3 flex justify-between xl:w-72 xl:justify-center">
    <div>
      <a href="/">
        <img src="<?php echo BASE_URL . '/assets/imgs/logo__dark.png"' ?> v-if=" !isDarkModeOn" class="w-1/2 lg:w-7/12"
          alt="Avatar Icon" />
        <img src="<?php echo BASE_URL . '/assets/imgs/logo__white.png' ?>" v-else class="w-1/2 lg:w-7/12"
          alt="Avatar Icon" />
      </a>
    </div>
    <div class="flex sm:hidden">
      <button @click="toggleMainMenu" type="button" class="focus:outline-none px-2 focus:text-white focus:shadow-none">
        <svg class="w-6 h-6 text-gray-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path v-if="!isMainMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"></path>
          <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
          </path>
        </svg>
      </button>
    </div>
  </div>
  <nav :class="{'hidden': !isMainMenuOpen, 'block':isMainMenuOpen}"
    class="tracking-wider font-semibold sm:flex sm:items-center sm:pr-4 xl:flex-1 xl:justify-between">
    <div class="hidden xl:block relative max-w-lg w-full">
      <div class="absolute inset-y-0 left-0 flex items-center pl-3">
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
      </div>
      <input class="input-web" type="text" placeholder="Search . . ." />
    </div>
    <div class="sm:flex sm:items-center border-t border-gray-200 sm:border-t-0">
      <?php if (isset($_SESSION['id'])) : ?>
      <div class=" relative px-5 py-5 sm:py-0 sm:ml-4 sm:px-0 md:relative">
        <div class="flex items-center md:flex-row-reverse" @click="toggleUserDropDown">
          <img class="profile-img" src="<?php echo is_null($_SESSION['profile_image'])
                                            ? "https://ui-avatars.com/api/?name=" . str_replace(' ', '', $_SESSION['username']) . "&size=512"
                                            : BASE_URL . "/assets/imgs/auth/profiles/{$_SESSION['profile_image']}"; ?>"
            alt="" />
          <span class="text-black dark:text-gray-200 ml-4 md:ml-0 md:mr-4"><?php echo $_SESSION['username'] ?></span>
        </div>
        <div class="profile-dropDown rounded-md" :class="userDropDownOpen ? 'sm:block' : 'sm:hidden'">
          <a class="mt-3 profile-link" href="/account/settings.php">Settings</a>
          <a class="mt-3 profile-link" href="/logout.php"><i class="fab fa-github"></i> Logout</a>
        </div>
      </div>
      <?php else : ?>
      <div class="nav-links xl:space-x-4">
        <a class="nav-link-item" href="login.php">Login</a>
        <a class="nav-link-item mt-1 sm:mt-0" href="signup.php">Register</a>
      </div>
      <?php endif; ?>
    </div>
  </nav>
</header>