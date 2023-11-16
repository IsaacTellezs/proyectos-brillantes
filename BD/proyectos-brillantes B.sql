-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 17:41:00
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectos-brillantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `nombre_completo` text NOT NULL,
  `motivo` text NOT NULL,
  `correo_electronico` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `id_correo` tinyint(255) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `cantidad` int(20) NOT NULL,
  `id_proyect` tinyint(255) NOT NULL,
  `id_usuarios` tinyint(255) NOT NULL,
  `fecha_contribucion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nivel_pago` int(1) NOT NULL,
  `tipo_pago` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `cantidad`, `id_proyect`, `id_usuarios`, `fecha_contribucion`, `nivel_pago`, `tipo_pago`) VALUES
(1, 0, 0, 0, '2023-11-01 14:30:45', 1, 'donacion'),
(2, 0, 0, 0, '2023-11-01 14:30:45', 2, 'inversion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id_proyecto` tinyint(255) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` longblob NOT NULL,
  `nom_proyecto` varchar(50) NOT NULL,
  `meta_financiacion` int(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `id_user` tinyint(255) NOT NULL,
  `categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id_proyecto`, `descripcion`, `imagen`, `nom_proyecto`, `meta_financiacion`, `fecha_inicio`, `fecha_termino`, `id_user`, `categoria`) VALUES
(6, 'Desarrollo aplicación del IMSS', 0x75706c6f6164732f494d53532e706e67, 'IMSS', 0, '0000-00-00', '0000-00-00', 0, 'Salud'),
(7, 'Aplicación para el seguimiento de las ambulancias.', 0x75706c6f6164732f416d62756c616e6369612e706e67, 'Ambulancias', 0, '0000-00-00', '0000-00-00', 0, 'Salud'),
(8, 'Se pondrán inyecciones para evitar el COVID 19', 0x75706c6f6164732f436f7669642e6a7067, 'Inyecciones para el COVID 19', 0, '0000-00-00', '0000-00-00', 0, 'Salud'),
(9, 'Aplicación para el seguimiento de los bomberos', 0x75706c6f6164732f426f6d6265726f732e6a7067, 'Bomberos', 0, '0000-00-00', '0000-00-00', 0, 'Salud'),
(10, 'Desarrollo de aplicación para el control de actividades de una escuela.', 0x75706c6f6164732f456475636163696f6e2e6a7067, 'Desarrollo de aplicación para el control de activi', 0, '0000-00-00', '0000-00-00', 0, 'Educación'),
(11, 'Se hará una nueva aplicación para automatizar calificaciones.', 0x75706c6f6164732f436c617373726f6f6d2e706e67, 'Desarrollo de app como ClassRoom', 0, '0000-00-00', '0000-00-00', 0, 'Educación'),
(12, 'Control de tienda', 0x75706c6f6164732f5469656e64612e706e67, 'Plataforma para control de una tienda', 0, '0000-00-00', '0000-00-00', 0, 'Negocios y emprendimiento'),
(13, 'App para llevar el control de un ciber.', 0x75706c6f6164732f436962657220636166652e6a7067, 'Control ciber', 0, '0000-00-00', '0000-00-00', 0, 'Negocios y emprendimiento'),
(14, 'Se creara una aplicación para tener el control de los camiones de basura.', 0x75706c6f6164732f43616d696f6e206261737572612e6a7067, 'Control de camiones de basura', 0, '0000-00-00', '0000-00-00', 0, 'Gobierno y servicios públicos'),
(15, 'Registro de los servicios públicos que se realizan en una comunidad.', 0x75706c6f6164732f536572766963696f73207075626c69636f732e706e67, 'App para el control de servicios públicos. ', 0, '0000-00-00', '0000-00-00', 0, 'Gobierno y servicios públicos'),
(16, 'Se creara una app para ayudar a los niños sin casa', 0x75706c6f6164732f4e69c3b16f7320696e646967656e61732e6a7067, 'Ayuda a niños indígenas ', 0, '0000-00-00', '0000-00-00', 7, 'Social y sin fines de lucro'),
(17, 'Se realizara una aplicación para juntar personas y cuidar de las áreas verdes.', 0x75706c6f6164732f4172656173207665726465732e6a7067, 'Ayuda a mantener las áreas verdes.', 0, '0000-00-00', '0000-00-00', 7, 'Social y sin fines de lucro'),
(18, 'cdvb', 0x2e2e2f75706c6f6164732f76626e766e2e706e67, 'prueba', 0, '0000-00-00', '0000-00-00', 7, 'Educación'),
(31, 'Prueba de proyecto con descripcionkjaiodhjskdhfndslxcnv dsfghslksfs sdjfdjkfsdf djsbd', 0x2e2e2f75706c6f6164732f3852625174613539664d6c5f7075626c69632e77656270, 'Camiones electricos', 0, '0000-00-00', '0000-00-00', 0, 'Negocios y emprendimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` tinyint(255) NOT NULL,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `paterno` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `materno` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto` longblob NOT NULL,
  `nom_usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `facebook` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `instagram` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `twitter` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contraseña` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `empresa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `experiencia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipo_usuario` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nivel_usuario` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `paterno`, `materno`, `telefono`, `correo`, `foto`, `nom_usuario`, `facebook`, `instagram`, `twitter`, `contraseña`, `empresa`, `experiencia`, `tipo_usuario`, `nivel_usuario`) VALUES
(1, '', '', '', '0', '', '', '', '', '', '', '', '', '', 'desarrollador', 1),
(2, '', '', '', '0', '', '', '', '', '', '', '', '', '', 'inversionista', 2),
(3, 'df', 'fdgd', 'df', '0', 'dsff@gmail.com', '', 'fdgd', '', '', '', '$2y$10$bJ2Riev6bEc/L7hbnJ.7PuLEEQPW20jBRd4PHm/DdAdE3jlA./.SO', 'dffgd', '', '', 0),
(4, 'prueba', 'xcsgd', 'dfg', '0', 'nubeisaac3@gmail.com', '', 'prueba', '', '', '', '$2y$10$uafE/wU8ex8GHhGQ.ItDrOWVjfIY6V1jlPuUGImnV4NPx9/WPRPIy', 'dfdf', '', '', 0),
(5, 'frg', 'erge', 'erg', '0', '3tr@gmail.com', '', 'er', '', '', '', '$2y$10$ohNXfHHVXJqUYo2g4H54Qe0P97I5HP7kwIup.eIETMLrAFHSA3oOy', 'dfgd', '', '', 0),
(6, 'gd', 'dgdg', 'dg', '0', 'dsd@gmail.com', '', 'fdgd', '', '', '', '$2y$10$KXYz56IZAslLINoaOimpLO.00tOo3W5cA7btWvVyuxWBSapRzbDkq', '', 'zxcz', '', 0),
(7, 'aaaa', 'ssss', 'ffff', '2147483647', 'coco@gmail.com', 0x712d736f6d6f732e6a706567, 'coco', '', '', '', '$2y$10$QiXVFPcywzYp0xXXFCO7QeH/FMJGksmXLFnlkxbnpq1RgvZh6Ld2a', '', 'aeronautica', 'desarrollador', 1),
(8, 'dfdf', 'gdf', 'fdgd', '2147483647', 'sdsds@gmail.com', '', 'ssdsds', '', '', '', '$2y$10$1heD8YhN0Fy/ocLHxdF3aezW8W90.SjD8wkf0bx1Q2ioEDEmdt2km', '', 'sdsd', 'desarrollador', 1),
(9, 'df', 'fd', 'fd', '0', 'df@gmail.com', '', 'dgd', '', '', '', '$2y$10$WFu/xE4MftaKVyYo8FhYaO76qVN7rw8Lr3ao7G6x/TShYzGje2.Uu', 'sdfsdsf', '', 'inversionista', 2),
(10, 'coca', 'sd', 'sd', '33232', 'coca@gmail.com', '', 'coca', '', '', '', '$2y$10$YCF7NRh2ndn9lhSzK1GqTOAm4wCt6mT9BvYmMPlbg/1LBKJP6tHYu', 'coca cola', '', 'inversionista', 2),
(11, 'martes', 'dfs', 'dfss', '0', 'martes@gmail.com', '', 'martes', '', '', '', '$2y$10$qJYA.Ruzb8Wl8ubnSlrLsuIIT.2Qat6YGBQnDSsIiTZzyMBRmRM1C', '', 'dfdsf', 'desarrollador', 1),
(12, 'miercoles', 'sdf', 'dfs', '0', 'miercoles@gmail.com', '', 'miercoles', '', '', '', '$2y$10$eKItkUdV4A.KwgTdul1mg.otfwyl1If9PA17eQSE8R/J3/pZHFC6q', '', 'sfs', 'desarrollador', 1),
(13, 'prueba11', 'dff', 'fsfd', '0', 'prueba11@gmail.com', '', 'prueba11', '', '', '', '$2y$10$kMC4j9uTPY.byIXF1QYuSO1KB.P2MGa.iLVSlajzm7FMzjHqn1c/i', '', 'sdfsd', 'desarrollador', 1),
(14, 'sfsd', 'dsfds', 'fsd', '5520208888', 'dfsds@gmail.com', '', 'dsf', '', '', '', '$2y$10$kVXLxOsqDIyLEGD6W/bnpeCJ3hvl87rJo/XLw8sM6PAc5/CLEzOP2', 'dfsf', '', 'inversionista', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`id_correo`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `correo`
--
ALTER TABLE `correo`
  MODIFY `id_correo` tinyint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyecto` tinyint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` tinyint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
