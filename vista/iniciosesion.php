<!DOCTYPE html>
<html lang="es">
<head>
	<title>DELICIA EXPRESS</title>	
	<link rel="stylesheet" type="text/css" href="../estilos/estilo4.css">
	<meta charset="utf-8">
	<meta name="keywords" content="ingredientes,comida,platos,hamburguesas,rapidas">
	<meta name="description" content="Esta pagina trata de una aplicacion interactiva que permite al usuario crear su propio plato, el cliente arrastra los ingredientes y se va formando su plato">
	<meta name="author" content="Juan Pablo Doncel">
	<meta name="viewport" content="width-device-width, initial-scale-1.0">
</head>
<body>
	
<header>
	<h1 id="tit">INICIA SESION</h1>
</header>
<form id="formulario" method="post" action="../controlador/validar1.php"> 
	<label>Nombre de usuario</label>
	<input type="text" class="ctexto" id="usuario" placeholder="Correo Electronico" name="login" required="Complete este campo"><br><br>
	<label>Contraseña</label>
	<input type="password" class="ctexto" id="contraseña" placeholder="Contraseña" name="pass" required="Complete este campo"><br><br>
	<input type="submit" class="b1" value="Iniciar sesión">
	<a href="registrocliente.php">No tienes una cuenta? <u>REGISTRATE</u> </a>
</form>
	<a id="v" href="../index.php"><button class="b1">VOLVER AL INICIO</button></a>
	

<footer>
	Contactanos <br>
	Numeros: 3182883910-3002608446-3229564274 <br>
	Direccion: Carrera 9 Este N 30C-36 San Mateo
</footer>
</body>
</html>
