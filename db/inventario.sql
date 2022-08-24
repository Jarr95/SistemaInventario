-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-11-2021 a las 18:18:13
-- Versión del servidor: 10.5.12-MariaDB
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



CREATE DATABASE inventario;
 USE inventario;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(25) NOT NULL COMMENT 'Descripcion del rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Empleado');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Limpieza'),
(2, 'Bebidas'),
(3, 'Mascotas'),
(4, 'Hogar'),
(5, 'Salud y Belleza'),
(6, 'Aperitivos'),
(7, 'Conservas y Enlatados'),
(8, 'Especias'),
(9, 'Carnes y Embutidos'),
(10, 'Congelados'),
(11, 'Panaderia y Pasteleria'),
(12, 'miscelanea'),
(13, 'bebidas ...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(5) NOT NULL,
  `nombre_estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(25) NOT NULL COMMENT 'Nombre de la marca',
  `pais_marca` varchar(25) DEFAULT NULL COMMENT 'Pais de la marca'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`, `pais_marca`) VALUES
(1, 'Colgate', 'Estados Unidos'),
(2, 'Postobon', 'Estados Unidos'),
(3, 'Nacional de Chocolates', 'Colombia'),
(4, 'Ramo', 'Colombia'),
(5, 'Coca Cola', 'Estados Unidos'),
(6, 'Kelloggs', 'Estados Unidos'),
(7, 'Nescafe', 'Suiza'),
(8, 'Nestle', 'Suiza'),
(9, 'Bavaria', 'Colombia'),
(10, 'Zenu', 'Colombia'),
(11, 'Colombina', 'Colombia'),
(12, 'Bimbo', 'Mexico'),
(13, 'Nutresa', 'Colombia'),
(14, 'Diana', 'Colombia'),
(15, 'Yupi', 'Colombia'),
(16, 'Purina', 'Estados Unidos'),
(17, 'P&G', 'Estados Unidos'),
(18, 'Todo rico', 'Colombia');

-- --------------------------------------------------------



--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL COMMENT 'Nombre de la persona',
  `apellido` varchar(25) DEFAULT NULL COMMENT 'Apellido de la persona',
  `telefono` bigint(45) DEFAULT NULL COMMENT 'Telefono de la persona',
  `id_rol` int(11) NOT NULL,
  `email` varchar(45) NOT NULL COMMENT 'Email del usuario',
  `password` varchar(45) NOT NULL COMMENT 'Contraseña del usuario',
  `documentoId` varchar(20) NOT NULL COMMENT 'Numero de documento de identidad de la persona',
  `id_estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre`, `apellido`, `telefono`, `id_rol`, `email`, `password`, `documentoId`, `id_estado`) VALUES
