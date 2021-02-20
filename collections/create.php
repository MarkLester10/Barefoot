<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/BlogPostController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";

$title = "Barefoot | Create Story";
include ROOT_PATH . '/app/includes/layoutTop.php';
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
          <input autocomplete="off"
            class="form__input <?php echo (count($errors) > 0 && array_key_exists('title', $errors)) ? 'border border-red-500' : '' ?>"
            type="text" onkeyup="slugify(this.value)" name="title" value="<?php echo $postTitle; ?>" />
          <?php if (count($errors) > 0 && array_key_exists('title', $errors)) : ?>
          <small class="block mt-2 text-red-500"><?php echo $errors['title'] ?></small>
          <?php endif; ?>
        </label>


        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Slug</span>
          <input readonly class="form__input" type="text" value="<?php echo $slug ?>" name="slug" id="slug" />
        </label>

        <label class=" block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Category <span class="text-red-500">*</span>
          </span>
          <select name="category_id"
            class="form__input <?php echo (count($errors) > 0 && array_key_exists('category_id', $errors)) ? 'border border-red-500' : '' ?>">
            <option value="">Select Category</option>
            <?php foreach ($categories as $category) : ?>
            <?php if (!empty($categoryId) && $categoryId == $category['id']) : ?>
            <option value="<?php echo $category['id'] ?>" selected>
              <?php echo $category['name'] ?>
            </option>
            <?php else : ?>
            <option value="<?php echo $category['id']; ?>">
              <?php echo $category['name'] ?>
            </option>
            <?php endif; ?>
            <?php endforeach ?>
          </select>
          <?php if (count($errors) > 0 && array_key_exists('category_id', $errors)) : ?>
          <small class="block mt-2 text-red-500"><?php echo $errors['category_id'] ?></small>
          <?php endif; ?>
        </label>

        <label class=" block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Tags - optional
          </span>
          <select id="tags" name="tags[]" class="mt-1" multiple>
            <?php foreach ($tags as $tag) : ?>
            <?php foreach ($createdStoryTags as $createdStoryTag) : ?>
            <?php if ($tag['name'] === $createdStoryTag) : ?>
            <option value="<?php echo $tag['name']; ?>" selected="selected">
              <?php echo $tag['name'] ?>
            </option>
            <?php endif; ?>
            <?php endforeach ?>
            <option value="<?php echo $tag['name']; ?>">
              <?php echo $tag['name'] ?>
            </option>
            <?php endforeach ?>
          </select>
        </label>

        <label class=" block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Estimated Reading Time <span class="text-red-500">*</span>
          </span>
          <input type="number" name="reading_time"
            class="form__input <?php echo (count($errors) > 0 && array_key_exists('category_id', $errors)) ? 'border border-red-500' : '' ?>"
            min="1" placeholder="in mins" value="<?php echo $readingTime ?>">
          <?php if (count($errors) > 0 && array_key_exists('reading_time', $errors)) : ?>
          <small class="block mt-2 text-red-500"><?php echo $errors['reading_time'] ?></small>
          <?php endif; ?>
        </label>

        <label class=" block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Youtube Video Id - Optional
          </span>
          <input type="text" autocomplete="off" name="youtube_url" value="<?php echo $youtube ?>" class="form__input"
            min="1" placeholder="DW1lqKsadI0">
        </label>
      </div>

      <!-- Blog Image -->
      <div class="blog__image rounded-md relative">
        <label class="text-sm cursor-pointer">
          <img v-if="!isDarkModeOn" id="imageDisplay"
            src="<?php echo BASE_URL . '/assets/imgs/travels/image_preview_light.jpg' ?>"
            class="h-full w-full object-cover <?php echo (count($errors) > 0 && array_key_exists('image', $errors)) ? 'border border-red-500' : '' ?>"
            alt="">
          <img v-else src="<?php echo BASE_URL . '/assets/imgs/travels/image_preview_dark.jpg' ?>"
            class="h-full w-full object-cover <?php echo (count($errors) > 0 && array_key_exists('image', $errors)) ? 'border border-red-500' : '' ?>"
            id="imageDisplay" alt="Post Image">
          <input type="file" class="hidden" name="image" onchange="displayImage(this)">
        </label>
        <?php if (count($errors) > 0 && array_key_exists('image', $errors)) : ?>
        <small class="block mb-2 text-red-500"><?php echo $errors['image'] ?></small>
        <?php endif; ?>
      </div>
      <!-- Blog Body -->
      <div class="blog__body lg:col-span-2 p-4 bg__adaptive shadow-md">
        <h1 class="subtitle__text text__adaptive py-4">Write your amazing story now! 😍</h1>
        <textarea class="form__input" id="body" name="body">
          <?php echo html_entity_decode($body) ?>
        </textarea>
        <?php if (count($errors) > 0 && array_key_exists('body', $errors)) : ?>
        <small class="block mt-2 text-red-500"><?php echo $errors['body'] ?></small>
        <?php endif; ?>
        <div class="flex items-center space-x-2 py-4">
          <input type="checkbox" name="is_published" <?php echo ($isPublished) ? 'checked' : 'checked' ?>>
          <span class="text-sm text-gray-700 dark:text-gray-400">
            I want to publish this story
          </span>
        </div>
        <hr>
        <div class="mt-6 relative">
          <button type="submit" name="create-post" class="primary__btn hover:bg-green-400">Create</button>
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