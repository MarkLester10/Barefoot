<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/BlogPostController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";

$title = "{$_SESSION['username']} Travel Collections";
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/loader.php';
include ROOT_PATH . '/app/includes/sidebar.php';
?>



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
            <button type="button" data-id="1" class="btn" @click.prevent="toggleModal(1)">
              <svg class="w-6 h-6 text__adaptive inline hover:text-red-500" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                </path>
              </svg>
            </button>
            <a type="#" class="btn inline-block" @click.prevent="toggleModal">
              <svg class="w-6 h-6 text__adaptive inline hover:text-green-500" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                </path>
              </svg>
            </a>
          </div>
        </div>
        <!-- End of Card -->
      </div>
      <!-- Modal -->
      <div class="confirmation__modal" :class="{'active':isModalOpen}">
        <form method="post" action="#"
          class="modal__body rounded-md bg__adaptive px-4 py-4 w-11/12 md:w-auto md:px-6 md:py-6">
          <p class="subtitle__text text__adaptive">
            Are you sure you want to delete this post?
          </p>
          <input type="hidden" name="post" :value="postId">
          <div class="mt-4 space-x-4">
            <button type="button" class="secondary__btn border border-black"
              @click.prevent="toggleModal">Cancel</button>
            <button type="submit" name="delete-post" class="danger__btn hover:bg-red-400">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</main>


<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>