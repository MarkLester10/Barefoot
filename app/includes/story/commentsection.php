<div class="bg__adaptive px-3 h-auto">
  <h1 class="subtitle__text text__adaptive pt-2">Comments</h1>
  <form method="#" id="comment_form" class="bg__adaptive comment__form space-y-3">
    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['id'] ?>">
    <input type="hidden" id="post_id" name="post_id" value="<?php echo $story['id'] ?>">
    <div class="flex items-center space-x-3">
      <img src='<?php echo $profileImage ?>' class="profile-img h-10 w-10" alt="Profile Image">
      <input class="comment__field text-xs border-b text__adaptive focus:border-green-400"
        <?php echo (authenticated() === 0) ? 'disabled' : '' ?> autocomplete="off" placeholder="Add public comment..."
        id="comment" v-model="newComment.comment" name="comment" @keyup="toggleCommentBtn">
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
        <span class="text__adaptive ml-2 text-xs">10k Comments</span>
      </div>
      <?php if (authenticated()) : ?>
      <button type="submit" id="sendComment" class="primary__btn" @click.prevent="addComment">
        Send
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8">
          </path>
        </svg>
      </button>
      <?php endif; ?>
    </div>
  </form>
  <div class="py-4 hidden" id="spinner">
    <svg class="animate-spin m-auto h-8 w-8 text__adaptive" xmlns="http://www.w3.org/2000/svg" fill="none"
      viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor"
        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
      </path>
    </svg>
  </div>
  <!-- Comment Box -->
  <div class="comment__box mt-6" :class="{'active':isCommentCollapse}">
    <div class="comment__wrapper max-h-screen" id="comment_section">
      <div class="comment__item mb-4 relative">
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
          <button type="button" class="btn <?php echo (authenticated() === 0) ? 'isDisabled' : '' ?>"
            onclick="togglePopUp(this)">
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