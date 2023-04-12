<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "mini project";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
