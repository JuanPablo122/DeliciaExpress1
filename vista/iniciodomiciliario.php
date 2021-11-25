<!DOCTYPE html>
<html lang="es">
<head>
	<title>DELICIA EXPRESS</title>	
	<link rel="stylesheet" type="text/css" href="../estilos/estilo7.css">
	<meta charset="utf-8">
	<meta name="keywords" content="ingredientes,comida,platos,hamburguesas,rapidas">
	<meta name="description" content="Esta pagina trata de una aplicacion interactiva que permite al usuario crear su propio plato, el cliente arrastra los ingredientes y se va formando su plato">
	<meta name="author" content="Juan Pablo Doncel">
	<meta name="viewport" content="width-device-width, initial-scale-1.0">
</head>
<body>
<header>
	<h1 id="tit">DOMICILIARIO</h1>
	<nav>
		<a class="l1" href="iniciodomiciliario.php">INICIO</a></li>
	    <a class="l1" href="pedidosdomiciliario.php">VER PEDIDOS</a></li>
	</nav>
</header>
<div>
<p id="p1">¡Bienvenido(a) <?php
session_start();
$usua1=$_SESSION['user'];
echo("$usua1");?> !</p>

<p>En esta sección podras encontrar los platos que los clientes han ordenado,sus direcciones, el medio de pago para que asi puedas saber si debes cobrar o si nosotros ya lo hicimos, adicionalmente encontraras el orden en que debes entregar.</p>
	
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
