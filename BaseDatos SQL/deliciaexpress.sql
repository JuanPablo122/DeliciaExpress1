-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2021 a las 22:58:19
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `deliciaexpress`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarUsuarioPorLetra` (IN `buscar` VARCHAR(100))  SQL SECURITY INVOKER
SELECT * FROM usuarios WHERE NombreUsuario LIKE CONCAT(buscar,'%')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cantidad_producto_pedido` (IN `nombres` VARCHAR(100), OUT `cantidad` VARCHAR(100))  BEGIN 
  SELECT productos.Nombre,pedidos.cantidad 
  FROM pedidos 
  INNER JOIN productos 
  ON pedidos.IdProductos=productos.IdProductos
  WHERE nombre=nombres;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultardomiAsegurad` (IN `aseguradora` VARCHAR(100))  SQL SECURITY INVOKER
SELECT * FROM domiciliarios where AseguradoraSoat=(aseguradora)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEPSemple` (IN `eps` VARCHAR(100))  SQL SECURITY INVOKER
SELECT * FROM empleados WHERE NombreEps=(eps)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPedidos` ()  BEGIN
 SELECT * FROM pedidos;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contar_rol_usuarios` (IN `roll` VARCHAR(100), OUT `cantidad` INT)  BEGIN
 SELECT COUNT(rol) FROM usuarios WHERE rol=roll;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `IngresarCocineros` (IN `idemple` INT(11), IN `idco` INT(11), IN `nombre` VARCHAR(100), IN `apellido` VARCHAR(100), IN `email` VARCHAR(100), IN `contras` VARCHAR(100), IN `nombreeps` VARCHAR(100))  INSERT INTO cocineros (IdEmpleados,IdCocineros,NombreUsuario,Apellido,Email,Contrasena,NombreEps )VALUES(idemple,idco,nombre,apellido,email,contras,nombreeps)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `IngresarEmpleados` (IN `idusuario` INT(11), IN `idemple` INT(11), IN `nombre` VARCHAR(100), IN `apellido` VARCHAR(100), IN `email` VARCHAR(100), IN `contras` VARCHAR(100), IN `nombreeps` VARCHAR(100), IN `cargo` VARCHAR(100))  NO SQL
