<?php
include("conexion.php");
$resultado=2;
if(isset($_POST['register'])){
	$nombres=($_POST['nombresDue']);
	$email=($_POST['correo']);
	$numero=($_POST['numerodue']);
	$contrasena=md5($_POST['contrasena']);
	$tipo_persona=($_REQUEST['tipoPersona']);	
	$nit=($_POST['nit']);	
	$nombre_restaurante=($_POST['nombreres']);
	$celular_restaurante=($_POST['celres']);
	$barrio=($_POST['barrio']);
	
	  $consulta1="INSERT INTO restaurantes(IdRestaurantes,NombresDue,Email,NumeroDue,Contrasena,TipoPersona,NIT,NomRes,CelularRes,Barrio,IdRoles) VALUES ('$idRes','$nombres','$email','$numero','$contrasena','$tipo_persona','$nit','$nombre_restaurante','$celular_restaurante','$barrio','5')";
	  $resultado1=mysqli_query($conn,$consulta1);
session_start();
	  if($resultado and $resultado1==1){
	  	$_SESSION['user']=$nombre_restaurante;
	  	header("location:../vista/iniciorestaurante.php?res=insertado");
	  }else{
	  	if($resultado and $resultado1<1){	  		
	  	header("location:../vista/registrorestaurante.php?res=error");
	  	}
	  }

}

mysqli_close($conn);
?>