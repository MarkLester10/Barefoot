<?php

require 'constants.php';

$conn = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);


//Checks the connection

if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
}

//Long method in connecting to database

// $conn = mysqli_connect('localhost', 'root','');
// mysqli_select_db($conn, 'userregistration');