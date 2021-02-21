<?php
include "../../path.php";
require_once ROOT_PATH . "/app/config/db.php";

$action = "";
$res = array();
$postId = $_GET['post_id'];
$userId = $_GET['user_id'];

if (isset($_GET['action'])) {
  $action = $_GET['action'];
}


if ($action == 'liked') {
  $isExist = selectOne('posts_likes', ['user_id' => $userId, 'post_id' => $postId]);
  sleep(1);
  if (!empty($isExist)) {
    delete('posts_likes', $isExist['id']);
  } else {
    create('posts_likes', ['user_id' => $userId, 'post_id' => $postId]);
  }
  $res['isUserLiked'] = !empty($isExist) ? false : true;
  $res['message'] = "Success!";
}

if ($action == 'get-post') {
  $post = selectOnePublicPost(['p.id' => $postId,]);
  if (!empty($post)) {
    $res['post'] = $post;
  }
  $isPostLiked = selectOne('posts_likes', ['user_id' => $userId, 'post_id' => $postId]);
  $res['isPostLiked'] = !empty($isPostLiked) ? true : false;
}

echo json_encode($res);