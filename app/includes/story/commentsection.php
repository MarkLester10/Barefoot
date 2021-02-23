<div class="bg__adaptive px-3 h-auto">
  <h1 class="subtitle__text text__adaptive pt-2">Comments</h1>
  <form method="#" id="comment_form" class="bg__adaptive comment__form space-y-3">
    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['id'] ?>">
    <input type="hidden" id="post_id" name="post_id" value="<?php echo $story['id'] ?>">
    <input type="hidden" id="post_user_id" value="<?php echo $story['user_id'] ?>">
    <div class="flex items-center space-x-3">
      <img src='<?php echo $profileImage ?>' class="profile-img h-12 w-12" alt="Profile Image">
      <input class="comment__field text-sm border-b text__adaptive focus:border-green-400"
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
        <span class="text__adaptive ml-2 text-md">{{ comments.length }}
          {{ comments.length > 1 ?'Comments':'Comment' }}</span>
      </div>
      <?php if (authenticated()) : ?>
      <button ref="sendCommentBtn" v-if="!isEdit" type="submit" class="primary__btn" @click.prevent="addComment">
        Send
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8">
          </path>
        </svg>
      </button>
      <button ref="sendCommentBtn" v-else type="submit" class="primary__btn" @click.prevent="editComment">
        Update
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8">
          </path>
        </svg>
      </button>
      <?php endif; ?>
    </div>
  </form>
  <div ref="spinner" class="py-4 hidden" id="spinner">
    <svg class="animate-spin m-auto h-8 w-8 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none"
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
      <div class="comment__item mb-4 relative shadow-md" v-for="comment in comments">
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-2">
            <a :href="'/user/profile.php?username='+comment.username+'&id='+comment.user_id">
              <img v-if="comment.profile_image" :src="'../assets/imgs/auth/profiles/'+ comment.profile_image"
                class="profile-img h-10 w-10" alt="Profile Image">
              <img v-else :src="'https://ui-avatars.com/api/?name='+ comment.username +'&size=512'"
                class="profile-img h-10 w-10" alt="Profile Image">
            </a>
            <div class="flex items-center space-x-2 flex-wrap">
              <h1 class="text-sm tracking-wide text__adaptive font-md rounded-full flex items-center"
                :class="[comment.user_id == postUserId ? 'bg__adaptive px-2':'']">
                {{ comment.username }}
                <svg v-if="comment.user_id == postUserId" class="w-4 h-4 text-green-500 ml-1" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                  </path>
                </svg>
              </h1>
              <small class="text-gray-500 font-medium text-xs inline">{{comment.created_at}}</small>
            </div>
          </div>
          <button v-if="comment.user_id == newComment.user_id" type="button"
            class="btn <?php echo (authenticated() === 0) ? 'isDisabled' : '' ?>" onclick="togglePopUp(this)">
            <svg class="text__adaptive w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
              </path>
            </svg>
          </button>
          <div class="modal-sm">
            <button type="button" class="btn__link" @click.prevent="toggleEditComment(comment)">Edit</button>
            <button class="btn__link" @click.prevent="toggleConfirmModal(comment.id)">Delete</button>
          </div>
        </div>
        <p class=" comment ml-12 mt-2">{{comment.comment}}</p>
      </div>
    </div>
  </div>
</div>