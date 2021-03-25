<?php
if (isset($_SESSION['id'])) {
  header('Location:' . BASE_URL . '/');
  exit();
}