<?php 
include '../conexion/conexion.php';
class Consultar extends Conexion{


public function consultarRestaurante($id){
    //$sentencia="SELECT * FROM usuarios WHERE IdUsuarios='".$id."'";
    //$resultado=$this->getCnx()->query($sentencia) or die ("Error de conexion".mysqli_error($this->getCnx()));
    //$fila=$resultado->fetch_assoc();
	//$statement=$this->getCnx()->prepare("SELECT * FROM usuarios WHERE IdUsuarios='".$id."'");
	$statement=$this->getCnx()->prepare("select * from restaurantes WHERE IdRestaurantes='".$id."'");
	$statement->execute();
	$fila;
	foreach ($statement as $key) {
	$fila[0]=$key['IdRestaurantes'];
    $fila[1]=$key['NombresDue'];
    $fila[2]=$key['Email'];
    $fila[3]=$key['NumeroDue'];
    $fila[4]=$key['Contrasena'];
    $fila[5]=$key['TipoPersona'];
	$fila[6]=$key['NIT'];
	$fila[7]=$key['NomRes'];
	$fila[8]=$key['CelularRes'];
	$fila[9]=$key['Barrio'];
	$fila[10]=$key['IdRoles'];
	}
	
return $fila;

}

}

$obj=new Consultar();
$consulta= $obj->consultarRestaurante($_GET['IdRestaurantes']);
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