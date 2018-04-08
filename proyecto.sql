-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2017 a las 04:10:11
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempo_outbound`
--

CREATE TABLE `tiempo_outbound` (
  `id` int(11) NOT NULL COMMENT 'Identificador del registro',
  `id_usuario` int(11) NOT NULL COMMENT 'Usuario que realiza el registro',
  `duracion_llamada` varchar(3) NOT NULL COMMENT 'Duracion de la llamada',
  `fecha_llamada` date NOT NULL COMMENT 'Fecha de la llamada',
  `fecha_hora_llamada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha y hora del registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registro de llamadas Outbound';

--
-- Volcado de datos para la tabla `tiempo_outbound`
--

INSERT INTO `tiempo_outbound` (`id`, `id_usuario`, `duracion_llamada`, `fecha_llamada`, `fecha_hora_llamada`) VALUES
(1, 1, '30', '2017-11-14', '2017-11-15 03:09:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempo_tmo`
--

CREATE TABLE `tiempo_tmo` (
  `id` int(11) NOT NULL COMMENT 'Identificador de la tabla',
  `id_usuario` int(11) NOT NULL COMMENT 'Usuario que realiza el registro',
  `duracion_llamada` int(11) NOT NULL COMMENT 'Duracion de la llamada',
  `fecha_llamada` date NOT NULL COMMENT 'Fecha de la llamada',
  `fecha_hora_llamada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha y hora del registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registro de llamadas TMO';

--
-- Volcado de datos para la tabla `tiempo_tmo`
--

INSERT INTO `tiempo_tmo` (`id`, `id_usuario`, `duracion_llamada`, `fecha_llamada`, `fecha_hora_llamada`) VALUES
(1, 1, 30, '2017-11-14', '2017-11-15 02:52:01'),
(2, 1, 6, '2017-11-14', '2017-11-15 02:54:15'),
(3, 1, 8, '2017-11-14', '2017-11-15 02:54:27'),
(4, 1, 7, '2017-11-14', '2017-11-15 02:54:32'),
(5, 1, 6, '2017-11-14', '2017-11-15 02:54:36'),
(6, 1, 9, '2017-11-14', '2017-11-15 02:54:43'),
(7, 1, 10, '2017-11-14', '2017-11-15 02:54:47'),
(8, 1, 8, '2017-11-14', '2017-11-15 02:56:16'),
(9, 1, 18, '2017-11-14', '2017-11-15 02:58:12'),
(10, 1, 6, '2017-11-14', '2017-11-15 02:58:17'),
(11, 1, 9, '2017-11-14', '2017-11-15 02:58:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL COMMENT 'Identificador del usuario',
  `usuario` varchar(30) NOT NULL COMMENT 'Usuario de la aplicacion',
  `nombre_usuario` varchar(80) NOT NULL COMMENT 'Nombre completo del usuario',
  `password` varchar(30) NOT NULL COMMENT 'Contraseña del usuario',
  `fecha_creacion` date NOT NULL COMMENT 'Fecha de creacion del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacenamiento de los usuarios de la aplicacion';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre_usuario`, `password`, `fecha_creacion`) VALUES
(1, 'avkmarines', 'VIVIANA KATHERINE MARINES', 'viviana', '2017-11-14'),
(3, 'vanessa', 'YENNY VANESSA OSORIO', 'vanessa', '2017-11-14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tiempo_outbound`
--
ALTER TABLE `tiempo_outbound`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiempo_tmo`
--
ALTER TABLE `tiempo_tmo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuario_2` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tiempo_outbound`
--
ALTER TABLE `tiempo_outbound`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tiempo_tmo`
--
ALTER TABLE `tiempo_tmo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tabla', AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del usuario', AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
