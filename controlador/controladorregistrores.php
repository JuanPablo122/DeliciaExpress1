<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estilo19.css">
    <title>Document</title>
</head>
<body>
<?php 
require('../vista/registrorestaurante.php');
require('../dao/daoUsuariosImpl.php');
$dao=new DaoRestaurantesImpl();
if (isset($_GET['register'])) {
    $IdRestaurantes=$_GET['idres'];
    $NombresDue=$_GET['nombresDue'];    
    $Email=$_GET['correo'];
    $NumeroDue=$_GET['numerodue'];
    $Contrasena= md5($_GET['contrasena']);
    $TipoPersona=$_GET['tipopersona'];
    $NIT=$_GET['nit'];
    $NomRes=$_GET['nombreres'];
    $CelularRes=$_GET['celres'];
    $Barrio=$_GET['barrio'];
    $IdRoles=$_GET['idrol'];
    $a1=new Restaurantes($IdRestaurantes,$NombresDue,$Email,$NumeroDue,$Contrasena,$TipoPersona,$NIT,$NomRes,$CelularRes,$Barrio,$IdRoles);
    $dao->registrar1($a1);
    header ("Location: ../vista/listarusuarios.php");   
} 
        
?>    
</body>
</html>