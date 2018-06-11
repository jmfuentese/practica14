-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-06-2018 a las 06:46:03
-- Versión del servidor: 5.7.22-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `date_added`) VALUES
(1, 'graficas', 'tarjetas de video', '2018-05-08 00:00:00'),
(2, 'almacenamiento', 'unidades internas de almacenamiento', '2018-06-03 03:32:01'),
(3, 'ram', 'memorias ram', '2018-06-04 09:34:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nota` varchar(150) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `fecha` datetime NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `precio_producto` int(11) NOT NULL,
  `cantidad_stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo_producto`, `nombre`, `date_added`, `precio_producto`, `cantidad_stock`, `id_categoria`, `id_tienda`) VALUES
(1, 200, 'tarjeta grafica gtx950', '2018-06-01 00:00:00', 2400, 73, 1, 1),
(3, 202, 'disco duro 1tb WD blue', '2018-05-15 00:00:00', 980, 200, 2, 2),
(5, 203, 'SSD Kingston 120GB', '2018-06-06 08:09:29', 899, 42, 2, 3),
(6, 204, 'SSD ADATA 512GB', '2018-06-11 05:06:13', 1899, 100, 2, 4),
(7, 205, 'RAM Kingston Savage 16gb', '2018-06-11 05:09:43', 3300, 150, 3, 4),
(8, 206, 'HDD 1TB WD Blue', '2018-06-11 05:10:27', 940, 400, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activa` int(11) NOT NULL,
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id`, `nombre`, `activa`, `date_added`) VALUES
(1, 'mi tiendita', 1, '2018-06-09 00:00:00'),
(2, 'mini soriana', 0, '2018-06-09 00:00:00'),
(3, 'eich i bi', 0, '2018-06-10 12:34:48'),
(4, 'gual-mar', 0, '2018-06-11 12:39:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `date_added` datetime NOT NULL,
  `privilegio` int(11) NOT NULL,
  `id_tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `usuario`, `password`, `user_email`, `date_added`, `privilegio`, `id_tienda`) VALUES
(1, 'mario', 'rodriguez', 'mario', 'de2f15d014d40b93578d255e6221fd60', 'mario@correo.com', '2018-06-02 00:00:00', 1, 0),
(2, '', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '2018-06-02 00:00:00', 1, 0),
(3, 'marco', 'fuentes', 'marco', 'f5888d0bb58d611107e11f7cbc41c97a', 'marco@correo.com', '2018-06-02 00:00:00', 0, 2),
(4, 'jessica', 'sanchez', 'jess', '4337fb150cbc24bd1842fb3b8f828a6c', 'jessica@correo.com', '2018-06-02 00:00:00', 0, 2),
(8, 'alberto', 'banda', 'beto', 'aab722da21be7ad07a3b72eede4a9e9a', 'alberto@correo.com', '2018-06-02 00:00:00', 0, 3),
(9, 'juan', 'perez', 'juan', 'a94652aa97c7211ba8954dd15a3cf838', 'juan@correo.com', '2018-06-02 00:00:00', 0, 3),
(11, 'pedro', 'perales', 'pedro', 'c6cc8094c2dc07b700ffcc36d64e2138', 'pedro@correo.com', '2018-06-02 00:00:00', 0, 1),
(12, 'juan', 'camaney', 'juan', 'a94652aa97c7211ba8954dd15a3cf838', 'juanca@correo.com', '2018-06-02 00:00:00', 0, 3),
(13, 'abigail', 'sanchez', 'abii1234', 'a94652aa97c7211ba8954dd15a3cf838', 'abigail@correo.com', '2018-06-02 00:00:00', 0, 2),
(15, 'alejandra', 'meza', 'ale200', 'ale200b543874b4ecf486d7df0bda132b0c6bc', 'alejandra@correo.com', '2018-06-02 00:00:00', 0, 3),
(16, 'esequiel', 'dominguez', 'esequ', 'a08d00c2abb6d1e873ce77a7060af9d5', 'esequiel@correo.com', '2018-06-02 00:00:00', 0, 3),
(17, 'justin', 'bieber', 'justin', '61c81371ae4404d7100202d90bee987e', 'justin@correo.com', '2018-06-03 02:57:08', 0, 3),
(21, 'Paco ', 'Perales', 'paquito', '2dd989addc69304d52ebe71c6ef464e7', 'paquito@correo.com', '2018-06-08 05:20:42', 0, 2),
(22, 'emmanuel', 'galarza', 'emmanuel', '0d0de813c1105498e3435dd2fbf7fa26', 'emmanuel@correo.com', '2018-06-11 05:08:21', 0, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
