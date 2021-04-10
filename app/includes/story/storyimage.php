<div class="relative">
  <img src='<?php echo BASE_URL . "/assets/imgs/travels/{$story['image']}" ?>' class="h-96 w-full object-cover" alt="#">
  <button type="button" class="play__btn <?php echo empty($story['youtube_url']) ? 'hidden' : 'block' ?>"
    @click="toggleModal">
    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width=".5"
        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
      </path>
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width=".5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
      </path>
    </svg>
  </button>
</div>