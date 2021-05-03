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
     $now = new DateTime($datetime);
    $now->setTimezone(new DateTimeZone('Asia/Manila'));
  if ($isoFormat) {
    return Carbon::parse($now)->isoFormat('MMMM Do YYYY, h:mm A');
  } else {
    return Carbon::parse($now)->calendar();
  }
}
