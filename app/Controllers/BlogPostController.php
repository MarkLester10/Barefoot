<?php
require_once ROOT_PATH . "/app/config/db.php";
require_once ROOT_PATH . "/app/helpers/Redirect.php";
require_once ROOT_PATH . "/app/helpers/Sanitize.php";
require_once ROOT_PATH . "/app/Requests/FormRequests.php";
require_once ROOT_PATH . "/app/Controllers/EmailController.php";
$categories = selectAll('categories');