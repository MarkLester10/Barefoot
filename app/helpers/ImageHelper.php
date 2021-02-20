<?php
function upload($file, $imageName, $target)
{
  $validExtensions = ['png', 'jpeg', 'jpg'];
  $img_explode = explode('.', $file[$imageName]['name']);
  $img_ext = end($img_explode);
  if (in_array($img_ext, $validExtensions) === true) {
    $newImageName =  time() . '_' . $file[$imageName]['name'];
    $tmpName = $_FILES[$imageName]['tmp_name'];
    $targetDirectory = ROOT_PATH . "/assets/imgs/{$target}/" .  $newImageName;
    if (move_uploaded_file($tmpName, $targetDirectory)) {
      return $newImageName;
    }
  } else {
    $url = ($_SERVER['REQUEST_URI'] === '/account/settings.php') ? 'account/settings' : 'collections/create';
    redirectWithMessage($url, ['error' => 'Invalid Image Format ❌ - Valid Extendion (JPEG, PNG, JPG)']);
  }
}

function remove($imageName, $target)
{
  return unlink(ROOT_PATH . "/assets/imgs/{$target}/$imageName");
}