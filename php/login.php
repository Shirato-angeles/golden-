<?php

$dbhost = "localhost";
$dbuser = "admin";
$dbpass = "";
$dbname = "golden";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass);
if (!$conn){
	die("no hay concecion con la base de datos:".mysqli_connect_error());
};

$nombre = $_POST["txtusuario"]
$pass = $_POST["txtpassword"]






>