INSERT INTO empleados (IdUsuarios,IdEmpleados,NombreUsuario,Apellido,Email,Contrasena,NombreEps,cargo) VALUES (idusuario,idemple,nombre,apellido,email,contras,nombreeps,cargo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `IngresarUsuarios` (IN `id` INT, IN `nombre` VARCHAR(50), IN `apellido` VARCHAR(100), IN `email` VARCHAR(50), IN `contraseña` VARCHAR(100), IN `rol` VARCHAR(100))  INSERT INTO usuarios (IdUsuarios,NombreUsuario,Apellido,Email ,Contrasena,rol) VALUES(id,nombre,apellido,email,contraseña,rol)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarClientes` ()  BEGIN
 SELECT * FROM clientes;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarRolAdmin` (IN `buscar` VARCHAR(100))  SQL SECURITY INVOKER
SELECT * FROM usuarios WHERE rol=(buscar)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Mostrar_datoscompra_carritocompras` (IN `name` VARCHAR(100), OUT `Idcarrito` INT, OUT `nompro` VARCHAR(100))  BEGIN 
 SELECT carritoscompras.IdcarritoCompra, productos.Nombre,clientes.NombreUsuario 
 FROM ((carritoscompras 
 INNER JOIN productos ON carritoscompras.IdProductos = productos.IdProductos) 
 INNER JOIN clientes ON carritoscompras.IdClientes = clientes.IdClientes) WHERE NombreUsuario=name;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Mostrar_datosDomic_pedidos` (IN `name` VARCHAR(100), OUT `idemple` INT, OUT `iddom` INT, OUT `cantidadped` INT)  BEGIN 
 SELECT domiciliarios.IdDomiciliarios,empleados.IdEmpleados, pedidos.Cantidad,usuarios.NombreUsuario 
 FROM ((domiciliarios 
 INNER JOIN empleados ON domiciliarios.IdEmpleados = empleados.IdEmpleados) 
 INNER JOIN pedidos ON domiciliarios.IdPedidos = pedidos.IdPedidos) 
 INNER JOIN usuarios ON usuarios.IdUsuarios=empleados.IdUsuarios WHERE NombreUsuario=name;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_datos_mediopago` (IN `nombre` VARCHAR(100), OUT `Descripcion` VARCHAR(100))  BEGIN 
 SELECT * FROM mediospago WHERE NombreTarjeta=nombre;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_datos_pedidoCliente` (IN `nombrepro` VARCHAR(100), OUT `idped` INT, OUT `nombreusuario` VARCHAR(100))  BEGIN 
 SELECT pedidos.IdPedidos, clientes.NombreUsuario,productos.Nombre 
 FROM ((pedidos 
 INNER JOIN clientes 
 ON pedidos.IdPedidos = clientes.IdClientes) 
 INNER JOIN productos ON pedidos.IdProductos = productos.IdProductos) WHERE Nombre=nombrepro;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_nombre_apellido_concatenado` (IN `dato` VARCHAR(100), INOUT `estado` VARCHAR(100))  BEGIN 
DECLARE buscado varchar(100);
 SELECT CONCAT(NombreUsuario,' ',Apellido) FROM Usuarios WHERE Apellido=dato;
   SET buscado=FOUND_ROWS();
   IF buscado=0 THEN
   SELECT 0 INTO estado;
 END IF;
 IF buscado=1 THEN 
   SELECT 1 INTO estado;
 END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_nom_email_eps_cocineros` (IN `ape` VARCHAR(100), OUT `nombre` VARCHAR(100), OUT `correo` VARCHAR(100), OUT `eps` VARCHAR(100))  BEGIN 
 SELECT NombreUsuario,Email,NombreEps FROM cocineros WHERE Apellido=ape;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PedidosMayores` (IN `buscar` INT)  SQL SECURITY INVOKER
SELECT * FROM pedidos WHERE cantidad>(buscar)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `suma_usuarios` (OUT `Users` INT)  BEGIN
 SELECT COUNT(*) FROM usuarios;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `suma_ventas` (OUT `v` INT)  BEGIN 
 SELECT COUNT(*) FROM facturas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuario` ()  BEGIN 
INSERT INTO usuarios (IdUsuarios,NombreUsuario,Apellido,Email ,Contrasena,rol) VALUES(id,nombre,apellido,email,contraseña,rol);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_apellido_rol_user` (IN `dato` VARCHAR(100), INOUT `estado` VARCHAR(100))  BEGIN 
DECLARE buscado varchar(100);
 SELECT * FROM usuarios WHERE Apellido=dato AND rol='Domiciliario';
   SET buscado=FOUND_ROWS();
   IF buscado='' THEN
   SELECT '' INTO estado;
 END IF;
 IF buscado=' ' THEN 
   SELECT ' ' INTO estado;
 END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_apellido_usuarios` (IN `dato` VARCHAR(100), INOUT `estado` VARCHAR(100))  BEGIN 
DECLARE buscado varchar(100);
 SELECT * FROM usuarios WHERE Apellido=dato;
   SET buscado=FOUND_ROWS();
   IF buscado='' THEN
   SELECT '' INTO estado;
 END IF;
 IF buscado=' ' THEN 
   SELECT ' ' INTO estado;
 END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_email_user` (IN `dato` VARCHAR(100), INOUT `estado` VARCHAR(100))  BEGIN 
DECLARE buscado varchar(100);
 SELECT * FROM usuarios WHERE Email=dato;
   SET buscado=FOUND_ROWS();
   IF buscado='' THEN
   SELECT '' INTO estado;
 END IF;
 IF buscado=' ' THEN 
   SELECT ' ' INTO estado;
 END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_fecha` (IN `id` INT(11), OUT `fecha` DATE)  BEGIN
 SELECT * FROM facturas WHERE IdFacturas=id;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_fecha_factura` (IN `dato` YEAR, INOUT `estado` YEAR)  BEGIN 
DECLARE buscado year;
 SELECT YEAR(Fecha) FROM facturas WHERE YEAR(Fecha)=dato;
   SET buscado=FOUND_ROWS();
   IF buscado=0 THEN
   SELECT 0 INTO estado;
 END IF;
 IF buscado=1 THEN 
   SELECT 1 INTO estado;
 END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_id_factura` (IN `dato` INT, INOUT `estado` INT)  BEGIN 
DECLARE buscado int;
 SELECT * FROM facturas WHERE IdFacturas=dato;
   SET buscado=FOUND_ROWS();
   IF buscado=0 THEN
   SELECT 0 INTO estado;
 END IF;
 IF buscado=1 THEN 
   SELECT 1 INTO estado;
 END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_id_usuario` (IN `dato` INT, INOUT `estado` INT)  BEGIN 
DECLARE buscado int;
 SELECT * FROM usuarios WHERE IdUsuarios=dato;
   SET buscado=FOUND_ROWS();
   IF buscado=0 THEN
   SELECT 0 INTO estado;
 END IF;
 IF buscado=1 THEN 
   SELECT 1 INTO estado;
 END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_licencia_domic` (IN `dato` VARCHAR(100), INOUT `estado` VARCHAR(100))  BEGIN 
DECLARE buscado varchar(100);
 SELECT * FROM domiciliarios WHERE LicenciaConduccion=dato;
   SET buscado=FOUND_ROWS();
   IF buscado=0 THEN
   SELECT 0 INTO estado;
 END IF;
 IF buscado=1 THEN 
   SELECT 1 INTO estado;
 END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_mes_factura` (IN `dato` VARCHAR(100), INOUT `estado` DATE)  BEGIN 
DECLARE buscado varchar(100);
 SELECT Fecha FROM facturas WHERE MONTHNAME(Fecha)=dato;
   SET buscado=FOUND_ROWS();
   IF buscado=0 THEN
   SELECT 0 INTO estado;
 END IF;
 IF buscado=1 THEN 
   SELECT 1 INTO estado;
 END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_precio_producto` (IN `dato` DECIMAL, INOUT `estado` DECIMAL)  BEGIN 
DECLARE buscado decimal;
 SELECT * FROM productos WHERE Precio>=dato;
   SET buscado=FOUND_ROWS();
   IF buscado=0 THEN
   SELECT 0 INTO estado;
 END IF;
 IF buscado=1 THEN 
   SELECT 1 INTO estado;
 END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefacturas`
--

CREATE TABLE `detallefacturas` (
  `IdFacturas` int(11) DEFAULT NULL,
  `IdProductos` int(11) DEFAULT NULL,
  `CantidadProductos` int(11) DEFAULT NULL,
  `IdDomiciliarios` int(11) DEFAULT NULL,
  `DescripcionPedidos` varchar(200) DEFAULT NULL,
  `ValorTotal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedidos`
--

CREATE TABLE `detallepedidos` (
  `IdPedidos` int(11) NOT NULL,
  `IdProductos` int(11) NOT NULL,
  `IdDomiciliarios` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioUnitario` decimal(25,2) NOT NULL,
  `PrecioTotal` decimal(25,2) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Barrio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domiciliarios`
--

CREATE TABLE `domiciliarios` (
  `IdDomiciliarios` int(11) NOT NULL,
  `IdUsuarios` int(11) DEFAULT NULL,
  `AseguradoraSoat` varchar(100) NOT NULL,
  `LicenciaConduccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `domiciliarios`
--

INSERT INTO `domiciliarios` (`IdDomiciliarios`, `IdUsuarios`, `AseguradoraSoat`, `LicenciaConduccion`) VALUES
(1, NULL, 'Allianz', '12345678'),
(2, NULL, 'Allianz', '12345678'),
(3, NULL, 'Allianz', '12345678'),
(4, NULL, 'Allianz', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `IdDomiciliarios` int(11) NOT NULL,
  `IdFacturas` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `Idfacturas` int(11) NOT NULL,
  `IdUsuarios` int(11) NOT NULL,
  `IdPedidos` int(11) NOT NULL,
  `FechaPedidos` datetime NOT NULL DEFAULT current_timestamp(),
  `IdmedioPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediospago`
--

CREATE TABLE `mediospago` (
  `IdmedioPago` int(11) NOT NULL,
  `NombreMedios` varchar(100) NOT NULL,
  `DescripcionMedios` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `IdPedidos` int(11) NOT NULL,
  `IdProductos` int(11) NOT NULL,
  `Cantidad` tinyint(3) UNSIGNED NOT NULL,
  `IdUsuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProductos` int(11) NOT NULL,
  `NombreProductos` varchar(100) NOT NULL,
  `DescripcionProductos` mediumtext NOT NULL,
  `PrecioProductos` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_delete_usuario`
--

CREATE TABLE `reg_delete_usuario` (
  `ridUsuarios` int(11) NOT NULL,
  `rnombreUsuario` varchar(50) DEFAULT NULL,
  `rApellido` varchar(100) DEFAULT NULL,
  `rEmail` varchar(50) DEFAULT NULL,
  `rContraseña` varchar(100) DEFAULT NULL,
  `rRol` varchar(100) DEFAULT NULL,
  `feliminacion` datetime DEFAULT NULL,
  `UsuarioAutor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_insert_usuario`
--

CREATE TABLE `reg_insert_usuario` (
  `ridUsuarios` int(11) NOT NULL,
  `rnombreUsuario` varchar(50) DEFAULT NULL,
  `rApellido` varchar(100) DEFAULT NULL,
  `rEmail` varchar(50) DEFAULT NULL,
  `rContraseña` varchar(100) DEFAULT NULL,
  `rRol` varchar(100) DEFAULT NULL,
  `feliminacion` datetime DEFAULT NULL,
  `UsuarioAutor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_update_usuario`
--

CREATE TABLE `reg_update_usuario` (
  `antiguo_IdUsuarios` int(11) NOT NULL,
  `antiguo_NombreUsuario` varchar(50) DEFAULT NULL,
  `antiguo_Apellido` varchar(100) DEFAULT NULL,
  `antiguo_Email` varchar(50) DEFAULT NULL,
  `antiguo_Contraseña` varchar(100) DEFAULT NULL,
  `antiguo_Rol` varchar(100) DEFAULT NULL,
  `nuevo_IdUsuarios` int(11) DEFAULT NULL,
  `nuevo_NombreUsuario` varchar(50) DEFAULT NULL,
  `nuevo_Apellido` varchar(100) DEFAULT NULL,
  `nuevo_Email` varchar(50) DEFAULT NULL,
  `nuevo_Contraseña` varchar(100) DEFAULT NULL,
  `nuevo_Rol` varchar(100) DEFAULT NULL,
  `feliminacion` datetime DEFAULT NULL,
  `UsuarioAutor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `IdRestaurantes` int(11) NOT NULL,
  `NombresDue` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `NumeroDue` varchar(100) NOT NULL,
  `Contrasena` varchar(100) NOT NULL,
  `TipoPersona` varchar(100) NOT NULL,
  `NIT` varchar(100) NOT NULL,
  `NomRes` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `CelularRes` varchar(100) NOT NULL,
  `Barrio` varchar(100) NOT NULL,
  `IdRoles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`IdRestaurantes`, `NombresDue`, `Email`, `NumeroDue`, `Contrasena`, `TipoPersona`, `NIT`, `NomRes`, `CelularRes`, `Barrio`, `IdRoles`) VALUES
(8, 'pepe peres', 'peperes@gmail.com', '1524689', '1f32aa4c9a1d2ea010adcf2348166a04', 'natural', '54869', 'deli', '3256214', 'soacha', 5),
(11, 'juan', 'juan@gmail.com', '1524689', '827ccb0eea8a706c4c34a16891f84e7b', 'natural', '25663325', 'rapi', '3256214', 'bosa', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRoles` int(11) NOT NULL,
  `NombreRoles` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRoles`, `NombreRoles`) VALUES
(1, 'UsuarioBasico'),
(2, 'Administrador'),
(3, 'SuperUsuario'),
(4, 'DentroDelSistema'),
(5, 'Restaurante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `IdTipos` int(11) NOT NULL,
  `NombreTipos` varchar(100) NOT NULL,
  `DescrTipos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`IdTipos`, `NombreTipos`, `DescrTipos`) VALUES
(1, 'Propietario', 'El usuario propietario tiene permisos ilimitados y acceso a todas las capacidades dentro de delicia express excepto modificación de código fuente '),
(2, 'Domiciliario', 'El usuario domiciliario tiene permisos limitados para solo recibir información de pedidos '),
(3, 'Cliente', 'El usuario cliente tiene permisos limitados y acceso a solamente a realizar pedidos y compras dentro de delicia express   ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuarios` int(11) NOT NULL,
  `NombreUsuarios` varchar(50) NOT NULL,
  `ApellidoUsuarios` varchar(100) NOT NULL,
  `EmailUsuarios` varchar(50) NOT NULL,
  `ContrasenaUsuarios` varchar(100) NOT NULL,
  `IdRoles` int(11) NOT NULL,
  `IdTipos` int(11) NOT NULL,
  `Eps` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuarios`, `NombreUsuarios`, `ApellidoUsuarios`, `EmailUsuarios`, `ContrasenaUsuarios`, `IdRoles`, `IdTipos`, `Eps`) VALUES
(58, 'Daniela', 'Benitez', 'hedabehi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1, ''),
(68, 'Juan Pablo', 'Doncel Gutierrez', 'juan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, 2, 'Famisanar'),
(72, 'Admin', 'Admin', 'admin@deliciaexpress.com', '21232f297a57a5a743894a0e4a801fc3', 2, 1, ''),
(75, 'Jhon', 'Cortes', 'jcortes@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 3, ''),
(76, 'jhon', 'pedraza', 'jpedraza@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 3, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallefacturas`
--
ALTER TABLE `detallefacturas`
  ADD KEY `IdFacturas` (`IdFacturas`),
  ADD KEY `IdProductos` (`IdProductos`),
  ADD KEY `IdDomiciliarios` (`IdDomiciliarios`);

--
-- Indices de la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  ADD KEY `IdPedidos` (`IdPedidos`,`IdProductos`,`IdDomiciliarios`),
  ADD KEY `IdProductos` (`IdProductos`),
  ADD KEY `IdDomiciliarios` (`IdDomiciliarios`);

--
-- Indices de la tabla `domiciliarios`
--
ALTER TABLE `domiciliarios`
  ADD PRIMARY KEY (`IdDomiciliarios`),
  ADD KEY `IdUsuarios` (`IdUsuarios`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD KEY `IdDomiciliarios` (`IdDomiciliarios`,`IdFacturas`),
  ADD KEY `IdFacturas` (`IdFacturas`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`Idfacturas`),
  ADD KEY `IdClientes` (`IdUsuarios`),
  ADD KEY `IdPedidos` (`IdPedidos`),
  ADD KEY `IdmedioPago` (`IdmedioPago`),
  ADD KEY `Fecha` (`FechaPedidos`),
  ADD KEY `IdUsuarios` (`IdUsuarios`);

--
-- Indices de la tabla `mediospago`
--
ALTER TABLE `mediospago`
  ADD PRIMARY KEY (`IdmedioPago`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`IdPedidos`),
  ADD KEY `pedidos_ibfk_2` (`IdProductos`),
  ADD KEY `IdUsuarios` (`IdUsuarios`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProductos`);

--
-- Indices de la tabla `reg_delete_usuario`
--
ALTER TABLE `reg_delete_usuario`
  ADD PRIMARY KEY (`ridUsuarios`);

--
-- Indices de la tabla `reg_insert_usuario`
--
ALTER TABLE `reg_insert_usuario`
  ADD PRIMARY KEY (`ridUsuarios`);

--
-- Indices de la tabla `reg_update_usuario`
--
ALTER TABLE `reg_update_usuario`
  ADD PRIMARY KEY (`antiguo_IdUsuarios`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`IdRestaurantes`,`Email`),
  ADD KEY `IdRol` (`IdRoles`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRoles`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`IdTipos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuarios`,`EmailUsuarios`),
  ADD UNIQUE KEY `EmailUsuarios` (`EmailUsuarios`),
  ADD KEY `IdRoles` (`IdRoles`),
  ADD KEY `IdTipos` (`IdTipos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `domiciliarios`
--
ALTER TABLE `domiciliarios`
  MODIFY `IdDomiciliarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `Idfacturas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mediospago`
--
ALTER TABLE `mediospago`
  MODIFY `IdmedioPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `IdPedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reg_delete_usuario`
--
ALTER TABLE `reg_delete_usuario`
  MODIFY `ridUsuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reg_insert_usuario`
--
ALTER TABLE `reg_insert_usuario`
  MODIFY `ridUsuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `IdRestaurantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRoles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `IdTipos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallefacturas`
--
ALTER TABLE `detallefacturas`
  ADD CONSTRAINT `detallefacturas_ibfk_1` FOREIGN KEY (`IdFacturas`) REFERENCES `facturas` (`Idfacturas`),
  ADD CONSTRAINT `detallefacturas_ibfk_2` FOREIGN KEY (`IdProductos`) REFERENCES `productos` (`IdProductos`),
  ADD CONSTRAINT `detallefacturas_ibfk_4` FOREIGN KEY (`IdDomiciliarios`) REFERENCES `domiciliarios` (`IdDomiciliarios`);

--
-- Filtros para la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  ADD CONSTRAINT `detallepedidos_ibfk_1` FOREIGN KEY (`IdPedidos`) REFERENCES `pedidos` (`IdPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detallepedidos_ibfk_3` FOREIGN KEY (`IdProductos`) REFERENCES `productos` (`IdProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detallepedidos_ibfk_4` FOREIGN KEY (`IdDomiciliarios`) REFERENCES `domiciliarios` (`IdDomiciliarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `domiciliarios`
--
ALTER TABLE `domiciliarios`
  ADD CONSTRAINT `domiciliarios_ibfk_1` FOREIGN KEY (`IdUsuarios`) REFERENCES `usuarios` (`IdUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`IdDomiciliarios`) REFERENCES `domiciliarios` (`IdDomiciliarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `envios_ibfk_2` FOREIGN KEY (`IdFacturas`) REFERENCES `facturas` (`Idfacturas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`IdPedidos`) REFERENCES `pedidos` (`IdPedidos`),
  ADD CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`IdmedioPago`) REFERENCES `mediospago` (`IdmedioPago`),
  ADD CONSTRAINT `facturas_ibfk_4` FOREIGN KEY (`IdUsuarios`) REFERENCES `usuarios` (`IdUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`IdProductos`) REFERENCES `productos` (`IdProductos`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`IdUsuarios`) REFERENCES `usuarios` (`IdUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD CONSTRAINT `restaurantes_ibfk_1` FOREIGN KEY (`IdRoles`) REFERENCES `roles` (`IdRoles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IdRoles`) REFERENCES `roles` (`IdRoles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`IdTipos`) REFERENCES `tipo` (`IdTipos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
