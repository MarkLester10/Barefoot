<?php
require ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/Redirect.php";
require_once ROOT_PATH . "/app/helpers/Sanitize.php";
require_once ROOT_PATH . "/app/helpers/ImageHelper.php";
require_once ROOT_PATH . "/app/Requests/FormRequests.php";

$userId = $_SESSION['id'];
$socials = selectOne('socials', ['user_id' => $userId]);

$errors = array();

$username = '';
$email = '';
$facebook = empty($socials) ? '' : $socials['facebook'];
$instagram = empty($socials) ? '' : $socials['instagram'];
$twitter = empty($socials) ? '' : $socials['twitter'];
$youtube = empty($socials) ? '' : $socials['youtube'];

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
    if ($res < 0) {
      redirectWithMessage('settings', ['error' => 'There is an error updating your banner ❌']);
    }
    $_SESSION['banner_title'] = $request['banner_title'];
    redirectWithMessage('settings', ['success' => 'Banner updated 🥳']);
  }

  // Profile Image
  if (!empty($_FILES['profile_image']['name'])) {
    if (!is_null($_SESSION['profile_image'])) {
      remove($_SESSION['profile_image'], 'auth/profiles');
    }
    $profileImage = upload($_FILES, 'profile_image', 'auth/profiles');
    $res = update('users', 'id', $userId, ['profile_image' => $profileImage]);
    if ($res < 0) {
      redirectWithMessage('settings', ['error' => 'There is an error updating your profile ❌']);
    }
    $_SESSION['profile_image'] = $profileImage;
    redirectWithMessage('settings', ['success' => 'Profile updated 🤩']);
  }

  // Banner Image
  if (!empty($_FILES['banner_image']['name'])) {
    if (!is_null($_SESSION['banner_image'])) {
      remove($_SESSION['banner_image'], 'banners');
    }
    $bannerImage = upload($_FILES, 'banner_image', 'banners');
    $res = update('users', 'id', $userId, ['banner_image' => $bannerImage]);
    if ($res < 0) {
      redirectWithMessage('settings', ['error' => 'There is an error updating your banner image ❌']);
    }
    $_SESSION['banner_image'] = $bannerImage;
    redirectWithMessage('settings', ['success' => 'Banner updated 🤩']);
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
  if ($res < 0) {
    redirectWithMessage('settings', ['error' => 'There is an error updating your credentials ❌']);
  }
  $_SESSION['username'] = $request['username'];
  $_SESSION['email'] = $request['email'];
  redirectWithMessage('settings', ['success' => 'Account updated 🤩']);
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
    //TODO: create a createOrUpdate helper
    $res = '';
    if (empty($socials)) {
      $res = create(
        'socials',
        [
          'user_id' => $userId,
          'facebook' => $request['facebook'],
          'twitter' => $request['twitter'],
          'instagram' => $request['instagram'],
          'youtube' => $request['youtube']
        ]
      );
    }
    $res = update('socials', 'user_id', $userId, [
      'facebook' => $request['facebook'],
      'twitter' => $request['twitter'],
      'instagram' => $request['instagram'],
      'youtube' => $request['youtube']
    ]);

    if ($res < 0) {
      redirectWithMessage('settings', ['error' => 'There is an error updating your socials ❌']);
    }
    redirectWithMessage('settings', ['success' => 'Socials Added Successfully 💟']);
  }
  $facebook = $request['facebook'];
  $instagram = $request['instagram'];
  $twitter = $request['twitter'];
  $youtube = $request['youtube'];
}


//ACCOUNT DELETION

// TODO: Add Password Confirmation before deletion
if (isset($_POST['delete-account'])) {
  $res = delete('users',  $userId);
  if ($res < 0) {
    redirectWithMessage('settings', ['error' => 'There is an error deleting your account ❌']);
  }
  redirect('logout');
}