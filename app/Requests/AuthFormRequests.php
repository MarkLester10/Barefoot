<?php

function validateSignUp($request)
{
  $errors = array();
  if (empty($request['username'])) {
    $errors['username'] = "Username is required.";
  }
  if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Email must be a valid email address.";
  }
  if (empty($request['email'])) {
    $errors['email'] = "Email is required";
  }
  if (empty($request['password'])) {
    $errors['password'] = "Password is required";
  }
  if ($request['password'] != $request['passwordConf']) {
    $errors['password'] = "The passwords do not match";
  }

  //duplication validation
  $user = selectOne('users', ['email' => $request['email']]);
  if ($user) {
    $errors['email'] = "Email already exists";
  }

  return $errors;
}

function validateLogin($request)
{
  $errors = array();
  if (empty($request['username'])) {
    $errors['username'] = "Username is required.";
  }
  if (empty($request['password'])) {
    $errors['password'] = "Password is required";
  }
  return $errors;
}