-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-08-2021 a las 01:54:22
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mis_quinces`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) ,
  `status` varchar(2) NOT NULL,
  `message` varchar(255) ,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`id`, `name`, `email`, `status`, `message`, `phone`) VALUES
(1, 'Ismael Escalante', 'ismaeljoseescalante@gmail.com', 'S', 'Sos mi mejor amiga', '2875163882'),
(5, 'imer crack', 'imer@gmail.com', '', 'no me bano', '2323'),
(7, 'Imer mamani', 'ismaeljoseescalante@gmail.com', '', 'me gusta la comidad', '2332'),
(12, 'Xantha Stark', 'fotohumine@mailinator.com', 'Si', 'Blanditiis sed ea qu', '6574'),
(13, 'Linda Ortega', 'pezybaf@mailinator.com', 'S', 'Sed qui explicabo S', '34565'),
(14, 'Desayuno', 'admin@admin.com', 'S', 'Me gusta la torta', '233443'),
(15, 'imercito mamani', '35424@adfds.dfscom', 'N', 'mensaje de imer', '24242'),
(16, 'Wanda Vang', 'ceqabiro@mailinator.com', 'S', 'Impedit expedita et', '3524262'),
(17, 'Ava Perez', 'suteriq@mailinator.com', 'S', 'Commodi porro iure l', '452342'),
(18, 'imerlaskdf', 'idflasdf@ajdflka.com', 'N', 'alngladfnaiofenfadsmfaopenf', '4204822'),
(19, 'adgsafsfd', 'imer@imer.com', 'N', 'ajfioajfnopasf', '232523432'),
(20, 'Chloe George', 'pibaza@mailinator.com', 'S', 'Ducimus et voluptat', '345243234'),
(21, 'Germane Richards', 'lajyraqi@mailinator.com', 'S', 'Do fuga Vel non et', '3875163882'),
(22, 'Angela Jenkins', 'nofabuwap@mailinator.com', 'N', 'Molestiae praesentiu', '3875163882'),
(23, 'Quinn Brewer', 'nuzot@mailinator.com', 'N', 'Dolores praesentium', '3875163882'),
(24, 'Emma Nguyen', 'batiguju@mailinator.com', 'S', 'Ut sit in provident', '3875163882'),
(25, 'Marshall Wong', 'fekyka@mailinator.com', 'S', 'Nihil sit et volupta', '3875163882'),
(26, 'Imer mamani', '', 'S', '', '3875163882'),
(27, 'Imer mamani', '', 'N', '', '232312'),
(28, 'Yoselin', '', 'S', '', '3875163882'),
(29, 'Imer mamani', '', 'S', '', '3875163882'),
(30, 'Imer mamani', '', 'N', '', '3875163832'),
(31, 'Evelin Mamani', '', 'N', '', '412342351'),
(32, 'Imer mamani', '', 'N', '', '3875163882'),
(33, 'Humahuaca', '', 'N', '', '2323');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
