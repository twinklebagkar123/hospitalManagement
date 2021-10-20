<?php
define('DB_SERVER','localhost');
define('DB_USER','u298126064_hospitaloot');
define('DB_PASS' ,'?mnR!Y!y0');
define('DB_NAME', 'u298126064_hospital');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>