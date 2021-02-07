<?php

function upload($file, $target)
{
  $imageName =  time() . '_' . $file['banner_image']['name'];
  $tmpName = $file['banner_image']['tmp_name'];
  $targetDirectory = ROOT_PATH . "/assets/imgs/{$target}/" . $imageName;

  return move_uploaded_file($tmpName, $targetDirectory);
}