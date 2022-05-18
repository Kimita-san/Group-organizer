<?php
session_start();
$conn= mysqli_connect("localhost", "root", "", "reglog");
$dbhost 	= "localhost";
$dbuser 	= "root";
$dbpass 	= "";
$dbname 	= "reglog";
$charset 	= "utf8";

$dbcon = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$dbcon) {
    die("Connection failed" . mysqli_connect_error());
}
mysqli_select_db($dbcon,$dbname);
mysqli_set_charset($dbcon,$charset);
