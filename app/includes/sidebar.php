<div class="sidebar">
  <section class="bg-gray-100 xl:bg-white dark:bg-gray-800 xl:dark:bg-gray-900 xl:w-72 xl:pl-4 xl:pr-8">
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
          <span class="text-lg font-semibold text-gray-900 dark:text-gray-100 tracking-widest">Menu</span>
          <div class="sm:flex sm:-mx-2 lg:block lg:mx-0">
            <label class="section-label">
              <div class="p-2 rounded-md 
              <?php echo ($_SERVER['REQUEST_URI'] === '/') ? 'bg-yellow-500 dark:bg-yellow-500' : 'bg-gray-200 text-gray-900 dark:text-white  dark:bg-gray-800' ?>
              ">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                  </path>
                </svg>
              </div>
              <a href="#"> <span
                  class="ml-2 font-medium text-gray-900 dark:text-white tracking-widest">Discover</span></a>
            </label>
            <label class="section-label">
              <div class="p-2 rounded-md  <?php echo ($_SERVER['REQUEST_URI'] === '/trending.php') ? 'bg-yellow-500 dark:bg-yellow-500' : 'bg-gray-200 text-gray-900 dark:text-white  dark:bg-gray-800' ?>
              ">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
              </div>
              <a href="trending.php"> <span
                  class="ml-2 font-medium text-gray-900 dark:text-white tracking-widest">Trending</span></a>
            </label>
            <label class="section-label">
              <div class="p-2 rounded-md  <?php echo ($_SERVER['REQUEST_URI'] === '/bookmarks.php') ? 'bg-yellow-500 dark:bg-yellow-500' : 'bg-gray-200 text-gray-900 dark:text-white  dark:bg-gray-800' ?>
              ">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                </svg>
              </div>
              <a href="#"> <span
                  class="ml-2 font-medium text-gray-900 dark:text-white tracking-widest">Bookmarks</span></a>
            </label>

          </div>
        </div>
        <!-- end Section -->

        <!-- Second Section -->
        <div class="section sm:pb-6">
          <span class="text-lg font-semibold text-gray-900 dark:text-gray-100 tracking-widest">Travel
            Categories</span>
          <div class="sm:flex sm:-mx-2 lg:block lg:mx-0">
            <label class="section-label">
              <div class="p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z">
                  </path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
                </svg>
              </div>
              <a href="#"> <span
                  class="ml-2 text-gray-900 font-medium dark:text-white tracking-widest">Styles</span></a>
            </label>
            <label class="section-label">
              <div class="p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z">
                  </path>
                </svg>
              </div>
              <a href="#"> <span
                  class="ml-2 font-medium text-gray-900 dark:text-white tracking-widest">Activities</span></a>
            </label>
            <label class="section-label">
              <div class="p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                  </path>
                </svg>
              </div>
              <a href="#"> <span
                  class="ml-2 font-medium text-gray-900 dark:text-white tracking-widest">Planning</span></a>
            </label>
            <label class="section-label">
              <div class="p-2 rounded-md text-gray-900 dark:text-white bg-gray-200 dark:bg-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                  </path>
                </svg>
              </div>
              <a href="#"> <span
                  class="ml-2 font-medium text-gray-900 dark:text-white tracking-widest">Inspiration</span></a>
            </label>
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