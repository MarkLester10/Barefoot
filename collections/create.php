<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/BlogPostController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";

$title = "Barefoot | Create Story";
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/loader.php';
include ROOT_PATH . '/app/includes/sidebar.php';
?>



<!-- Main area -->
<main class="xl:flex-1 xl:overflow-x-hidden">
  <!-- Blog Collections -->
  <section class="blog__collections py-6 px-4 xl:px-0 xl:pr-4">

    <h1 class="title__text text__adaptive">Create Story</h1>
    <form class="mixitup grid grid-cols-1 lg:grid-cols-2 gap-6 py-8" action="create.php" method="post"
      enctype="multipart/form-data">

      <!-- Blog Details -->
      <div class="blog__details py-6 bg__adaptive px-4 shadow-md">
        <h1 class="subtitle__text text__adaptive">Blog Details</h1>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Title <span class="text-red-500">*</span>
          </span>
          <input class="form__input" type="text" onkeyup="slugify(this.value)" name="title" />
          <input readonly class="form__input" type="hidden" name="slug" id="slug" />
        </label>

        <label class=" block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Category <span class="text-red-500">*</span>
          </span>
          <select name="category" class="form__input">
            <option value="">Select Category</option>
            <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['id']; ?>">
              <?php echo $category['name'] ?>
            </option>
            <?php endforeach ?>
          </select>
        </label>

        <label class=" block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Tags - optional
          </span>
          <select id="tags" name="tags[]" class="mt-1" multiple>
            <?php foreach ($tags as $tag) : ?>
            <option value="<?php echo $tag['id']; ?>">
              <?php echo $tag['name'] ?>
            </option>
            <?php endforeach ?>
          </select>
        </label>

        <label class=" block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Estimated Reading Time <span class="text-red-500">*</span>
          </span>
          <input type="number" name="reading_time" class="form__input" min="1" placeholder="in mins">
        </label>

        <label class=" block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Youtube URL - Optional
          </span>
          <input type="text" name="youtube_url" class="form__input" min="1"
            placeholder="https://www.youtube.com/watch?v=DW1lqKsadI0">
        </label>
      </div>

      <!-- Blog Image -->
      <div class="blog__image rounded-md relative">
        <label class="text-sm cursor-pointer">
          <img v-if="!isDarkModeOn" id="imageDisplay"
            src="<?php echo BASE_URL . '/assets/imgs/travels/image_preview_light.jpg' ?>"
            class="h-full w-full object-cover" alt="">
          <img v-else src="<?php echo BASE_URL . '/assets/imgs/travels/image_preview_dark.jpg' ?>"
            class="h-full w-full object-cover" id="imageDisplay" alt="Post Image">
          <input type="file" class="hidden" name="image" onchange="displayImage(this)">
        </label>
      </div>
      <!-- Blog Body -->
      <div class="blog__body lg:col-span-2 p-4 bg__adaptive shadow-md">
        <h1 class="subtitle__text text__adaptive py-4">Write your amazing story now! 😍</h1>
        <textarea class="form__input" id="body" name="body"></textarea>
        <div class="flex items-center space-x-2 py-4">
          <input type="checkbox"> <span class="text-sm text-gray-700 dark:text-gray-400">
            I want to publish this story
          </span>
        </div>
        <hr>
        <div class="mt-6 relative">
          <button type="button" name="create-post" @click.prevent="toggleModal"
            class="primary__btn hover:bg-green-400">Create</button>
          <a href="/" class="secondary__btn border inline-block border-black">Cancel</a>
        </div>
      </div>
    </form>
  </section>
  <?php include ROOT_PATH . '/app/includes/footer.php' ?>
</main>

</div>
<!-- End of Sidebar -->
</div>
<!-- End of App -->

<!-- Scripts Area -->

<script>
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      document.querySelector('#imageDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}

// CK EDITOR
</script>

<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>