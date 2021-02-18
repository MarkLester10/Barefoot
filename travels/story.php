<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
$similarStories = selectPublicPosts(['p.is_published' => 1, 'p.category_id' => $story['catId']]);
$title = empty($story['title']) ? 'Barefoot Blog' : $story['title'];
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/sidebar.php';
?>



<!-- Main area -->
<main class="xl:flex-1 xl:overflow-x-hidden">
  <?php if (!empty($story)) : ?>
  <section class="story__area xl:pr-4 py-4">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-2 mixitup">
      <div class="bg__adaptive rounded-md lg:col-span-3">
        <!-- Story Image -->
        <?php include ROOT_PATH . '/app/includes/story/storyimage.php'; ?>
        <!-- Story Details -->
        <?php include ROOT_PATH . '/app/includes/story/storydetails.php'; ?>
        <!-- Comment Section -->
        <?php include ROOT_PATH . '/app/includes/story/commentsection.php'; ?>
      </div>

      <!-- Similar Stories -->
      <div class="rounded-md px-3">
        <h1 class="subtitle__text text__adaptive py-6 md:py-0">Stories that you might also like 💘</h1>
        <hr class="my-6">
        <?php foreach ($similarStories as $similarStory) : ?>
        <div class="similar__story mb-4">
          <img src='<?php echo BASE_URL . "/assets/imgs/travels/{$similarStory['image']}" ?>' alt="Story">
          <div class="py-3 px-4 bg__adaptive">
            <a
              href="/collections/story.php?title=<?php echo $similarStory['slug'] ?>&id=<?php echo $similarStory['id'] ?>">
              <h1 class="text__adaptive hover:underline"><?php echo $similarStory['title'] ?></h1>
            </a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php else : ?>
  <section class="flex items-center justify-center h-full">
    <h1 class="title__text text__adaptive">Sorry dear, We cannot find that story 😞</h1>
  </section>
  <?php endif; ?>
  <!-- <?php include ROOT_PATH . '/app/includes/footer.php' ?> -->
</main>
<!-- End Main Area -->
<!-- Modal -->
<div class="confirmation__modal" :class="{'active':isModalOpen}" @click="toggleModal">
  <div class="modal__body rounded-md bg__adaptive px-4 py-4 w-11/12 md:w-10/12 md:px-6 md:py-6">
    <iframe class="w-full" height="500" src="https://www.youtube.com/embed/<?php echo $story['youtube_url'] ?>"
      frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowfullscreen></iframe>
  </div>
</div>

</div>
<!-- End of Sidebar -->
</div>
<!-- End of App -->

<!-- Scripts Area -->
<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>