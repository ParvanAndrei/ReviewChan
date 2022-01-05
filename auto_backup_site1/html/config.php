<?php
//start session with MySql
session_start();
//set variables for connection 
$host = "localhost"; /* Host name */
$user = "dani"; /* User */
$password = "4444"; /* Password */
$dbname = "isw"; /* Database name */
//initiating a connection string
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}