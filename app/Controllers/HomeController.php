<?php
require_once ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/Redirect.php";
require_once ROOT_PATH . "/app/helpers/Sanitize.php";
require_once ROOT_PATH . "/app/helpers/ViewFormatter.php";
require_once ROOT_PATH . "/app/Requests/FormRequests.php";
$categories = selectAll('categories');
$publicTags = selectAll('tags');
$publicPosts = array();
$trending = array();
$story = array();
$publicPosts = selectPublicPosts(['p.is_published' => 1]);

// FOR BOOKMARKS STATE
if (authenticated()) {
  $bookmarks = selectAll('bookmarks', ['user_id' => $_SESSION['id']]);
  $bookmarkPostIds = array();
  foreach ($bookmarks as $bookmark) {
    array_push($bookmarkPostIds, $bookmark['post_id']);
  }
}

// Trending.php
foreach ($publicPosts as $publicPost) {
  if ($publicPost['likes'] >= 2) {
    array_push($trending, $publicPost);
  }
}

// collections.php
if (isset($_GET['category']) && isset($_GET['id'])) {
  $categoryId = $_GET['id'];
  $publicPosts = selectPublicPosts(['p.is_published' => 1, 'p.category_id' => $categoryId]);
}

// Search collections.php
if (isset($_GET['search'])) {
  $keyword = $_GET['search'];
  $publicPosts = searchPost($keyword);
}

// profile.php
$user = array();
$userSocials = array();
if (isset($_GET['username']) && isset($_GET['id'])) {
  $userId = $_GET['id'];
  $user = selectOne('users', ['id' => $userId]);
  $userSocials = selectOne('socials', ['user_id' => $userId]);
  $publicPosts = selectPublicPosts(['p.is_published' => 1, 'p.user_id' => $userId]);
}

// story.php
if (isset($_GET['title']) && isset($_GET['id'])) {
  $storyId =  $_GET['id'];
  $storySlug =  $_GET['title'];
  $story = selectOnePublicPost(['p.id' => $storyId, 'p.slug' => $storySlug]);
}

// HEADER IMAGE
$profileImage = BASE_URL . "/assets/imgs/auth/avatar.png";
if (isset($_SESSION['id'])) {
  $profileImage = is_null($_SESSION['profile_image'])
    ? "https://ui-avatars.com/api/?name={$_SESSION['username']}&size=512"
    : BASE_URL . "/assets/imgs/auth/profiles/{$_SESSION['profile_image']}";
}

// Adding to Bookmark
if (authenticated() && isset($_GET['bookmark'])) {
  $uId = $_SESSION['id'];
  $postId = $_GET['bookmark'];
  $isExist = selectOne('bookmarks', ['user_id' => $uId, 'post_id' => $postId]);
  if (!empty($isExist)) {
    delete('bookmarks', $isExist['id']);
  } else {
    create('bookmarks', ['user_id' => $uId, 'post_id' => $postId]);
  }
  redirectWithMessage('collections/bookmarks', ['success' => 'Bookmarks updated']);
}


function authenticated()
{
  $status = 0;
  if (isset($_SESSION['id'])) {
    $status = 1;
  }
  return $status;
}