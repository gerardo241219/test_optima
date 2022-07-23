-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2022 a las 20:43:14
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_test_optima`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getModel` (`id` INT) RETURNS VARCHAR(50) CHARSET utf8mb4  begin    
    declare resultado VARCHAR(200);
    set resultado='';
SELECT concat_ws(' ', name_model) into resultado from tb_model where id_model=id;
   RETURN resultado;
    end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_car`
--

CREATE TABLE `tb_car` (
  `id_car` int(11) NOT NULL,
  `name_car` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_car`
--

INSERT INTO `tb_car` (`id_car`, `name_car`) VALUES
(1, 'Honda'),
(2, 'KIA'),
(3, 'Ford'),
(4, 'Nissan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_model`
--

CREATE TABLE `tb_model` (
  `id_model` int(11) NOT NULL,
  `name_model` varchar(20) NOT NULL,
  `id_car` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_model`
--

INSERT INTO `tb_model` (`id_model`, `name_model`, `id_car`) VALUES
(1, 'CRV', 1),
(2, 'HRV', 1),
(3, 'BRV', 1),
(4, 'SOUL', 2),
(5, 'RIO', 2),
(6, 'SPORTAGE', 2),
(7, 'MUNSTANG', 3),
(8, 'ESCAPE', 3),
(9, 'FIESTA', 3),
(10, 'VERSA', 4),
(11, 'MARCH', 4),
(12, 'SENTRA', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_register`
--

CREATE TABLE `tb_register` (
  `id_register` int(11) NOT NULL,
  `names` varchar(30) NOT NULL,
  `age` varchar(5) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_model` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_car`
--
ALTER TABLE `tb_car`
  ADD PRIMARY KEY (`id_car`);

--
-- Indices de la tabla `tb_model`
--
ALTER TABLE `tb_model`
  ADD PRIMARY KEY (`id_model`);

--
-- Indices de la tabla `tb_register`
--
ALTER TABLE `tb_register`
  ADD PRIMARY KEY (`id_register`),
  ADD KEY `id_model` (`id_model`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_car`
--
ALTER TABLE `tb_car`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_model`
--
ALTER TABLE `tb_model`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tb_register`
--
ALTER TABLE `tb_register`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_model`
--
ALTER TABLE `tb_model`
  ADD CONSTRAINT `tb_model_ibfk_1` FOREIGN KEY (`id_car`) REFERENCES `tb_car` (`id_car`);

--
-- Filtros para la tabla `tb_register`
--
ALTER TABLE `tb_register`
  ADD CONSTRAINT `tb_register_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `tb_model` (`id_model`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
