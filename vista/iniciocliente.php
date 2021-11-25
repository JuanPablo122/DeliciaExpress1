<!DOCTYPE html>
<html lang="es">
<head>
	<title>DELICIA EXPRESS</title>	
	<link rel="stylesheet" type="text/css" href="../estilos/estilo8.css">
	<meta charset="utf-8">
	<meta name="keywords" content="ingredientes,comida,platos,hamburguesas,rapidas">
	<meta name="description" content="Esta pagina trata de una aplicacion interactiva que permite al usuario crear su propio plato, el cliente arrastra los ingredientes y se va formando su plato">
	<meta name="author" content="Juan Pablo Doncel">
	<meta name="viewport" content="width-device-width, initial-scale-1.0">
</head>
<body>
<header>
	<h1 id="tit">DELICIA EXPRESS</h1>
	<nav>
		<ul id="menu">
			<li><a href="../vista/iniciocliente.php">INICIO</a></li>
		    <li><a href="../vista/restaurantescliente.php">VER RESTAURANTES</a></li>
		    <li><a href="../vista/vermenu.php">VER MENU</a></li>
		    <li><a href="../vista/creaplato.php">CREA TU PLATO</a></li>
	    </ul>
	</nav>
</header>

	<div id="uno">
		<p>¡Bienvenido(a) <?php
session_start();
$usua1=$_SESSION['user'];
echo("$usua1");

?>!</p>
		<img id="ham" src="../imagenes/hamburguesa.jpg">
		<p>NO DEJES PARA MAÑANA LO QUE PUEDES COMER HOY<br>
	       DISFRUTA CON NUESTROS DELICIOSOS PLATOS, LO MEJOR? LO LLEVAMOS A LA PUERTA DE TU CASA.</p>
<form name="form2" method="POST" action="../modelo/cerrar1.php">
	<input class="b1" type="submit" name="button" value="Cerrar Sesión">		
</form>
	
	</div>

<footer>
	Contactanos <br>
	Numeros: 3182883910-3002608446-3229564274 <br>
	Direccion: Carrera 9 Este N 30C-36 San Mateo
</footer>
</body>
</html>
