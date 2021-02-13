<?php
require_once ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/Redirect.php";
require_once ROOT_PATH . "/app/helpers/Sanitize.php";
require_once ROOT_PATH . "/app/Requests/FormRequests.php";
$categories = selectAll('categories');

// HEADER IMAGE
$profileImage = '';
if (isset($_SESSION['id'])) {
  $profileImage = is_null($_SESSION['profile_image'])
    ? "https://ui-avatars.com/api/?name={$_SESSION['username']}&size=512"
    : BASE_URL . "/assets/imgs/auth/profiles/{$_SESSION['profile_image']}";
}