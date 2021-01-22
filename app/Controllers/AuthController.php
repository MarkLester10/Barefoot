<?php
require ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/Requests/AuthFormRequests.php";
require_once ROOT_PATH . "/app/Controllers/EmailController.php";

$errors = array();
$username = '';
$email = '';



// SIGN UP
if (isset($_POST['signup-btn'])) {
  $request = [
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'passwordConf' => $_POST['passwordConf'],
  ];
  $errors = validateSignUp($request);

  if (count($errors) === 0) {
    $request['password'] = password_hash($request['password'], PASSWORD_DEFAULT);
    unset($request['passwordConf']);
    $token = bin2hex(random_bytes(50));
    $emailValidation = ['verified' => false, 'token' => $token];
    $data = array_merge($request,  $emailValidation);
    $userId = create('users', $data);
    $userData = selectOne('users', ['id' => $userId]);

    if ($userData) {
      sendVerificationEmail($userData['email'], $userData['token']);
      login($userData, 'You are now logged in 👍');
    }
  }
  $username = $request['username'];
  $email = $request['email'];
}

// LOG IN
if (isset($_POST['login-btn'])) {
  $request = [
    'username' => $_POST['username'],
    'password' => $_POST['password'],
  ];
  $errors = validateLogin($request);
  if (count($errors) === 0) {
    $user = selectOneOr('users', ['email' => $request['username'], 'username' => $request['username']]);
    if ($user) {
      if (password_verify($request['password'], $user['password'])) {
        login($user, 'Welcome Back 👍');
      } else {
        $errors['password'] = 'Invalid password';
      }
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
  $_SESSION['username'] = $user['username'];
  $_SESSION['email'] = $user['email'];
  $_SESSION['verified'] = $user['verified'];
  $_SESSION['message'] = $message;
  $_SESSION['type'] = 'success';
  header("Location: " . BASE_URL . '/index.php');
  exit(0);
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
    echo "user not found";
  }
}

// FORGOT PASSWORD

//send email
if (isset($_POST['forgot-password-btn'])) {
  $request = [
    'email' => $_POST['email'],
  ];
  $errors = validateForgotPasswordEmail($request);
  if (count($errors) === 0) {
    $user = selectOne('users', ['email' => $request['email']]);
    $userToken = $user['token'];
    sendPasswordResetLink($request['email'], $userToken);
    $_SESSION['message'] = "We've successfully sent a reset password link to your email address.";
    $_SESSION['type'] = "success";
    header("Location: " . BASE_URL . '/forgot-password.php');
    exit(0);
  }
}

//password-reset token
if (isset($_GET['password-token'])) {
  $passwordToken = $_GET['password-token'];
  $user = selectOne('users', ['token' => $passwordToken]);
  $_SESSION['email'] = $user['email'];
  header("Location: " . BASE_URL . '/reset-password.php');
  exit(0);
}

//Reset the password
if (isset($_POST['reset-password-btn'])) {
  $request = [
    'password' => $_POST['password'],
    'passwordConf' => $_POST['passwordConf'],
  ];
  $errors = validatePasswordReset($request);
  $request['password'] = password_hash($request['password'], PASSWORD_DEFAULT);
  unset($request['passwordConf']);
  $email = $_SESSION['email'];
  if (count($errors) === 0) {
    $res = update('users', 'email',  $email, $request);
    if (count($res) > 0) {
      header('location: ' .  BASE_URL . '/login.php');
      exit(0);
    }
  }
}

//LOGOUT
if (isset($_GET['logout'])) {
  unset($_SESSION['id']);
  unset($_SESSION['username']);
  unset($_SESSION['email']);
  unset($_SESSION['verified']);
  header('location: ' .  BASE_URL . '/login.php');
  session_destroy();
  exit(0);
}