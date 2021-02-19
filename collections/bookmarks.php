<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/BlogPostController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";
$publicPosts = array();
$bookmarks = selectAll('bookmarks', ['user_id' => $userId]);
foreach ($bookmarks as $bookmark) {
  $post = selectOnePublicPost(['p.is_published' => 1, 'p.id' => $bookmark['post_id']]);
  array_push($publicPosts, $post);
}

$title = "{$_SESSION['username']} | Saved Stories";
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/sidebar.php';
?>



<!-- Main area -->
<main class="xl:flex-1 xl:overflow-x-hidden">
  <!-- Blog Collections -->
  <section class="blog__collections py-6 px-4 xl:px-0 xl:pr-4">

    <h1 class="title__text text__adaptive">Stories you've Saved 🔖</h1>
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
      <h1 class="title__text text__adaptive flex flex-col">
        You haven't bookmarked any stories yet.
      </h1>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php include ROOT_PATH . '/app/includes/modals/heart.php' ?>
</div>
<!-- End of Sidebar -->
</div>
<!-- End of App -->

<!-- Scripts Area -->

<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>