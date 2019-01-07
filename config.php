<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'kallia6983053620');
define('DB_NAME', 'php_assignment');
 

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($conn === false)
{
    die("ERROR: Could not connect. " . $conn->connect_error);
}
?>