-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2021 a las 03:29:15
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `botica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_art` int(11) NOT NULL,
  `nombre_art` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_art` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cat01` int(11) NOT NULL,
  `id_pro01` int(11) NOT NULL,
  `vencimiento_art` date NOT NULL,
  `cantidad_art` int(11) NOT NULL,
  `precio_art` double NOT NULL,
  `estado_art` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_art`, `nombre_art`, `descripcion_art`, `id_cat01`, `id_pro01`, `vencimiento_art`, `cantidad_art`, `precio_art`, `estado_art`) VALUES
(1, 'AMITRIPTILINA 25 mg Tableta Recubierta', ' Se usa para tratar los síntomas de la depresión, que son necesarias para mantener el equilibrio mental.', 1, 3, '2021-12-31', 10, 2, 0),
(2, 'AMLODIPINO 10 mg Tableta', 'Reduce la presión arterial al relajar los vasos sanguíneos para que el corazón no tenga que bombear tan fuerte. Controla el dolor de pecho aumentando el suministro de sangre al corazón.', 1, 4, '2022-10-31', 1, 3, 1),
(3, 'AMLODIPINO 5 mg Tableta', ' Reduce la presión arterial al relajar los vasos sanguíneos para que el corazón no tenga que bombear tan fuerte. Controla el dolor de pecho aumentando el suministro de sangre al corazón.', 1, 4, '2022-08-16', 1, 0.09, 1),
(4, 'PARACETAMOL 500  mg Tableta - Capsula', 'Está indicado para el tratamiento de los síntomas del dolor leve a moderado y la fiebre', 1, 4, '2021-10-31', 1, 0.2, 1),
(5, 'Perfume-ugo Iced Eau de Toilette 125 ml', 'Descubra una explosión de frescura helada con HUGO Iced. La menta revitalizante, el té salvaje y el vetiver masculino ofrecen la máxima frescura para el hombre urbano moderno.', 2, 5, '2024-08-16', 1, 149, 1),
(6, 'fsdf', '4343', 1, 1, '2021-01-21', 43434, 12, 1),
(7, '432432', '423423', 1, 1, '2021-01-21', 423432, 10, 1),
(8, 'sc', '32423', 1, 1, '2021-01-29', 4234, 12, 1),
(9, 'hola', 'aSDFGHJKL', 1, 1, '2021-02-11', 3, 1.3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(11) NOT NULL,
  `nombre_cat` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `detalle_cat` varchar(300) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `nombre_cat`, `detalle_cat`) VALUES
(1, 'Medicamentos', 'Toda sustancia medicinal que cumpla determinadas funciones. Estas pueden ser: prevenir, tratar, diagnosticar, aliviar, paliar o curar enfermedades.'),
(2, 'Cosméticos', 'Que sirve para cuidar y embellecer el pelo o la piel\''),
(3, 'Regalos', 'Todo tipo de producto de decoración (peluches,entre otro).');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `DNI_cli` int(11) NOT NULL,
  `nombre_cli` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_cli` int(11) NOT NULL,
  `direccion_cli` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `tipodoc_cli` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `estado_cli` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`DNI_cli`, `nombre_cli`, `telefono_cli`, `direccion_cli`, `tipodoc_cli`, `estado_cli`) VALUES
