<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vista/estilos.css">
    <title>Document</title>
</head>
<body>
<?php 
require('../vista/listarusuarios.php');
$dao=new DaoUsuariosImpl();
if (isset($_GET['IdUsuarios'])) {
    $id=$_GET['IdUsuarios'];
    $a=$id;
    $dao->eliminar($a);
    
}
?>   
</body>
</html>