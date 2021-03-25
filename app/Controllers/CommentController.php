<?php
include "../../path.php";
require_once ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/ViewFormatter.php";
$result = array('error' => false);
$action = "";
$postId = "";

if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
if (isset($_GET['post_id'])) {
  $postId = $_GET['post_id'];
}

// ADD COMMENT
if ($action == 'add-comment') {
  require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";
  $data = [
    'comment' => $_POST['comment'],
    'user_id' => $_POST['user_id'],
    'post_id' => $_POST['post_id']
  ];
  sleep(1);
  $res = create('comments', $data);
  if ($res > 0) {
    $result['message'] = 'Comment Added successfully';
  } else {
    $result['error'] = true;
    $result['message'] = 'Failed to add comment';
  }
}

// EDIT COMMENT
if ($action == 'edit-comment') {
  require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";
  $commentId = $_POST['comment_id'];
  $data = [
    'comment' => $_POST['comment'],
    'user_id' => $_POST['user_id'],
    'post_id' => $_POST['post_id']
  ];
  sleep(1);
  $res = update('comments', 'id', $commentId, $data);
  if ($res > 0) {
    $result['message'] = 'Comment Updated successfully';
  } else {
    $result['error'] = true;
    $result['message'] = 'Failed to update comment';
  }
}

// DELETE COMMENT
if ($action == 'delete-comment') {
  require_once ROOT_PATH . "/app/middlewares/AuthMiddleware.php";
  $commentId = $_GET['comment_id'];
  $res = delete('comments', $commentId);
  if ($res === 1) {
    $result['message'] = 'Comment deleted successfully';
  } else {
    $result['error'] = true;
    $result['message'] = 'Failed to update comment';
  }
}


//FETCH COMMENTS
if ($action == 'fetch-comments') {
  $formattedComments = array();
  $comments = getComments($postId);
  foreach ($comments as $comment) {
    $comment['created_at'] = formattedTime($comment['created_at']);
    array_push($formattedComments, $comment);
  }
  $result['comments'] = $formattedComments;
}


echo json_encode($result);