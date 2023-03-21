-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2023 a las 15:41:47
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadeinventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `fecha`) VALUES
(13, 'Desarrollo Web', '2023-02-16 15:18:13'),
(14, 'desarrollo de aplicaciones para escritorio', '2023-02-16 16:52:28'),
(16, 'Ecommerc', '2023-02-21 16:50:52'),
(17, 'Muebles y Enceres', '2023-02-21 14:02:24'),
(18, 'Category Test', '2023-02-21 14:11:11'),
(19, 'Apple', '2023-02-21 14:13:50'),
(20, 'Test Categoria', '2023-02-21 16:45:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradap`
--

CREATE TABLE `entradap` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `nombrecategoria` int(11) NOT NULL,
  `entrada` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entradap`
--

INSERT INTO `entradap` (`id`, `codigo`, `descripcion`, `nombrecategoria`, `entrada`, `fecha`) VALUES
(20, 234, 'iPad última generación ', 19, 2, '2023-02-21 15:02:13'),
(21, 3817, 'Reloj', 17, 2, '2023-02-21 16:41:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `codigo` text NOT NULL,
  `descripcion` text NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `idcategoria`, `codigo`, `descripcion`, `stock`, `precio`, `fecha`) VALUES
(1, 13, '202', 'Alicate1', 4, 2000, '2023-02-21 14:27:46'),
(4, 14, '104', 'Llave suiza', 62, 50, '2023-02-17 20:56:43'),
(7, 13, '108', 'Martillos marca ', 39, 5000, '2023-02-21 14:38:16'),
(8, 16, '3312ss11111111', 'Prueba', 129, 2010, '2023-02-21 14:08:40'),
(9, 17, '012425', 'Escritorio Hr antihumedad', 28, 1245000, '2023-02-21 14:06:00'),
(10, 16, '204', 'Mesa marca primark', 50, 300, '2023-02-21 14:07:06'),
(11, 17, '001', 'Juego de comedor Árabe', 4, 700000, '2023-02-21 14:27:45'),
(12, 18, '12fr', 'Asesoría ambiental ', 6, 3000000, '2023-02-21 14:37:05'),
(13, 19, '234', 'iPad última generación ', 8, 1500000, '2023-02-21 15:02:13'),
(14, 17, '3817', 'Reloj', 4, 200000, '2023-02-21 16:41:20'),
(15, 20, '205', 'Cama marca paprimo', 50, 500, '2023-02-21 23:43:46'),
(16, 19, '206', 'Telefono celular apple', 50, 1000, '2023-02-22 00:07:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidap`
--

CREATE TABLE `salidap` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `nombrecategoria` int(11) NOT NULL,
  `salida` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salidap`
--

INSERT INTO `salidap` (`id`, `codigo`, `descripcion`, `nombrecategoria`, `salida`, `fecha`) VALUES
(1, 104, 'Llave suiza', 14, 2, '2023-02-17 20:53:30'),
(2, 202, 'Alicate1', 13, 5, '2023-02-17 20:55:22'),
(3, 104, 'Llave suiza', 14, 5, '2023-02-17 20:55:43'),
(4, 202, 'Alicate1', 13, 2, '2023-02-17 20:56:23'),
(5, 104, 'Llave suiza', 14, 3, '2023-02-17 20:56:43'),
(6, 105, 'Tornillo', 13, 10, '2023-02-21 12:46:44'),
(7, 108, 'Martillos marca primark', 13, 1, '2023-02-21 12:51:40'),
(8, 108, 'Martillos marca primark', 13, 10, '2023-02-21 12:54:50'),
(9, 12425, 'Escritorio Hr antihumedad', 17, 1, '2023-02-21 14:06:00'),
(10, 3312, 'Prueba', 16, 2, '2023-02-21 14:08:40'),
(11, 1, 'Juego de comedor Árabe', 17, 1, '2023-02-21 14:27:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` varchar(300) NOT NULL,
  `perfil` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `fecha`) VALUES
(69, 'deiber perdomo2', 'deib88', 'lgsTC5NSnyhso', 'Guarda de seguridad', '2023-02-21 13:24:15'),
(71, 'LAURA ARENAS', 'lau', 'lgsTC5NSnyhso', 'Developer', '2023-02-16 12:17:17'),
(72, 'Daniel delgado', 'dami', 'lgsTC5NSnyhso', 'Developer', '2023-02-16 12:18:00'),
(75, 'LESLI DAHIANA', 'leslidev', 'lgHKStbTDsuEU', 'Admin', '2023-02-20 20:50:48'),
(76, 'sonia jaramillo1', 'sony1', 'lg48WGppKqQ/2', 'Developer1', '2023-02-21 12:44:57'),
(79, 'Wilberto ', 'Wilbert', 'lg2.ymWinhIVg', 'Gestor ambiental', '2023-02-21 14:35:43'),
(80, 'lorena lopez', 'lore1', 'lgsTC5NSnyhso', 'Programador', '2023-02-21 23:00:30'),
(81, 'prueba4', 'prueba4', 'lgtB.6b/GkAuw', 'prueba4', '2023-02-22 00:06:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`) USING HASH;

--
-- Indices de la tabla `entradap`
--
ALTER TABLE `entradap`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`) USING HASH;

--
-- Indices de la tabla `salidap`
--
ALTER TABLE `salidap`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`) USING HASH;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `entradap`
--
ALTER TABLE `entradap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `salidap`
--
ALTER TABLE `salidap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
