<?php
require_once ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/Redirect.php";
require_once ROOT_PATH . "/app/helpers/Sanitize.php";
require_once ROOT_PATH . "/app/Requests/FormRequests.php";
require_once ROOT_PATH . "/app/Controllers/EmailControllerPHPMailer.php";

$errors = array();
$username = '';
$email = '';



// SIGN UP
if (isset($_POST['signup-btn'])) {
  unset($_POST['signup-btn']);
  $request = sanitize($_POST, 'post');
  $rules = [
    'username' => [RULE_REQUIRED, [RULE_UNIQUE, 'unique' => 'username', 'table' => 'users']],
    'email' => [RULE_REQUIRED, RULE_EMAIL, [RULE_UNIQUE, 'unique' => 'email', 'table' => 'users']],
    'password' => [RULE_REQUIRED, [RULE_MIN, 'min' => 8], [RULE_MAX, 'max' => 24]],
    'passwordConf' => [RULE_REQUIRED, [RULE_MATCH, 'match' => 'password']]
  ];
  $errors = validate($request, $rules);

  if (count($errors) === 0) {
    $request['password'] = password_hash($request['password'], PASSWORD_DEFAULT);
    unset($request['passwordConf']);
    $token = bin2hex(random_bytes(50));
    $emailValidation = ['verified' => 0, 'token' => $token];
    $data = array_merge($request,  $emailValidation);
    $userId = create('users', $data);
    $userData = selectOne('users', ['id' => $userId]);

    if ($userData) {
      sendVerificationEmail($userData['email'], $userData['username'], $userData['token']);
      login($userData, 'You are now logged in 👍');
    }
  }
  $username = $request['username'];
  $email = $request['email'];
}

// LOG IN
if (isset($_POST['login-btn'])) {
  unset($_POST['login-btn']);
  $request = sanitize($_POST, 'post');
  $rules = [
    'username' => [RULE_REQUIRED],
    'password' => [RULE_REQUIRED],
  ];
  $errors = validate($request, $rules);
  if (count($errors) === 0) {
    $user = selectOneOr('users', ['email' => $request['username'], 'username' => $request['username']]);
    if ($user) {
      (password_verify($request['password'], $user['password']))
        ? login($user, 'Hey, Welcome back! Have a tour now 😁')
        : $errors['password'] = 'Invalid password';
    } else {
      $errors['username'] = 'User with that username or email doesn\'t exist';
    }
  }
  $username = $request['username'];
}

//login function
function login($user, $message)
{
  $_SESSION['id'] = $user['id'];
  $_SESSION['profile_image'] = $user['profile_image'];
  $_SESSION['banner_image'] = $user['banner_image'];
  $_SESSION['username'] = $user['username'];
  $_SESSION['email'] = $user['email'];
  $_SESSION['verified'] = $user['verified'];
  $_SESSION['banner_title'] = $user['banner_title'];
  redirectWithMessage('/', ['success' => $message]);
}

//account verification token
if (isset($_GET['token'])) {
  $token = $_GET['token'];
  $user = selectOne('users', ['token' => $token]);
  if ($user) {
    $res = update('users', 'token', $token, ['verified' => 1]);
    if (count($res) > 0) {
      $user = selectOne('users', ['token' => $token]);
      login($user, 'Your email has been verified!');
    }
  } else {
    redirectWithMessage('/', ['error' => 'User not found']);
  }
}

// FORGOT PASSWORD

//send email
if (isset($_POST['forgot-password-btn'])) {
  unset($_POST['forgot-password-btn']);
  $request = sanitize($_POST, 'post');
  $rules = [
    'email' => [RULE_REQUIRED, RULE_EMAIL, [RULE_EXISTS, 'exists' => 'email', 'table' => 'users']],
  ];
  $errors = validate($request, $rules);
  if (count($errors) === 0) {
    $user = selectOne('users', ['email' => $request['email']]);
    $userToken = $user['token'];
    sendPasswordResetLink($request['email'], $userToken);
    redirectWithMessage('forgot-password', ['success' => 'We\'ve successfully sent a reset password link to your email address.']);
  }
}

//password-reset token
if (isset($_GET['password-token'])) {
  $passwordToken = $_GET['password-token'];
  $user = selectOne('users', ['token' => $passwordToken]);
  $_SESSION['email'] = $user['email'];
  redirect('reset-password');
}

//Reset the password
if (isset($_POST['reset-password-btn'])) {
  unset($_POST['reset-password-btn']);
  $request = sanitize($_POST, 'post');
  $rules = [
    'password' => [RULE_REQUIRED, [RULE_MIN, 'min' => 8], [RULE_MAX, 'max' => 24]],
    'passwordConf' => [RULE_REQUIRED, [RULE_MATCH, 'match' => 'password']]
  ];

  $errors = validate($request, $rules);
  $request['password'] = password_hash($request['password'], PASSWORD_DEFAULT);
  unset($request['passwordConf']);
  $email = $_SESSION['email'];
  if (count($errors) === 0) {
    $res = update('users', 'email',  $email, $request);
    if (count($res) > 0) {
      redirectWithMessage('login', ['success' => 'You\ve successfully change your password 😀. You can now login.']);
    }
  }
}