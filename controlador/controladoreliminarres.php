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
$dao=new DaoRestaurantesImpl();
if (isset($_GET['IdRestaurantes'])) {
    $id=$_GET['IdRestaurantes'];
    $a1=$id;
    $dao->eliminar1($a1);
    
}
?>   
</body>
</html>