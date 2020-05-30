-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2020 a las 17:12:39
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mimascota`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales`
--

CREATE TABLE `animales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_animales_tipos` bigint(20) UNSIGNED NOT NULL,
  `id_usuarios` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `animales`
--

INSERT INTO `animales` (`id`, `id_animales_tipos`, `id_usuarios`, `nombre`) VALUES
(11, 2, 3, 'Yukia'),
(12, 1, 3, 'Calce'),
(14, 2, 5, 'Yuki');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales_tipos`
--

CREATE TABLE `animales_tipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `animales_tipos`
--

INSERT INTO `animales_tipos` (`id`, `nombre`) VALUES
(2, 'Gato'),
(20, 'Hur&oacute;n'),
(1, 'Perro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuarios` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `imagen1` varchar(128) NOT NULL DEFAULT 'No definido',
  `imagen2` varchar(128) NOT NULL DEFAULT 'No definido',
  `imagen3` varchar(128) NOT NULL DEFAULT 'No definido',
  `imagen4` varchar(128) NOT NULL DEFAULT 'No definido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `id_usuarios`, `nombre`, `descripcion`, `fecha_creacion`, `imagen1`, `imagen2`, `imagen3`, `imagen4`) VALUES
(2, 4, 'Cuidador en Legan&eacute;s, Madrid', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vitae fermentum sem, at porttitor velit. Nulla vel orci quis odio varius tincidunt. Suspendisse egestas, elit in accumsan cursus, dolor dolor sagittis neque, eget vehicula tellus nunc in felis. Quisque tristique interdum tellus. Maecenas placerat, enim at sagittis iaculis, ipsum nisi cursus magna, vel pulvinar enim ex eu lorem. Suspendisse potenti. Donec eget odio ullamcorper, volutpat leo ac, lobortis erat. Phasellus convallis ex ligula, eu luctus arcu sodales at. Nunc eget elit est. Aenean et faucibus velit. Integer auctor diam a facilisis sollicitudin. Morbi mollis est mauris.\r\n\r\nNullam risus elit, egestas vitae luctus sed, varius et augue. Sed et dolor ante. Aliquam eget porta leo, eu malesuada dui. Donec interdum eget justo eu viverra. Cras aliquet viverra turpis, quis tristique ligula volutpat sit amet. Proin elementum est ut elit finibus, at faucibus metus sodales. Nulla facilisi. Donec venenatis massa ac orci viverra, eget posuere elit rutrum.', '2020-05-28 00:02:08', '/img/b4a1f1368ad02919b217920084b0accdeac53912', '/img/303492c07d3787790f3a79effab2ec8e6674995c', '/img/ae4e3fbc6df4cb8b566af42937952c0bdb8ba74d', '/img/6192322ac7f37ef686cdd7d91d52f38f44cb71a5'),
(6, 8, 'Para&iacute;so Animal', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed finibus eros, a accumsan lorem. Integer elementum et velit non tristique. In a pretium turpis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris velit quam, pulvinar at fermentum vitae, lobortis in nibh. Vestibulum volutpat accumsan eros, bibendum tincidunt urna varius non. Praesent id felis quis urna ornare rutrum. In est nibh, pharetra in tincidunt id, sodales pretium arcu. Nam metus sapien, imperdiet sed risus ac, aliquet facilisis ex. Praesent varius ex in sapien condimentum fringilla. Praesent erat ante, efficitur ac maximus quis, interdum vitae turpis. Nulla accumsan ultrices tristique. Nunc et ex vitae elit dignissim tincidunt. Donec non libero vitae ex commodo suscipit.\r\n\r\nInteger viverra sapien a semper condimentum. Phasellus convallis maximus augue ut dictum. Nunc eget tristique nulla. Fusce bibendum ullamcorper ipsum, non elementum lorem eleifend vestibulum. Maecenas vitae orci at ligula tincidunt porttitor. Curabitur mollis finibus nisi. Duis non turpis faucibus, ornare erat posuere, consectetur ex. Aliquam eget venenatis ante. Sed consectetur eu nisl a euismod. Donec finibus ullamcorper interdum.', '2020-05-29 12:44:30', '/img/556507ee0701ebcb9931e425bb8334fc629ab5eb', '/img/8a995f7e8339330f74d1a942d5f8693ebd47e30a', '/img/7ba048dd50a85fecb900880a2f59bec33aaf22ad', '/img/c7230d10417ac88941bcd0edfb4f0f1bf2079c3d'),
(7, 7, 'Cuidador Zona Norte', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed finibus eros, a accumsan lorem. Integer elementum et velit non tristique. In a pretium turpis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris velit quam, pulvinar at fermentum vitae, lobortis in nibh. Vestibulum volutpat accumsan eros, bibendum tincidunt urna varius non. Praesent id felis quis urna ornare rutrum. In est nibh, pharetra in tincidunt id, sodales pretium arcu. Nam metus sapien, imperdiet sed risus ac, aliquet facilisis ex. Praesent varius ex in sapien condimentum fringilla. Praesent erat ante, efficitur ac maximus quis, interdum vitae turpis. Nulla accumsan ultrices tristique. Nunc et ex vitae elit dignissim tincidunt. Donec non libero vitae ex commodo suscipit.\r\n\r\nInteger viverra sapien a semper condimentum. Phasellus convallis maximus augue ut dictum. Nunc eget tristique nulla. Fusce bibendum ullamcorper ipsum, non elementum lorem eleifend vestibulum. Maecenas vitae orci at ligula tincidunt porttitor. Curabitur mollis finibus nisi. Duis non turpis faucibus, ornare erat posuere, consectetur ex. Aliquam eget venenatis ante. Sed consectetur eu nisl a euismod. Donec finibus ullamcorper interdum.', '2020-05-29 12:46:29', '/img/25d47fd3bd82f2f71662d9137cd517821c1426f5', '/img/94c317b82af6b10a6e507a7e7217113f032d525b', '/img/fe3de71cb2641b06b8d954d9db442edf0d5517b1', '/img/b46ceb2435c4a3748474a103b8fc9080b434c396');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_animales_tipos`
--

CREATE TABLE `anuncios_animales_tipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_anuncios` bigint(20) UNSIGNED NOT NULL,
  `id_animales_tipos` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios_animales_tipos`
--

INSERT INTO `anuncios_animales_tipos` (`id`, `id_anuncios`, `id_animales_tipos`) VALUES
(1, 2, 2),
(2, 2, 1),
(9, 6, 2),
(10, 6, 20),
(11, 7, 2),
(12, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_servicios`
--

CREATE TABLE `anuncios_servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_anuncios` bigint(20) UNSIGNED NOT NULL,
  `id_servicios` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios_servicios`
--

INSERT INTO `anuncios_servicios` (`id`, `id_anuncios`, `id_servicios`) VALUES
(1, 2, 22),
(2, 2, 23),
(3, 2, 24),
(11, 6, 28),
(12, 6, 29),
(13, 6, 30),
(14, 7, 25),
(15, 7, 26),
(16, 7, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuarios` bigint(20) UNSIGNED NOT NULL,
  `pais` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id`, `id_usuarios`, `pais`, `ciudad`, `codigo_postal`, `calle`) VALUES
(8, 4, 'lalalala', 'dfgtrescv', '2345767', 'asddffghj'),
(9, 7, 'De las Maravillas', 'Realidad Magica', '000000', 'Felicidad al cuadrado'),
(10, 8, 'Espa&ntilde;a', 'Tres Cantos', '28760', 'Sector Foresta, N&ordm;10, P7-C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

CREATE TABLE `opiniones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuarios` bigint(20) UNSIGNED NOT NULL,
  `id_anuncios` bigint(20) UNSIGNED NOT NULL,
  `mensaje` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`id`, `id_usuarios`, `id_anuncios`, `mensaje`) VALUES
(10, 9, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam rhoncus neque eget enim imperdiet, non sodales nunc dictum. Nunc vestibulum urna lacus, sit amet volutpat mauris imperdiet et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. In hac habitasse platea dictumst. Nulla sagittis diam odio, a malesuada arcu elementum a. Nam ultrices quam sed lorem fermentum tempus. '),
(11, 5, 7, 'blablablablabla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Cuidador'),
(5, 'Propietario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuarios` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `id_usuarios`, `nombre`, `descripcion`, `precio`) VALUES
(22, 4, 'Alojamiento Noche', 'Desde las 20: las 10:00', '15.50'),
(23, 4, 'Paseo', '1 hora', '7.00'),
(24, 4, 'Alojamiento D&iacute;a', 'desde las 7:00 las 18:00', '10.00'),
(25, 7, 'Alojamiento ', '18:00-10:00', '14.00'),
(26, 7, 'Paseo', '1 hora', '7.50'),
(27, 7, 'Alojamiento D&iacute;a', '7:00-19:00', '13.00'),
(28, 8, 'Alojamiento', '19:00-10:00', '13.50'),
(29, 8, 'Paseo', '1 hora', '6.50'),
(30, 8, 'Alojamiento D&iacute;a', '7:00- 9:00', '13.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_roles` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movil` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `contrasena` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/aade858e870ce010deaa7cfe9fe317e6c7eb7852'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_roles`, `email`, `movil`, `contrasena`, `nombre`, `apellidos`, `imagen`) VALUES
(3, 1, 'loquesea@masalla.com', '600000000', '7c222fb2927d828af22f592134e8932480637c0d', 'Administrador', 'De Locuras', '/img/9521f1e6179afe0353aa20f080eaadd81a4e0d8c'),
(4, 2, 'cuidador@mascota.com', '600000000', '7c222fb2927d828af22f592134e8932480637c0d', 'Cuidador', 'De Confusiones', '/img/04831d4bcff9d0f6afa01d16697749894b0ace47'),
(5, 5, 'propietario@mimascota.com', '6000000000', '7c222fb2927d828af22f592134e8932480637c0d', 'Propietario', 'Del Mundo Personal', '/img/aafc8e874c6ef04ebfc239bf9eb20ecbec7fd43d'),
(7, 2, 'cuidador@cuidador.com', '600000001', '7c222fb2927d828af22f592134e8932480637c0d', 'Cuidador2', 'De La Fuente', '/img/cf1c3161f0d227a6b39c0d123e2e2d89c7432716'),
(8, 2, 'cuidador3@cuidador.com', '600000002', '7c222fb2927d828af22f592134e8932480637c0d', 'Cuidador 3', 'Mas ', '/aade858e870ce010deaa7cfe9fe317e6c7eb7852'),
(9, 5, 'propietario@otro.com', '600000002', '7c222fb2927d828af22f592134e8932480637c0d', 'Otro ', 'Propietario', '/aade858e870ce010deaa7cfe9fe317e6c7eb7852');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animales`
--
ALTER TABLE `animales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_animales_tipos` (`id_animales_tipos`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `animales_tipos`
--
ALTER TABLE `animales_tipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_usuario` (`id_usuarios`) USING BTREE;

--
-- Indices de la tabla `anuncios_animales_tipos`
--
ALTER TABLE `anuncios_animales_tipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_animales_tipos` (`id_animales_tipos`),
  ADD KEY `id_anuncios` (`id_anuncios`);

--
-- Indices de la tabla `anuncios_servicios`
--
ALTER TABLE `anuncios_servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anuncios` (`id_anuncios`),
  ADD KEY `id_servicios` (`id_servicios`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_usuarios` (`id_usuarios`) USING BTREE;

--
-- Indices de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`),
  ADD KEY `id_anuncios` (`id_anuncios`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_roles` (`id_roles`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animales`
--
ALTER TABLE `animales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `animales_tipos`
--
ALTER TABLE `animales_tipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `anuncios_animales_tipos`
--
ALTER TABLE `anuncios_animales_tipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `anuncios_servicios`
--
ALTER TABLE `anuncios_servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animales`
--
ALTER TABLE `animales`
  ADD CONSTRAINT `animales_ibfk_1` FOREIGN KEY (`id_animales_tipos`) REFERENCES `animales_tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animales_ibfk_2` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `anuncios_animales_tipos`
--
ALTER TABLE `anuncios_animales_tipos`
  ADD CONSTRAINT `anuncios_animales_tipos_ibfk_1` FOREIGN KEY (`id_animales_tipos`) REFERENCES `animales_tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anuncios_animales_tipos_ibfk_2` FOREIGN KEY (`id_anuncios`) REFERENCES `anuncios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `anuncios_servicios`
--
ALTER TABLE `anuncios_servicios`
  ADD CONSTRAINT `anuncios_servicios_ibfk_1` FOREIGN KEY (`id_anuncios`) REFERENCES `anuncios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anuncios_servicios_ibfk_2` FOREIGN KEY (`id_servicios`) REFERENCES `servicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD CONSTRAINT `opiniones_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opiniones_ibfk_2` FOREIGN KEY (`id_anuncios`) REFERENCES `anuncios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
