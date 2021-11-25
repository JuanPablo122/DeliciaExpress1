<!DOCTYPE html>
<html lang="es">
<head>
	<title>DELICIA EXPRESS</title>	
	<link rel="stylesheet" type="text/css" href="../estilos/estilo10.css">
	<meta charset="utf-8">
	<meta name="keywords" content="ingredientes,comida,platos,hamburguesas,rapidas">
	<meta name="description" content="Esta pagina trata de una aplicacion interactiva que permite al usuario crear su propio plato, el cliente arrastra los ingredientes y se va formando su plato">
	<meta name="author" content="Juan Pablo Doncel">
	<meta name="viewport" content="width-device-width, initial-scale-1.0">
</head>
<body>
	
<header>
	<h1 id="tit">COCINERO</h1>
	<nav>
		<a class="l1" href="iniciococinero.php">INICIO</a>
	    <a class="l1" href="pedidoscocinero.php">VER PEDIDOS</a>
	</nav>		
</header>
<div>
	<table>
		<tr>
			<td>Nombre de pedido</td>
			<td>Cantidad</td>

		</tr>
		<tbody id="platos"></tbody>	
		<tbody id="platos1"></tbody>	
		<tbody id="platos2"></tbody>		
	</table><br>
	<button onclick="plato()">Mostrar</button>
</div>
<footer>
	Contactanos <br>
	Numeros: 3182883910-3002608446-3229564274 <br>
	Direccion: Carrera 9 Este N 30C-36 San Mateo
</footer>
</body>
</html>
