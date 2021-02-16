<?php
require_once ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/Redirect.php";
require_once ROOT_PATH . "/app/helpers/Sanitize.php";
require_once ROOT_PATH . "/app/helpers/ImageHelper.php";
require_once ROOT_PATH . "/app/helpers/ViewFormatter.php";
require_once ROOT_PATH . "/app/Requests/FormRequests.php";
require_once ROOT_PATH . "/app/Controllers/EmailController.php";
$categories = selectAll('categories');
$tags = selectAll('tags');
$errors = array();
$postTitle = '';
$slug = '';
$categoryId = '';
$readingTime =  '';
$youtube = '';
$isPublished = '';
$body = '';
$userId = $_SESSION['id'];

$allPosts = selectAllPostsWithRelations($userId);



//CREATE POST
if (isset($_POST['create-post'])) {
  unset($_POST['create-post']);
  $request = sanitize($_POST, 'post');
  $rules = [
    'title' => [RULE_REQUIRED, [RULE_UNIQUE, 'unique' => 'title', 'table' => 'posts'], [RULE_MAX, 'max' => 255]],
    'category_id' => [RULE_REQUIRED],
    'reading_time' => [RULE_REQUIRED],
    'body' => [RULE_REQUIRED],
  ];
  $errors = validate($request, $rules);

  if (empty($_FILES['image']['name'])) {
    $errors['image'] = "Please add an image";
  }

  if (count($errors) === 0) {
    $postImage = upload($_FILES, 'image', 'travels');
    $tagsIds = array();
    $tags = $_POST['tags'];
    // Create Tags
    foreach ($tags as $tag) {
      $existingid = selectOne('tags', ['name' => $tag]);
      if ($existingid) {
        array_push($tagsIds, $existingid['id']);
      }
      $id = create('tags', ['name' => $tag]);
      if ($id > 0) {
        array_push($tagsIds, $id);
      }
    }
    // Create Post
    $postId = create('posts', [
      'user_id' => $userId,
      'title' => $request['title'],
      'slug' => $request['slug'],
      'reading_time' => $request['reading_time'],
      'youtube_url' => $request['youtube_url'],
      'category_id' => $request['category_id'],
      'image' => $postImage,
      'body' => $request['body'],
      'is_published' => isset($request['is_published']) ? 1 : 0
    ]);

    // Create Post tags
    foreach ($tagsIds as $tagId) {
      create('posts_tags', [
        'post_id' => $postId,
        'tag_id' => $tagId
      ]);
    }

    ($postId > 0)
      ? redirectWithMessage('collections/travels', ['success' => 'New Story Created! 💟'])
      : redirectWithMessage('collections/create', ['error' => 'Sorry, something went worong creating your story 😞']);
  }

  $postTitle = $request['title'];
  $slug = $request['slug'];
  $categoryId =  $request['category_id'];
  $readingTime =  $request['reading_time'];
  $youtube =  $request['youtube_url'];
  $isPublished = isset($request['is_published']) ? 1 : 0;
  $body =  htmlentities($request['body']);
}

// DELETE POST
if (isset($_POST['delete-post'])) {
  $post_id = $_POST['post_id'];
  $post = selectOne('posts', ['id' => $post_id]);
  remove($post['image'], 'travels');
  $res = delete('posts',  $post_id);
  ($res === 1)
    ? redirectWithMessage('collections/travels', ['success' => 'Post deleted successfully 🚀'])
    : redirectWithMessage('collections/travels', ['error' => 'Something went wrong ❌']);
}