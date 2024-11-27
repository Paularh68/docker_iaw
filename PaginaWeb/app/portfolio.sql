-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2024 a las 19:45:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portfolio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `DESCRIPCIÓN` text NOT NULL,
  `IMAGEN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`ID`, `NOMBRE`, `DESCRIPCIÓN`, `IMAGEN`) VALUES
(17, 'Proyecto Arduino I3', 'Este proyecto se desarrolló con el fin de ayudar a personas con capacidades especiales. A través de un dispositivo Arduino, se implementaron soluciones que facilitan tareas cotidianas...\'', 'https://imagenes.diariodenavarra.es/files/bajacalidad/uploads/2024/05/16/664635acbd6dc.jpeg'),
(18, 'Cloud Infrastructure Management', 'En este proyecto, se creó una infraestructura en la nube para una empresa. Se diseñaron y configuraron servidores virtuales, así como bases de datos optimizadas para el rendimiento. Además, se implementaron medidas de seguridad para proteger la información sensible. Este enfoque no solo mejoró la eficiencia operativa, sino que también redujo costos a largo plazo. Se brindó soporte continuo para garantizar el funcionamiento óptimo de la infraestructura.', 'https://www.ricoh.com.my/blogs/-/media/rms/images/discover/blogs/medi/2022/07/13/cloud-infrastructure-benefit.jpeg'),
(19, 'Seguridad en Redes Corporativas', 'Este proyecto se centró en la seguridad de redes en una organización grande. Se llevaron a cabo auditorías para identificar vulnerabilidades y se implementaron políticas de seguridad robustas. Esto incluyó la capacitación del personal en prácticas seguras y la instalación de herramientas de monitoreo. Como resultado, la empresa experimentó una reducción significativa en incidentes de seguridad y un aumento en la confianza del cliente.', 'https://www.itechsas.com/blog/wp-content/uploads/2019/04/Seguridad-Red.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
