<?php
require_once ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/Redirect.php";
require_once ROOT_PATH . "/app/helpers/Sanitize.php";
require_once ROOT_PATH . "/app/helpers/ViewFormatter.php";
require_once ROOT_PATH . "/app/Requests/FormRequests.php";
$categories = selectAll('categories');
$publicPosts = array();

$publicPosts = selectPublicPosts();


// collections.php
if (isset($_GET['category']) && isset($_GET['id'])) {
  $categoryId = $_GET['id'];
  $publicPosts = selectPublicPostsWithCategory($categoryId);
}

// profile.php
$user = array();
$userSocials = array();
if (isset($_GET['username']) && isset($_GET['id'])) {
  $userId = $_GET['id'];
  $user = selectOne('users', ['id' => $userId]);
  $userSocials = selectOne('socials', ['user_id' => $userId]);
  $publicPosts = selectAllPostsWithRelations($userId);
}


// HEADER IMAGE
$profileImage = '';
if (isset($_SESSION['id'])) {
  $profileImage = is_null($_SESSION['profile_image'])
    ? "https://ui-avatars.com/api/?name={$_SESSION['username']}&size=512"
    : BASE_URL . "/assets/imgs/auth/profiles/{$_SESSION['profile_image']}";
}