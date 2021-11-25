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

require('../dao/daoUsuariosImpl.php');
$dao=new DaoUsuariosImpl();
$Usuarios=$dao->listar();
$dao1=new DaoRestaurantesImpl();
$Restaurantes=$dao1->listar1();
?>    
</body>
</html>