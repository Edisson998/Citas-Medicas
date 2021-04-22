-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2021 a las 18:11:10
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
-- Estructura Stand-in para la vista `reportecita`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `reportecita` (
`CIT_ID` int(11)
,`EP_DESCRIPCION` varchar(150)
,`Nombres` varchar(301)
,`NombresP` varchar(301)
,`start` date
);

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
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `CIT_OBSERVACIONES` varchar(500) DEFAULT NULL,
  `CIT_ESTADO` char(20) DEFAULT NULL,
  `CIT_CREACION_REGISTRO` datetime DEFAULT NULL,
  `textColor` varchar(20) DEFAULT NULL,
  `CIT_ESTADO_CITA` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_cita`
--

INSERT INTO `tbl_cita` (`CIT_ID`, `ESP_ID`, `MED_ID`, `PAC_ID`, `start`, `end`, `CIT_OBSERVACIONES`, `CIT_ESTADO`, `CIT_CREACION_REGISTRO`, `textColor`, `CIT_ESTADO_CITA`) VALUES
(1, 3, 3, 1, '2021-03-22 13:30:00', '2021-03-22 13:30:00', 'Venir con muestras y en ayunas', 'A', '2021-01-21 00:00:00', '#00FF00', 'PA'),
(10, 2, 5, 1, '2021-03-22 10:30:00', '2021-03-22 10:30:00', '', 'A', '2021-01-21 00:00:00', '#00FF00', 'PA'),
(58, 3, 4, 2, '2021-03-22 12:30:00', '2021-03-22 12:30:00', '', 'A', '2021-01-21 00:00:00', '#00FF00', 'PA'),
(69, 3, 6, 3, '2021-03-22 14:30:00', '2021-03-22 14:30:00', '', 'A', '2021-03-11 00:00:00', '#00FF00', 'PA'),
(70, 6, 7, 4, '2021-03-22 10:30:00', '2021-03-22 10:30:00', 'Venir en ayunas', 'A', '2021-03-12 00:00:00', '#00FF00', 'PA'),
(72, 7, 7, 5, '2021-03-17 10:30:00', '2021-03-17 10:30:00', 'el paciente debe venir en ayunas', 'A', '2021-03-26 00:00:00', '#00FF00', 'PA'),
(76, 3, 4, 1, '2021-03-19 10:00:00', '2021-03-19 10:00:00', '', 'A', '2021-03-31 00:00:00', '#00FF00', 'PA'),
(77, 4, 8, 3, '2021-03-18 10:00:00', '2021-03-18 10:00:00', '', 'A', '2021-03-31 00:00:00', '#00FF00', 'PA'),
(79, 6, 7, 2, '2021-04-24 10:40:00', '2021-04-24 10:40:00', '', 'A', '2021-04-04 00:00:00', '#00FF00', 'PA');

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
(2, 'Ginecología', 'A', '2020-10-31 20:56:48'),
(3, 'Otorrinolaringología', 'A', '2020-10-31 20:57:05'),
(4, 'Pedíatra', 'A', '2020-10-31 20:57:18'),
(6, 'Odontología', 'A', '2021-03-12 00:00:00'),
(7, 'Podología', 'A', '2021-03-18 00:00:00'),
(9, 'Medicina General', 'A', '2021-04-20 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horario`
--

