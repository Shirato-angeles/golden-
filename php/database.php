<?php
$conexion = new mysqli('localhost', 'root', '', 'golden-');

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}


 
mysqli_close($conexion);
