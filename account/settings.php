<?php
include "../path.php";
require_once ROOT_PATH . "/app/Controllers/SettingsController.php";
require_once ROOT_PATH . "/app/Controllers/HomeController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";

$title = "Barefoot | Account Settings";
include ROOT_PATH . '/app/includes/layoutTop.php';
include ROOT_PATH . '/app/includes/sidebar.php'; ?>

<!-- Main area -->
<main class="xl:flex-1 xl:overflow-x-hidden">
  <!-- Banner -->
  <?php include ROOT_PATH . '/app/includes/usersettings/banner.php'; ?>
  <hr>
  <?php include ROOT_PATH . '/app/includes/usersettings/accountsettings.php'; ?>
  <hr>
  <?php include ROOT_PATH . '/app/includes/usersettings/sociallinks.php'; ?>
  <hr>
  <?php include ROOT_PATH . '/app/includes/usersettings/accountdeletion.php'; ?>
  <?php include ROOT_PATH . '/app/includes/footer.php' ?>
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
      <a href="/account/delete.php" class="inline-block danger__btn hover:bg-red-400">Delete</a>
    </div>
  </div>
</div>

</div>
<!-- End of Sidebar -->
</div>
<!-- End of App -->

<!-- Scripts Area -->
<script>
function displayImage(e, display) {
  if (e.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      document.querySelector(display).setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>
<?php include ROOT_PATH . '/app/includes/layoutBottom.php' ?>