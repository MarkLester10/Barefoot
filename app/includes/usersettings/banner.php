<section class="profile__area py-6 px-4 xl:px-0 xl:pr-4">
  <form action="settings.php" class="py-6 bg__adaptive px-4 shadow-md" method="post" enctype="multipart/form-data">
    <h1 class="subtitle__text text__adaptive">Profile Settings</h1>
    <div class="banner mt-4">
      <div class="overlay opacity-50 rounded-md"></div>

      <!-- Banner Image -->
      <div class="banner__image absolute inset-0">
        <img class="h-full w-full object-cover rounded-md" id="bannerPreview" src="<?php echo $bannerImage; ?>"
          alt="" />
        <label v-if="isBannerEdit"> <svg class="w-6 h-6 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
            </path>
          </svg>
          <input type="file" class="hidden" name="banner_image" onchange="displayImage(this, '#bannerPreview')">
        </label>
      </div>

      <!-- Banner Title -->
      <div class="banner__title">
        <input v-if="isBannerEdit" type="text" name="banner_title" value="<?php echo $_SESSION['banner_title'] ?>">

        <h1 v-else class="title__text text-white">
          <?php echo $_SESSION['banner_title'] ?></h1>
      </div>

      <!-- Profile Image -->
      <div class="banner__profile__img">
        <img class="profile-img h-20 w-20" id="profilePreview" src="<?php echo $profileImage; ?>" alt="" />
        <label v-if="isBannerEdit">
          <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
              clip-rule="evenodd"></path>
          </svg>
          <input type="file" class="hidden" name="profile_image" onchange="displayImage(this,'#profilePreview')">
        </label>
      </div>
    </div>

    <!-- Banner actions -->
    <div class="mt-6">
      <div v-if="isBannerEdit">
        <button type="submit" name="save-banner" class="primary__btn hover:bg-green-400">Save</button>
        <button type="button" @click.prevent="toggleBannerEdit"
          class="secondary__btn border border-black">Cancel</button>
      </div>
      <button type="button" v-else @click.prevent="toggleBannerEdit"
        class="primary__btn hover:bg-green-400">Edit</button>
    </div>
  </form>
</section>