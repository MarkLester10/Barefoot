<?php
include "../../path.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";

sleep(3);
function fetchPosts($page_num)
{
  $Per_Page = 6;
  if (isset($page_num)) {
    $page_num = $page_num;
  } else {
    $page_num = 1;
  }
  $Page_Start = ($page_num - 1) * $Per_Page;
  $paginatedPosts = selectPublicPosts(['p.is_published' => 1], '', $Page_Start, $Per_Page);
  return $paginatedPosts;
}
?>

<?php if (isset($_POST['page_num'])) : ?>
<?php $posts = fetchPosts($_POST['page_num']); ?>
<?php foreach ($posts as $post) : ?>
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
    <a href='<?php echo "/travels/story.php?title={$post['slug']}&id={$post['id']}" ?>'>
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
        <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
            clip-rule="evenodd"></path>
        </svg>
        <span class="text__adaptive">
          <?php echo formattedLikes($post['likes']) ?> &#8226;
          <?php echo formattedTime($post['created_at']) ?>
        </span>
      </small>
      <?php if (authenticated()) : ?>
      <a href="/?bookmark=<?php echo $post['id'] ?>" class="btn">
        <?php if (in_array($post['id'], $bookmarkPostIds)) : ?>
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
</div>
<?php endforeach; ?>
<?php endif ?>