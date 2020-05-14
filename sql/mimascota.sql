-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2020 at 04:25 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mimascota`
--

-- --------------------------------------------------------

--
-- Table structure for table `animales`
--

DROP TABLE IF EXISTS `animales`;
CREATE TABLE IF NOT EXISTS `animales` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_animales_tipos` bigint(20) UNSIGNED NOT NULL,
  `id_usuarios` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_animales_tipos` (`id_animales_tipos`),
  KEY `id_usuarios` (`id_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animales`
--

INSERT INTO `animales` (`id`, `id_animales_tipos`, `id_usuarios`, `nombre`) VALUES
(7, 2, 2, 'Kira'),
(8, 1, 2, 'Yuki');

-- --------------------------------------------------------

--
-- Table structure for table `animales_tipos`
--

DROP TABLE IF EXISTS `animales_tipos`;
CREATE TABLE IF NOT EXISTS `animales_tipos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animales_tipos`
--

INSERT INTO `animales_tipos` (`id`, `nombre`) VALUES
(2, 'Gato'),
(20, 'Hur&oacute;n'),
(10, 'Lagarto'),
(1, 'Perro'),
(5, 'Serpiente');

-- --------------------------------------------------------

--
-- Table structure for table `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `imagen1` varchar(128) NOT NULL DEFAULT 'No definido',
  `imagen2` varchar(128) NOT NULL DEFAULT 'No definido',
  `imagen3` varchar(128) NOT NULL DEFAULT 'No definido',
  `imagen4` varchar(128) NOT NULL DEFAULT 'No definido',
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
CREATE TABLE IF NOT EXISTS `direcciones` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuarios` bigint(20) UNSIGNED NOT NULL,
  `pais` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuarios` (`id_usuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opiniones`
--

DROP TABLE IF EXISTS `opiniones`;
CREATE TABLE IF NOT EXISTS `opiniones` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `propietario` bigint(20) UNSIGNED NOT NULL,
  `cuidador` bigint(20) UNSIGNED NOT NULL,
  `mensaje` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `propietario` (`propietario`),
  KEY `opiniones_ibfk_2` (`cuidador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Cuidador'),
(4, 'Otro Invento'),
(3, 'Propietario');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_anuncio` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` float(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_anuncio` (`id_anuncio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_roles` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movil` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `contrasena` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No definido.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `id_roles` (`id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_roles`, `email`, `movil`, `contrasena`, `nombre`, `apellidos`, `imagen`) VALUES
(1, 2, 'mikahe@tutanota.de', '661243481', '7c222fb2927d828af22f592134e8932480637c0d', 'Mika', 'Heya', 'No definido.'),
(2, 2, 'ilya@bakhlin.com', '671481648', '68b7cb51068157a92027da7ad71b3be923d2c59a', 'Ilya', 'Bakhlin', 'No definido.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animales`
--
ALTER TABLE `animales`
  ADD CONSTRAINT `animales_ibfk_1` FOREIGN KEY (`id_animales_tipos`) REFERENCES `animales_tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animales_ibfk_2` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opiniones`
--
ALTER TABLE `opiniones`
  ADD CONSTRAINT `opiniones_ibfk_1` FOREIGN KEY (`propietario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opiniones_ibfk_2` FOREIGN KEY (`cuidador`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_3` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
