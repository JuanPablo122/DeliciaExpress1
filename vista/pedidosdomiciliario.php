<!DOCTYPE html>
<html lang="es">
<head>
	<title>DELICIA EXPRESS</title>	
	<link rel="stylesheet" type="text/css" href="../estilos/estilo5.css">
	<meta charset="utf-8">
	<meta name="keywords" content="ingredientes,comida,platos,hamburguesas,rapidas">
	<meta name="description" content="Esta pagina trata de una aplicacion interactiva que permite al usuario crear su propio plato, el cliente arrastra los ingredientes y se va formando su plato">
	<meta name="author" content="Juan Pablo Doncel">
	<meta name="viewport" content="width-device-width, initial-scale-1.0">
</head>
<body>
	<script type="text/javascript" src="js/app6.js"></script>
<header>
	<h1 id="tit">DOMICILIARIO</h1>
	<nav>
		<a class="l1" href="iniciodomiciliario.php">INICIO</a></li>
	    <a class="l1" href="pedidosdomiciliario.php">VER PEDIDOS</a></li>
	</nav>
</header>
<div>
	<table>
		<tr>
			<td>Nombre Plato</td>
			<td>Nombre y Apellido cliente</td>
			<td>Cantidad Plato</td>			
			<td>Barrio</td>
		</tr>
		<tbody id="info"></tbody>	
		<tbody id="info1"></tbody>
		<tbody id="info2"></tbody>	
	</table>
	<button onclick="pedido()">Mostrar</button>

</div>
<footer>
	Contactanos <br>
	Numeros: 3182883910-3002608446-3229564274 <br>
	Direccion: Carrera 9 Este N 30C-36 San Mateo
</footer>
</body>
</html>