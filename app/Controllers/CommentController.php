<?php
include "../../path.php";
require_once ROOT_PATH . "/app/config/db.php";
$result = array('error' => false);
$action = "";

if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

if ($action === 'add-comment') {
  $data = [
    'comment' => $_POST['comment'],
    'user_id' => $_POST['user_id'],
    'post_id' => $_POST['post_id']
  ];
  sleep(2);
  $res = create('comments', $data);
  if ($res > 0) {
    $result['message'] = 'Comment Added successfully';
  } else {
    $result['error'] = true;
    $result['message'] = 'Failed to add comment';
  }
}

if ($action === 'edit-comment') {
  $commentId = $_POST['id'];
  $data = [
    'comment' => $_POST['comment'],
    'user_id' => $_POST['user_id'],
    'post_id' => $_POST['post_id']
  ];
  $res = update('comments', 'id', $commentId, $data);
  if ($res > 0) {
    $result['message'] = 'Comment Updated successfully';
  } else {
    $result['error'] = true;
    $result['message'] = 'Failed to update comment';
  }
}

if ($action === 'delete-comment') {
  $commentId = $_POST['id'];

  $res = delete('comments', $commentId);
  if ($res === 1) {
    $result['message'] = 'Comment deleted successfully';
  } else {
    $result['error'] = true;
    $result['message'] = 'Failed to update comment';
  }
}

if ($action === 'fetch-comments') {
  $postId = $_GET['post_id'];
  $comments = getComments($postId);
  $result['comments'] = $comments;
}

echo json_encode($result);