<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
$title = "Barefoot Travel Collections";
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/loader.php';
include ROOT_PATH . '/app/includes/sidebar.php';
?>

<!-- Main area -->
<main class="xl:flex-1 xl:overflow-x-hidden">
  <section class="trending__area py-6 px-4 xl:px-0 xl:pr-4 ">
    <h1 class="title__text text__adaptive">Travel <span
        class="italic text-red-400"><?php echo $_GET['category'] ?></span></h1>
    <div class="collection__grid">
      <div class="card rounded-md mix" :class="travelog" v-for="travelog in travelBlogs">
        <div class="card__img">
          <span class="pill">7 mins</span>
          <img src="<?php echo BASE_URL . '/assets/imgs/travels/demo.jpg' ?>" class="rounded-t-md" alt="">
          <a href="#"><img src="<?php echo BASE_URL . '/assets/imgs/auth/avatar.png' ?>" class="profile-img" alt=""></a>
        </div>
        <div class="card__description bg__adaptive rounded-b-md">
          <h1 class="subtitle__text text__adaptive mb-2">
            Jane Doe
          </h1>
          <p class="para text-red-400 font-medium italic">{{ travelog }}</p>
          <a href="#hehe">
            <h1 class="title__text text__adaptive py-2">Lorem ipsum dolor sit amet.</h1>
          </a>
          <ul class="mb-2 text-xs text-gray-500 list space-x-2 py-0">
            <li>#lorem</li>
            <li>#lorem</li>
            <li>#lorem</li>
          </ul>
          <div class="flex items-center justify-between text__adaptive">
            <small class="flex items-center space-x-2">
              <a href="#">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                  </path>
                </svg>
              </a>
              <span>53k likes &#8226; 1hour ago</span>
            </small>
            <a href="#">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                  d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>