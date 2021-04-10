<?php
require_once ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/Redirect.php";
require_once ROOT_PATH . "/app/helpers/Sanitize.php";
require_once ROOT_PATH . "/app/helpers/ImageHelper.php";
require_once ROOT_PATH . "/app/helpers/ViewFormatter.php";
require_once ROOT_PATH . "/app/Requests/FormRequests.php";
require_once ROOT_PATH . "/app/Controllers/EmailController.php";
require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";
$userId = $_SESSION['id'];
$allPosts = selectPublicPosts(['p.user_id' => $userId]);
$categories = selectAll('categories');
$tags = selectAll('tags');
$errors = array();
$editingStory = array();
$editingStoryTags = array();
$createdStoryTags = array();


// EDIT FORM
if (isset($_GET['title']) && isset($_GET['id'])) {
  $storyId = $_GET['id'];
  $storySlug = $_GET['title'];
  $editingStory = selectOnePublicPost(['p.id' => $storyId, 'p.slug' => $storySlug]);
  $editingStoryTags = getTags($storyId);
}

// EDIT AND CREATE FIELDS
$postTitle =  ($editingStory['title']) ?? '';
$slug = ($editingStory['slug']) ?? '';
$categoryId = ($editingStory['catId']) ?? '';
$readingTime = ($editingStory['reading_time']) ?? '';
$youtube = ($editingStory['youtube_url']) ?? '';
$isPublished = ($editingStory['is_published']) ?? '';
$body = ($editingStory['body']) ?? '';
$image = ($editingStory['image']) ?? '';



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
    $tags = $_POST['tags'];
    $tagsIds = createTags($tags);
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
    createOrUpdatePostsTags($postId, $tagsIds);

    ($postId > 0)
      ? redirectWithMessage('collections/travels', ['success' => 'New Story Created! 💟'])
      : redirectWithMessage('collections/create', ['error' => 'Sorry, something went wrong creating your story 😞']);
  }



  $postTitle = $request['title'];
  $slug = $request['slug'];
  $categoryId =  $request['category_id'];
  $readingTime =  $request['reading_time'];
  $createdStoryTags = isset($_POST['tags']) ? $_POST['tags'] : [];
  $youtube =  $request['youtube_url'];
  $isPublished = isset($request['is_published']) ? 1 : 0;
  $body =  htmlentities($request['body']);
}

//Update POST
if (isset($_POST['update-post'])) {
  unset($_POST['update-post']);
  $postId = $_POST['post_id'];
  $postImage = $_POST['image'];
  $request = sanitize($_POST, 'post');
  $rules = [
    'title' => [RULE_REQUIRED, [RULE_MAX, 'max' => 255]],
    'category_id' => [RULE_REQUIRED],
    'reading_time' => [RULE_REQUIRED],
    'body' => [RULE_REQUIRED],
  ];
  $errors = validate($request, $rules);
  if (count($errors) === 0) {
    if (!empty($_FILES['image']['name'])) {
      remove($postImage, 'travels');
      $postImage = upload($_FILES, 'image', 'travels');
    }
    $tags = $_POST['tags'];
    $tagsIds = createTags($tags);
    createOrUpdatePostsTags($postId, $tagsIds, true);

    // Update Post
    $res = update('posts', 'id', $postId, [
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

    ($res >= 0)
      ? redirectWithMessage('collections/travels', ['success' => 'Story Updated Successfully! 🚀'])
      : redirectWithMessage('collections/travels', ['error' => 'Sorry, something went wrong updating your story 😞']);
  }

  $postTitle = $request['title'];
  $slug = $request['slug'];
  $categoryId =  $request['category_id'];
  $readingTime =  $request['reading_time'];
  $createdStoryTags = $_POST['tags'];
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

//CREATE TAGS
function createTags($tags)
{
  $tagsIds = array();
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
  return $tagsIds;
}

// CREATE POSTS_TAGS
function createOrUpdatePostsTags($postId, $tagsIds, $isUpdating = false)
{
  if ($isUpdating === true) {
    foreach ($tagsIds as $tagId) {
      $postsTags = selectOne('posts_tags', ['post_id' => $postId, 'tag_id' => $tagId]);
      delete('posts_tags', $postsTags['id']);
      create('posts_tags', [
        'post_id' => $postId,
        'tag_id' => $tagId
      ]);
    }
  } else {
    foreach ($tagsIds as $tagId) {
      create('posts_tags', [
        'post_id' => $postId,
        'tag_id' => $tagId
      ]);
    }
  }
}