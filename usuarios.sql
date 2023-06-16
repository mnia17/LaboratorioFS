-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2023 a las 23:24:33
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `primer_apellido` varchar(25) NOT NULL,
  `segundo_apellido` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `usuario` varchar(8) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `primer_apellido`, `segundo_apellido`, `email`, `usuario`, `password`) VALUES
(1, 'Alessandra', 'Bayot', 'Diana', 'alessa.bayot@gmail.com', 'amBD23', 'BD23am'),
(2, 'Hanna', 'Montana', 'Disney', 'hanna@montana.com', 'HMd23', 'hmD23d'),
(3, 'Barky', 'Pooh', 'Demo', 'barkypooh@gmail.com', 'Bk19tc', 'pruBa23'),
(4, 'Prueba', 'Demo', 'Demo', 'prueba.usuario@gmail.com', 'Prueba23', 'Abd23f'),
(5, 'Paco', 'Demo', 'Prueba', 'paco.prueba@gmail.com', 'Pcs23a', 'ASdd34fd'),
(6, 'Ana', 'Caramelo', 'Piruleta', 'ana.piru23@gmail.com', 'AP23c', 'Fds23e'),
(7, 'Katrina', 'Tubby', 'Demo', 'katrina@gmail.com', 'KD23tb', 'Gas23tr');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
