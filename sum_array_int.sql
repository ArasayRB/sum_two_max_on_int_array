-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-09-2021 a las 20:37:40
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sum_array_int`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `last_access` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `information`, `last_access`) VALUES
('msd4bsb5vocgfb553hpmi39876', 'Array', 1631125287);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions_user`
--

CREATE TABLE `sessions_user` (
  `id_session` varchar(255) NOT NULL,
  `id_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sessions_user`
--

INSERT INTO `sessions_user` (`id_session`, `id_user`) VALUES
('msd4bsb5vocgfb553hpmi39876', 'dani@d.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `credit_card` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`email`, `password`, `user_name`, `roll`, `credit_card`) VALUES
('dani@d.com', 'e94d51a35484755a9f9672d13687f499', 'dani', 'user', '564577893241'),
('rafa@di.com', '637af7a9d60d3c9314c6996df1b6e197', 'rafa', 'user', '554756670749'),
('robe@rb.com', 'f86855731b9cd001eabab8d19a44f430', 'robe', 'user', '556672554418');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions_user`
--
ALTER TABLE `sessions_user`
  ADD PRIMARY KEY (`id_session`,`id_user`),
  ADD UNIQUE KEY `id_session` (`id_session`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD KEY `credit_card` (`credit_card`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sessions_user`
--
ALTER TABLE `sessions_user`
  ADD CONSTRAINT `sessions_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sessions_user_ibfk_2` FOREIGN KEY (`id_session`) REFERENCES `sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`credit_card`) REFERENCES `credit_card` (`number_card`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
