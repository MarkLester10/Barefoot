<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
$title = "Barefoot Travel Blog";
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/loader.php';
include ROOT_PATH . '/app/includes/sidebar.php';
?>



<!-- Main area -->
<main class="xl:flex-1 xl:overflow-x-hidden">
  <section class="discover__area py-6 px-4 xl:px-0 xl:pr-4">
    <h1 class="title__text text__adaptive">Discover</h1>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 py-8">

      <!-- First Card -->
      <div class="travel__card rounded-md lg:col-span-2">
        <div class="overlay rounded-md"></div>
        <img src="./assets/imgs/travels/demo1.jpg" class="travel__card__img rounded-md" alt="Beach">
        <?php if (authenticated()) : ?>
        <div class="bookmark__icon text__adaptive">
          <a href="/" class="block btn">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
            </svg>
          </a>
        </div>
        <?php endif; ?>
        <div class="travel__card__title">
          <a href="#">
            <h1 class="title__text">Lorem ipsum dolor sit amet consectetur, adipisicing
              elit. Aut, maiores?</h1>
            <span class="pill">7 mins</span>
          </a>
          <div class="travel__card__author space-x-3">
            <a href="/user/profile.php"><img src="./assets/imgs/auth/avatar.png" class="profile-img" alt=""></a>
            <div class="travel__card__desc">
              <h1 class="subtitle__text">
                Jane Doe
              </h1>
              <small class="flex items-center space-x-2">
                <a href="#" class="btn <?php echo (authenticated() === 0) ? 'isDisabled' : '' ?>" @click="toggleHeart">
                  <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                      clip-rule="evenodd"></path>
                  </svg>
                  <!-- <svg class="w-6 h-6 text__adaptive" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                  </svg> -->
                </a>
                <span>53k likes &#8226; 1hour ago</span>
              </small>
            </div>
          </div>
        </div>
      </div>

      <!-- Second card -->
      <div class="travel__card rounded-md">
        <div class="overlay rounded-md"></div>
        <img src="./assets/imgs/travels/demo.jpg" class="travel__card__img rounded-md" alt="Beach">
        <?php if (authenticated()) : ?>
        <div class="bookmark__icon text__adaptive">
          <a href="#" class="block btn <?php echo (authenticated() === 0) ? 'isDisabled' : '' ?>">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
            </svg>
          </a>
        </div>
        <?php endif; ?>
        <div class="travel__card__title">
          <a href="#hehe">
            <h1 class="title__text">Lorem ipsum dolor sit amet consectetur, adipisicing
              elit. Aut, maiores?</h1>
            <span class="pill">7 mins</span>
          </a>
          <div class="travel__card__author space-x-3">
            <a href="/user/profile.php"><img src="./assets/imgs/auth/avatar.png" class="profile-img" alt=""></a>
            <div class="travel__card__desc">
              <h1 class="subtitle__text">
                Jane Doe
              </h1>
              <small class="flex items-center space-x-2">
                <a href="#" class="btn <?php echo (authenticated() === 0) ? 'isDisabled' : '' ?>" @click="toggleHeart">
                  <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                      clip-rule="evenodd"></path>
                  </svg>
                  <!-- <svg  class="w-6 h-6 text__adaptive" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                  </svg> -->
                </a>
                <span>53k likes &#8226; 1hour ago</span>
              </small>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- New Travels -->
  <section class="newpost__area py-6 px-4 xl:px-0 xl:pr-4 ">
    <h1 class="title__text text__adaptive">New Stories 🔥 </h1>
    <div class="py-2 mt-4 border-b">
      <ul class="blogs_categories list">
        <li class="cursor-pointer text__adaptive tracking-widest" data-filter="all">All</li>
        <?php foreach ($categories as $category) : ?>
        <li class="cursor-pointer text__adaptive tracking-widest" data-filter=".<?php echo $category['slug'] ?>">
          <?php echo $category['name'] ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="collection__grid mixitup">
      <?php if (count($publicPosts) > 0) : ?>
      <?php include ROOT_PATH . '/app/includes/collections/travelcards.php'; ?>
      <?php else : ?>
      <h1 class="title__text text__adaptive">Sorry dear, No Post Added Yet 😞</h1>
      <?php endif; ?>
    </div>
  </section>
  <?php include ROOT_PATH . '/app/includes/footer.php' ?>
</main>

<?php include ROOT_PATH . '/app/includes/modals/heart.php' ?>

</div>
<!-- End of Sidebar -->
</div>
<!-- End of App -->

<!-- Scripts Area -->
<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>