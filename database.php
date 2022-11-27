<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'examprep');
define('SITE_NAME', 'PHP EXAM');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($conn->connect_error){
    die('Connection Failed' . $conn->connect_error);
}

echo "Connected!";
?>