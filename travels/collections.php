<?php
include "../path.php";
// require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
$title = "Barefoot Travel Collections";
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/sidebar.php';
?>

<!-- Main area -->
<main class="xl:flex-1 xl:overflow-x-hidden">
  <section class="trending__area py-6 px-4 xl:px-0 xl:pr-4 ">
    <?php if (isset($_GET['category'])) : ?>
    <h1 class="title__text text__adaptive">Travel
      <span class="italic text-red-400"><?php echo $_GET['category'] ?></span>
    </h1>
    <?php elseif (isset($_GET['search'])) : ?>
    <h1 class="title__text text__adaptive">You searched for
      <span class="italic text-red-400"><?php echo $_GET['search'] ?></span>
    </h1>
    <?php endif; ?>
    <div class="collection__grid mixitup">
      <?php if (count($publicPosts) > 0) : ?>
      <?php include ROOT_PATH . '/app/includes/collections/travelcards.php'; ?>
      <?php else : ?>
      <h1 class="title__text text__adaptive">No Post Added Yet 😞</h1>
      <?php endif; ?>
    </div>
  </section>
</main>
</div>
<!-- End of Sidebar -->
</div>
<!-- End of App -->

<!-- Scripts Area -->

<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>
