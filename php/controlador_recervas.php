<?php
   if (!empty($_POST['btnrecervar'])) {
	  if (!empty($_POST['llegada'])
	   && !empty($_POST['partida']) 
	   && !empty($_POST['estado']) 
	   && !empty($_POST['habitacion'])
	   && !empty($_POST['adultos'])
	   && !empty($_POST['ninos'])
	   ) {
		 $llegada = $_POST["llegada"];
		 $partida = $_POST["partida"];
		 $estado = $_POST["estado"];
		 $habitacion = $_POST["habitacion"];
		 $adultos = $_POST["adultos"];
		 $ninos = $_POST["ninos"];

		 $sql = $conexion->query("SELECT count(*) as 'total' FROM `recervas` WHERE recervas ='$llegada'");
		 if ($sql-> fetch_object()-> total > 0){
			 echo '<div class=""> Recervacion para esa fecha ya existe </div>';
		 } else {
			 $registro = $conexion->query("INSERT INTO recervas(llegada , partida , estado , habitacion , adutos, ninos) VALUES('$llegada','$partida','$estado', '$habitacion', '$adultos', '$adultos', '$ninos' )  ");
			 if ($registro == true) {
				 ?>
				 <script>
					 alert('recerva <?php echo $llegada; ?> fue creada correctamente')
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
	  } else {
		  # code...
	  }
	  
   }
?>