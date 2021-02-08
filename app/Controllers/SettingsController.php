<?php
require ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/Sanitize.php";
require_once ROOT_PATH . "/app/helpers/ImageHelper.php";
require_once ROOT_PATH . "/app/Requests/FormRequests.php";


$errors = array();

// Save Profile Banner
if (isset($_POST['save-banner'])) {
  unset($_POST['save-banner']);
  $request = sanitize($_POST, 'post');
  $rules = [
    'banner_title' => [RULE_REQUIRED]
  ];
  $errors = validate($request, $rules);

  if (count($errors) === 0) {
    update('users', 'id', $_SESSION['id'], ['banner_title' =>  $request['banner_title']]);
    $_SESSION['banner_title'] = $request['banner_title'];
  }

  if (!empty($_FILES['banner_image']['name']) || !empty($_FILES['profile_image']['name'])) {
    if (!is_null($_SESSION['profile_image']) || !is_null($_SESSION['banner_image'])) {
      remove($_SESSION['profile_image'], 'auth/profiles');
      remove($_SESSION['banner_image'],  'banners');
    }
    $bannerImage = upload($_FILES, 'banner_image', 'banners');
    $profileImage = upload($_FILES, 'profile_image', 'auth/profiles');
    update('users', 'id', $_SESSION['id'], ['profile_image' => $profileImage, 'banner_image' => $bannerImage]);
    $_SESSION['profile_image'] = $profileImage;
    $_SESSION['banner_image'] =  $bannerImage;
  }
}