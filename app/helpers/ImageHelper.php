<?php

function upload($file, $imageName, $target)
{
  $newImageName =  time() . '_' . $file[$imageName]['name'];
  $tmpName = $_FILES[$imageName]['tmp_name'];
  $targetDirectory = ROOT_PATH . "/assets/imgs/{$target}/" .  $newImageName;
  if (move_uploaded_file($tmpName, $targetDirectory)) {
    return $newImageName;
  }
}

function remove($imageName, $target)
{
  return unlink(ROOT_PATH . "/assets/imgs/{$target}/$imageName");
}