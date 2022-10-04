<?php
require 'database.php';



?>



<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Iniciar Secion</title>
    <link rel="stylesheet" href="../styles/Iniciar-secion.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <!---we had linked our css file----->
  </head>

  <body>
      <header class="header">
        <a href="#" id="logo">Golden Paradise</a>
        <nav class="navbar">
          <a href='../php/index.php' >Inicio</a>
          <a href='#' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Reserva Ahora</a>
          <a href='#' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Quienes Somos</a>
          <a href='#'  onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Contanos</a>
          <a href="#" class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Registrarse</a>
        </nav>
        <div class="icons">
            <div class="fas fa-user" id="myuser"></div>
            <div class="fas fa-search" id="serach-bar"></div>
            <div class="fas fa-bars" id="menu-bars"></div>
        </div>

        <div class="search-box">
            <input type="search" placeholder="search here">
        </div>
    </header>
	
    <div class="main-background">
      <div class="main-text">
		<div>
			<?php
			include "./controlador_login.php"
		?>
		</div>
        <div id='login-form'class='login-page' method='post' action='../php/login.php'>
          <div class="form-box">
              <div class='button-box'>
                  <div id='btn'></div>
                  <button type='button'onclick='login()'class='toggle-btn'>Iniciar </button>
                  <button type='button'onclick='register()'class='toggle-btn'>Registrar</button>
              </div>
              <form id='login' class='input-group-login' action='login.php' method='post'>
                  <input type='text'class='input-field'placeholder='Email Id' name="usuario" required >
      <input type='password'class='input-field'placeholder='Contraseña' name="password" required>
      <input type='checkbox'class='check-box'><span>Recordar Contraseña</span>
      <button type='submit'class='submit-btn' value='ingresar' name='btningresar' >Iniciar Secion</button>
   </form>
   <form id='register' class='input-group-register'>
       <input type='text'class='input-field'placeholder='Primer Nombre'  name='nombre' required>
       <input type='text'class='input-field'placeholder='Apellidos ' name='apellido' required>
       <input type='email'class='input-field'placeholder='Email Id' name='usuario' required>
       <input type='password'class='input-field'placeholder=' Contraseña' name='password' required>
       <input type='password'class='input-field'placeholder='Confirmar Contraseña' name='confirmpassword'  required>
       <input type='checkbox'class='check-box'><span>Estoy de acuerdo con los términos y condiciones                                                  conditions</span>
                  <button type='submit'class='submit-btn'  value="registrar">Registrarse</button>
         </form>
          </div>
      </div>
    </div>
    </div>
  <script>
      var x = document.getElementById('login');
      var y = document.getElementById('register');
      var z = document.getElementById('btn');
      function register() {
        x.style.left = '-400px';
        y.style.left = '50px';
        z.style.left = '110px';
      }
      function login() {
        x.style.left = '50px';
        y.style.left = '450px';
        z.style.left = '0px';
      }
    </script>
    <script>
      var modal = document.getElementById('login-form');
      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "block";
        }
      }
    </script>
  </body>

</html>
