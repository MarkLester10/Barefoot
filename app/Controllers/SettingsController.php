<?php
require ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/Sanitize.php";
require_once ROOT_PATH . "/app/helpers/ImageHelper.php";
require_once ROOT_PATH . "/app/Requests/FormRequests.php";


$errors = array();
$username = '';
$email = '';
$facebook = '';
$instagram = '';
$twitter = '';
$youtube = '';

$userId = $_SESSION['id'];

// SAVE PROFILE BANNER
if (isset($_POST['save-banner'])) {
  unset($_POST['save-banner']);
  $request = sanitize($_POST, 'post');
  $rules = [
    'banner_title' => [RULE_REQUIRED]
  ];
  $errors = validate($request, $rules);

  // Banner Title
  if (count($errors) === 0) {
    $res = update('users', 'id', $userId, ['banner_title' =>  $request['banner_title']]);
    if ($res > 0) {
      $_SESSION['banner_title'] = $request['banner_title'];
      $_SESSION['message'] = "Banner updated 🥳";
      $_SESSION['type'] = "success";
      header("Location: " . BASE_URL . '/settings.php');
      exit(0);
    }
  }

  // Profile Image
  if (!empty($_FILES['profile_image']['name'])) {
    if (!is_null($_SESSION['profile_image'])) {
      remove($_SESSION['profile_image'], 'auth/profiles');
    }
    $profileImage = upload($_FILES, 'profile_image', 'auth/profiles');
    $res = update('users', 'id', $userId, ['profile_image' => $profileImage]);
    if ($res > 0) {
      $_SESSION['profile_image'] = $profileImage;
      $_SESSION['message'] = "Profile updated 🤩";
      $_SESSION['type'] = "success";
      header("Location: " . BASE_URL . '/settings.php');
      exit(0);
    }
  }

  // Banner Image
  if (!empty($_FILES['banner_image']['name'])) {
    if (!is_null($_SESSION['banner_image'])) {
      remove($_SESSION['banner_image'], 'banners');
    }
    $bannerImage = upload($_FILES, 'banner_image', 'banners');
    $res = update('users', 'id', $userId, ['banner_image' => $bannerImage]);
    if ($res > 0) {
      $_SESSION['banner_image'] = $bannerImage;
      $_SESSION['message'] = "Profile updated 🤩";
      $_SESSION['type'] = "success";
      header("Location: " . BASE_URL . '/settings.php');
      exit(0);
    }
  }
}

//EDIT ACCOUNT
if (isset($_POST['save-account'])) {
  unset($_POST['save-account']);
  $request = sanitize($_POST, 'post');
  $rules = [
    'username' => [RULE_REQUIRED],
    'email' => [RULE_REQUIRED, RULE_EMAIL],
    'current_password' => [RULE_REQUIRED],
    'password' => [RULE_REQUIRED, [RULE_MIN, 'min' => 8], [RULE_MAX, 'max' => 24]]
  ];

  $errors = validate($request, $rules);

  if (count($errors) === 0) {
    $user = selectOne('users', ['id' => $userId]);
    if ($user) {
      if (password_verify($request['current_password'], $user['password'])) {
        changePassword($request, $userId);
      } else {
        $errors['current_password'] = 'Password do not match in our database.';
      }
    } else {
      $errors['username'] = 'User with that username or email doesn\'t exist';
    }
  }

  $username =  $request['username'];
  $email =  $request['email'];
}


function changePassword($request, $userId)
{
  $res = update('users', 'id', $userId, [
    'username' => $request['username'],
    'email' => $request['email'],
    'password' => password_hash($request['password'], PASSWORD_DEFAULT)
  ]);
  if ($res >  0) {
    $_SESSION['username'] = $request['username'];
    $_SESSION['email'] = $request['email'];
    $_SESSION['message'] = "Account updated 🤩";
    $_SESSION['type'] = "success";
    header("Location: " . BASE_URL . '/settings.php');
    exit(0);
  }
}


// EDIT SOCIALS
if (isset($_POST['save-socials'])) {
  unset($_POST['save-socials']);
  $request = sanitize($_POST, 'post');
  $rules = [
    'facebook' => [RULE_REQUIRED],
    'twitter' => [RULE_REQUIRED],
    'instagram' => [RULE_REQUIRED],
    'youtube' => [RULE_REQUIRED],
  ];
  $errors = validate($request, $rules);

  if (count($errors) === 0) {
    $userSocial = selectOne('socials', ['id' => $userId]);
    // TODO: UPDATE OR CREATE
  }
  $facebook = $request['facebook'];
  $instagram = $request['instagram'];
  $twitter = $request['twitter'];
  $youtube = $request['youtube'];
}

// TODO: REFACTOR
// redirectWithMessage($message, $type, $url);
// redirect($url);


// $_SESSION['message'] = "Social links added 🚀";
// $_SESSION['type'] = "success";
// header("Location: " . BASE_URL . '/settings.php');
// exit(0);