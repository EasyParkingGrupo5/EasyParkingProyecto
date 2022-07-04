-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2021 a las 01:21:17
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `easyparking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `empId` int(11) NOT NULL COMMENT 'Nos muetsra el Id de la tabla persona',
  `empNumeroDocumento` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nos muestra el documento de la persona',
  `empPrimerNombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nos muestra el nombre de la persona',
  `empSegundoNombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empPrimerApellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nos muestra el apellido de la persona',
  `empSegundoApellido` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empTelefono` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `empTipoSangre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `empRh` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `empEstado` tinyint(1) NOT NULL DEFAULT 1,
  `empUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_created_at` timestamp NULL DEFAULT current_timestamp(),
  `emp_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_s_usuId` int(11) NOT NULL,
  `Tipos_Documentos_tipDocId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Esta tabla nos muestra los datos de la persona ';

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`empId`, `empNumeroDocumento`, `empPrimerNombre`, `empSegundoNombre`, `empPrimerApellido`, `empSegundoApellido`, `empTelefono`, `empTipoSangre`, `empRh`, `empEstado`, `empUsuSesion`, `emp_created_at`, `emp_updated_at`, `usuario_s_usuId`, `Tipos_Documentos_tipDocId`) VALUES
(1, '147', 'Camilo', 'Andres', 'Boada', 'Merchan', '3153854741', 'O', 'NEGATIVO', 1, NULL, '2021-09-02 04:32:34', '2021-09-10 03:19:53', 1, 2),
(2, '1010004241', 'Deinny', '', 'Boada', 'Merchan', '2095910', 'O', 'NEGATIVO', 1, NULL, '2021-09-02 05:28:32', '2021-09-17 17:36:23', 2, 1),
(3, '52197598', 'Nubia', '', 'Merchan', 'Monroy', '2095910', 'O', 'POSITIVO', 1, NULL, '2021-09-03 22:51:44', '2021-09-18 07:31:26', 3, 4),
(9, '1234567', 'Henry', 'Alfonso', 'Garzon', 'Sanchez', '123456', 'A', 'POSITIVO', 1, NULL, '2021-09-20 01:35:35', '2021-09-20 01:35:35', 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rolId` int(11) NOT NULL,
  `rolNombre` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `rolDescripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rolEstado` tinyint(1) NOT NULL DEFAULT 1,
  `rolUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol_created_at` timestamp NULL DEFAULT current_timestamp(),
  `rol_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rolId`, `rolNombre`, `rolDescripcion`, `rolEstado`, `rolUsuSesion`, `rol_created_at`, `rol_updated_at`) VALUES
(1, 'Administrador', 'Administrador', 1, NULL, '2019-06-07 15:18:36', '2021-09-09 21:23:26'),
(2, 'Empleado', 'Empleado', 1, NULL, '2019-06-07 15:18:57', '2021-09-20 01:21:30'),
(3, 'Cliente', 'Cliente', 0, NULL, '2019-06-07 15:19:16', '2021-09-20 01:21:35'),
(4, 'Vendedor', 'Vendedor', 0, NULL, '2019-06-07 15:19:35', '2021-09-09 17:20:00'),
(5, 'Almacenista', 'Almacenista', 0, NULL, '2019-06-07 15:20:42', '2021-09-09 16:54:41'),
(6, 'General', 'Rol provisional', 1, 'null', '2000-12-02 06:23:00', '2021-09-09 16:53:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `tarId` int(11) NOT NULL,
  `tarTipoVehiculo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tarValorTarifa` int(11) NOT NULL,
  `tarEstado` tinyint(1) NOT NULL DEFAULT 1,
  `tar_created_at` timestamp NULL DEFAULT current_timestamp(),
  `tar_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tarUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`tarId`, `tarTipoVehiculo`, `tarValorTarifa`, `tarEstado`, `tar_created_at`, `tar_updated_at`, `tarUsuSesion`) VALUES
