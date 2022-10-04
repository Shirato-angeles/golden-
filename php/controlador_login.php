<?php

session_start();

if (!empty($_POST["btningresar"])) {
	if (!empty($_POST["usuario"]) and !empty($_POST["password"])  ) {
		$usuario = $_POST["usuario"];
		$password = $_POST["password"];
		$sql = $conexion->query(" SELECT * FROM `users`  WHERE  usuario='$usuario' AND password='$password'");
		if ($datos = $sql->fetch_object()) {
			$_SESSION['id'] = $datos->id;
			$_SESSION['nombre'] = $datos->nombre;
			$_SESSION['apellido'] = $datos->apellido;
			$_SESSION['email'] = $datos->email;
			header("Location: index.php");
		} else {
			echo '<div class="color:red"><h1>Acceso Denegado</h1></div>'; 
		}
		
	} else {
		echo "Campos vacios";
	}
	
}

?>