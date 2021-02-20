<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";

$title = "Barefoot | Account Profile";
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/sidebar.php';
?>

<!-- Main area -->
<main class="xl:flex-1 xl:overflow-x-hidden">
  <?php if (!empty($user)) : ?>
  <section class="profile__area py-6 px-4 xl:px-0 xl:pr-4">
    <div class="py-6 bg__adaptive px-4 shadow-md" enctype="multipart/form-data">
      <div class="banner mt-4">
        <div class="overlay opacity-50 rounded-md"></div>

        <!-- Banner Image -->
        <div class="banner__image absolute inset-0">
          <?php if (empty($user['banner_image'])) : ?>
          <img class="h-full w-full object-cover rounded-md"
            src='<?php echo BASE_URL . "/assets/imgs/banners/banner_2.jpg"; ?>' alt="" />
          <?php else : ?>
          <img class="h-full w-full object-cover rounded-md"
            src='<?php echo BASE_URL . "/assets/imgs/banners/{$user['banner_image']}"; ?>' alt="" />
          <?php endif; ?>
        </div>

        <!-- Banner Title -->
        <div class="banner__title">
          <h1 class="title__text text-white"><?php echo $user['banner_title'] ?></h1>
        </div>

        <!-- Profile Image -->
        <div class="banner__profile__img">
          <?php if (empty($user['profile_image'])) : ?>
          <img src="https://ui-avatars.com/api/?name=<?php echo $user['username'] ?>&size=512"
            class="h-20 w-20 profile-img" alt="Profile Image">
          <?php else : ?>
          <img src='<?php echo BASE_URL . "/assets/imgs/auth/profiles/{$user['profile_image']}" ?>'
            class="profile-img h-20 w-20" alt="Profile Image">
          <?php endif; ?>
        </div>
      </div>

      <!-- Banner actions -->
      <div class="mt-6">
        <h1 class="title__text text__adaptive"><?php echo $user['username'] ?></h1>
        <ul class="flex items-center space-x-4 mt-2 text__adaptive">
          <li class="btn <?php echo empty($userSocials['facebook']) ? 'hidden' : '' ?>">
            <a href="<?php echo $userSocials['facebook'] ?>" target="_blank">
              <i class="fab fa-facebook-f text-xl"></i>
            </a>
          </li>
          <li class="btn <?php echo empty($userSocials['instagram']) ? 'hidden' : '' ?>">
            <a href="<?php echo $userSocials['instagram'] ?>" target="_blank">
              <i class="fab fa-instagram text-xl"></i>
            </a>
          </li>
          <li class="btn <?php echo empty($userSocials['twitter']) ? 'hidden' : '' ?>">
            <a href="<?php echo $userSocials['twitter'] ?>" target="_blank">
              <i class="fab fa-twitter text-xl"></i>
            </a>
          </li>
          <li class="btn <?php echo empty($userSocials['youtube']) ? 'hidden' : '' ?>">
            <a href="<?php echo $userSocials['youtube'] ?>" target="_blank">
              <i class="fab fa-youtube text-xl"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <hr>
  <!-- Blog Collections -->
  <section class="py-6 px-4 xl:px-0 xl:pr-4">
    <div class="collection__grid mixitup">
      <?php if (count($publicPosts) > 0) : ?>
      <?php include ROOT_PATH . '/app/includes/collections/travelcards.php'; ?>
      <?php else : ?>
      <h1 class="title__text text__adaptive">No Post Added Yet 😞</h1>
      <?php endif; ?>
    </div>
  </section>
  <?php include ROOT_PATH . '/app/includes/footer.php' ?>
  <?php else : ?>
  <h1 class="title__text text__adaptive text-center mt-64">User Not Found 😞</h1>
  <?php endif; ?>
</main>
<!-- End Main Area -->

</div>
<!-- End of Sidebar -->
</div>
<!-- End of App -->

<!-- Scripts Area -->

<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>