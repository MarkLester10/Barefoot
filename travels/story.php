<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/AuthController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
$title = "Story Title";
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/sidebar.php';
?>



<!-- Main area -->
<main class="xl:flex-1 xl:overflow-x-hidden">
  <?php if (!empty($story)) : ?>
  <section class="story__area py-6 px-4 xl:px-0 xl:pr-4">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mixitup">
      <div class="bg__adaptive rounded-md lg:col-span-2">
        <div class="relative">
          <img src='<?php echo BASE_URL . "/assets/imgs/travels/{$story['image']}" ?>'
            class="h-full w-full object-cover" alt="#">
          <div class="play__btn btn <?php echo empty($story['youtube_url']) ? 'hidden' : 'block' ?>"
            @click="toggleModal">
            <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
              </path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
        </div>

        <div class="story__details px-4 py-6">
          <!-- TITLE -->
          <div class="story__title py-6">
            <h1 class="title__text text__adaptive"><?php echo $story['title'] ?></h1>
            <span class="pill"><?php echo $story['reading_time'] ?> mins</span>
          </div>
          <!-- Author -->
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
              <a href="/user/profile.php?username=<?php echo $story['username'] ?>&id=<?php echo $story['user_id'] ?>">
                <?php if (!empty($story['profile_image'])) : ?>
                <img src='<?php echo BASE_URL . "/assets/imgs/auth/profiles/{$story['profile_image']}" ?>'
                  class="profile-img" alt="">
                <?php else : ?>
                <img src='https://ui-avatars.com/api/?name=<?php echo $story['username'] ?>&size=512" ?>'
                  class="profile-img" alt="">
                <?php endif; ?>
              </a>
              <div class="travel__card__desc">
                <h1 class="subtitle__text text__adaptive">
                  <?php echo $story['username'] ?>
                </h1>
                <small class="flex items-center space-x-2">
                  <a href="#">
                    <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </a>
                  <span class="text__adaptive">
                    <?php echo formattedLikes($story['likes']) ?> &#8226;
                    <?php echo formattedTime($story['created_at'], true) ?>
                  </span>
                </small>
              </div>
            </div>
            <a href="#">
              <svg class="w-6 h- text__adaptive" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
              </svg>
            </a>
          </div>
          <hr class="my-6">

          <!-- Story -->
          <div class="text__adaptive para">
            <?php echo html_entity_decode($story['body']) ?>
          </div>
        </div>
      </div>

      <!-- Comment Section -->
      <div class="bg__adaptive px-4 py-4 comment__box h-screen">
        <h1 class="subtitle__text text__adaptive pt-4">Comments</h1>
        <form class="bg__adaptive relative">
          <div class="comment__form">
            <label class="block text-sm">
              <input type="hidden" name="user_id">
              <input type="hidden" name="post_id">
              <input class="form__input" type="text" value="" placeholder="Say something . . ." name="comment" />
            </label>
            <button type="submit" class="primary__btn">
              Send
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
              </svg>
            </button>
          </div>
        </form>

        <hr class="my-8">
        <div class="comment__item mb-4" v-for="travel in travelBlogs">
          <div class="flex items-center space-x-3">
            <a href="/user/profile.php"><img src="../assets/imgs/auth/avatar.png" class="profile-img" alt=""></a>
            <div class="travel__card__desc">
              <h1 class="subtitle__text text__adaptive">
                Jane Doe
              </h1>
            </div>
          </div>
          <p class="comment">Lorem ipsum dolor sit amet consectetur adipisicing
            elit. Iusto
            tempore quas illo odio,
            earum
            quis corrupti ab iste fuga autem.</p>
        </div>
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
  <div class="modal__body rounded-md bg__adaptive px-4 py-4 w-11/12 md:px-6 md:py-6">
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