<?php

$dbhost = "localhost";
$dbuser = "admin";
$dbpass = "";
$dbname = "golden";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass);
if (!$conn){
	die("no hay concecion con la base de datos:".mysqli_connect_error());
};

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];


$query = mysqli_query("SELECT * FROM iniciar_seccion WHERE usuario = '".$nombre."' and pass = '".$pass."'");

$nr = mysqli_query_num_rows($query);

if ($nr == 1){
	//inicio(Location: ../index.html )
	echo "Biembenido :" .$nombre
}else if($nr == 0){	
	echo "No se encontro el usuario";

}

>