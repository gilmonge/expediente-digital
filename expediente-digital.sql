-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 04:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expediente-digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cursos`
--

CREATE TABLE `tbl_cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiempo_capacitacion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cursos`
--

INSERT INTO `tbl_cursos` (`id`, `nombre`, `tiempo_capacitacion`, `activo`) VALUES
(1, 'Manejo de alimento', '8 meses', '1'),
(2, 'Curso práctico de manejo', '2 meses', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cursos_empleado`
--

CREATE TABLE `tbl_cursos_empleado` (
  `id` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detalle` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cursos_empleado`
--

INSERT INTO `tbl_cursos_empleado` (`id`, `estado`, `detalle`, `id_empleado`, `id_curso`, `activo`) VALUES
(1, 'C', 'El empleado concluyo exitosamente el curso de manipulación de alimentos  ', 5, 1, '1'),
(2, 'P', 'El empleado esta en proceso de terminar el curso', 3, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departamento`
--

CREATE TABLE `tbl_departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_departamento`
--

INSERT INTO `tbl_departamento` (`id`, `nombre`, `activo`) VALUES
(1, 'Transporte', '1'),
(2, 'Administración', '1'),
(3, 'Planta', '1'),
(4, 'Carniceria', '1'),
(5, 'Gerencia', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empleado`
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
  `id_sucursal` int(11) DEFAULT NULL,
  `vacunas` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_empleado`
--

INSERT INTO `tbl_empleado` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `licencia_conduccion`, `tipo_licencia`, `cedula`, `telefono`, `correo`, `residencia`, `hijos`, `salario_actual`, `estado_civil`, `banco`, `cuenta_iban`, `cuenta_cliente`, `numero_sinpe`, `fecha_contratacion`, `fecha_ingreso`, `id_grado_academico`, `id_puesto`, `id_sexo`, `id_sucursal`, `vacunas`, `activo`) VALUES
(1, 'Jorge', 'Hernandez', '1990-03-25', 'B', '1', '301230456', '88008800', 'jorgeh@gmail.com', 'Cartago, Oreamuno', NULL, 750000, 'S', 'Banco Nacional', 'CR6101610001234567', '1610001234567', '88008800', '2015-01-09', '2015-01-15', 2, 2, 1, 1, '1', 'S'),
(2, 'Ivannia', 'Coto', '1980-08-15', 'B', '1', '502630487', '88741230', 'ivcoto@gmail.com', 'Heredia, Barva', NULL, 450000, 'C', 'BAC', 'CR6101610007654321', '1610007654321', '88741230', '2010-11-09', '2010-11-20', 1, 1, 2, 2, '1', 'S'),
(3, 'Jose', 'Miranda', '1995-05-01', 'B', '2', '405980485', '84020645', 'josem@gmail.com', 'San Jose, Curridabat', NULL, 520000, 'S', 'BAC', 'CR6101610007546213', '1610007546213', '84020645', '2019-08-19', '2019-08-27', 3, 3, 1, 1, '1', 'S'),
(5, 'Luis', 'Corrales', '1990-05-25', 'B', '1', '305230325', '88700112', 'luisc@gmail.com', 'Cartago, Tejar', NULL, 475000, '', 'BCR', 'CR6101610007654321', '1610007654321', '88700112', '2009-02-22', '2009-02-28', 3, 5, 2, 2, '1', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grado_academico`
--

CREATE TABLE `tbl_grado_academico` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_grado_academico`
--

INSERT INTO `tbl_grado_academico` (`id`, `nombre`, `activo`) VALUES
(1, 'Noveno grado', '1'),
(2, 'Bachillerato', '1'),
(3, 'Técnico', '1'),
(4, 'Licenciatura', '1'),
(5, 'Maestría', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_informacion_medica`
--

CREATE TABLE `tbl_informacion_medica` (
  `id` int(11) NOT NULL,
  `detalle` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_informacion` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_informacion_medica`
--

INSERT INTO `tbl_informacion_medica` (`id`, `detalle`, `tipo_informacion`, `id_empleado`, `activo`) VALUES
(1, 'El paciente no presenta antecendentes medicos de alguna enfermedad, Grupo sanguineo B, presenta las 3 dosis contra en Covid...', '1', 2, '1'),
(2, 'Grupo sanguineo A, presenta las 3 dosis contra en Covid, padecimiento por Sinusitis (infección de los senos paranasales)...', '1', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lavanderia_x_uniforme`
--

CREATE TABLE `tbl_lavanderia_x_uniforme` (
  `id` int(11) NOT NULL,
  `tipo_movimiento` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_puesto`
--

CREATE TABLE `tbl_puesto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salario_base` double DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_puesto`
--

INSERT INTO `tbl_puesto` (`id`, `nombre`, `salario_base`, `id_departamento`, `activo`) VALUES
(1, 'Cajero', 350000, 3, '1'),
(2, 'Contador', 650000, 2, '1'),
(3, 'Conductor', 500000, 1, '1'),
(5, 'Carnicero', 480000, 4, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `nombre`, `activo`) VALUES
(1, 'Administrador', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sexo`
--

CREATE TABLE `tbl_sexo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sexo`
--

INSERT INTO `tbl_sexo` (`id`, `descripcion`, `activo`) VALUES
(1, 'Masculino', '1'),
(2, 'Femenino', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sucursales`
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
  `dias_atencion` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sucursales`
--

INSERT INTO `tbl_sucursales` (`id`, `nombre`, `direccion`, `correo`, `telefono`, `telefono2`, `horario_apertura`, `horario_cierre`, `dias_atencion`, `activo`) VALUES
(1, 'Heredia', 'Heredia', 'heredia@carnes.com', '85848584', '85848584', '2022-04-14 11:19:00', '2022-04-14 15:19:00', 'L-V', '1'),
(2, 'Cartago', 'Cartago', 'cartago@carnes.com', '88756231', '88756231', '2022-04-14 11:19:00', '2022-04-14 15:19:00', 'L-V', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tallas_uniformes`
--

CREATE TABLE `tbl_tallas_uniformes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_sexo` int(11) DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tallas_uniformes`
--

INSERT INTO `tbl_tallas_uniformes` (`id`, `nombre`, `id_sexo`, `activo`) VALUES
(1, 'Uniformes carnicería XS', 2, '1'),
(2, 'Uniformes carnicería S545', 1, '1'),
(3, 'Uniforme administrativo M', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uniforme_x_empleado`
--

CREATE TABLE `tbl_uniforme_x_empleado` (
  `id` int(11) NOT NULL,
  `fecha_entrega_uniforme` date DEFAULT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_talla_uniforme` int(11) DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_uniforme_x_empleado`
--

INSERT INTO `tbl_uniforme_x_empleado` (`id`, `fecha_entrega_uniforme`, `descripcion`, `id_empleado`, `id_talla_uniforme`, `activo`) VALUES
(1, '2015-01-15', 'Se le entrega el uniforme talla M', 1, 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contraseña` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `nombre`, `contraseña`, `id_rol`, `id_empleado`, `activo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, '1'),
(2, 'admin23', 'c289ffe12a30c94530b7fc4e532e2f42', 1, NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cursos`
--
ALTER TABLE `tbl_cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cursos_empleado`
--
ALTER TABLE `tbl_cursos_empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblcursosempleado_tblempleado_idempleado` (`id_empleado`),
  ADD KEY `fk_tblcursosempleado_tblcursos_idcurso` (`id_curso`);

--
-- Indexes for table `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblempleado_tblgradoacademico_idgradoacademico` (`id_grado_academico`),
  ADD KEY `fk_tblempleado_tblpuesto_idpuesto` (`id_puesto`),
  ADD KEY `fk_tblempleado_tblsexo_idsexo` (`id_sexo`),
  ADD KEY `fk_tblempleado_tblsucursal_idsucursal` (`id_sucursal`);

--
-- Indexes for table `tbl_grado_academico`
--
ALTER TABLE `tbl_grado_academico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_informacion_medica`
--
ALTER TABLE `tbl_informacion_medica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblinformacionmedica_tblempleado_idempleado` (`id_empleado`);

--
-- Indexes for table `tbl_lavanderia_x_uniforme`
--
ALTER TABLE `tbl_lavanderia_x_uniforme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbllavanderiaxuniforme_tblempleado_idempleado` (`id_empleado`);

--
-- Indexes for table `tbl_puesto`
--
ALTER TABLE `tbl_puesto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblpuesto_tbldepartamento_iddepartamneto` (`id_departamento`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sexo`
--
ALTER TABLE `tbl_sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sucursales`
--
ALTER TABLE `tbl_sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tallas_uniformes`
--
ALTER TABLE `tbl_tallas_uniformes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbltallasuniformes_tblsexo_idsexo` (`id_sexo`);

--
-- Indexes for table `tbl_uniforme_x_empleado`
--
ALTER TABLE `tbl_uniforme_x_empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbluniformexempleado_tblempleado_idempleado` (`id_empleado`),
  ADD KEY `fk_tbluniformexempleado_tbltallauniforme_idtallauniforme` (`id_talla_uniforme`);

--
-- Indexes for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblusuario_tblroles_idrol` (`id_rol`),
  ADD KEY `fk_tblusuario_tblempleado_idempleado` (`id_empleado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cursos`
--
ALTER TABLE `tbl_cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cursos_empleado`
--
ALTER TABLE `tbl_cursos_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_grado_academico`
--
ALTER TABLE `tbl_grado_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_informacion_medica`
--
ALTER TABLE `tbl_informacion_medica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_lavanderia_x_uniforme`
--
ALTER TABLE `tbl_lavanderia_x_uniforme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_puesto`
--
ALTER TABLE `tbl_puesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sexo`
--
ALTER TABLE `tbl_sexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sucursales`
--
ALTER TABLE `tbl_sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tallas_uniformes`
--
ALTER TABLE `tbl_tallas_uniformes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_uniforme_x_empleado`
--
ALTER TABLE `tbl_uniforme_x_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cursos_empleado`
--
ALTER TABLE `tbl_cursos_empleado`
  ADD CONSTRAINT `fk_tblcursosempleado_tblcursos_idcurso` FOREIGN KEY (`id_curso`) REFERENCES `tbl_cursos` (`id`),
  ADD CONSTRAINT `fk_tblcursosempleado_tblempleado_idempleado` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleado` (`id`);

--
-- Constraints for table `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD CONSTRAINT `fk_tblempleado_tblgradoacademico_idgradoacademico` FOREIGN KEY (`id_grado_academico`) REFERENCES `tbl_grado_academico` (`id`),
  ADD CONSTRAINT `fk_tblempleado_tblpuesto_idpuesto` FOREIGN KEY (`id_puesto`) REFERENCES `tbl_puesto` (`id`),
  ADD CONSTRAINT `fk_tblempleado_tblsexo_idsexo` FOREIGN KEY (`id_sexo`) REFERENCES `tbl_sexo` (`id`),
  ADD CONSTRAINT `fk_tblempleado_tblsucursal_idsucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `tbl_sucursales` (`id`);

--
-- Constraints for table `tbl_informacion_medica`
--
ALTER TABLE `tbl_informacion_medica`
  ADD CONSTRAINT `fk_tblinformacionmedica_tblempleado_idempleado` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleado` (`id`);

--
-- Constraints for table `tbl_lavanderia_x_uniforme`
--
ALTER TABLE `tbl_lavanderia_x_uniforme`
  ADD CONSTRAINT `fk_tbllavanderiaxuniforme_tblempleado_idempleado` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleado` (`id`);

--
-- Constraints for table `tbl_puesto`
--
ALTER TABLE `tbl_puesto`
  ADD CONSTRAINT `fk_tblpuesto_tbldepartamento_iddepartamneto` FOREIGN KEY (`id_departamento`) REFERENCES `tbl_departamento` (`id`);

--
-- Constraints for table `tbl_tallas_uniformes`
--
ALTER TABLE `tbl_tallas_uniformes`
  ADD CONSTRAINT `fk_tbltallasuniformes_tblsexo_idsexo` FOREIGN KEY (`id_sexo`) REFERENCES `tbl_sexo` (`id`);

--
-- Constraints for table `tbl_uniforme_x_empleado`
--
ALTER TABLE `tbl_uniforme_x_empleado`
  ADD CONSTRAINT `fk_tbluniformexempleado_tblempleado_idempleado` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleado` (`id`),
  ADD CONSTRAINT `fk_tbluniformexempleado_tbltallauniforme_idtallauniforme` FOREIGN KEY (`id_talla_uniforme`) REFERENCES `tbl_tallas_uniformes` (`id`);

--
-- Constraints for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `fk_tblusuario_tblempleado_idempleado` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleado` (`id`),
  ADD CONSTRAINT `fk_tblusuario_tblroles_idrol` FOREIGN KEY (`id_rol`) REFERENCES `tbl_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
