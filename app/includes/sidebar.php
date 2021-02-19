<div class="sidebar">
  <section class="sidebar__section">
    <div class="flex justify-between px-4 py-3 xl:hidden">
      <?php if ($_SERVER['REQUEST_URI'] !== '/login.php' || '/signup.php' || '/forgot-password.php' || '/reset-password') : ?>
      <div class="relative mr-4 max-w-md w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
        <input class="input-web" type="text" placeholder="Search" />
      </div>
      <?php endif; ?>
      <button @click="toggleFilter" class="filter-btn">
        <svg class="w-6 h-6 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
          </path>
        </svg>
        <span class="font-medium ml-1">Menu</span>
      </button>
    </div>
    <div :class="{'hidden':!isFilterOpen, 'block':isFilterOpen}"
      class="xl:block xl:h-full xl:flex xl:flex-col xl:justify-between text-white">
      <div class="scrollable-sidebar lg:flex xl:block xl:overflow-y-scroll">

        <!-- First Section -->
        <div class="section pb-6">
          <span class="sidebar__section__title">Menu</span>
          <div class="sm:flex sm:-mx-2 lg:block lg:mx-0">
            <label class="section-label">
              <div class="p-2 rounded-md 
              <?php echo ($_SERVER['REQUEST_URI'] === '/') ? 'bg-red-400 dark:bg-red-400' : 'bg-gray-200 text__adaptive  dark:bg-gray-800' ?>
              ">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                  </path>
                </svg>
              </div>
              <a href="/"> <span class="sidebar__link">Discover</span></a>
            </label>

            <label class="section-label">
              <div class="p-2 rounded-md  <?php echo ($_SERVER['REQUEST_URI'] === '/trending.php') ? 'bg-red-400 dark:bg-red-400' : 'bg-gray-200 text__adaptive  dark:bg-gray-800' ?>
              ">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
              </div>
              <a href="/trending.php"> <span class="sidebar__link">Trending</span></a>
            </label>

            <?php if (isset($_SESSION['id'])) : ?>
            <label class="section-label">
              <div class="p-2 rounded-md  <?php echo ($_SERVER['REQUEST_URI'] === '/collections/travels.php') ? 'bg-red-400 dark:bg-red-400' : 'bg-gray-200 text__adaptive  dark:bg-gray-800' ?>
              ">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
              </div>
              <a href="/collections/travels.php"> <span class="sidebar__link">My Travels</span></a>
            </label>

            <label class="section-label">
              <div class="p-2 rounded-md  <?php echo ($_SERVER['REQUEST_URI'] === '/collections/create.php') ? 'bg-red-400 dark:bg-red-400' : 'bg-gray-200 text__adaptive  dark:bg-gray-800' ?>
              ">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-line join="round" stroke-width="2"
                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>

              </div>
              <a href="/collections/create.php"> <span class="sidebar__link">Create Story</span></a>
            </label>

            <label class="section-label">
              <div class="p-2 rounded-md  <?php echo ($_SERVER['REQUEST_URI'] === '/collections/bookmarks.php') ? 'bg-red-400 dark:bg-red-400' : 'bg-gray-200 text__adaptive  dark:bg-gray-800' ?>
              ">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                </svg>
              </div>
              <a href="/collections/bookmarks.php"> <span class="sidebar__link">Bookmarks</span></a>
            </label>
            <?php endif; ?>

          </div>
        </div>
        <!-- end Section -->

        <!-- Second Section -->
        <div class="section sm:pb-6">
          <span class="sidebar__section__title">Travel
            Categories</span>
          <div class="sm:flex sm:-mx-2 lg:block lg:mx-0">
            <?php foreach ($categories as $category) : ?>
            <label class="section-label">
              <div
                class="section-label-container <?php echo ($_GET['category'] === $category['slug']) ? 'bg-red-400 dark:bg-red-400' : '' ?>">
                <img class="w-6 h-6" src='<?php echo BASE_URL . "/assets/imgs/categoryicons/{$category['icon']}" ?>'
                  alt="Styles">
              </div>
              <a
                href="/travels/collections.php?category=<?php echo $category['slug'] ?>&id=<?php echo $category['id'] ?>">
                <span class="sidebar__link"><?php echo $category['name'] ?></span></a>
            </label>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- end second Section -->
      </div>

      <div class="px-4 py-4 sm:text-right hidden xl:block">
        <label for="toogleA" class="flex items-center cursor-pointer">
          <div class="relative">
            <input id="toogleA" :checked="isDarkModeOn" type="checkbox" class="hidden" @click="toggleDarkMode" />
            <div class="toggle__line w-10 h-4 bg-gray-200 dark:bg-gray-700 rounded-full shadow-inner"></div>
            <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"></div>
          </div>
          <div class="ml-3 text-gray-700 dark:text-white flex items-center font-medium">
            <svg v-if="!isDarkModeOn" class="w-6 h-6 text-gray-800" id="moon" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
            <svg v-else class="w-6 h-6 text-yellow-400" id="sun" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                clip-rule="evenodd"></path>
            </svg>
            <span class="ml-2">{{isDarkModeOn ? 'Light Mode' : 'Dark Mode'}}</span>
          </div>
        </label>
      </div>
    </div>
  </section>