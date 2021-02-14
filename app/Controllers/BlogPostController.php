<?php
require_once ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/Redirect.php";
require_once ROOT_PATH . "/app/helpers/Sanitize.php";
require_once ROOT_PATH . "/app/Requests/FormRequests.php";
require_once ROOT_PATH . "/app/Controllers/EmailController.php";
$categories = selectAll('categories');
$tags = selectAll('tags');


if (isset($_POST['create-post'])) {
  dump($_POST);
  unset($_POST['create-post']);
  $request = sanitize($_POST, 'post');
  $rules = [
    'title' => [RULE_REQUIRED, [RULE_UNIQUE, 'unique' => 'title', 'table' => 'posts'], [RULE_MAX, 'max' => 60]],
    'category' => [RULE_REQUIRED],
    'category' => [RULE_REQUIRED],
  ];

  $errors = validate($request, $rules);
}