CREATE TABLE `tbl_horario` (
  `HOR_ID` int(11) NOT NULL,
  `MED_ID` int(11) DEFAULT NULL,
  `HOR_DIA_INGRESO` varchar(50) DEFAULT NULL,
  `HOR_DIA_SALIDA` varchar(20) DEFAULT NULL,
  `HOR_HORA_INGRESO` varchar(20) DEFAULT NULL,
  `HOR_HORA_SALIDA` varchar(20) DEFAULT NULL,
  `HOR_ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_horario`
--

INSERT INTO `tbl_horario` (`HOR_ID`, `MED_ID`, `HOR_DIA_INGRESO`, `HOR_DIA_SALIDA`, `HOR_HORA_INGRESO`, `HOR_HORA_SALIDA`, `HOR_ESTADO`) VALUES
(2, 7, 'Lu', 'Mi', '15:48', '17:50', 'A'),
(3, 2, 'Ma', 'Sa', '14:45', '17:50', 'A'),
(4, 6, 'Mi', 'Do', '13:30', '20:30', 'A'),
(5, 4, 'Mi', 'Sa', '13:30', '17:30', 'A'),
(7, 5, 'Ma', 'Sa', '10:30', '16:30', 'A'),
(8, 8, 'Ju', 'Do', '08:00', '14:00', 'A');

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
(2, NULL, 2, 'Mirko', 'Viteri', 'Salarza', 'Ma', '2020-10-23', 'Argelia', 'cerdito1998@hotmail.com', '985874455', 'R', '1728596985001', 'A', '2020-10-25 00:00:00'),
(3, NULL, 7, 'Pepe', 'Chalen', 'Gorrion', 'Ma', '2020-10-23', 'Solanda', 'cerdito1998@hotmail.com', '985874455', 'Cé', '1728596985', 'A', '2020-10-25 00:00:00'),
(4, NULL, 3, 'Patty', 'Bastidas', 'Intriago', 'F', '2020-10-16', 'cordova', 'patty@gmail.com', '985820000', 'RU', '1755626962', 'A', '2020-10-29 00:00:00'),
(5, NULL, 2, 'Danilo', 'Pacas', 'Portillo', 'Ma', '2020-10-08', 'La keneddy', 'danilo@gmail.com', '984667150', 'RU', '1728859657', 'A', '2020-10-29 00:00:00'),
(6, NULL, 3, 'Maria', 'Clerque', 'Santamaria', 'F', '2020-10-04', 'Guamani', 'mariaclerque@gmail.com', '952525412', 'P', 'PRD-17455', 'A', '2020-10-29 00:00:00'),
(7, NULL, 6, 'Paul', 'Barrionuevo', 'Cajas', 'M', '1965-03-04', 'Conocoto', 'paul@medicenter.com', '965826578', 'R', '1726285964001', 'A', '2021-03-12 00:00:00'),
(8, NULL, 4, 'Matias', 'Castro', 'Villareal', 'Ma', '1992-03-12', 'Cotocollao', 'mati@gmail.com', '9874569888', 'RU', '172368974', 'A', '2021-03-18 00:00:00');

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

--
-- Volcado de datos para la tabla `tbl_paciente`
--

INSERT INTO `tbl_paciente` (`PAC_ID`, `PAC_NOMBRES`, `PAC_P_APELLIDO`, `PAC_S_APELLIDO`, `PAC_GENERO`, `PAC_FECHA_NAC`, `PAC_DIRECCION`, `PAC_CORREO`, `PAC_TELEFONO`, `PAC_TIPO_DNI`, `PAC_DNI`, `PAC_ESTADO`, `PAC_CREACION_REGISTRO`) VALUES
(1, 'Camilo', 'Paz', 'Villacrez', 'M', '1997-11-06', 'Av Venezuela y nicaragua', 'camilo@hotmail.com', '987458698', 'C', '1726587632', 'A', '2021-01-21 00:00:00'),
(2, 'Maria del Carmen', 'Benalcazar', 'Zurita', 'F', '1995-01-01', 'Av Quitumbe ñam y felicio angulo', 'mari@hotmail.com', '986974562', 'C', '1726274896', 'A', '2021-01-22 00:00:00'),
(3, 'Valentina', 'Rojas', 'Ramirez', 'F', '1985-12-31', 'Manabi y roca fuerte', 'vale@hotmail.com', '974856856', 'C', '1726270437', 'A', '2021-02-02 00:00:00'),
(4, 'Maribel', 'Macias', 'Vargas', 'F', '2000-03-01', 'Fenicio Angulo y Quitumbe ñan ', 'mari@hotmail.com', '984285588', 'C', '1726270428', 'A', '2021-03-12 00:00:00'),
(5, 'Angel', 'Fabiani', 'Palma', 'M', '1998-08-21', 'La santiago', 'angel@gmail.com', '9856745636', 'P', 'padsd58856', 'A', '2021-03-26 00:00:00'),
(6, 'Alberto ', 'Aguilera', 'Morejon', 'M', '1980-02-08', 'Av teniente hugo ortiz y av solanda', 'albertito@hotmail.com', '958636589', 'C', '1458969856', 'A', '2021-04-22 00:00:00');

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
(2, 1, 'edison', 'NTgzYjQ2MGI0MzZmNGUxNGQ2YmNiYWY4NjVmODE1ZDY=', 'Edison ', 'Narváez', 'Cedeño', 'A', '2020-11-07 17:14:55'),
(8, 2, 'recepcion@hotmail.com', 'NjNmMGNiNjE5YmQ1Y2FmZDdhYjhkNTc0YmZlMDgxZDg=', 'Steven', 'Castro', 'Morillo', 'A', '2021-04-17 00:00:00');

-- --------------------------------------------------------

--
-- Estructura para la vista `reportecita`
--
DROP TABLE IF EXISTS `reportecita`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reportecita`  AS  select `tbl_cita`.`CIT_ID` AS `CIT_ID`,`tbl_especialidades`.`EP_DESCRIPCION` AS `EP_DESCRIPCION`,concat(`tbl_medico`.`MED_NOMBRES`,' ',`tbl_medico`.`MED_P_APELLIDO`) AS `Nombres`,concat(`tbl_paciente`.`PAC_NOMBRES`,' ',`tbl_paciente`.`PAC_P_APELLIDO`) AS `NombresP`,cast(`tbl_cita`.`start` as date) AS `start` from (((`tbl_cita` join `tbl_medico` on(`tbl_cita`.`MED_ID` = `tbl_medico`.`MED_ID`)) join `tbl_especialidades` on(`tbl_cita`.`ESP_ID` = `tbl_especialidades`.`ESP_ID`)) join `tbl_paciente` on(`tbl_cita`.`PAC_ID` = `tbl_paciente`.`PAC_ID`)) ;

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
  MODIFY `CIT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_especialidades`
--
ALTER TABLE `tbl_especialidades`
  MODIFY `ESP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  MODIFY `HOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_medico`
--
ALTER TABLE `tbl_medico`
  MODIFY `MED_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_paciente`
--
ALTER TABLE `tbl_paciente`
  MODIFY `PAC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `USU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