(1, 'Admin', '', 11, 1, 'admininventario@hotmail.com', '21232f297a57a5a743894a0e4a801fc3', '000000000', 1),
(6, 'Jorge', 'Rincon', 2147483647, 1, 'jarincon56@misena.edu.co', '202cb962ac59075b964b07152d234b70', '1023940465', 1),
(25, 'Santiago Nicolas', 'Daza Fajardo', 3107582056, 1, 'sndaza1@misena.edu.co', '99ac68bbfb05e9429fa239f3310eb16e', '1024602321', 1),
(26, 'Brayan', 'Cabrera Hurtado', 3115234423, 1, 'bacabrera98@misena.edu.co', '204b5003e97662ca4258ab593ec0360b', '1001348590	', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL COMMENT 'Nombre del producto',
  `descripcion` varchar(45) DEFAULT NULL COMMENT 'Descripcion del producto',
  `cantidad` int(11) DEFAULT NULL,
  `precio_entrada` float NOT NULL COMMENT 'Precio del producto',
  `precio_salida` float NOT NULL,
  `id_categoria` int(5) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_estado` int(5) DEFAULT 1,
  `fecha_registro` date DEFAULT NULL COMMENT 'Fecha de vencimiento del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `cantidad`, `precio_entrada`, `precio_salida`, `id_categoria`, `id_marca`, `id_estado`, `fecha_registro`) VALUES
(1, 'Manzana Postobon', 'Gaseosa  2lt', 15, 2000, 2500, 2, 2, 2, '2021-03-08'),
(2, 'Crema Dental', 'Crema dental colgate 90g', 35, 3500, 5000, 5, 1, 1, '2021-03-10'),
(3, 'Mr Brown', 'Brownie mr brown arequipe 55g', 25, 1500, 2000, 11, 12, 1, '2021-03-10'),
(4, 'Dog Show', 'Dog show adultos pollo 370g', 35, 3500, 5000, 3, 16, 1, '2021-03-10'),
(5, 'Saltinas', 'Galletas saltinas 2 tacos', 5, 1500, 3000, 6, 8, 1, '2021-03-10'),
(6, 'Ponque Ramo', 'ponque tradicional 230g', 0, 1500, 3000, 6, 4, 1, '2021-03-10'),
(7, 'Chocoramo', 'chocoramo 65g', 0, 1000, 1200, 6, 4, 1, '2021-03-10'),
(8, 'Maizitos', 'Maizitos naturales 50g', 0, 400, 1000, 6, 4, 1, '2021-03-10'),
(9, 'Coca cola', 'Coca cola en lata 355ml', 166777, 800, 2000, 2, 5, 1, '2021-03-10'),
(10, 'Ensalada Zenu', 'Ensalada con maiz 400g', 0, 1500, 4000, 7, 10, 1, '2021-03-10'),
(11, 'Frijoles zenu', 'Frijoles 220g', 0, 1200, 2800, 7, 10, 1, '2021-03-10'),
(12, 'Jabon ariel', 'Jabon el polvo 850g', 0, 5000, 10000, 1, 17, 1, '2021-03-10'),
(13, 'Arroz', 'arroz', 5, 1500, 2000, 6, 14, 1, '2021-03-10'),
(15, 'pasta', '', 5, 2000, 3000, 6, 13, 1, '2021-03-23'),
(20, 'Seda', '', 0, 2500, 3000, 1, 1, 1, '2021-09-03'),
(21, 'robert', '', 0, 2000, 200, 12, 18, 2, '2021-10-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL COMMENT 'Nombres del proveedor',
  `apellido` varchar(25) NOT NULL COMMENT 'Apellidos del proveedor',
  `telefono` bigint(45) DEFAULT NULL COMMENT 'Telefono del proveedor',
  `email` varchar(45) DEFAULT NULL COMMENT 'Email del proveedor',
  `documentoId` varchar(20) NOT NULL COMMENT 'documento de identificacion del proveedor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `apellido`, `telefono`, `email`, `documentoId`) VALUES
(7, 'maria', 'espitia castillo', 1000000, 'merylu.mat2020@gmail.com', '123456789'),
(8, 'roberto', 'olarte', 3103332290, 'santindfajardo@hotmail.com', '1024589'),
(9, 'maria', 'espitia castillo', 3115341566, 'merylu.mat2020@gmail.com', '10245879');




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_movimiento` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL COMMENT 'Llave foranea del Id del producto proveniente de la tabla Productos',
  `cantidad` int(11) NOT NULL COMMENT 'Cantidad del producto',
  `total` int(11) NOT NULL,
  `fecha` date NOT NULL COMMENT 'Fecha del movimiento',
  `id_persona` int(11) DEFAULT NULL COMMENT 'Llave foranea del Id de la persona proveniente de la tabla Personas',
  `movimiento` varchar(10) NOT NULL COMMENT 'Tipo de movimiento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id_movimiento`, `id_producto`, `cantidad`, `total`, `fecha`, `id_persona`, `movimiento`) VALUES
(9, 1, 20, 40000, '2021-03-08', NULL, 'entrada'),
(10, 1, 5, 12500, '2021-03-07', NULL, 'salida'),
(11, 2, 10, 35000, '2021-03-09', NULL, 'entrada'),
(12, 5, 5, 7500, '2021-03-09', NULL, 'entrada'),
(13, 2, 25, 87500, '2021-03-09', NULL, 'entrada'),
(14, 13, 20, 30000, '2021-03-07', NULL, 'entrada'),
(15, 13, 15, 30000, '2021-03-09', NULL, 'salida'),
(16, 15, 10, 20000, '2021-02-01', NULL, 'entrada'),
(17, 15, 5, 15000, '2021-03-23', NULL, 'salida'),
(18, 3, 50, 75000, '2021-05-28', NULL, 'entrada'),
(19, 3, 25, 50000, '2021-05-28', NULL, 'salida'),
(20, 9, 166777, 133421600, '2021-08-10', NULL, 'entrada'),
(21, 4, 50, 175000, '2021-08-16', NULL, 'entrada'),
(22, 4, 10, 50000, '2021-08-16', NULL, 'salida'),
(23, 4, 5, 25000, '2021-08-16', NULL, 'salida'),
(24, 7, 20, 12000, '2021-09-27', NULL, 'entrada'),
(25, 7, 15, 24000, '2021-09-27', NULL, 'salida'),
(26, 7, 5, 6000, '2021-09-27', NULL, 'salida'),
(27, 21, 5, 10000, '2021-10-23', NULL, 'entrada'),
(28, 21, 5, 1000, '2021-10-23', NULL, 'salida');

-- --------------------------------------------------------



--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `id_usuario` (`id_persona`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `fk_id_estado` (`id_estado`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `id_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
