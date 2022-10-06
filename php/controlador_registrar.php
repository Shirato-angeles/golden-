<?php
   if (!empty($_POST["btnregistrar"])) {
		if (!empty($_POST["nombre"]) 
		&& !empty($_POST["apellido"]) 
		&& !empty($_POST["usuario"])  
		&& !empty($_POST["password"]) 
		&& !empty($_POST["confirmpassword"])) {

			$nombre = $_POST["nombre"];
			$apellido = $_POST["apellido"];
			$usuario = $_POST["usuario"];
			$password = md5($_POST["password"]);
			$confirmpassword = md5($_POST["confirmpassword"]);

			$sql = $conexion->query("SELECT count(*) as 'total' FROM `users` WHERE usuario ='$usuario'");
			if ($sql-> fetch_object()-> total > 0){
				echo '<div class=""> usuario ya existe </div>';
			} else {
				$registro = $conexion->query("INSERT INTO users(nombre , apellido , usuario , password , cpassword) VALUES('$nombre','$apellido','$usuario', '$password', '$confirmpassword')  ");
				if ($registro == true) {
					?>
					<script>
						alert('Usuario <?php echo $usuario; ?> fue creado correctamente')
					</script>
			<?php
				} else {
					?>
					<script>
						alert('Usuario no fue creado correctamente')
					</script>
			<?php
				}
				
			}


		} else {?>
			<script>
				alert('Campos incorrectos')
			</script>
	<?php	} ?>
	<script> 
	setTimeout(() => {
		window.history.replaceState(null, null, window.location.pathname);
	}, 0);

	</script>
	<?php
	}

?>