(1, '11', 1, '1', 'DNI', 1),
(2, '2', 2, '2', 'DNI', 1),
(3, '3', 3, '3', 'DNI', 1),
(5, '5', 5, '5', 'DNI', 1),
(12, '12', 12, '12', 'DNI', 1),
(123, '123', 123, '1231', 'DNI', 1),
(2343, 'fsf', 1233, 'fsd', 'DNI', 0),
(45453, 'aaaaaaaaaaaaaaaaaaaaaaaa', 545, 'qqqqqqqqqqqqqq', 'DNI', 0),
(234234, '234', 234234, '234', 'DNI', 1),
(445454, 'Gilberto', 4564564, 'sebas', 'DNI', 1),
(2272548, 'Juan Vázquez Quispe', 931255777, 'ubr.vallecitp\\o Nro 454', '', 1),
(2288848, 'Luis Álvarez Nooa', 951255453, 'asociación molina Mz.k TL.8', 'DNI', 1),
(2372547, 'José Antonio Martínez Martínez ', 931255754, 'Pasaje Huarango nro 254', 'DNI', 1),
(71111632, 'Juan Carlos Herrera toro', 957812611, 'calle jorge Chávez nro 125', '', 1),
(78456982, 'Martin López', 985746985, 'Jr. Arequipa 423', 'DNI', 1),
(78459632, 'Juanito Perez', 987456321, 'Jr. Alto misti 321', 'DNI', 0),
(78761632, 'Yilmer Pacho Ortiz ', 957815767, 'Urbanización Colinas de la Gloria nro 486', 'RUC', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_venta`
--

CREATE TABLE `det_venta` (
  `id_dv` int(11) NOT NULL,
  `id_v01` int(11) NOT NULL,
  `id_art01` int(11) NOT NULL,
  `cantidad_dv` int(11) NOT NULL,
  `precio_dv` int(1) NOT NULL,
  `total_dv` int(11) NOT NULL,
  `estado_dv` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `det_venta`
--

INSERT INTO `det_venta` (`id_dv`, `id_v01`, `id_art01`, `cantidad_dv`, `precio_dv`, `total_dv`, `estado_dv`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1),
(3, 1, 2, 1, 1, 1, 1),
(4, 2, 1, 1, 1, 1, 1),
(5, 2, 1, 1, 1, 1, 1),
(6, 3, 3, 1, 1, 1, 1),
(7, 3, 4, 1, 1, 1, 1),
(8, 3, 4, 1, 1, 1, 1),
(9, 4, 2, 2, 10, 20, 1),
(10, 4, 1, 10, 110, 1100, 1),
(11, 5, 1, 100, 20, 2000, 1),
(12, 6, 1, 1000, 5, 5000, 1),
(13, 7, 1, 5000, 1, 5000, 1),
(14, 8, 1, 1, 1, 1, 1),
(15, 8, 1, 1, 1, 1, 1),
(16, 9, 1, 1, 1, 1, 1),
(17, 10, 1, 1, 1, 1, 1),
(18, 10, 1, 1, 1, 1, 1),
(19, 10, 1, 1, 1, 1, 1),
(20, 10, 1, 1, 1, 1, 1),
(21, 11, 1, 1, 1, 1, 1),
(22, 11, 2, 1, 1, 1, 1),
(23, 12, 1, 1, 1, 1, 1),
(24, 12, 2, 1, 1, 1, 1),
(25, 12, 3, 1, 1, 1, 1),
(26, 12, 4, 1, 1, 1, 1),
(27, 13, 1, 1, 1, 1, 1),
(28, 13, 2, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `fecha_entrada` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `estado_01` varchar(10) DEFAULT '1',
  `estado_02` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `nombre`, `fecha_entrada`, `precio`, `cantidad`, `estado_01`, `estado_02`) VALUES
(12, 'PEPE', '2021-02-08', 10, 3, 'Bien', 'Activo'),
(13, '1', '2021-02-08', 1, 22, 'Pesimo', 'Activo'),
(14, '1', '2021-02-08', 1, 22, 'Bien', 'Activo'),
(15, '1', '2021-02-08', 13, 22, 'Bien', 'Inactivo'),
(16, 'mesa', '2021-02-10', 1, 1, 'Mal', 'Activo'),
(17, 'mesa', '2021-02-10', 1, 1, 'Mal', 'Activo'),
(18, 'mesa', '2021-02-10', 1, 1, 'Mal', 'Activo'),
(19, 'mesa', '2021-02-10', 1, 1, 'Mal', 'Activo'),
(20, 'mesa', '2021-02-10', 1, 1, 'Mal', 'Activo'),
(21, 'mesa', '2021-02-10', 1, 1, 'Mal', 'Activo'),
(22, '12312', '2021-02-10', 123123, 123123, 'Bien', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_pro` int(11) NOT NULL,
  `nombre_pro` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_pro` int(11) NOT NULL,
  `direccion_pro` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado_pro` tinyint(4) NOT NULL DEFAULT '1',
  `tipodoc_pro` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `numerodoc_pro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_pro`, `nombre_pro`, `telefono_pro`, `direccion_pro`, `estado_pro`, `tipodoc_pro`, `numerodoc_pro`) VALUES
(1, 'DIMEXA S.A.', 54400695, 'Calle Sta. Marta, Arequipa', 0, 'RUC', 1111111),
(2, 'CORPORACION FASURPERUs', 54226854, 'Goyeneche 203, Arequipa', 1, 'CEDULA', 11253333),
(3, 'PERUFARMA S.A', 959783255, 'Av. Daniel Alcides Carrion 247, Arequipa', 1, 'RUC', 78878788),
(4, 'LABORATORIOS PORTUGAL S.R.L.', 951953605, 'Miguel Grau 317, Arequipa', 1, 'RUC', 100),
(5, 'PERFUMERIAS UNIDAS', 942864781, 'Aviación 2500, Cerro Colorado', 1, 'DNI', 22222222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_u` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_u` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_u` int(11) NOT NULL,
  `direccion_u` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `contra_u` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_u` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado_u` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_u`, `nombre_u`, `telefono_u`, `direccion_u`, `contra_u`, `tipo_u`, `estado_u`) VALUES
