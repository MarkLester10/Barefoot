<div class="bg__adaptive px-3 h-auto">
  <h1 class="subtitle__text text__adaptive pt-2">Comments</h1>
  <form class="bg__adaptive comment__form space-y-3">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
    <input type="hidden" name="post_id" value="<?php echo $story['id'] ?>">
    <div class="flex items-center space-x-3">
      <img src='<?php echo $profileImage ?>' class="profile-img h-10 w-10" alt="Profile Image">
      <input class="comment__field text-xs border-b text__adaptive focus:border-green-400"
        <?php echo (authenticated() === 0) ? 'disabled' : '' ?> autocomplete="off" placeholder="Add public comment..."
        name="comment">
    </div>

    <div class="flex items-center justify-between">
      <div class="flex items-center">
        <button type="button" class="btn flex items-center" @click="toggleCommentCollapse">
          <svg class="text__adaptive w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
            </path>
          </svg>
        </button>
        <span class="text__adaptive ml-2 text-xs">Collapse Comments</span>
      </div>
      <?php if (authenticated()) : ?>
      <button type="submit" class="primary__btn">
        Send
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8">
          </path>
        </svg>
      </button>
      <?php endif; ?>
    </div>
  </form>

  <!-- Comment Box -->
  <div class="comment__box mt-8" :class="{'active':isCommentCollapse}">
    <div class="comment__wrapper max-h-screen">
      <div class="comment__item mb-4 relative" v-for="travel in travelBlogs">
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-3">
            <a href="/user/profile.php"><img src="../assets/imgs/auth/avatar.png" class="profile-img h-10 w-10"
                alt=""></a>
            <div class="travel__card__desc">
              <h1 class="subtitle__text text__adaptive">
                Jane Doe
              </h1>
            </div>
          </div>
          <button type="button" class="btn" onclick="togglePopUp(this)">
            <svg class="text__adaptive w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
              </path>
            </svg>
          </button>
          <div class="modal-sm">
            <button type="button" class="btn__link">Edit</button>
            <form action="#">
              <button class="btn__link">Delete</button>
            </form>
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
</div>