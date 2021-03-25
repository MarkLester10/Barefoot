<?php

// Redirect only

function redirect($view)
{
  $path = ($view === '/') ? $view : "/{$view}.php";
  header('Location: ' . BASE_URL . "{$path}");
  exit(0);
}

function redirectWithMessage($view, $message)
{
  $_SESSION['message'] = current($message);
  $_SESSION['type'] = key($message);
  redirect($view);
}