<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/BlogPostController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";
?>
<!doctype html>
<html lang="en">


<head>
  <title>Barefoot Travel Blog</title>
  <?php include ROOT_PATH . '/app/includes/head.php' ?>

</head>

<body>
  <div class="app" id="app">
    <?php include ROOT_PATH . '/app/includes/loader.php' ?>
    <?php include ROOT_PATH . '/app/includes/warning.php' ?>
    <?php include ROOT_PATH . '/app/includes/messages.php' ?>

    <button @click="toggleDarkMode" id="switchTheme" class="darkmode-btn block xl:hidden" href="#">
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

    <!-- Header Area -->
    <?php include ROOT_PATH . '/app/includes/header.php' ?>

    <!-- Sidebar Area -->
    <?php include ROOT_PATH . '/app/includes/sidebar.php' ?>

    <!-- Main area -->
    <main class="xl:flex-1 xl:overflow-x-hidden">
      <!-- Blog Collections -->
      <section class="blog__collections py-6 px-4 xl:px-0 xl:pr-4">

        <h1 class="title__text text__adaptive">Travel Stories</h1>
        <div class="py-2 mt-4 border-b">
          <ul class="blogs_categories list">
            <li class="cursor-pointer text__adaptive tracking-widest" data-filter="all">All</li>
            <?php foreach ($categories as $category) : ?>
            <li class="cursor-pointer text__adaptive tracking-widest" data-filter=".<?php echo $category['slug'] ?>">
              <?php echo $category['name'] ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="collection__grid">
          <div class="card rounded-md mix" :class="travelog" v-for="travelog in travelBlogs">
            <div class="card__img">
              <span class="pill">7 mins</span>
              <img src='<?php echo  BASE_URL . "/assets/imgs/travels/demo.jpg" ?>' class="rounded-t-md" alt="">
            </div>
            <div class="card__description bg__adaptive rounded-b-md">
              <p class="para text-red-400 font-medium italic">{{ travelog }}</p>
              <a href="#hehe">
                <h1 class="title__text text__adaptive py-2">Lorem ipsum dolor sit amet.</h1>
              </a>
              <ul class="mb-2 text-xs text-gray-500 list space-x-2 py-0">
                <li>#lorem</li>
                <li>#lorem</li>
                <li>#lorem</li>
              </ul>
              <div class="flex items-center justify-between text__adaptive pb-2">
                <small class="flex items-center space-x-2">
                  <a href="#">
                    <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </a>
                  <span>53k likes &#8226; 3 mins ago</span>
                </small>
              </div>
              <hr>
              <div class="mt-4 space-x-4">
                <!-- TODO: CREATE ACTION BUTTON EDIT AND DELETE -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
  <!-- End Main Area -->
  </div>

  <!-- Scripts Area -->
  <?php include ROOT_PATH . '/app/includes/scripts.php' ?>
</body>

</html>