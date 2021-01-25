<?php

function sanitize($request, $method)
{
  $body = [];
  if (strtolower($method) === 'get') {
    foreach ($request as $key => $value) {
      //Remove invalid characters in all inputs in super global $_GET
      $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    }
  }

  if (strtolower($method) === 'post') {
    foreach ($request as $key => $value) {
      $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    }
  }

  return $body;
}