<?php foreach ($relatedStories as $relatedStory) : ?>
<div class="card rounded-md mix mb-4 shadow-md<?php echo $relatedStory['catSlug'] ?>">
  <div class="card__img">
    <span class="pill"><?php echo $relatedStory['reading_time'] ?> mins</span>
    <img src='<?php echo BASE_URL . "/assets/imgs/travels/{$relatedStory['image']}" ?>' class="rounded-t-md" alt="">
    <a href='<?php echo "/user/profile.php?username={$relatedStory['username']}&id={$relatedStory['user_id']}" ?>'>
      <?php if (empty($relatedStory['profile_image'])) : ?>
      <img src="https://ui-avatars.com/api/?name=<?php echo $relatedStory['username'] ?>&size=512" class="profile-img"
        alt="Profile Image">
      <?php else : ?>
      <img src='<?php echo BASE_URL . "/assets/imgs/auth/profiles/{$relatedStory['profile_image']}" ?>'
        class="profile-img h-10 w-10" alt="Profile Image">
      <?php endif; ?>
    </a>
  </div>
  <div class="card__description bg__adaptive rounded-b-md">
    <h1 class="text-md text__adaptive mb-2">
      <?php echo $relatedStory['username'] ?>
    </h1>
    <p class="text-xs text-red-400 font-medium italic"><?php echo $relatedStory['category'] ?></p>
    <a href="/travels/story.php?title=<?php echo $relatedStory['slug'] ?>&id=<?php echo $relatedStory['id'] ?>">
      <h1 class="font-medium text-sm text__adaptive py-2 hover:underline">
        <?php echo $relatedStory['title'] ?></h1>
    </a>
  </div>
</div>
<?php endforeach; ?>