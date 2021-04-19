<?php

require ROOT_PATH . '/vendor/autoload.php';

use Carbon\Carbon;

function formattedLikes($count)
{
  $formattedLike = '';
  if ($count > 1) {
    $formattedLike = "{$count} likes";
  } else {
    $formattedLike = "{$count} like";
  }
  return $formattedLike;
}


function formattedTime($datetime, $isoFormat = false)
{
    date_default_timezone_set('Asia/Manila');
  if ($isoFormat) {
    return Carbon::parse($datetime)->isoFormat('MMMM Do YYYY, h:mm:ss A');
  } else {
    return Carbon::parse($datetime)->calendar();
  }
}
