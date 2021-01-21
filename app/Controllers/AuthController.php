<?php
require ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/Requests/AuthFormRequests.php";
require_once ROOT_PATH . "/app/Controllers/EmailController.php";

$errors = array();
$username = '';
$email = '';

//verify token
if (isset($_GET['token'])) {
  $token = $_GET['token'];
  $user = selectOne('users', ['token' => $token]);
  if ($user) {
    $res = update('users', $token, ['verified' => 1], 'token');
    if (count($res) > 0) {
      $user = selectOne('users', ['token' => $token]);
      login($user, 'Your email has been verified!');
    }
  } else {
    echo "user not found";
  }
}

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
      $errors['username'] = 'User doesn\'t exist';
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
  $_SESSION['type'] = 'alert-success';
  header("Location: " . BASE_URL . '/index.php');
  exit();
}

//logout
if (isset($_GET['logout'])) {
  unset($_SESSION['id']);
  unset($_SESSION['username']);
  unset($_SESSION['email']);
  unset($_SESSION['verified']);
  header('location: ' .  BASE_URL . '/login.php');
  session_destroy();
  exit();
}