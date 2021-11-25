<?php 
$consulta= consultarPersona($_GET['IdRestaurantes']);

function consultarPersona($id){
    include '../conexion/conexion2.php';
    $sentencia="SELECT * FROM restaurantes WHERE IdRestaurantes='".$id."'";
    $resultado=$conexion->query($sentencia) or die ("Error de conexion".mysqli_error($conexion));
    $fila=$resultado->fetch_assoc();
return[
    $fila['IdRestaurantes'],
    $fila['NombresDue'],
    $fila['Email'],
    $fila['NumeroDue'],
    $fila['Contrasena'],
    $fila['TipoPersona'],
	$fila['NIT'],
	$fila['NomRes'],
    $fila['CelularRes'],
	$fila['Barrio'],
	$fila['IdRoles']
];
}

?>
<!DOCTYPE html>
<html lang="es">
<script src="../js/control.js"></script>
<head>
	<title>DELICIA EXPRESS</title>		
	<link rel="stylesheet" type="text/css" href="../estilos/estilo2.css">
	<meta charset="utf-8">
	<meta name="keywords" content="ingredientes,comida,platos,hamburguesas,rapidas">
	<meta name="description" content="Esta pagina trata de una aplicacion interactiva que permite al usuario crear su propio plato, el cliente arrastra los ingredientes y se va formando su plato">
	<meta name="author" content="Juan Pablo Doncel">
	<meta name="viewport" content="width-device-width, initial-scale-1.0">
</head>
<body>
	<!--<a id="r" href="registrorestaurante.php"><button class="r">Restaurantes</button></a>
	<a id="c" href="registroempleado.php"><button class="r">Soy Empleado</button></a>-->
<header>
	<h1 id="tit">ACTUALIZAR RESTAURANTES</h1>
</header>
<form method="GET" action="../controlador/controladoractualizarres.php">
	<p>Hola! Nos complace saber que deseas registrarte y empezar a usar nuestros servicios, a continuacion encontraras un formulario, diligencialo correctamente y asi podras empezar a disfrutar.</p>
	<input type="hidden" class="ctexto" id="id" name="IdRestaurantes" value="<?php echo $consulta[0]?>"><br><br>
	<label>Nombres del dueño</label>
	<input type="text" class="ctexto" id="nombre" name="nombresDue" value="<?php echo $consulta[1]?>" onkeypress="return soloLetras(event)"><br><br>
	<label>Email</label>
	<input type="email" class="ctexto" id="correo" name="correo" value="<?php echo $consulta[2]?>"><br><br>
	<label>Numero Dueño</label>
	<input type="text" class="ctexto" id="numerod" name="numerodue" value="<?php echo $consulta[3]?>" onkeypress="return soloNumeros(event)"><br><br>	
	<label>Contrasena</label>
	<input type="password" class="ctexto" id="contraseña" name="contrasena" value="<?php echo $consulta[4]?>"><br><br>
	<label>TipoPersona</label>
	<input type="text" class="ctexto" id="tipop" name="tipopersona" value="<?php echo $consulta[5]?>"  onkeypress="return soloLetras(event)"><br><br>
	<label>NIT</label>
	<input type="text" class="ctexto" id="nitt" name="nit" value="<?php echo $consulta[6]?>" onkeypress="return soloNumeros(event)"><br><br>
	<label>Nombre Restaurante</label>
	<input type="text" class="ctexto" id="nombrer" name="nrestaurante" value="<?php echo $consulta[7]?>" ><br><br>
    <label>Celular del Restaurante</label>
	<input type="text" class="ctexto" id="cel" name="celres" value="<?php echo $consulta[8]?>" onkeypress="return soloNumeros(event)"><br><br>
	<label>Barrio</label>
	<input type="text" class="ctexto" id="barrior" name="barrio" value="<?php echo $consulta[9]?>" onkeypress="return soloLetras(event)" ><br><br>
	<label>Id rol</label>
	<input type="text" class="ctexto" name="idrol" value="<?php echo $consulta[10]?>" onkeypress="return soloNumeros(event)"><br><br>
	<input class="b1" type="submit" id="m"  name="update" value="Actualizar">
	<!--<a href="../vista/iniciosesion.php">Ya te registraste? <u>INICIA SESIÓN</u> </a>-->
</form>
	<a id="v" href="../vista/listarusuarios.php"><button class="b1"> VOLVER AL LISTADO</button></a>


</body>
</html>