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
      <?php foreach ($randomStories as $key => $randomStory) : ?>
      <div class="travel__card rounded-md <?php echo ($key === 0) ? 'lg:col-span-2' : '' ?>">
        <div class="overlay rounded-md"></div>
        <img src='<?php echo BASE_URL . "/assets/imgs/travels/{$randomStory['image']}" ?>'
          class="travel__card__img rounded-md" alt="Beach">
        <?php if (authenticated()) : ?>
        <div class="bookmark__icon text__adaptive">
          <a href="/?bookmark=<?php echo $randomStory['id'] ?>" class="btn">
            <?php if (in_array($randomStory['id'], $bookmarkPostIds)) : ?>
            <div class="relative">
              <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
              </svg>
              <svg class="w-5 h-5 text-green-500 checkmark" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                </path>
              </svg>
            </div>
            <?php else : ?>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
            </svg>
            <?php endif; ?>

          </a>
        </div>
        <?php endif; ?>
        <div class="travel__card__title">
          <a href='<?php echo "/travels/story.php?title={$randomStory['slug']}&id={$randomStory['id']}" ?>'>
            <h1 class="title__text hover:underline"><?php echo $randomStory['title'] ?></h1>
            <span class="pill"><?php echo $randomStory['reading_time'] ?> mins</span>
          </a>
          <div class="travel__card__author space-x-3">
            <a
              href='<?php echo "/user/profile.php?username={$randomStory['username']}&id={$randomStory['user_id']}" ?>'>
              <?php if (empty($randomStory['profile_image'])) : ?>
              <img src="https://ui-avatars.com/api/?name=<?php echo $randomStory['username'] ?>&size=512"
                class="profile-img" alt="Profile Image">
              <?php else : ?>
              <img src='<?php echo BASE_URL . "/assets/imgs/auth/profiles/{$randomStory['profile_image']}" ?>'
                class="profile-img" alt="Profile Image">
              <?php endif; ?>
            </a>
            <div class="travel__card__desc">
              <h1 class="subtitle__text">
                <?php echo $randomStory['username'] ?>
              </h1>
              <small class="flex items-center space-x-2">
                <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                    clip-rule="evenodd"></path>
                </svg>
                <span>
                  <?php echo formattedLikes($randomStory['likes']) ?> &#8226;
                  <?php echo formattedTime($randomStory['created_at']) ?></span>
              </small>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
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