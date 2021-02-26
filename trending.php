<?php
include "path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
$title = "Barefoot Travel Blog";
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/sidebar.php';

?>

<!-- Main area -->
<main class="xl:flex-1 xl:overflow-x-hidden">
  <!-- Trending -->
  <section class="trending__area py-6 px-4 xl:px-0 xl:pr-4 ">
    <h1 class="title__text text__adaptive">Trending Travels 🔥 </h1>
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
      <?php if (count($trending) > 0) : ?>
      <?php include ROOT_PATH . '/app/includes/collections/trendingcards.php'; ?>
      <?php else : ?>
      <h1 class="title__text text__adaptive">No Treding Post at this moment 😞</h1>
      <?php endif; ?>
    </div>
  </section>
  <?php include ROOT_PATH . '/app/includes/footer.php' ?>
</main>
</div>
<!-- End of Sidebar -->
</div>
<!-- End of App -->

<!-- Scripts Area -->
<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>