('2020', 'Natali Huillca Cosco', 935280064, 'Cayma Mz.V Lt.01', '$2y$10$yOD6WQn9uEtaOGSGZnAqaela9LTTUOd0kK8vHkU7J47KPM6UayZYG', 'Dueño', 1),
('23534432', '423423', 4234, '23423', '$2y$10$fhsQXV62e2MM4YOrYkN0iuUHJoycYmlcxMaQtVQQjUKCdxEfKZgui', 'Dueño', 0),
('3', 'Miguel Mendoza Aquino', 936983242, 'Alto Selva Alegre Mz.b Lt.03', '$2y$10$Z2amZpvoiNTY6wIFqU58j.A7iB/PBwehFwNvrmfGisQYPDsGSQkgK', 'Administrador ', 1),
('5', 'Sebastián Parisuaña Ramos', 964106373, 'Cayma  Mz.f Lt.03', '$2y$10$IEZKdVyeTW6GiwGTIGL7Lei/SegRtBgr/HFwoHlQQA/rXVS0Ulapi', 'Vendedor', 1),
('555', '5555555555555555', 445555555, '445555555555555555', '$2y$10$SJLNu5QyCCMnlvC0JwALdu4tXczwAstt.9ip5wl8zyQvw/jWP6nvC', 'Dueño', 0),
('6', 'Milton Fernández Cuadros', 957096734, 'Bustamante Mz.b Lt.03', '$2y$10$P80flxUicfromVqOc9F6Oe0oadOHco2iGKF4gYOcGJvEsn5jjRbqq', 'Vendedor', 1),
('admin', 'luis miguel de mendoza', 987465325, 'calle los corales', '$2y$10$0U1XLb7mIiJE8gNxmVGe3OeGMV5dsklj1GD3FpFA9i18pELR/05ES', 'Administrador', 0),
('carolina', 'Carolina Benavides Gallegos', 951791577, 'Villa Antonio José de Sucre D-10', '$2y$10$Q3KkMkQ8T32axMIrgROXyeVvjnE8ZZPDa1nBpxulYdbkRsfMooiUW', 'administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `dni_c` int(11) NOT NULL,
  `parcial` double NOT NULL,
  `descuento` int(11) NOT NULL,
  `neto` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_v` date NOT NULL,
  `estado_v` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `dni_c`, `parcial`, `descuento`, `neto`, `total`, `usuario`, `fecha_v`, `estado_v`) VALUES
(1, 2288848, 3, 0, 3, 4, 'Natali Huillca Cosco', '2021-02-03', 1),
(2, 78456982, 2, 0, 2, 2, 'Natali Huillca Cosco', '2021-01-25', 1),
(3, 2372547, 3, 0, 3, 4, 'Natali Huillca Cosco', '2021-02-04', 1),
(4, 71111632, 1120, 0, 1120, 1322, 'Natali Huillca Cosco', '2021-02-04', 1),
(5, 2288848, 2000, 0, 2000, 2360, 'Natali Huillca Cosco', '2021-02-04', 1),
(6, 2288848, 5000, 0, 5000, 5900, 'Natali Huillca Cosco', '2021-02-04', 1),
(7, 2343, 5000, 0, 5000, 5900, 'Natali Huillca Cosco', '2021-02-01', 1),
(8, 2288848, 2, 0, 2, 2, 'Natali Huillca Cosco', '2021-02-04', 1),
(9, 2272548, 1, 0, 1, 1, 'Natali Huillca Cosco', '2021-02-04', 1),
(10, 2288848, 4, 0, 4, 5, 'Natali Huillca Cosco', '2021-02-04', 1),
(11, 1, 2, 0, 2, 2, 'Natali Huillca Cosco', '0000-00-00', 1),
(12, 1, 4, 0, 4, 5, 'Natali Huillca Cosco', '0000-00-00', 1),
(13, 1, 2, 0, 2, 2, 'Natali Huillca Cosco', '2021-02-10', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_art`),
  ADD KEY `id_pro01` (`id_pro01`),
  ADD KEY `id_cat01` (`id_cat01`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`DNI_cli`);

--
-- Indices de la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD PRIMARY KEY (`id_dv`),
  ADD KEY `id_v01` (`id_v01`),
  ADD KEY `id_art01` (`id_art01`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_u`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `dni_c` (`dni_c`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `det_venta`
--
ALTER TABLE `det_venta`
  MODIFY `id_dv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`id_cat01`) REFERENCES `categorias` (`id_cat`),
  ADD CONSTRAINT `articulos_ibfk_2` FOREIGN KEY (`id_pro01`) REFERENCES `proveedores` (`id_pro`);

--
-- Filtros para la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD CONSTRAINT `det_venta_ibfk_1` FOREIGN KEY (`id_art01`) REFERENCES `articulos` (`id_art`),
  ADD CONSTRAINT `det_venta_ibfk_2` FOREIGN KEY (`id_v01`) REFERENCES `ventas` (`id_venta`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`dni_c`) REFERENCES `cliente` (`DNI_cli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
