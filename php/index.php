<?php

session_start();

if (empty($_SESSION["id"])) {
	header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Golden Paradise</title>
        <link rel="stylesheet" href="../styles/style_inicio.css">
        <link rel="stylesheet" href="../fontawesome-free-5.15.3-web/css/all.min.css">
        <link rel="shortcut icon" href="../imgaes/ mylogo.ico" type="image/x-icon">
    </head>

    <body>

        <header class="header">
            <a href="#" id="logo"> <img src="../imgaes/mylogo.png"/></a>
            <nav class="navbar">
                <a href='#'> <i class="fa fa-home"> Inicio</i></a>
                <a href="#main-hotel"> <i class="fa fa-hotel"> Hoteles </i></a>
                <a href="#room"> <i class="fa fa-bed"> Habitaciones </i></a>
                <a href='#quienes-somos'><i class="fa fa-users"> Quienes Somos </i></a>
				<a href="#recervas"> <i class="fa fa-calendar"> Reservaciones</i> </a>
                <a href='#footer'> <i class="fa fa-phone"> Contanos </i></a>

            </nav>
            <div class="icons">
                <a href="controlador_cerrarSeccion.php">
                <div class="fas fa-user" id="myuser"><?php echo $_SESSION['nombre']. $_SESSION['apellido'] ?> </div></a>
                <div class="fas fa-search" id="serach-bar"></div>
                <div class="fas fa-bars" id="menu-bars"></div>
            </div>

            <div class="search-box">
                <input type="search" placeholder="search here">
            </div>
        </header>
        <!-- background image -->

        <div class="main-background">
            <video  autoplay loov muted plays-inline  class="back-video">

                <source repeat src="../imgaes/ video.mp4" type="video/mp4">
            </video>
            <div class="content"> 
                <h1> Golden Paradise </h1>
            </div>
        </div>
        <!-- background image ended -->

        <div class="quienes-somos" id="quienes-somos">
            <h1>Quienes <span>Somos</span></h1>
            <p>
                La industria de viajes, hotelería y turismo, durante los últimos dos años ha decaído en más de un 50%, en todo el mundo.
                Principalmente en Colombia “ hasta el 15 de marzo se habían aplicado protocolos de emergencia sanitaria para contener o evitar la entrada de personas contagiadas de coronavirus en los aeropuertos internacionales del” [1], con esto podemos concluir que la pandemia tuvo un impacto negativo para la industria de viajes, hotelería y turismo; por lo cual se busca una manera de reactivar este proyecto.
                GOLDEN PARADISE es una plataforma en la que los usuarios tendrán accesibilidad a todas las aerolíneas y hoteles a nivel nacional, podrán clasificar y dar opinión de su experiencia utilizando el sitio web; de esta manera se busca resurgir esta industria y ayudar a solventar las pedidas debido a la pandemia.

            </p>
        </div>
        <!-- booking secton -->
        <div class="book-section" id="recervas">
            <div class="background-section">
            <div class="inner-book">
                <input type="text" placeholder="Llegada">
                <input type="text" placeholder="Partida">
                <input type="text" placeholder="Numero de habitación">
                <input type="text" placeholder="Estado">
                <div class="book-btn">
                    <a href="#">Reserva Ahora</a>
                </div>
            </div>
            </div>

        </div>
        <!-- booking secton ended -->
        <div class="award-winning-hotel">
            <h1>Hoteles </h1>
            <div class="main-hotel" id="main-hotel">
                <div class="inner-award">
                    <img src="../imgaes/award1.png" alt="">
                    <h2>GHL Hotel Tequendama </h2>
                    <h3> <i class="fa fa-location-arrow" aria-hidden="true">Hotel centro internacional, Bogotá</i> </h3>
                    <p>El GHL Hotel Tequendama Bogotá está ubicado en Bogotá, a 1,7 km del Chorro de Quevedo, 
                        y ofrece alojamiento, restaurante, aparcamiento privado, centro de fitness y bar...</p>
                        <div class="estrellas">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <div class="book-room-btn">
                            <a href="#" class="book-room">Reserva Ahora.</a>
                        </div>
                </div>
                <div class="inner-award">
                    <img src="../imgaes/award 2.png" alt="">
                    <h2>Hotel Habitel Select</h2>
                    <p>El Hotel Habitel Select se encuentra en Bogotá y ofrece spa, centro de fitness, 
                        restaurante y habitaciones con wifi gratis y TV de pantalla plana. Se proporciona aparcamiento gratuito...</p>
                         <div class="estrellas">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <div class="book-room-btn">
                            <a href="#" class="book-room">Reserva Ahora.</a>
                        </div>
                </div>
                <div class="inner-award">
                    <img src="../imgaes/award 3.png" alt="">
                    <h2>ibis Bogota Museo</h2>
                    <p>El Hotel Ibis Bogotá Museo está ubicado en Bogotá, en un impresionante edificio situado
                         a sólo 50 metros del Museo Nacional. Ofrece habitaciones con conexión Wi-Fi gratuita y</p>
                        <div class="estrellas">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <div class="book-room-btn">
                            <a href="#" class="book-room">Reserva Ahora.</a>
                        </div>

                </div>
                <div class="inner-award">
                    <img src="../imgaes/award4.png" alt="">
                    <h2>Hilton Garden Inn Bogota Airport </h2>
                    <p>Llenamos el contenido del espacio. De Alta Calidad, Hermoso, Sólido Y Agradable Al Tacto.
                        Muebles Y Decoración De Hormigón? Tú a nosotros.</p>
                        <div class="estrellas">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        </div>
                        <div class="book-room-btn">
                            <a href="#" class="book-room">Reserva Ahora.</a>
                        </div>

                </div>
                <div class="inner-award">
                    <img src="../imgaes/award5.png" alt="">
                    <h2>Radisson Bogota Metrotel</h2>
                    <p>El Metrotel 74 ofrece alojamiento con WiFi gratuita y se encuentra en Bogotá Norte,
                         a solo 200 metros del distrito financiero central. Limpieza, tipo de habitación y servicio.</p>
                        <div class="estrellas">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <div class="book-room-btn">
                            <a href="#" class="book-room">Reserva Ahora.</a>
                        </div>
                </div>
                <div class="inner-award">
                    <img src="../imgaes/award6.png" alt="">
                    <h2>Sur de la ciudad</h2>
                    <p>Llenamos el contenido del espacio. De Alta Calidad, Hermoso, Sólido Y Agradable Al Tacto.
                        Muebles Y Decoración De Hormigón? Tú a nosotros.</p>
                        <div class="estrellas">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        </div>
                        <div class="book-room-btn">
                            <a href="#" class="book-room">Reserva Ahora.</a>
                        </div>
                </div>
            </div>
        </div>
        <!-- award winning ended -->
        <!-- roomes -->
        <div class="our-rooms" id="room">
            <h1>Nuestras  <span> habitaciones</span></h1>
            <div class="inner-rooms">
                <div class="room-box">
                    <img src="../imgaes/award5.png" alt="">
                    <div class="beds">
                        <span>1 Cama</span><i class="fas fa-bed"></i>
                    </div>
                    <div class="book-room-btn">
                        <a href="#" class="book-room">Reserva Ahora.</a>
                    </div>
                </div>

                <div class="room-box">
                    <img src="../imgaes/award4.png" alt="">
                    <div class="beds">
                        <span>3 Cama</span><i class="fas fa-bed"></i>
                    </div>
                    <div class="book-room-btn">
                        <a href="#" class="book-room">Reserva Ahora.</a>
                    </div>
                </div>

                <div class="room-box">
                    <img src="../imgaes/award6.png" alt="">
                    <div class="beds">
                        <span>2 Cama</span><i class="fas fa-bed"></i>
                    </div>

                    <div class="book-room-btn">
                        <a href="#" class="book-room">Reserva Ahora.</a>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer-->
        <div class="footer" id="footer">
            <div class="col-1">
                <h3>GOLDEN PARADISE</h3>
                <a href="#sobre-nosotros">Sobre nosotros</a>
                <a href="room">Servicios</a>
                <a href="#footer">Contactanos</a>
                <a href="#recervas">Reservas</a
                ><a href="#">Blog</a>
            </div>
            <div class="col-2">
                <h3>CONTACTANOS</h3>
                <form action="">
                    <input type="email" placeholder=" ingresa tu Email" required> </br>
                    <button type="submit">Enviar ahora</button>
                </form>
            </div>
            <div class="col-3">
                <h3>REDES SOCIALES</h3>
                <p>La mejor sede de Hoteles en Colombia</p>
                <div class="social-icons">
                    
                    <a href="https://api.whatsapp.com/send?phone=3123669750&text=Hola, Nececito mas informacion!"> 
                        <i class='fab fa-whatsapp fa-4x'></i> 
                    </a>
                </div>
            </div>
        </div>
        <!--Footer-->

        <script src="script.js"></script>
    </body>

</html>