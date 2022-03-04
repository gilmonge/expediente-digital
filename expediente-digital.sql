-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2022 a las 06:36:52
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `expediente-digital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cursos`
--

CREATE TABLE `tbl_cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiempo_capacitacion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cursos_empleado`
--

CREATE TABLE `tbl_cursos_empleado` (
  `id` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detalle` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_departamento`
--

CREATE TABLE `tbl_departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleado`
--

CREATE TABLE `tbl_empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `licencia_conduccion` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_licencia` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cedula` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residencia` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hijos` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salario_actual` double DEFAULT NULL,
  `estado_civil` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banco` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuenta_iban` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuenta_cliente` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_sinpe` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_contratacion` date DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `id_grado_academico` int(11) DEFAULT NULL,
  `id_puesto` int(11) DEFAULT NULL,
  `id_sexo` int(11) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_grado_academico`
--

CREATE TABLE `tbl_grado_academico` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_informacion_medica`
--

CREATE TABLE `tbl_informacion_medica` (
  `id` int(11) NOT NULL,
  `detalle` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_informacion` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lavanderia_x_uniforme`
--

CREATE TABLE `tbl_lavanderia_x_uniforme` (
  `id` int(11) NOT NULL,
  `tipo_movimiento` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_puesto`
--

CREATE TABLE `tbl_puesto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salario_base` double DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sexo`
--

CREATE TABLE `tbl_sexo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sucursales`
--

CREATE TABLE `tbl_sucursales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horario_apertura` datetime DEFAULT NULL,
  `horario_cierre` datetime DEFAULT NULL,
  `dias_atencion` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tallas_uniformes`
--

CREATE TABLE `tbl_tallas_uniformes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_sexo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_uniforme_x_empleado`
--

CREATE TABLE `tbl_uniforme_x_empleado` (
  `id` int(11) NOT NULL,
  `fecha_entrega_uniforme` date DEFAULT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_talla_uniforme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contraseña` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_cursos`
--
ALTER TABLE `tbl_cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_cursos_empleado`
--
ALTER TABLE `tbl_cursos_empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblcursosempleado_tblempleado_idempleado` (`id_empleado`),
  ADD KEY `fk_tblcursosempleado_tblcursos_idcurso` (`id_curso`);

--
-- Indices de la tabla `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblempleado_tblgradoacademico_idgradoacademico` (`id_grado_academico`),
  ADD KEY `fk_tblempleado_tblpuesto_idpuesto` (`id_puesto`),
  ADD KEY `fk_tblempleado_tblsexo_idsexo` (`id_sexo`),
  ADD KEY `fk_tblempleado_tblsucursal_idsucursal` (`id_sucursal`);

--
-- Indices de la tabla `tbl_grado_academico`
--
ALTER TABLE `tbl_grado_academico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_informacion_medica`
--
ALTER TABLE `tbl_informacion_medica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblinformacionmedica_tblempleado_idempleado` (`id_empleado`);

--
-- Indices de la tabla `tbl_lavanderia_x_uniforme`
--
ALTER TABLE `tbl_lavanderia_x_uniforme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbllavanderiaxuniforme_tblempleado_idempleado` (`id_empleado`);

--
-- Indices de la tabla `tbl_puesto`
--
ALTER TABLE `tbl_puesto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblpuesto_tbldepartamento_iddepartamneto` (`id_departamento`);

--
-- Indices de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_sexo`
--
ALTER TABLE `tbl_sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_sucursales`
--
ALTER TABLE `tbl_sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tallas_uniformes`
--
ALTER TABLE `tbl_tallas_uniformes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbltallasuniformes_tblsexo_idsexo` (`id_sexo`);

--
-- Indices de la tabla `tbl_uniforme_x_empleado`
--
ALTER TABLE `tbl_uniforme_x_empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbluniformexempleado_tblempleado_idempleado` (`id_empleado`),
  ADD KEY `fk_tbluniformexempleado_tbltallauniforme_idtallauniforme` (`id_talla_uniforme`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblusuario_tblroles_idrol` (`id_rol`),
  ADD KEY `fk_tblusuario_tblempleado_idempleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_cursos`
--
ALTER TABLE `tbl_cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_cursos_empleado`
--
ALTER TABLE `tbl_cursos_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_grado_academico`
--
ALTER TABLE `tbl_grado_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_informacion_medica`
--
ALTER TABLE `tbl_informacion_medica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_lavanderia_x_uniforme`
--
ALTER TABLE `tbl_lavanderia_x_uniforme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_puesto`
--
ALTER TABLE `tbl_puesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_sexo`
--
ALTER TABLE `tbl_sexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_sucursales`
--
ALTER TABLE `tbl_sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_tallas_uniformes`
--
ALTER TABLE `tbl_tallas_uniformes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_uniforme_x_empleado`
--
ALTER TABLE `tbl_uniforme_x_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_cursos_empleado`
--
ALTER TABLE `tbl_cursos_empleado`
  ADD CONSTRAINT `fk_tblcursosempleado_tblcursos_idcurso` FOREIGN KEY (`id_curso`) REFERENCES `tbl_cursos` (`id`),
  ADD CONSTRAINT `fk_tblcursosempleado_tblempleado_idempleado` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleado` (`id`);

--
-- Filtros para la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD CONSTRAINT `fk_tblempleado_tblgradoacademico_idgradoacademico` FOREIGN KEY (`id_grado_academico`) REFERENCES `tbl_grado_academico` (`id`),
  ADD CONSTRAINT `fk_tblempleado_tblpuesto_idpuesto` FOREIGN KEY (`id_puesto`) REFERENCES `tbl_puesto` (`id`),
  ADD CONSTRAINT `fk_tblempleado_tblsexo_idsexo` FOREIGN KEY (`id_sexo`) REFERENCES `tbl_sexo` (`id`),
  ADD CONSTRAINT `fk_tblempleado_tblsucursal_idsucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `tbl_sucursales` (`id`);

--
-- Filtros para la tabla `tbl_informacion_medica`
--
ALTER TABLE `tbl_informacion_medica`
  ADD CONSTRAINT `fk_tblinformacionmedica_tblempleado_idempleado` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleado` (`id`);

--
-- Filtros para la tabla `tbl_lavanderia_x_uniforme`
--
ALTER TABLE `tbl_lavanderia_x_uniforme`
  ADD CONSTRAINT `fk_tbllavanderiaxuniforme_tblempleado_idempleado` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleado` (`id`);

--
-- Filtros para la tabla `tbl_puesto`
--
ALTER TABLE `tbl_puesto`
  ADD CONSTRAINT `fk_tblpuesto_tbldepartamento_iddepartamneto` FOREIGN KEY (`id_departamento`) REFERENCES `tbl_departamento` (`id`);

--
-- Filtros para la tabla `tbl_tallas_uniformes`
--
ALTER TABLE `tbl_tallas_uniformes`
  ADD CONSTRAINT `fk_tbltallasuniformes_tblsexo_idsexo` FOREIGN KEY (`id_sexo`) REFERENCES `tbl_sexo` (`id`);

--
-- Filtros para la tabla `tbl_uniforme_x_empleado`
--
ALTER TABLE `tbl_uniforme_x_empleado`
  ADD CONSTRAINT `fk_tbluniformexempleado_tblempleado_idempleado` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleado` (`id`),
  ADD CONSTRAINT `fk_tbluniformexempleado_tbltallauniforme_idtallauniforme` FOREIGN KEY (`id_talla_uniforme`) REFERENCES `tbl_tallas_uniformes` (`id`);

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `fk_tblusuario_tblempleado_idempleado` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleado` (`id`),
  ADD CONSTRAINT `fk_tblusuario_tblroles_idrol` FOREIGN KEY (`id_rol`) REFERENCES `tbl_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
