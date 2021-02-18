<?php foreach ($publicPosts as $post) : ?>
<div class="card rounded-md mix <?php echo $post['catSlug'] ?>">
  <div class="card__img">
    <span class="pill"><?php echo $post['reading_time'] ?> mins</span>
    <img src='<?php echo BASE_URL . "/assets/imgs/travels/{$post['image']}" ?>' class="rounded-t-md" alt="">
    <a href='<?php echo "/user/profile.php?username={$post['username']}&id={$post['user_id']}" ?>'>
      <?php if (empty($post['profile_image'])) : ?>
      <img src="https://ui-avatars.com/api/?name=<?php echo $post['username'] ?>&size=512" class="profile-img"
        alt="Profile Image">
      <?php else : ?>
      <img src='<?php echo BASE_URL . "/assets/imgs/auth/profiles/{$post['profile_image']}" ?>' class="profile-img"
        alt="Profile Image">
      <?php endif; ?>
    </a>
  </div>
  <div class="card__description bg__adaptive rounded-b-md">
    <h1 class="subtitle__text text__adaptive mb-2">
      <?php echo $post['username'] ?>
    </h1>
    <p class="para text-red-400 font-medium italic"><?php echo $post['category'] ?></p>
    <a href="/travels/story.php?title=<?php echo $post['slug'] ?>&id=<?php echo $post['id'] ?>">
      <h1 class="title__text text__adaptive py-2 hover:underline">
        <?php echo $post['title'] ?></h1>
    </a>
    <ul class="mb-2 text-xs text-gray-500 list space-x-2 py-0">
      <?php $tags = getTags($post['id']) ?>
      <?php foreach ($tags as $tags) : ?>
      <li><?php echo "#{$tags['name']}" ?></li>
      <?php endforeach; ?>
    </ul>
    <div class="flex items-center justify-between text__adaptive">
      <small class="flex items-center space-x-2">
        <a href="#">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
            </path>
          </svg>
        </a>
        <span class="text__adaptive">
          <?php echo formattedLikes($post['likes']) ?> &#8226;
          <?php echo formattedTime($post['created_at']) ?>
        </span>
      </small>
      <a href="#">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
        </svg>
      </a>
    </div>
  </div>
</div>
<?php endforeach; ?>