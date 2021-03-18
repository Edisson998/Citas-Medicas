-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2020 a las 01:33:33
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `citasmedicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_canton`
--

CREATE TABLE `tbl_canton` (
  `CAN_ID` int(11) NOT NULL,
  `PRO_ID` int(11) DEFAULT NULL,
  `CAN_DESCRIPCION` varchar(100) DEFAULT NULL,
  `CAN_ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cita`
--

CREATE TABLE `tbl_cita` (
  `CIT_ID` int(11) NOT NULL,
  `ESP_ID` int(11) DEFAULT NULL,
  `MED_ID` int(11) DEFAULT NULL,
  `PAC_ID` int(11) DEFAULT NULL,
  `CIT_FECHA` date DEFAULT NULL,
  `CIT_HORA_INICIO` varchar(20) DEFAULT NULL,
  `CIT_HORA_FIN` varchar(20) DEFAULT NULL,
  `CIT_OBSERVACIONES` varchar(500) DEFAULT NULL,
  `CIT_ESTADO` char(20) DEFAULT NULL,
  `CIT_CREACION_REGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `EMP_ID` int(11) NOT NULL,
  `EMP_RAZON_SOCIAL` varchar(500) DEFAULT NULL,
  `EMP_DIRECCION` varchar(500) DEFAULT NULL,
  `EMP_CORREO` varchar(150) DEFAULT NULL,
  `EMP_TELEFONO` varchar(13) DEFAULT NULL,
  `EMP_ESTADO` char(1) DEFAULT NULL,
  `EMP_CREACION_REGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_especialidades`
--

CREATE TABLE `tbl_especialidades` (
  `ESP_ID` int(11) NOT NULL,
  `EP_DESCRIPCION` varchar(150) DEFAULT NULL,
  `ESP_ESTADO` char(1) DEFAULT NULL,
  `ESP_CREACION_REGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_especialidades`
--

INSERT INTO `tbl_especialidades` (`ESP_ID`, `EP_DESCRIPCION`, `ESP_ESTADO`, `ESP_CREACION_REGISTRO`) VALUES
(1, 'Médico General', 'A', '2020-10-31 20:56:13'),
(2, 'Ginecólogo', 'A', '2020-10-31 20:56:48'),
(3, 'Otorrinolaringologo', 'A', '2020-10-31 20:57:05'),
(4, 'Pedíatra', 'A', '2020-10-31 20:57:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horario`
--

CREATE TABLE `tbl_horario` (
  `HOR_ID` int(11) NOT NULL,
  `MED_ID` int(11) DEFAULT NULL,
  `HOR_FECHA` date DEFAULT NULL,
  `HOR_INGRESO` varchar(20) DEFAULT NULL,
  `HOR_SALIDA` varchar(20) DEFAULT NULL,
  `HOR_ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_medico`
--

CREATE TABLE `tbl_medico` (
  `MED_ID` int(11) NOT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  `ESP_ID` int(11) DEFAULT NULL,
  `MED_NOMBRES` varchar(150) DEFAULT NULL,
  `MED_P_APELLIDO` varchar(150) DEFAULT NULL,
  `MED_S_APELLIDO` varchar(150) DEFAULT NULL,
  `MED_GENERO` char(2) DEFAULT NULL,
  `MED_FECHA_NAC` date DEFAULT NULL,
  `MED_DIRECCION` varchar(500) DEFAULT NULL,
  `MED_CORREO` varchar(200) DEFAULT NULL,
  `MED_TELEFONO` varchar(13) DEFAULT NULL,
  `MED_TIPO_DNI` char(2) DEFAULT NULL,
  `MED_DNI` varchar(15) DEFAULT NULL,
  `MED_ESTADO` char(1) DEFAULT NULL,
  `MED_CREACION_REGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_medico`
--

INSERT INTO `tbl_medico` (`MED_ID`, `EMP_ID`, `ESP_ID`, `MED_NOMBRES`, `MED_P_APELLIDO`, `MED_S_APELLIDO`, `MED_GENERO`, `MED_FECHA_NAC`, `MED_DIRECCION`, `MED_CORREO`, `MED_TELEFONO`, `MED_TIPO_DNI`, `MED_DNI`, `MED_ESTADO`, `MED_CREACION_REGISTRO`) VALUES
(1, NULL, 1, 'Lenin', 'Campoverde', 'Antaneda', 'Ma', '2020-10-02', 'Cotocollao', 'lenin@gmail.com', '984667155', 'P', 'POSD-1726', 'A', '2020-10-24 17:03:14'),
(2, NULL, 2, 'Mirko', 'Viteri', 'Salarza', 'Ma', '2020-10-23', 'Argelia', 'cerdito1998@hotmail.com', '985874455', 'RU', '1728596985001', 'A', '2020-10-25 00:00:00'),
(3, NULL, 3, 'Pepe', 'Chalen', 'Gorrion', 'Ma', '2020-10-23', 'Solanda', 'cerdito1998@hotmail.com', '985874455', 'C', '1728596985', 'I', '2020-10-25 00:00:00'),
(4, NULL, 3, 'Patty', 'Bastidas', 'Intriago', 'Ma', '2020-10-16', 'cordova', 'patty@gmail.com', '985820000', 'C', '1755626962', 'I', '2020-10-29 00:00:00'),
(5, NULL, 2, 'Danilo', 'Pacas', 'Portilo', 'Ma', '2020-10-08', 'Las malvas', 'danilo@gmail.com', '984667150', 'C', '1728859696', 'A', '2020-10-29 00:00:00'),
(6, NULL, 3, 'Maria', 'Clerque', 'Santamaria', 'Ma', '2020-10-04', 'Guamani', 'mariaclerque@gmail.com', '952525412', 'P', 'PRD-17455', 'A', '2020-10-29 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_paciente`
--

CREATE TABLE `tbl_paciente` (
  `PAC_ID` int(11) NOT NULL,
  `PAC_NOMBRES` varchar(150) DEFAULT NULL,
  `PAC_P_APELLIDO` varchar(150) DEFAULT NULL,
  `PAC_S_APELLIDO` varchar(150) DEFAULT NULL,
  `PAC_GENERO` char(2) DEFAULT NULL,
  `PAC_FECHA_NAC` date DEFAULT NULL,
  `PAC_DIRECCION` varchar(500) DEFAULT NULL,
  `PAC_CORREO` varchar(200) DEFAULT NULL,
  `PAC_TELEFONO` varchar(12) DEFAULT NULL,
  `PAC_TIPO_DNI` char(2) DEFAULT NULL,
  `PAC_DNI` varchar(15) DEFAULT NULL,
  `PAC_ESTADO` char(1) DEFAULT NULL,
  `PAC_CREACION_REGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_parroquia`
--

CREATE TABLE `tbl_parroquia` (
  `PAR_ID` int(11) NOT NULL,
  `CAN_ID` int(11) DEFAULT NULL,
  `PAC_ID` int(11) DEFAULT NULL,
  `PAR_DESCRIPCION` varchar(100) DEFAULT NULL,
  `PAR_ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_provincia`
--

CREATE TABLE `tbl_provincia` (
  `PRO_ID` int(11) NOT NULL,
  `PRO_DESCRIPCION` varchar(100) DEFAULT NULL,
  `PRO_ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `ROL_ID` int(11) NOT NULL,
  `ROL_DESCRIPCION` varchar(150) DEFAULT NULL,
  `ROL_ESTADO` char(1) DEFAULT NULL,
  `ROL_CREACION_REGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`ROL_ID`, `ROL_DESCRIPCION`, `ROL_ESTADO`, `ROL_CREACION_REGISTRO`) VALUES
(1, 'Administrador', 'A', '2020-10-31 21:02:15'),
(2, 'Recepcionista', 'A', '2020-10-31 21:02:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sucursal`
--

CREATE TABLE `tbl_sucursal` (
  `SUC_ID` int(11) NOT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  `SUC_DESCRIPCION` varchar(150) DEFAULT NULL,
  `SUC_DIRECCION` varchar(500) DEFAULT NULL,
  `SUC_TELEFONO` varchar(13) DEFAULT NULL,
  `SUC_ESTADO` char(1) DEFAULT NULL,
  `SUC_CREACION_REGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `USU_ID` int(11) NOT NULL,
  `ROL_ID` int(11) DEFAULT NULL,
  `USU_CORREO` varchar(200) DEFAULT NULL,
  `USU_CLAVE` varchar(100) DEFAULT NULL,
  `USU_NOMBRES` varchar(150) DEFAULT NULL,
  `USU_P_PELLIDO` varchar(150) DEFAULT NULL,
  `USU_S_APELLIDO` varchar(150) DEFAULT NULL,
  `USU_ESTADO` char(1) DEFAULT NULL,
  `USU_CREACION_REGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`USU_ID`, `ROL_ID`, `USU_CORREO`, `USU_CLAVE`, `USU_NOMBRES`, `USU_P_PELLIDO`, `USU_S_APELLIDO`, `USU_ESTADO`, `USU_CREACION_REGISTRO`) VALUES
(1, 1, 'edison', 'Efnc1726', 'Edison Fabricio', 'Narváez', 'Cedeño', 'A', '2020-10-31 21:03:16'),
(2, 2, 'fabricio', 'Efnc1726', 'Fabricio Martin', 'Polo', 'Galarza', 'A', '2020-11-07 17:14:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_canton`
--
ALTER TABLE `tbl_canton`
  ADD PRIMARY KEY (`CAN_ID`),
  ADD KEY `FK_RELATIONSHIP_9` (`PRO_ID`);

--
-- Indices de la tabla `tbl_cita`
--
ALTER TABLE `tbl_cita`
  ADD PRIMARY KEY (`CIT_ID`),
  ADD KEY `FK_RELATIONSHIP_12` (`ESP_ID`),
  ADD KEY `FK_RELATIONSHIP_6` (`PAC_ID`),
  ADD KEY `FK_RELATIONSHIP_7` (`MED_ID`);

--
-- Indices de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- Indices de la tabla `tbl_especialidades`
--
ALTER TABLE `tbl_especialidades`
  ADD PRIMARY KEY (`ESP_ID`);

--
-- Indices de la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  ADD PRIMARY KEY (`HOR_ID`),
  ADD KEY `FK_RELATIONSHIP_5` (`MED_ID`);

--
-- Indices de la tabla `tbl_medico`
--
ALTER TABLE `tbl_medico`
  ADD PRIMARY KEY (`MED_ID`),
  ADD KEY `FK_RELATIONSHIP_3` (`ESP_ID`),
  ADD KEY `FK_RELATIONSHIP_4` (`EMP_ID`);

--
-- Indices de la tabla `tbl_paciente`
--
ALTER TABLE `tbl_paciente`
  ADD PRIMARY KEY (`PAC_ID`);

--
-- Indices de la tabla `tbl_parroquia`
--
ALTER TABLE `tbl_parroquia`
  ADD PRIMARY KEY (`PAR_ID`),
  ADD KEY `FK_RELATIONSHIP_10` (`PAC_ID`),
  ADD KEY `FK_RELATIONSHIP_11` (`CAN_ID`);

--
-- Indices de la tabla `tbl_provincia`
--
ALTER TABLE `tbl_provincia`
  ADD PRIMARY KEY (`PRO_ID`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`ROL_ID`);

--
-- Indices de la tabla `tbl_sucursal`
--
ALTER TABLE `tbl_sucursal`
  ADD PRIMARY KEY (`SUC_ID`),
  ADD KEY `FK_RELATIONSHIP_2` (`EMP_ID`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`USU_ID`),
  ADD KEY `FK_RELATIONSHIP_1` (`ROL_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_canton`
--
ALTER TABLE `tbl_canton`
  MODIFY `CAN_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_cita`
--
ALTER TABLE `tbl_cita`
  MODIFY `CIT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_especialidades`
--
ALTER TABLE `tbl_especialidades`
  MODIFY `ESP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  MODIFY `HOR_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_medico`
--
ALTER TABLE `tbl_medico`
  MODIFY `MED_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_paciente`
--
ALTER TABLE `tbl_paciente`
  MODIFY `PAC_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_parroquia`
--
ALTER TABLE `tbl_parroquia`
  MODIFY `PAR_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_provincia`
--
ALTER TABLE `tbl_provincia`
  MODIFY `PRO_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `ROL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_sucursal`
--
ALTER TABLE `tbl_sucursal`
  MODIFY `SUC_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `USU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_canton`
--
ALTER TABLE `tbl_canton`
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`PRO_ID`) REFERENCES `tbl_provincia` (`PRO_ID`);

--
-- Filtros para la tabla `tbl_cita`
--
ALTER TABLE `tbl_cita`
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`ESP_ID`) REFERENCES `tbl_especialidades` (`ESP_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`PAC_ID`) REFERENCES `tbl_paciente` (`PAC_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`MED_ID`) REFERENCES `tbl_medico` (`MED_ID`);

--
-- Filtros para la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`MED_ID`) REFERENCES `tbl_medico` (`MED_ID`);

--
-- Filtros para la tabla `tbl_medico`
--
ALTER TABLE `tbl_medico`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ESP_ID`) REFERENCES `tbl_especialidades` (`ESP_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`EMP_ID`) REFERENCES `tbl_empresa` (`EMP_ID`);

--
-- Filtros para la tabla `tbl_parroquia`
--
ALTER TABLE `tbl_parroquia`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`PAC_ID`) REFERENCES `tbl_paciente` (`PAC_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`CAN_ID`) REFERENCES `tbl_canton` (`CAN_ID`);

--
-- Filtros para la tabla `tbl_sucursal`
--
ALTER TABLE `tbl_sucursal`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`EMP_ID`) REFERENCES `tbl_empresa` (`EMP_ID`);

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ROL_ID`) REFERENCES `tbl_rol` (`ROL_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
