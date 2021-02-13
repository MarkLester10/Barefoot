<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/SettingsController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";

$title = "Barefoot | Account Settings";
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/sidebar.php';

?>

<!-- Main area -->
<main class="xl:flex-1 xl:overflow-x-hidden">
  <section class="profile__area py-6 px-4 xl:px-0 xl:pr-4">
    <form action="settings.php" class="py-6 bg__adaptive px-4 shadow-md" method="post" enctype="multipart/form-data">
      <h1 class="subtitle__text text__adaptive">Profile Settings</h1>
      <div class="banner mt-4">
        <div class="overlay opacity-50 rounded-md"></div>

        <!-- Banner Image -->
        <div class="banner__image absolute inset-0">
          <label v-if="isBannerEdit"> <svg class="w-6 h-6 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
              </path>
            </svg>
            <input type="file" class="hidden" name="banner_image">
          </label>
          <img class="h-full w-full object-cover rounded-md" src="<?php echo $bannerImage; ?>" alt="" />
        </div>

        <!-- Banner Title -->
        <div class="banner__title">
          <input v-if="isBannerEdit" type="text" name="banner_title" value="<?php echo $_SESSION['banner_title'] ?>">

          <h1 v-else class="title__text text-white">
            <?php echo $_SESSION['banner_title'] ?></h1>
        </div>

        <!-- Profile Image -->
        <div class="banner__profile__img">
          <img class="profile-img h-20 w-20" src="<?php echo $profileImage; ?>" alt="" />
          <label v-if="isBannerEdit">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                clip-rule="evenodd"></path>
            </svg>
            <input type="file" class="hidden" name="profile_image">
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
  <hr>
  <!-- Account Settings -->
  <section class="account__settings py-6 px-4 xl:px-0 xl:pr-4">
    <form method="post" action="settings.php" class="py-6 bg__adaptive px-4 md:w-1/2 shadow-md">
      <h1 class="subtitle__text text__adaptive">Account Settings</h1>
      <label class="block text-sm mt-4">
        <span class="text-gray-700 dark:text-gray-400">Username</span>
        <input type="text"
          class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('username', $errors)) ? 'border border-red-500' : '' ?>"
          placeholder="janedoe" name="username"
          value="<?php echo !empty($username) ? $username : $_SESSION['username']; ?>" />
        <?php if (count($errors) > 0 && array_key_exists('username', $errors)) : ?>
        <small class="block mt-2 text-red-500"><?php echo $errors['username'] ?></small>
        <?php endif; ?>
      </label>

      <label class="block text-sm mt-4">
        <span class="text-gray-700 dark:text-gray-400">Email</span>
        <input
          class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('email', $errors)) ? 'border border-red-500' : '' ?>"
          placeholder="janedoe@email.com" type="email" name="email"
          value="<?php echo !empty($email) ? $email : $_SESSION['email']; ?>" />
        <?php if (count($errors) > 0 && array_key_exists('email', $errors)) : ?>
        <small class=" block mt-2 text-red-500"><?php echo $errors['email'] ?></small>
        <?php endif; ?>

      </label>

      <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Current Password</span>
        <input
          class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('current_password', $errors)) ? 'border border-red-500' : '' ?>"
          placeholder="***************" type="password" name="current_password" />
        <?php if (count($errors) > 0 && array_key_exists('current_password', $errors)) : ?>
        <small class="block mt-2 text-red-500"><?php echo $errors['current_password'] ?></small>
        <?php endif; ?>
      </label>

      <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          New password
        </span>
        <input class="form__input" placeholder="***************" type="password" name="password" />
      </label>

      <div class="mt-6 relative">
        <button type="submit" name="save-account" class="primary__btn hover:bg-green-400">Save</button>
      </div>
    </form>
  </section>
  <hr>
  <!-- Social Links -->
  <section class="account__socials py-6 px-4 xl:px-0 xl:pr-4">
    <form method="post" action="settings.php" class="py-6 bg__adaptive px-4 md:w-1/2 shadow-md">
      <h1 class="subtitle__text text__adaptive">Social Links</h1>

      <label class="block text-sm mt-4">
        <span class="text-gray-700 dark:text-gray-400">Facebook</span>
        <input type="text"
          class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('facebook', $errors)) ? 'border border-red-500' : '' ?>"
          name="facebook" value="<?php echo $facebook ?>" />
        <?php if (count($errors) > 0 && array_key_exists('facebook', $errors)) : ?>
        <small class=" block mt-2 text-red-500"><?php echo $errors['facebook'] ?></small>
        <?php endif; ?>
      </label>

      <label class="block text-sm mt-4">
        <span class="text-gray-700 dark:text-gray-400">Instagram</span>
        <input
          class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('instagram', $errors)) ? 'border border-red-500' : '' ?>"
          type="text" name="instagram" value="<?php echo $instagram ?>" />
        <?php if (count($errors) > 0 && array_key_exists('instagram', $errors)) : ?>
        <small class=" block mt-2 text-red-500"><?php echo $errors['instagram'] ?></small>
        <?php endif; ?>

      </label>

      <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Twitter</span>
        <input
          class="form__input
                    <?php echo (count($errors) > 0 && array_key_exists('twitter', $errors)) ? 'border border-red-500' : '' ?>"
          type="text" name="twitter" value="<?php echo $twitter ?>" />
        <?php if (count($errors) > 0 && array_key_exists('twitter', $errors)) : ?>
        <small class="block mt-2 text-red-500"><?php echo $errors['twitter'] ?></small>
        <?php endif; ?>
      </label>

      <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          Youtube
        </span>
        <input class="form__input" type="text" value="<?php echo $youtube; ?>" name="youtube" />
        <?php if (count($errors) > 0 && array_key_exists('youtube', $errors)) : ?>
        <small class="block mt-2 text-red-500"><?php echo $errors['youtube'] ?></small>
        <?php endif; ?>
      </label>

      <div class="mt-6 relative">
        <button type="submit" name="save-socials" class="primary__btn hover:bg-green-400">Save</button>
      </div>
    </form>
  </section>

  <hr>
  <!-- Account Deletion -->
  <section class="account__deletion py-6 px-4 xl:px-0 xl:pr-4">
    <div class="py-6 bg__adaptive px-4 md:w-1/2 shadow-md">
      <h1 class="subtitle__text text__adaptive">Account Deletion - <span class="text__danger">Danger Zone</span>
      </h1>
      <p class="para mt-6 py-2 text__adaptive">
        Hello, after deleting the account, the account
        will be destroyed and all post and comments related
        to this account will be deleted. <br> <br>
        <strong>Please note:</strong> This operation cannot be undone.
      </p>
      <div class="mt-6 relative">
        <button type="button" @click.prevent="toggleModal" name="save-socials"
          class="danger__btn hover:bg-red-400">Delete
          Immediately</button>
      </div>
    </div>
  </section>
</main>
<!-- End Main Area -->

<!-- Modal -->
<div class="confirmation__modal" :class="{'active':isModalOpen}">
  <div class="modal__body rounded-md bg__adaptive px-4 py-4 w-11/12 md:w-auto md:px-6 md:py-6">
    <p class="subtitle__text text__adaptive">
      Are you sure you want to delete your account?
    </p>
    <div class="mt-4 space-x-4">
      <button type="button" class="secondary__btn border border-black" @click.prevent="toggleModal">Cancel</button>
      <a href="/account/delete.php" class="danger__btn hover:bg-red-400">Delete</a>
    </div>
  </div>
</div>

<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>