<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$servername = "localhost";
$username = "chpl";
$password = "Chpl@321.";
// $dbname = "myDB";
$dbname = "crud_db";

// Create connection
$conn =mysqli_connect ($servername, $username, $password,$dbname);

// Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }

// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Credentials: true");
// header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
// header('Access-Control-Max-Age: 1000');
// header('Content-Type: application/json; charset=utf-8');
// header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description, X-Requested-With, Authorization');
?>