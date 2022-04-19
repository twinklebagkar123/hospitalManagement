<?php
define('DB_SERVER','localhost');
define('DB_USER','u298126064_hospital');
define('DB_PASS' ,'?mnR!Y!y0');
date_default_timezone_set('Asia/Kolkata');
define('DB_NAME', 'u298126064_hospital');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>