(1, 'Camioneta', 32, 1, '2021-06-21 17:25:03', '2021-09-22 17:59:59', 'cristian'),
(2, 'Motocicleta', 43, 1, '2021-06-21 17:25:03', '2021-09-22 18:00:14', 'camina'),
(3, 'Cicla', 5, 1, '2021-05-03 14:25:36', '2021-09-18 22:17:12', 'julian'),
(4, 'Carro', 52, 1, '2021-11-26 06:26:45', '2021-09-18 21:35:04', 'juan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `ticNumero` int(11) NOT NULL,
  `ticFecha` date NOT NULL,
  `ticHoraIngreso` time NOT NULL,
  `ticHoraSalida` time DEFAULT NULL,
  `ticValorFinal` int(11) DEFAULT NULL,
  `ticEstado` tinyint(1) DEFAULT 1,
  `tic_created_at` timestamp NULL DEFAULT current_timestamp(),
  `tic_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ticUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Empleados_empId` int(11) NOT NULL,
  `Tarifas_tarId` int(11) NOT NULL,
  `Vehiculos_vehId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`ticNumero`, `ticFecha`, `ticHoraIngreso`, `ticHoraSalida`, `ticValorFinal`, `ticEstado`, `tic_created_at`, `tic_updated_at`, `ticUsuSesion`, `Empleados_empId`, `Tarifas_tarId`, `Vehiculos_vehId`) VALUES
(1, '2021-09-10', '17:14:03', '17:51:00', 1100, 0, '2021-09-11 01:32:31', '2021-09-15 23:08:14', NULL, 1, 4, 1),
(2, '2021-09-11', '03:34:00', '18:17:00', 27400, 0, '2021-09-11 02:56:33', '2021-09-16 20:54:14', NULL, 2, 4, 1),
(5, '2021-09-11', '17:46:00', '18:22:00', 1100, 0, '2021-09-11 23:02:11', '2021-09-16 20:54:17', NULL, 3, 4, 1),
(6, '2021-09-11', '18:14:00', '18:22:00', 200, 0, '2021-09-11 23:14:38', '2021-09-15 23:25:56', NULL, 3, 4, 1),
(9, '2021-09-14', '11:35:00', '18:28:00', 5000, 0, '2021-09-14 16:35:20', '2021-09-15 23:28:31', NULL, 3, 2, 3),
(10, '2021-09-14', '11:35:00', '18:09:00', 4700, 0, '2021-09-14 16:39:55', '2021-09-15 23:09:53', NULL, 3, 2, 3),
(11, '2021-09-14', '11:35:00', '18:10:00', 4700, 0, '2021-09-14 16:40:06', '2021-09-15 23:10:19', NULL, 3, 2, 3),
(12, '2021-09-14', '11:56:00', '18:11:00', 12000, 0, '2021-09-14 16:56:12', '2021-09-15 23:11:35', NULL, 1, 1, 4),
(13, '0000-00-00', '00:00:00', '18:11:00', 34900, 0, '2021-09-14 17:01:38', '2021-09-15 23:12:15', NULL, 1, 1, 4),
(14, '2021-09-14', '05:14:00', '18:12:00', 24900, 0, '2021-09-15 00:41:25', '2021-09-15 23:14:44', NULL, 1, 1, 1),
(15, '2021-09-14', '10:00:00', '18:14:00', 15300, 0, '2021-09-15 01:30:07', '2021-09-15 23:17:42', NULL, 1, 4, 1),
(16, '2021-09-15', '18:28:00', '18:30:00', 100, 0, '2021-09-15 23:28:48', '2021-09-15 23:33:29', NULL, 1, 1, 1),
(32, '2021-09-15', '21:37:00', '22:37:00', 1900, 0, '2021-09-16 02:37:21', '2021-09-16 02:39:10', NULL, 1, 4, 1),
(33, '2021-09-15', '21:40:00', '21:45:00', 200, 0, '2021-09-16 02:40:34', '2021-09-16 02:45:46', NULL, 1, 4, 5),
(34, '2021-09-16', '12:26:00', '14:31:00', 3900, 0, '2021-09-16 17:27:36', '2021-09-16 17:35:08', NULL, 1, 4, 1),
(35, '2021-09-16', '18:00:00', '21:03:00', 5900, 0, '2021-09-16 23:00:55', '2021-09-16 23:08:33', NULL, 1, 1, 1),
(36, '2021-09-18', '00:27:00', '04:28:00', 7700, 0, '2021-09-18 05:27:49', '2021-09-18 05:28:28', NULL, 1, 1, 1),
(37, '2021-09-18', '02:19:00', '05:20:00', 5600, 0, '2021-09-18 07:19:38', '2021-09-18 07:25:21', NULL, 1, 4, 1),
(38, '2021-09-18', '19:32:00', '23:32:00', 7700, 0, '2021-09-19 00:32:04', '2021-09-19 00:32:24', NULL, 1, 1, 1),
(66, '2021-09-20', '15:59:00', '21:00:00', 9600, 0, '2021-09-20 20:59:09', '2021-09-20 21:00:09', NULL, 1, 1, 1),
(67, '2021-09-20', '16:36:00', '18:11:00', 4900, 0, '2021-09-20 21:36:23', '2021-09-20 23:11:43', NULL, 2, 4, 6),
(68, '2021-09-20', '16:37:00', '20:39:00', 12600, 0, '2021-09-20 21:37:34', '2021-09-20 21:39:49', NULL, 2, 4, 6),
(69, '2021-09-20', '17:45:00', '18:12:00', 900, 0, '2021-09-20 22:45:19', '2021-09-20 23:12:55', NULL, 3, 1, 1),
(70, '2021-09-20', '18:13:00', '20:14:00', 3900, 0, '2021-09-20 23:13:26', '2021-09-20 23:15:02', NULL, 3, 1, 1),
(71, '2021-09-20', '18:15:00', '21:15:00', 5800, 0, '2021-09-20 23:15:36', '2021-09-20 23:15:48', NULL, 3, 1, 1),
(72, '2021-09-20', '19:44:00', '23:49:00', 12700, 0, '2021-09-21 00:44:48', '2021-09-21 00:49:22', NULL, 1, 4, 7),
(73, '2021-09-20', '19:45:00', '12:45:00', 21800, 0, '2021-09-21 00:45:27', '2021-09-21 00:46:03', NULL, 1, 4, 7),
(74, '2021-09-20', '20:48:00', '21:48:00', 1900, 0, '2021-09-21 00:48:36', '2021-09-21 00:48:51', NULL, 3, 1, 7),
(75, '2021-09-20', '21:03:00', '23:10:00', 4100, 0, '2021-09-21 02:03:22', '2021-09-21 02:07:58', NULL, 2, 1, 8),
(76, '2021-09-20', '21:05:00', '23:07:00', 3900, 0, '2021-09-21 02:05:19', '2021-09-21 02:07:17', NULL, 3, 1, 1),
(77, '2021-09-21', '17:17:00', '12:06:00', 15000, 0, '2021-09-21 22:17:45', '2021-09-23 00:06:48', NULL, 1, 4, 1),
(78, '2021-09-22', '13:04:00', '16:08:00', 9600, 0, '2021-09-22 18:04:29', '2021-09-22 18:09:02', NULL, 1, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documentos`
--

CREATE TABLE `tipos_documentos` (
  `tipDocId` int(11) NOT NULL,
  `tipDocSigla` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipDocNombre_documento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipDocEstado` tinyint(1) DEFAULT 1,
  `tipDoc_created_at` timestamp NULL DEFAULT current_timestamp(),
  `tipDoc_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipDocUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_documentos`
--

INSERT INTO `tipos_documentos` (`tipDocId`, `tipDocSigla`, `tipDocNombre_documento`, `tipDocEstado`, `tipDoc_created_at`, `tipDoc_updated_at`, `tipDocUsuSesion`) VALUES
(1, 'C.C.', 'Cédula', 1, '2021-06-21 17:25:03', '2021-09-02 05:50:11', 'cristian'),
(2, 'T.I.', 'Tarjeta de Identidad', 1, '2021-06-21 17:25:03', '2021-09-10 17:17:40', 'camina'),
(3, 'NIT', 'Nit', 1, '2021-05-03 14:25:36', '2021-09-02 02:22:04', 'julian'),
(4, 'C.I', 'Cédula de extranjeria', 1, '2021-08-30 03:19:36', '2021-09-10 21:00:22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_s`
--

CREATE TABLE `usuario_s` (
  `usuId` int(11) NOT NULL,
  `usuLogin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuPassword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuEstado` tinyint(1) NOT NULL DEFAULT 1,
  `usuRemember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `usu_created_at` timestamp NULL DEFAULT current_timestamp(),
  `usu_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_s`
--

INSERT INTO `usuario_s` (`usuId`, `usuLogin`, `usuPassword`, `usuUsuSesion`, `usuEstado`, `usuRemember_token`, `usu_created_at`, `usu_updated_at`) VALUES
(1, 'camilo@hola.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2021-09-02 04:32:33', '2021-09-12 19:54:22'),
(2, 'deinny@gmail.com', 'eaa065edd7913d25992c9a077919d461', NULL, 1, '', '2021-09-02 05:28:31', '2021-09-02 05:28:31'),
(3, 'nubia@hola.com', 'cf7d4bdd2afbb023f0b265b3e99ba1f9', NULL, 1, '', '2021-09-03 22:51:44', '2021-09-03 22:51:44'),
(5, 'camilo@camilo.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2021-09-06 20:39:03', '2021-09-06 20:39:03'),
(6, 'camilo@12345.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2021-09-07 01:19:03', '2021-09-09 21:41:35'),
(9, 'profesor@admin.com', 'ea983c0d57e04e8d214f63e1228cbf15', NULL, 1, '1', '2021-09-20 01:35:35', '2021-09-20 01:35:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_s_roles`
--

CREATE TABLE `usuario_s_roles` (
  `id_usuario_s` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fechaUserRol` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `obsFechaUserRol` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuRolUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_s_roles`
--

INSERT INTO `usuario_s_roles` (`id_usuario_s`, `id_rol`, `estado`, `fechaUserRol`, `obsFechaUserRol`, `usuRolUsuSesion`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-09-12 19:24:01', NULL, NULL, '2021-09-02 04:32:34', '2021-09-12 19:24:01'),
(2, 6, 1, '2021-09-20 00:14:04', NULL, NULL, '2021-09-02 05:28:32', '2021-09-20 00:14:04'),
(3, 1, 1, '2021-09-24 19:11:39', NULL, NULL, '2021-09-03 22:51:44', '2021-09-24 19:11:39'),
(6, 6, 1, '2021-09-20 00:14:09', NULL, NULL, '2021-09-07 01:19:03', '2021-09-20 00:14:09'),
(9, 1, 1, '2021-09-20 01:36:33', NULL, NULL, '2021-09-20 01:35:35', '2021-09-20 01:36:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `vehId` int(11) NOT NULL,
  `vehNumero_Placa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vehColor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vehMarca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vehEstado` varchar(20) COLLATE utf8_unicode_ci DEFAULT '1',
  `vehUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehCreated_At` timestamp NULL DEFAULT current_timestamp(),
  `vehUpdated_At` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Empleados_empId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`vehId`, `vehNumero_Placa`, `vehColor`, `vehMarca`, `vehEstado`, `vehUsuSesion`, `vehCreated_At`, `vehUpdated_At`, `Empleados_empId`) VALUES
(1, 'HAX706', 'Negro', 'Chevrolet', '1', NULL, '2021-09-11 01:31:04', '2021-09-18 07:18:44', 2),
(3, 'REX123', 'Fucsia', 'Renault', '1', NULL, '2021-09-14 16:35:20', '2021-09-17 16:53:04', 3),
(4, 'ASD147', 'Negro', 'Toyota', '1', NULL, '2021-09-14 16:56:12', '2021-09-14 16:56:12', 1),
(5, 'AZX752', 'Rojo', 'Renault', '1', NULL, '2021-09-16 02:40:34', '2021-09-16 02:40:34', 1),
(6, 'AZW202', 'Amarrillo', 'Lamborgini', '1', NULL, '2021-09-20 21:36:22', '2021-09-20 21:36:22', 2),
(7, 'MAX500', 'Negro', 'Mazda', '1', NULL, '2021-09-21 00:44:48', '2021-09-21 00:44:48', 1),
(8, 'AER123', 'Negro', 'Toyota', '1', NULL, '2021-09-21 02:03:22', '2021-09-21 02:03:22', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`empId`,`usuario_s_usuId`,`Tipos_Documentos_tipDocId`),
  ADD UNIQUE KEY `uniq_documento` (`empNumeroDocumento`),
  ADD KEY `fk_Empleados_usuario_s1_idx` (`usuario_s_usuId`),
  ADD KEY `fk_Empleados_Tipos_Documentos1_idx` (`Tipos_Documentos_tipDocId`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rolId`),
  ADD UNIQUE KEY `uniq_nombrerol` (`rolNombre`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`tarId`),
  ADD UNIQUE KEY `tarTipoVehiculo_UNIQUE` (`tarTipoVehiculo`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticNumero`,`Empleados_empId`,`Tarifas_tarId`,`Vehiculos_vehId`),
  ADD KEY `fk_Tickets_Empleados1_idx` (`Empleados_empId`),
  ADD KEY `fk_Tickets_Tarifas1_idx` (`Tarifas_tarId`),
  ADD KEY `fk_Tickets_Vehiculos1_idx` (`Vehiculos_vehId`);

--
-- Indices de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  ADD PRIMARY KEY (`tipDocId`),
  ADD UNIQUE KEY `tipSigla_UNIQUE` (`tipDocSigla`);

--
-- Indices de la tabla `usuario_s`
--
ALTER TABLE `usuario_s`
  ADD PRIMARY KEY (`usuId`),
  ADD UNIQUE KEY `uniq_login` (`usuLogin`);

--
-- Indices de la tabla `usuario_s_roles`
--
ALTER TABLE `usuario_s_roles`
  ADD PRIMARY KEY (`id_usuario_s`,`id_rol`),
  ADD KEY `usuario_s_roles_fk_rolidrol` (`id_rol`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`vehId`,`Empleados_empId`),
  ADD UNIQUE KEY `VehNumero_Placa_UNIQUE` (`vehNumero_Placa`),
  ADD KEY `fk_Vehiculos_Empleados1_idx` (`Empleados_empId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `empId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Nos muetsra el Id de la tabla persona', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `tarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticNumero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  MODIFY `tipDocId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario_s`
--
ALTER TABLE `usuario_s`
  MODIFY `usuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario_s_roles`
--
ALTER TABLE `usuario_s_roles`
  MODIFY `id_usuario_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `vehId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_Empleados_Tipos_Documentos1` FOREIGN KEY (`Tipos_Documentos_tipDocId`) REFERENCES `tipos_documentos` (`tipDocId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleados_usuario_s1` FOREIGN KEY (`usuario_s_usuId`) REFERENCES `usuario_s` (`usuId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_Tickets_Empleados1` FOREIGN KEY (`Empleados_empId`) REFERENCES `empleados` (`empId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Tickets_Tarifas1` FOREIGN KEY (`Tarifas_tarId`) REFERENCES `tarifas` (`tarId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Tickets_Vehiculos1` FOREIGN KEY (`Vehiculos_vehId`) REFERENCES `vehiculos` (`vehId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_s_roles`
--
ALTER TABLE `usuario_s_roles`
  ADD CONSTRAINT `usuario_s_roles_fk_rolidrol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`rolId`),
  ADD CONSTRAINT `usuario_s_roles_fk_usuario_sid` FOREIGN KEY (`id_usuario_s`) REFERENCES `usuario_s` (`usuId`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_Vehiculos_Empleados1` FOREIGN KEY (`Empleados_empId`) REFERENCES `empleados` (`empId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
