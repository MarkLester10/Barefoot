<?php
require ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/Sanitize.php";
require_once ROOT_PATH . "/app/helpers/UploadImage.php";
require_once ROOT_PATH . "/app/Requests/FormRequests.php";



// Save Profile Banner
if (isset($_POST['save-banner'])) {
  // unset($_POST['save-banner']);
  // $request = sanitize($_POST, 'post');
  // $rules = [
  //   'banner_title' => [RULE_REQUIRED],
  // ];

  // dump(upload($_FILES, 'banners'));
  unlink(ROOT_PATH . '/assets/imgs/banners/1612720107_logo__white.png');

  // $errors = validate($request, $rules);
  // if (count($errors) === 0) {
  // }
}