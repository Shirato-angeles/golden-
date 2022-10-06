<?php

session_start();

if (!empty($_POST["btningresar"])) {
	if (!empty($_POST["usuario"]) && !empty($_POST["password"])  ) {
		$usuario = $_POST["usuario"];
		$password = $_POST["password"];
		$sql = $conexion->query(" SELECT * FROM `users`  WHERE  usuario='$usuario' AND password='$password'");
		if ($datos = $sql->fetch_object()) {
			$_SESSION['id'] = $datos->id;
			$_SESSION['nombre'] = $datos->nombre;
			$_SESSION['apellido'] = $datos->apellido;
			$_SESSION['usuario'] = $datos->usuario;
			$_SESSION['password'] = $datos->password;
			header("Location: index.php");
		} else {  ?>
			
			<script> 
			alert('Acceso Denegado')

			</script>
		<?php } 
		
	} else {
		echo "Campos vacios";
	}
	?>
	<script> 
	setTimeout(() => {
		window.history.replaceState(null, null, window.location.pathname);
	}, 0);

	</script>

<?php
}

?>