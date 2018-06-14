-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-06-2018 a las 02:22:30
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
(3, 'ram', 'memorias ram', '2018-06-04 09:34:48'),
(5, 'gabinetes', 'gabinetes para pc', '2018-06-13 05:35:24'),
(6, 'audio', 'perifÃ©ricos y dispositivos de audio', '2018-06-13 05:35:49'),
(7, 'ventilacion', 'enfriamiento interno para pc', '2018-06-13 05:36:22'),
(8, 'procesador', 'unidad de procesamiento interno', '2018-06-13 05:37:00'),
(9, 'tarjeta madre', 'tarjeta madre para pc desktop', '2018-06-13 05:37:43'),
(10, 'alimentacion', 'fuente de alimentacion', '2018-06-13 07:46:11');

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

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `id_producto`, `nota`, `usuario`, `fecha`, `cantidad`) VALUES
(1, 11, 'El usuario marco agrego 100', 'marco', '2018-06-11 00:00:00', 100),
(2, 11, 'El usuario marco ha agregado 2', 'marco', '2018-06-14 02:14:08', 2),
(3, 11, 'El usuario marco ha eliminado 3', 'marco', '2018-06-14 02:14:26', 3),
(4, 17, 'El usuario marco ha agregado 100', 'marco', '2018-06-14 02:14:35', 100);

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
(3, 202, 'disco duro 1tb WD blue', '2018-05-15 00:00:00', 980, 167, 2, 2),
(5, 203, 'SSD Kingston 120GB', '2018-06-06 08:09:29', 899, 42, 2, 3),
(6, 204, 'SSD ADATA 512GB', '2018-06-11 05:06:13', 1899, 100, 2, 4),
(7, 205, 'RAM Kingston Savage 16gb', '2018-06-11 05:09:43', 3300, 150, 3, 4),
(8, 206, 'HDD 1TB WD Blue', '2018-06-11 05:10:27', 940, 400, 2, 1),
(9, 100, 'HDD Seagate Barracuda 2TB', '2018-06-13 05:34:28', 1459, 94, 2, 2),
(10, 1, 'h110m-m2 Gigabyte s1155', '2018-06-13 05:57:04', 1100, 95, 9, 2),
(11, 2, 'h100i watercooling  corsair', '2018-06-13 05:58:53', 1299, 60, 7, 6),
(12, 10, 'intel core i7 8700k', '2018-06-13 07:39:53', 6700, 200, 8, 2),
(13, 11, 'amd ryzen 7 7200', '2018-06-13 07:41:28', 6500, 180, 8, 2),
(14, 12, 'logitech z506 2.1 THX', '2018-06-13 07:43:15', 2200, 88, 6, 2),
(15, 13, 'cooler master MASTERBOX LITE', '2018-06-13 07:44:20', 950, 70, 5, 2),
(16, 14, 'corsair c450x', '2018-06-13 07:48:43', 740, 40, 10, 2),
(17, 1, 'intel core i5 7400', '2018-06-13 07:53:17', 3400, 198, 8, 6),
(18, 3, 'gtx 1080Ti 12Gb Asus', '2018-06-13 07:56:13', 16790, 79, 1, 6);

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
(2, 'mini soriana', 0, '2018-06-09 00:00:00'),
(3, 'eich i bi', 0, '2018-06-10 12:34:48'),
(4, 'gual-mar', 0, '2018-06-11 12:39:05'),
(6, 'DDTech', 0, '2018-06-12 06:45:16'),
(7, 'Digitalife', 0, '2018-06-12 06:45:25'),
(8, 'CyberPuerta', 0, '2018-06-12 06:45:41');

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
(2, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@correo.com', '2018-06-02 00:00:00', 1, 2),
(3, 'marco', 'fuentes', 'marco', 'f5888d0bb58d611107e11f7cbc41c97a', 'marco@correo.com', '2018-06-02 00:00:00', 1, 6),
(4, 'jessica', 'sanchez', 'jess', '4337fb150cbc24bd1842fb3b8f828a6c', 'jessica@correo.com', '2018-06-02 00:00:00', 0, 6),
(8, 'alberto', 'banda', 'beto', 'aab722da21be7ad07a3b72eede4a9e9a', 'alberto@correo.com', '2018-06-02 00:00:00', 1, 7),
(9, 'juan', 'perez', 'juan', 'a94652aa97c7211ba8954dd15a3cf838', 'juan@correo.com', '2018-06-02 00:00:00', 0, 3),
(11, 'pedro', 'perales', 'pedro', 'c6cc8094c2dc07b700ffcc36d64e2138', 'pedro@correo.com', '2018-06-02 00:00:00', 0, 7),
(12, 'juan', 'camaney', 'juan', 'a94652aa97c7211ba8954dd15a3cf838', 'juanca@correo.com', '2018-06-02 00:00:00', 0, 3),
(13, 'abigail', 'sanchez', 'abii1234', 'a94652aa97c7211ba8954dd15a3cf838', 'abigail@correo.com', '2018-06-02 00:00:00', 0, 8),
(15, 'alejandra', 'meza', 'ale200', 'ale200b543874b4ecf486d7df0bda132b0c6bc', 'alejandra@correo.com', '2018-06-02 00:00:00', 0, 6),
(16, 'esequiel', 'dominguez', 'esequ', 'a08d00c2abb6d1e873ce77a7060af9d5', 'esequiel@correo.com', '2018-06-02 00:00:00', 0, 3),
(17, 'justin', 'bieber', 'justin', '61c81371ae4404d7100202d90bee987e', 'justin@correo.com', '2018-06-03 02:57:08', 0, 3),
(21, 'Paco ', 'Perales', 'paquito', '2dd989addc69304d52ebe71c6ef464e7', 'paquito@correo.com', '2018-06-08 05:20:42', 0, 2),
(22, 'emmanuel', 'galarza', 'emmanuel', '0d0de813c1105498e3435dd2fbf7fa26', 'emmanuel@correo.com', '2018-06-11 05:08:21', 0, 4),
(23, 'jose', 'jose', 'jose', '662eaa47199461d01a623884080934ab', 'jose@gmail.com', '2018-06-13 05:57:39', 0, 6),
(24, 'lucio', 'bucio', 'lucio', '63827ae693c3e6667245263c192e7d0b', 'lucio@correo.com', '2018-06-13 07:52:18', 0, 6),
(25, 'josue', 'reyes', 'josue', 'c4f0f080c3f5992b3a4c03d04ace51a2', 'josue@correo.com', '2018-06-13 07:47:17', 0, 7),
(26, 'toÃ±o', 'toÃ±o', 'toÃ±o', 'cb68dcaeff91742ffb2bb5578c773d64', 'tono@correo.com', '2018-06-13 08:02:36', 0, 4),
(27, 'petra', 'la cayosa', 'petra', '6ad61cf51456e20a2b6d8db294314de8', 'petra@correo.com', '2018-06-14 01:01:46', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `productos_vendidos` varchar(300) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  `id_tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `productos_vendidos`, `cantidad`, `total`, `id_tienda`) VALUES
(1, '2018-06-06 00:00:00', 'SSD Kingston 120GB', 2, 1798, 3),
(2, '2018-06-07 00:00:00', 'SSD Kingston 120GB', 1, 899, 3),
(3, '2018-06-10 00:00:00', 'RAM Kingston Savage 16gb', 2, 6600, 4),
(4, '2018-06-13 05:32:22', 'tarjeta grafica gtx950', 4, 9600, 2),
(5, '2018-06-13 05:32:39', 'RAM Kingston Savage 16gb', 1, 3300, 2),
(6, '2018-06-13 05:32:50', 'HDD 1TB WD Blue', 3, 2820, 2),
(7, '2018-06-13 05:40:40', 'HDD Seagate Barracuda 2TB', 2, 2918, 2),
(10, '2018-06-13 06:00:54', 'h110m-m2 Gigabyte s1155', 2, 2200, 2),
(11, '2018-06-13 06:10:02', 'HDD Seagate Barracuda 2TB', 1, 1459, 2),
(12, '2018-06-13 06:10:58', 'HDD Seagate Barracuda 2TB', 99, 144441, 2),
(13, '2018-06-13 06:12:44', 'disco duro 1tb WD blue', 1, 980, 2),
(14, '2018-06-13 06:18:32', 'disco duro 1tb WD blue', 3, 2940, 2),
(15, '2018-06-13 06:21:12', 'h110m-m2 Gigabyte s1155', 2, 2200, 2),
(16, '2018-06-13 06:21:37', 'h110m-m2 Gigabyte s1155', 1, 1100, 2),
(17, '2018-06-13 06:24:39', 'disco duro 1tb WD blue', 1, 980, 2),
(18, '2018-06-13 06:30:51', 'disco duro 1tb WD blue', 1, 980, 2),
(19, '2018-06-13 06:48:00', 'disco duro 1tb WD blue', 1, 980, 2),
(20, '2018-06-13 06:53:44', 'disco duro 1tb WD blue', 1, 980, 2),
(21, '2018-06-13 07:17:19', 'disco duro 1tb WD blue', 1, 980, 2),
(22, '2018-06-13 07:17:57', 'disco duro 1tb WD blue', 1, 980, 2),
(23, '2018-06-13 07:18:00', 'disco duro 1tb WD blue', 1, 980, 2),
(24, '2018-06-13 07:18:44', 'disco duro 1tb WD blue', 1, 980, 2),
(25, '2018-06-13 07:18:54', 'disco duro 1tb WD blue', 22, 21560, 2),
(26, '2018-06-13 07:19:53', 'h110m-m2 Gigabyte s1155', 2, 2200, 2),
(27, '2018-06-13 07:22:01', 'HDD Seagate Barracuda 2TB', 3, 4377, 2),
(28, '2018-06-13 07:22:17', 'HDD Seagate Barracuda 2TB', 3, 4377, 2),
(29, '2018-06-13 07:53:35', 'intel core i5 7400', 1, 3400, 6),
(30, '2018-06-13 07:55:06', 'intel core i5 7400', 1, 3400, 6),
(31, '2018-06-13 07:56:23', 'gtx 1080Ti 12Gb Asus', 1, 16790, 6),
(32, '2018-06-13 07:30:30', 'gtx 1080Ti 12Gb Asus', 1, 16790, 6);

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
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
