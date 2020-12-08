-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2020 a las 13:39:00
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hammelindb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `carrito_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `libro_id` int(10) NOT NULL,
  `carrito_id` int(11) NOT NULL,
  `compras_cantidad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `curso_id` int(11) NOT NULL,
  `curso_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `ID` int(11) NOT NULL,
  `ID_VENTA` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `PRECIO_UNITARIO` decimal(20,2) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `DESCARGADO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`ID`, `ID_VENTA`, `ID_PRODUCTO`, `PRECIO_UNITARIO`, `CANTIDAD`, `DESCARGADO`) VALUES
(1, 25, 6, '300.00', 1, 0),
(2, 25, 1, '240.00', 1, 0),
(3, 26, 6, '300.00', 1, 0),
(4, 26, 1, '240.00', 1, 0),
(5, 27, 6, '300.00', 1, 0),
(6, 27, 1, '240.00', 1, 0),
(7, 28, 6, '300.00', 1, 0),
(8, 28, 1, '240.00', 1, 0),
(9, 29, 6, '300.00', 1, 0),
(10, 29, 1, '240.00', 1, 0),
(11, 30, 6, '300.00', 1, 0),
(12, 30, 1, '240.00', 1, 0),
(13, 31, 6, '300.00', 1, 0),
(14, 31, 1, '240.00', 1, 0),
(15, 32, 6, '300.00', 1, 0),
(16, 32, 1, '240.00', 1, 0),
(17, 33, 6, '300.00', 1, 0),
(18, 33, 1, '240.00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `docente_id` int(11) NOT NULL,
  `docente_nombre` varchar(100) NOT NULL,
  `docente_escolaridad` varchar(100) NOT NULL,
  `docente_edad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes_cursos`
--

CREATE TABLE `docentes_cursos` (
  `docente_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `curso_nivel` varchar(20) DEFAULT NULL,
  `curso_precio` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `libro_id` int(10) NOT NULL,
  `libro_nombre` varchar(255) NOT NULL,
  `libro_editorial` varchar(50) DEFAULT NULL,
  `libro_precio` decimal(20,2) NOT NULL,
  `libro_existencias` int(3) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`libro_id`, `libro_nombre`, `libro_editorial`, `libro_precio`, `libro_existencias`, `imagen`) VALUES
(1, 'Aprende a leer en todas las claves', 'Toys and Dreams Music', '240.00', 20, 'https://www.elargonauta.com/static/img/portadas/62283.jpg'),
(2, 'Aprende a leer música', 'Robinbook, Ediciones', '180.00', 15, 'https://www.elargonauta.com/static/img/portadas/54917.jpg'),
(3, '1,2,3..¡Musica! Iniciacion Musical', 'CCS, Editorial', '300.00', 20, 'https://www.elargonauta.com/static/img/portadas/60220.jpg'),
(4, 'A Parent\'s Survival Guide to Music Lessons', 'Collins', '200.00', 12, 'https://www.elargonauta.com/static/img/portadas/81990.jpg'),
(5, 'Cómo leer música', 'Robinbook, Ediciones', '320.00', 20, 'https://www.elargonauta.com/static/img/portadas/64792.jpg'),
(6, 'Conocer las notas musicales con ejercicios rítmicos', 'Toys and Dreams Music', '300.00', 20, 'https://www.elargonauta.com/static/img/portadas/61756.jpg'),
(7, 'Cuaderno para vacaciones de lenguaje musical. Primer nivel', 'Toys and Dreams Music', '340.00', 10, 'https://www.elargonauta.com/static/img/portadas/24367.jpg'),
(8, 'Cuaderno para vacaciones de lenguaje musical. Cuarto nivel', 'Toys and Dreams Music', '340.00', 10, 'https://www.elargonauta.com/static/img/portadas/26584.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `usuario_id` int(11) NOT NULL,
  `telefono_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_login` varchar(100) NOT NULL,
  `usuario_pwd` varchar(15) NOT NULL,
  `usuario_correo` varchar(100) NOT NULL,
  `usuario_rol` char(1) NOT NULL COMMENT '1 -> Administrador\r\n2 -> Cliente',
  `usuario_direccion` varchar(100) DEFAULT NULL,
  `usuario_edad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_cursos`
--

CREATE TABLE `usuarios_cursos` (
  `Usuariosusuario_id` int(11) NOT NULL,
  `Cursoscurso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) NOT NULL,
  `PaypalDatos` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correo` varchar(5000) NOT NULL,
  `Total` decimal(60,2) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) VALUES
(1, '122345678910', '', '2020-12-24 14:59:13', 'meivi@correo.com', '170.00', 'pendiente'),
(2, '122345678910', '', '2020-12-24 14:59:13', 'meivi@correo.com', '170.00', 'pendiente'),
(3, 'cvc5ff8e09aqktsobrdmqk8bc3', '', '2020-12-05 15:10:56', 'ejemplo@micorreo.com', '420.00', 'pendiente'),
(4, 'cvc5ff8e09aqktsobrdmqk8bc3', '', '2020-12-05 15:16:18', 'meivimaybe@gmail.com', '180.00', 'pendiente'),
(5, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 19:04:46', 'gMlopez@gmail.com', '180.00', 'pendiente'),
(6, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 19:20:04', 'gMlopez@gmail.com', '180.00', 'pendiente'),
(7, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 19:24:37', 'gMlopez@gmail.com', '180.00', 'pendiente'),
(8, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 19:33:12', 'gMlopez@gmail.com', '180.00', 'pendiente'),
(9, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 19:38:53', 'gMlopez@gmail.com', '180.00', 'pendiente'),
(10, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 19:40:16', 'gMlopez@gmail.com', '180.00', 'pendiente'),
(11, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 19:41:40', 'gMlopez@gmail.com', '180.00', 'pendiente'),
(12, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 22:12:34', 'gMlopez@gmail.com', '180.00', 'pendiente'),
(13, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 23:01:09', 'gMlopez@gmail.com', '180.00', 'pendiente'),
(14, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 23:06:31', 'gMlopez@gmail.com', '180.00', 'pendiente'),
(15, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 23:10:33', 'Felicita_Betancour@yahoo.com', '180.00', 'pendiente'),
(16, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 23:12:10', 'suzukiyoorigen@gmail.com', '180.00', 'pendiente'),
(17, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 23:13:24', 'suzukiyoorigen@gmail.com', '180.00', 'pendiente'),
(18, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 23:14:10', 'suzukiyoorigen@gmail.com', '180.00', 'pendiente'),
(19, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 23:14:50', 'suzukiyoorigen@gmail.com', '180.00', 'pendiente'),
(20, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 23:16:28', 'suzukiyoorigen@gmail.com', '180.00', 'pendiente'),
(21, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-05 23:23:09', 'suzukiyoorigen@gmail.com', '180.00', 'pendiente'),
(22, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-06 00:15:02', 'gMlopez@gmail.com', '420.00', 'pendiente'),
(23, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-06 00:22:27', 'libniuziel10@gmail.com', '420.00', 'pendiente'),
(24, 'g355jocpn8tsmhnbgre1buflv1', '', '2020-12-06 00:32:45', 'libniuziel10@gmail.com', '420.00', 'pendiente'),
(25, '8sp88qncq4rl3vbjkpuu6i3e80', '', '2020-12-06 05:32:22', 'gabriel_ryushi21@hotmail.com', '540.00', 'pendiente'),
(26, '8sp88qncq4rl3vbjkpuu6i3e80', '', '2020-12-06 05:33:40', 'gabriel_ryushi21@hotmail.com', '540.00', 'pendiente'),
(27, '8sp88qncq4rl3vbjkpuu6i3e80', '', '2020-12-06 05:36:20', 'gabriel_ryushi21@hotmail.com', '540.00', 'pendiente'),
(28, '8sp88qncq4rl3vbjkpuu6i3e80', '', '2020-12-06 05:41:46', 'gabriel_ryushi21@hotmail.com', '540.00', 'pendiente'),
(29, '8sp88qncq4rl3vbjkpuu6i3e80', '', '2020-12-06 05:51:49', 'gabriel_ryushi21@hotmail.com', '540.00', 'pendiente'),
(30, '8sp88qncq4rl3vbjkpuu6i3e80', '', '2020-12-06 06:22:33', 'gabriel_ryushi21@hotmail.com', '540.00', 'pendiente'),
(31, '8sp88qncq4rl3vbjkpuu6i3e80', '', '2020-12-06 06:25:09', 'gabriel_ryushi21@hotmail.com', '540.00', 'pendiente'),
(32, '8sp88qncq4rl3vbjkpuu6i3e80', '', '2020-12-06 06:29:08', 'gabriel_ryushi21@hotmail.com', '540.00', 'pendiente'),
(33, '8sp88qncq4rl3vbjkpuu6i3e80', '', '2020-12-06 06:30:01', 'gabriel_ryushi21@hotmail.com', '540.00', 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`carrito_id`),
  ADD KEY `carrito_id` (`carrito_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `usuarios_carrito` (`usuario_id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`libro_id`,`carrito_id`),
  ADD KEY `compras_cantidad` (`compras_cantidad`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`curso_id`),
  ADD UNIQUE KEY `curso_nombre` (`curso_nombre`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_VENTA` (`ID_VENTA`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`docente_id`),
  ADD UNIQUE KEY `docente_nombre` (`docente_nombre`),
  ADD KEY `docente_escolaridad` (`docente_escolaridad`),
  ADD KEY `docente_edad` (`docente_edad`);

--
-- Indices de la tabla `docentes_cursos`
--
ALTER TABLE `docentes_cursos`
  ADD PRIMARY KEY (`docente_id`,`curso_id`),
  ADD KEY `curso_nivel` (`curso_nivel`),
  ADD KEY `docente_curso` (`docente_id`),
  ADD KEY `curso_docente` (`curso_id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`libro_id`),
  ADD KEY `libro_nombre` (`libro_nombre`),
  ADD KEY `libro_editorial` (`libro_editorial`),
  ADD KEY `libro_precio` (`libro_precio`),
  ADD KEY `libro_existencias` (`libro_existencias`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `usuario_login` (`usuario_login`),
  ADD UNIQUE KEY `usuario_correo` (`usuario_correo`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `usuario_direccion` (`usuario_direccion`),
  ADD KEY `usuario_edad` (`usuario_edad`);

--
-- Indices de la tabla `usuarios_cursos`
--
ALTER TABLE `usuarios_cursos`
  ADD PRIMARY KEY (`Usuariosusuario_id`,`Cursoscurso_id`),
  ADD KEY `usuario_curso` (`Usuariosusuario_id`),
  ADD KEY `curso_usuario` (`Cursoscurso_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carrito_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `docente_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `libro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `usuarios_carrito` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`);

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`ID_VENTA`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `libros` (`libro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `docentes_cursos`
--
ALTER TABLE `docentes_cursos`
  ADD CONSTRAINT `curso_docente` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`curso_id`),
  ADD CONSTRAINT `docente_curso` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`docente_id`);

--
-- Filtros para la tabla `usuarios_cursos`
--
ALTER TABLE `usuarios_cursos`
  ADD CONSTRAINT `curso_usuario` FOREIGN KEY (`Cursoscurso_id`) REFERENCES `cursos` (`curso_id`),
  ADD CONSTRAINT `usuario_curso` FOREIGN KEY (`Usuariosusuario_id`) REFERENCES `usuarios` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
