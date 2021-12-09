<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estilo2.css">
    <title>Document</title>
</head>
<body>
<?php 
require('../dao/daoUsuariosImpl.php');
$dao=new DaoUsuariosImpl();
if (isset($_GET['update'])) {
    $IdUsuarios=$_GET['IdUsuarios'];
    $NombreUsuarios=$_GET['nombres'];    
    $ApellidoUsuarios=$_GET['apellidos'];
    $EmailUsuarios=$_GET['email'];
    $ContrasenaUsuarios=md5($_GET['contrasena']);
    $IdRoles=$_GET['idRol'];
    $IdTipos=$_GET['idTipo'];
    $Eps=$_GET['eps'];
    $a=new Usuarios($IdUsuarios,$NombreUsuarios,$ApellidoUsuarios,$EmailUsuarios,$ContrasenaUsuarios,$IdRoles,$IdTipos,$Eps);
    $dao->modificar($a);
    echo '<span class="mensaje">¡¡SE ACTUALIZÓ CORRECTAMENTE!!</span>';
    header ("Location: ../vista/listarusuarios.php");
}
?> 
</body>
</html>