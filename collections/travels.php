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
        <li class="cursor-pointer text__adaptive tracking-widest" data-filter=".unpublished">Unpublished</li>
        <?php foreach ($categories as $category) : ?>
        <li class="cursor-pointer text__adaptive tracking-widest" data-filter=".<?php echo $category['slug'] ?>">
          <?php echo $category['name'] ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="collection__grid mixitup">
      <?php if (count($allPosts) > 0) : ?>
      <?php include ROOT_PATH . '/app/includes/usersettings/travelcards.php'; ?>
      <?php else : ?>
      <h1 class="title__text text__adaptive flex flex-col">
        You haven't posted any travels yet
        <a href="/collections/create.php" class="primary__btn hover:bg-green-400 mt-4">Create One</a>
      </h1>
      <?php endif; ?>
      <!-- Modal -->
      <div class="confirmation__modal" :class="{'active':isModalOpen}">
        <form method="post" action="travels.php"
          class="modal__body rounded-md bg__adaptive px-4 py-4 w-11/12 md:w-auto md:px-6 md:py-6">
          <p class="subtitle__text text__adaptive">
            Are you sure you want to delete this post?
          </p>
          <input type="hidden" name="post_id" :value="postId">
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

</div>
<!-- End of Sidebar -->
</div>
<!-- End of App -->

<!-- Scripts Area -->

<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>