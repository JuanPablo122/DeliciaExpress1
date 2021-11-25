<?php
include("../modelo/conexion.php");

session_start();

//asignar las variables del formulario
$pass=md5($_REQUEST['pass']);
$login=$_REQUEST['login'];


//consulta
$sql="SELECT * from usuarios where EmailUsuarios='$login' and ContrasenaUsuarios='$pass'";
$sql1="SELECT * from restaurantes where Email='$login' and Contrasena='$pass'";
$consulta=mysqli_query($conn,$sql);
$consulta1=mysqli_query($conn,$sql1);
$lista=mysqli_fetch_array($consulta);
$lista1=mysqli_fetch_array($consulta1);

if ($lista['IdRoles']=="1") {
	$_SESSION['user']=$lista['NombreUsuarios'];
	header("location:../vista/iniciocliente.php");
}elseif ($lista['IdRoles']=="3") {
	$_SESSION['user']=$lista['NombreUsuarios'];
	header("location:../vista/iniciococinero.php");
}elseif ($lista['IdRoles']=="4") {
	$_SESSION['user']=$lista['NombreUsuarios'];
	header("location:../vista/iniciodomiciliario.php");
}elseif ($lista['IdRoles']=="2") {
	$_SESSION['user']=$lista['NombreUsuarios'];
	header("location:../vista/inicioadmin.php");
}elseif ($lista1['IdRoles']=="5") {
	$_SESSION['user']=$lista1['NomRes'];
	header("location:../vista/iniciorestaurante.php");
}
else{
	echo "<p>Usuario y/o contraseña incorrectos</p>";
	include '../vista/iniciosesion.php';
}
mysqli_free_result($consulta);
mysqli_free_result($consulta1);
mysqli_close($conn);


?>