<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
// require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";
?>
<!doctype html>
<html lang="en">


<head>
  <title>Barefoot Travel Blog</title>
  <?php include ROOT_PATH . '/app/includes/head.php' ?>
  <style>
  .scrollable-sidebar::-webkit-scrollbar {
    display: none;
  }
  </style>
</head>

<body>
  <div class="app" id="app">
    <button @click="toggleDarkMode" id="switchTheme" class="darkmode-btn" href="#">
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
    </button>
    <header class="header">
      <div class="px-4 py-3 flex justify-between xl:w-72 xl:justify-center">
        <div>
          <img src="./assets/imgs/logo__dark.png" v-if="!isDarkModeOn" class="w-1/2 md:w-full" alt="Avatar Icon" />
          <img src="./assets/imgs/logo__white.png" v-else class="w-1/2 md:w-full" alt="Avatar Icon" />
        </div>
        <div class="flex sm:hidden">
          <button @click="toggleMainMenu" type="button"
            class="focus:outline-none px-2 focus:text-white focus:shadow-none">
            <svg class="w-6 h-6 text-gray-500 hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
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
        <div class="hidden xl:block relative ml-4 max-w-sm w-full">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </div>
          <input class="input-web" type="text" placeholder="Search by keywords" />
        </div>
        <div class="sm:flex sm:items-center border-t border-gray-600 sm:border-t-0">
          <div class="relative px-5 py-5 sm:py-0 sm:ml-4 sm:px-0 md:relative">
            <div class="flex items-center" @click="toggleUserDropDown">
              <img class="profile-img" src="./assets/imgs/auth/avatar.png" alt="" />
              <span class="ml-4 text-black dark:text-gray-200">Mark Lester</span>
            </div>
            <div class="profile-dropDown" :class="userDropDownOpen ? 'sm:block' : 'sm:hidden'">
              <a class="mt-3 profile-link" href="#">Portfolio</a>
              <a class="mt-3 profile-link" target="_blank" href="https://www.facebook.com/marklesterpyong10"><i
                  class="fab fa-github"></i> Github</a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <!-- End of Header area -->

    <div class="xl:flex-1 xl:flex xl:overflow-y-auto">
      <section class="bg-white dark:bg-gray-900 xl:w-72">
        <div class="flex justify-between px-4 py-3 xl:hidden">
          <div class="relative mr-4 max-w-md w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
              <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
            <input
              class="bg-gray-900 text-white rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:bg-white focus:text-gray-900 w-full block"
              type="text" placeholder="Search by keywords" />
          </div>
          <button @click="toggleFilter" class="filter-btn"
            :class="{'hover:bg-red-500 bg-gray-900 shadow':isFilterOpen,'bg-dark-900':!isFilterOpen}">
            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
              </path>
            </svg>
            <span class="text-white font-medium ml-1">Menu</span>
          </button>
        </div>
        <div :class="{'hidden':!isFilterOpen, 'block':isFilterOpen}"
          class="xl:block xl:h-full xl:flex xl:flex-col xl:justify-between text-white">
          <div class="scrollable-sidebar lg:flex xl:block xl:overflow-y-scroll">

            <!-- First Section -->
            <div class="section pb-6">
              <div class="sm:flex sm:-mx-2 lg:block lg:mx-0">
                <label class="mt-3 flex items-center sm:px-2 sm:w-auto lg:w-full lg:px-0">
                  <div class="p-2 rounded-md bg-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                      </path>
                    </svg>
                  </div>
                  <span class="ml-2 text-white tracking-widest">Discover</span>
                </label>

                <label class="mt-3 flex items-center sm:px-2 sm:w-auto lg:w-full lg:px-0">
                  <div class="p-2 rounded-md bg-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                  </div>
                  <span class="ml-2 text-white tracking-widest">Trending</span>
                </label>
              </div>
            </div>
            <!-- end Section -->

            <!-- Second Section -->
            <div class="section sm:pb-6">
              <div class="sm:flex sm:-mx-2 sm:flex-wrap border-t border-gray-600">
                <span class="text-sm font-semibold text-gray-500">Travel Categories</span>
                <label v-for="game in gameTypes" class="mt-3 flex items-center sm:px-2 sm:w-auto lg:w-1/2 xl:w-full">
                  <span class="ml-2 text-white">{{ game }}</span>
                </label>
              </div>
            </div>
            <!-- end second Section -->
          </div>

          <div class="border-t border-gray-900 px-4 py-4 sm:text-right">
            <button type="button" class="primary-btn">Update Results</button>
          </div>
        </div>
      </section>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="./assets/js/init-vue.js"></script>
</body>

</html>