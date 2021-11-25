<?php
include("conexion.php");
$resultado=2;
if(isset($_POST['register'])){
	$nombres=($_POST['nombres']);
	$apellidos=($_POST['apellidos']);
	$email=($_POST['email']);
	$contrasena=md5($_POST['contrasena']);
	$aseguradora=($_POST['aseguradorasoat']);
	$licencia=($_POST['licenciaconduccion']);	
	$eps=($_POST['eps']);	
	  $consulta="INSERT INTO usuarios(NombreUsuarios,ApellidoUsuarios,EmailUsuarios,ContrasenaUsuarios,IdRoles,IdTipos,Eps) VALUES('$nombres','$apellidos','$email','$contrasena','4','2','$eps')";
	  $consulta1="INSERT INTO domiciliarios(AseguradoraSoat,LicenciaConduccion) VALUES('$aseguradora','$licencia')"; 
	  $resultado=mysqli_query($conn,$consulta);
	  $resultado1=mysqli_query($conn,$consulta1);
}
session_start();
	  if($resultado1==1){
	  	$_SESSION['user']=$nombres;
	  	header("location:../vista/iniciodomiciliario.php?res=insertado");
	  }else{
	  	if($resultado1<1){	  		
	  	header("location:../vista/registroempleado.php?res=error");
	  	}
	  }

	
	 

mysqli_close($conn);
?>