<div class="story__details px-4 py-6">
  <!-- TITLE -->
  <div class="story__title py-6">
    <h1 class="title__text text__adaptive"><?php echo $story['title'] ?></h1>
    <span class="pill"><?php echo $story['reading_time'] ?> mins</span>
  </div>
  <!-- Author -->
  <div class="flex md:items-center md:justify-between flex-col md:flex-row">
    <div class="flex items-center space-x-3">
      <a href="/user/profile.php?username=<?php echo $story['username'] ?>&id=<?php echo $story['user_id'] ?>">
        <?php if (!empty($story['profile_image'])) : ?>
        <img src='<?php echo BASE_URL . "/assets/imgs/auth/profiles/{$story['profile_image']}" ?>' class="profile-img"
          alt="">
        <?php else : ?>
        <img src='https://ui-avatars.com/api/?name=<?php echo $story['username'] ?>&size=512" ?>' class="profile-img"
          alt="">
        <?php endif; ?>
      </a>
      <div class="travel__card__desc">
        <h1 class="subtitle__text text__adaptive">
          <?php echo $story['username'] ?>
        </h1>
        <small class="flex items-center space-x-2">
          <span class="text__adaptive">
            <?php echo formattedTime($story['created_at'], true) ?>
          </span>
        </small>
      </div>
    </div>

    <div class="flex items-center space-x-4 ml-14 mt-2 md:ml-0 md:mt-0">
      <a href="#" class="btn flex items-center space-x-1  <?php echo (authenticated() === 0) ? 'isDisabled' : '' ?>"
        @click="toggleHeart">
        <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
            clip-rule="evenodd"></path>
        </svg>
        <small class="text__adaptive"><?php echo formattedLikes($story['likes']) ?> </small>
      </a>

      <?php if (authenticated()) : ?>
      <a href="/?bookmark=<?php echo $story['id'] ?>" class="btn text__adaptive">
        <?php if (in_array($story['id'], $bookmarkPostIds)) : ?>
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
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
        </svg>
        <?php endif; ?>

      </a>
      <?php endif; ?>
    </div>
  </div>
  <hr class="my-6">

  <!-- Story -->
  <div class="text__adaptive para">
    <?php echo html_entity_decode($story['body']) ?>
  </div>

  <!-- Tags -->
  <div class="py-8">
    <h1 class="subtitle__text text__adaptive">
      Read More Stories About
    </h1>
    <div class="flex items-center flex-wrap space-x-4 space-y-4 mt-4">
      <?php foreach ($publicTags as $tag) : ?>
      <a href="#" class="btn tags">
        <?php echo $tag['name'] ?></a>
      <?php endforeach ?>
    </div>
  </div>

  <hr class="my-6">
</div>