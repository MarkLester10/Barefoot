<?php
include "../path.php";
// require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
if (!empty($story)) {
  $relatedStories = selectPublicPosts(['p.is_published' => 1, 'p.category_id' => $story['catId']]);
}
$title = empty($story['title']) ? 'Barefoot Blog' : $story['title'];
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/loader.php';
include ROOT_PATH . '/app/includes/sidebar.php';
?>



<!-- Main area -->
<main class="xl:flex-1 xl:overflow-x-hidden">
  <?php if (!empty($story)) : ?>
  <section class="story__area xl:pr-4 py-4">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-2 mixitup">
      <!-- Story Area -->
      <div class="bg__adaptive rounded-md lg:col-span-3">
        <?php include ROOT_PATH . '/app/includes/story/storyimage.php'; ?>
        <?php include ROOT_PATH . '/app/includes/story/storydetails.php'; ?>
        <?php include ROOT_PATH . '/app/includes/story/commentsection.php'; ?>
      </div>

      <!-- Similar Stories -->
      <div class="rounded-md px-3">
        <h1 class="text-lg font-semibold tracking-wide text__adaptive py-4 md:py-0">Check out this stories too! 🧐</h1>
        <div class="border my-4 border-red-400"></div>
        <?php include ROOT_PATH . '/app/includes/story/relatedStories.php' ?>
      </div>
    </div>
  </section>
  <?php else : ?>
  <section class="flex items-center justify-center h-full">
    <h1 class="title__text text__adaptive">Oh Snap!, We cannot find that story 😞</h1>
  </section>
  <?php endif; ?>
  <?php include ROOT_PATH . '/app/includes/footer.php' ?>
</main>

<!-- Modal -->
<div class="confirmation__modal" :class="{'active':isModalOpen}" @click="toggleModal">
  <div class="modal__body rounded-md bg__adaptive px-4 py-4 w-11/12 md:w-10/12 md:px-6 md:py-6">
    <iframe class="w-full" height="500" src="https://www.youtube.com/embed/<?php echo $story['youtube_url'] ?>"
      frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowfullscreen></iframe>
  </div>
</div>

<?php include ROOT_PATH . '/app/includes/modals/heart.php' ?>
<!-- Modal -->
<div class="confirmation__modal" :class="{'active':isConfirmModalOpen}">
  <form method="post" action="travels.php"
    class="modal__body rounded-md bg__adaptive px-4 py-4 w-11/12 md:w-auto md:px-6 md:py-6">
    <p class="subtitle__text text__adaptive">
      Are you sure you want to delete this comment?
    </p>
    <input type="hidden" name="post_id" :value="postId">
    <div class="mt-4 space-x-4">
      <button type="button" class="secondary__btn border border-black"
        @click.prevent="toggleConfirmModal">Cancel</button>
      <button type="submit" name="delete-post" @click.prevent="deleteComment"
        class="danger__btn hover:bg-red-400">Delete</button>
    </div>
  </form>
</div>


</div>
<!-- End of Sidebar -->
</div>
<!-- End of App -->

<!-- Scripts Area -->

<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>
