<?php
include "path.php";
require_once ROOT_PATH . "/app/helpers/Redirect.php";
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['verified']);
unset($_SESSION['profile_image']);
unset($_SESSION['banner_title']);
unset($_SESSION['banner_image']);
session_destroy();
redirect('/');