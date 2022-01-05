<?php

session_start();

$host = "localhost"; /* Host name */
$user = "dani"; /* User */
$password = "4444"; /* Password */
$dbname = "isw"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}