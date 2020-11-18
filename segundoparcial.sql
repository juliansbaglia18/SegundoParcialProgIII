-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2020 a las 01:07:48
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `segundoparcial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscipcion`
--

CREATE TABLE `inscipcion` (
  `idalumno` int(11) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscipcion`
--

INSERT INTO `inscipcion` (`idalumno`, `idmateria`, `created_at`, `updated_at`) VALUES
(0, 6, '2020-11-18 01:00:23', '2020-11-18 01:00:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `tipo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cuatrimestre` int(11) NOT NULL,
  `cupos` int(11) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`tipo`, `nombre`, `cuatrimestre`, `cupos`, `updated_at`, `created_at`, `id`) VALUES
('', 'P3', 3, 20, '2020-11-18 01:02:20', '2020-11-18 01:02:20', 1),
('', 'P38', 3, 20, '2020-11-18 01:02:23', '2020-11-18 01:02:23', 2),
('', 'P38', 1, 20, '2020-11-18 01:02:38', '2020-11-18 01:02:38', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`email`, `nombre`, `clave`, `tipo`, `updated_at`, `created_at`, `id`) VALUES
('pepe@mail.com', 'pepe', '123456', 'alumno', '2020-11-18 01:01:49', '2020-11-18 01:01:49', 1),
('pepe@mail.com1', 'pepe', '123456', 'alumno', '2020-11-18 01:01:54', '2020-11-18 01:01:54', 2),
('pepe@mail.com2', 'pepe', '123456', 'alumno', '2020-11-18 01:01:59', '2020-11-18 01:01:59', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
