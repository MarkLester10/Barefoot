<?php foreach ($allPosts as $post) : ?>
<div class="card rounded-md mix <?php echo $post['catSlug'] ?>">
  <div class="card__img">
    <span class="pill"><?php echo $post['reading_time'] ?> mins</span>
    <img src='<?php echo  BASE_URL . "/assets/imgs/travels/{$post['image']}" ?>' class="rounded-t-md" alt="">
  </div>
  <div class="card__description bg__adaptive rounded-b-md">
    <p class="para text-red-400 font-medium italic"><?php echo $post['category'] ?></p>
    <a href="/travels/story.php?title=<?php echo $post['slug'] ?>&id=<?php echo $post['id'] ?>">
      <h1 class="title__text text__adaptive py-2 hover:underline"><?php echo $post['title'] ?></h1>
    </a>
    <ul class="mb-2 text-sm text-gray-500 list space-x-2 py-0">
      <?php $tags = getTags($post['id']) ?>
      <?php foreach ($tags as $tags) : ?>
      <li><?php echo "#{$tags['name']}" ?></li>
      <?php endforeach; ?>
    </ul>
    <div class="flex items-center justify-between text__adaptive pb-2">
      <small class="flex items-center space-x-2">
        <a href="#">
          <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
              clip-rule="evenodd"></path>
          </svg>
        </a>
        <span>
          <?php echo formattedLikes($post['likes']) ?> &#8226;
          <?php echo formattedTime($post['created_at']) ?>
        </span>
      </small>
    </div>
    <hr>
    <div class="mt-4 space-x-4">
      <button type="button" data-id="1" class="btn" @click.prevent="toggleModal(<?php echo $post['id']; ?>)">
        <svg class="w-6 h-6 text__adaptive inline hover:text-red-500" fill="none" stroke="currentColor"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
          </path>
        </svg>
      </button>
      <a href="/collections/edit.php?title=<?php echo $post['slug'] ?>&id=<?php echo $post['id'] ?>"
        class="btn inline-block">
        <svg class="w-6 h-6 text__adaptive inline hover:text-green-500" fill="none" stroke="currentColor"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
          </path>
        </svg>
      </a>
    </div>
  </div>
  <!-- End of Card -->
</div>
<?php endforeach; ?>