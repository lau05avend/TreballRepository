

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--

-- --------------------------------------------------------

--
-- Table structure for table `actividads`
--

CREATE TABLE `actividads` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DescripcionActividad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `CantidadDias` tinyint UNSIGNED DEFAULT NULL,
  `isActive` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado_actividad_id` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `fase_tarea_id` tinyint UNSIGNED NOT NULL,
  `obra_id` bigint UNSIGNED NOT NULL,
  `color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actividads`
--

INSERT INTO `actividads` (`id`, `title`, `DescripcionActividad`, `start`, `end`, `CantidadDias`, `isActive`, `created_at`, `updated_at`, `estado_actividad_id`, `fase_tarea_id`, `obra_id`, `color`) VALUES
(1, 'Medir terreno', 'Se toman las medidas del terreno, de área, perímetro y adicionales que considere el ingeniero e instalador encargado.', '2021-08-15 00:00:00', '2021-08-16 00:00:00', 4, 'Inactive', '2021-02-11 17:00:00', NULL, 2, 1, 1, 'rgb(173 86 86)'),
(2, 'Llevar materiales', 'Se llevaran los materiales al lugar de la obra', '2021-08-06 00:00:00', '2021-08-10 00:00:00', 4, 'Active', '2021-08-06 17:00:00', '2021-10-27 10:38:59', 1, 1, 1, 'rgb(173 86 86)'),
(3, 'Preparacion de suelo', 'Se verificara que el suelo este apto para comenzar la instalacion', '2021-08-01 00:00:00', '2021-08-03 00:00:00', 4, 'Active', '2021-02-06 17:00:00', '2021-02-10 17:00:00', 1, 1, 1, 'rgb(173 86 86)'),
(4, 'Instalación basee', 'Se realiza la instalación de la base en el sitio de la obra. ACTUALIZADO', '2021-08-29 10:00:00', '2021-08-30 17:15:00', 4, 'Inactive', '2021-08-20 17:00:00', '2021-10-27 10:28:26', 4, 3, 3, 'rgb(173 86 86)'),
(5, 'Ultima verificacion', 'Se verifica el estado de la instalacion terminada', '2021-02-06 09:00:00', '2021-02-06 17:30:00', 4, 'Active', '2021-02-06 17:00:00', '2021-08-09 16:37:06', 4, 1, 1, 'rgb(173 86 86)'),
(6, 'Verificación de terreno', 'Se realiza la evaluación del resultado de la instalación, y la verificación de cumplimiento de todos los requisitos del cliente.', '2021-09-01 20:44:00', '2021-09-02 20:44:00', 2, 'Active', '2021-06-30 20:44:58', '2021-09-09 17:28:29', 3, 4, 15, 'rgb(173 86 86)'),
(7, 'Limpieza y culmino', 'Se recoge toda la maquinaria, herramienta y recursos utilizados para la obra, se deja listo el espacio para la entrega.', '2021-08-10 21:32:00', '2021-08-12 06:25:00', NULL, 'Active', '2021-06-30 20:50:33', '2021-08-09 16:21:26', 2, 5, 2, 'rgb(173 86 86)'),
(8, 'Entrega Materiales', 'Recibir los materiales y epdm del provedor.', '2021-09-05 07:55:00', '2021-09-05 16:00:00', NULL, 'Active', '2021-09-09 15:23:18', '2021-09-09 16:34:35', 2, 2, 11, 'rgb(173 86 86)'),
(9, 'Recoger materiales', 'Recoger materiales sobrantes del gimnasio', '2021-09-04 07:00:00', '2021-09-04 16:00:00', NULL, 'Active', '2021-09-09 15:56:30', '2021-09-09 15:56:59', 4, 5, 13, 'rgb(173 86 86)'),
(10, 'Instalacion base', 'Instalacion del epdm negro', '2021-09-06 08:16:00', '2021-09-06 18:00:00', NULL, 'Active', '2021-09-09 15:58:39', '2021-09-09 16:24:12', 1, 1, 15, 'rgb(173 86 86)'),
(11, 'Verificar coincidencia', 'Verificar que el resultado final de obra coincida con los requerimientos del cliente', '2021-09-05 09:00:00', '2021-09-06 09:00:00', NULL, 'Active', '2021-09-09 16:23:24', '2021-09-09 16:24:34', 3, 4, 6, 'rgb(173 86 86)'),
(12, 'Arreglo de planos y diseños', 'ksfndjkf', '2021-09-10 07:00:00', '2021-09-10 10:00:00', NULL, 'Active', '2021-09-09 16:25:10', '2021-10-27 10:27:16', 2, 4, 3, 'rgb(173 86 86)'),
(13, 'Instalar caucho', 'duisyhfguidsghfidf', '2021-09-30 16:38:00', '2021-10-13 16:38:00', NULL, 'Active', '2021-10-08 02:38:31', '2021-10-27 10:38:25', 1, 2, 1, 'rgb(173 86 86)'),
(14, 'hola', 'fdgbuhfgvbusdbfuigbsdfugbvsadf', '2021-10-09 08:40:00', '2021-10-15 18:01:00', NULL, 'Active', '2021-10-08 02:39:41', '2021-10-08 02:39:41', 1, 1, 15, 'rgb(173 86 86)'),
(15, 'a', 'aaa', '2021-10-26 12:00:00', '2021-10-26 12:30:00', NULL, 'Active', '2021-10-26 23:23:47', '2021-10-26 23:23:47', 1, 2, 16, 'rgb(173 86 86)'),
(16, 'eee', 'eeee', '2021-10-26 12:00:00', '2021-10-26 12:30:00', NULL, 'Active', '2021-10-26 23:31:15', '2021-10-26 23:31:15', 3, 1, 14, 'rgb(173 86 86)'),
(17, 'dgfhfh', 'aaaaa', '2021-10-26 11:30:00', '2021-10-26 15:00:00', NULL, 'Active', '2021-10-26 23:31:35', '2021-10-26 23:31:35', 3, 1, 17, 'rgb(173 86 86)'),
(18, 'ii', 'iii', '2021-10-26 12:30:00', '2021-10-26 13:00:00', NULL, 'Active', '2021-10-26 23:32:19', '2021-10-26 23:32:19', 2, 2, 14, 'rgb(173 86 86)'),
(19, 'ooo', 'ooo', '2021-10-26 12:00:00', '2021-10-26 12:30:00', NULL, 'Active', '2021-10-26 23:32:33', '2021-10-26 23:32:33', 2, 2, 17, 'rgb(173 86 86)'),
(20, 'nehhhhhhh', 'fgf', '2021-10-26 12:00:00', '2021-10-26 12:30:00', NULL, 'Active', '2021-10-26 23:34:29', '2021-10-26 23:34:29', 3, 2, 14, 'rgb(173 86 86)'),
(21, 'fff', 'hhh', '2021-10-26 12:00:00', '2021-10-26 12:30:00', NULL, 'Active', '2021-10-26 23:34:39', '2021-10-26 23:34:39', 2, 2, 17, 'rgb(173 86 86)'),
(22, 'evento de obra 12', 'gh', '2021-10-29 08:00:00', '2021-10-29 11:30:00', NULL, 'Active', '2021-10-27 01:33:33', '2021-10-27 07:39:15', 1, 1, 18, 'rgb(173 86 86)'),
(23, 'Preparar terreno', 'fgf', '2021-10-30 08:30:00', '2021-10-30 09:00:00', NULL, 'Active', '2021-10-27 07:16:26', '2021-10-27 07:45:58', 2, 2, 17, 'rgb(173 86 86)'),
(24, 'Instalar base', 'aaaaaaaaa', '2021-10-27 07:30:00', '2021-10-27 08:00:00', NULL, 'Active', '2021-10-27 07:20:57', '2021-10-27 10:41:36', 2, 2, 15, 'rgb(173 86 86)'),
(25, 'Recoger materiales de bodega', 'iii', '2021-10-27 08:00:00', '2021-10-27 08:30:00', NULL, 'Active', '2021-10-27 07:22:34', '2021-10-27 07:47:00', 2, 3, 15, 'rgb(173 86 86)'),
(26, 'Llevar materiales', 'eeee', '2021-10-25 08:00:00', '2021-10-25 08:30:00', NULL, 'Active', '2021-10-27 07:47:18', '2021-10-27 07:53:15', 1, 2, 16, 'rgb(173 86 86)'),
(27, 'Verificar terreno', 'Evaluar que el terreno sea apto.', '2021-10-29 12:30:00', '2021-10-29 15:30:00', NULL, 'Active', '2021-10-27 09:25:22', '2021-10-27 09:25:22', 2, 3, 15, 'rgb(173 86 86)'),
(28, 'eventoo', 'eve', '2021-10-29 09:30:00', '2021-10-29 10:00:00', NULL, 'Active', '2021-10-28 22:00:30', '2021-10-28 23:58:08', 3, 1, 1, 'rgb(173 86 86)'),
(29, 'adasdsd', 'sfdgfh', '2021-10-15 00:00:00', '2021-10-16 00:00:00', NULL, 'Active', '2021-11-04 05:31:51', '2021-11-04 05:31:51', 1, 2, 1, 'rgb(173 86 86)'),
(30, 'dvfdgv', 'fgfgh', '2021-11-03 09:00:00', '2021-11-03 09:30:00', NULL, 'Active', '2021-11-07 03:20:14', '2021-11-07 03:20:14', 2, 1, 1, 'rgb(173 86 86)'),
(31, 'fbhfvn', 'fhfgj', '2021-11-04 07:30:00', '2021-11-04 08:30:00', NULL, 'Active', '2021-11-07 03:21:18', '2021-11-07 03:21:18', 2, 3, 1, 'rgb(173 86 86)'),
(32, 'dgdg', 'dgfhb', '2021-11-05 07:30:00', '2021-11-05 08:00:00', NULL, 'Active', '2021-11-07 03:21:54', '2021-11-07 03:21:54', 3, 3, 1, 'rgb(173 86 86)'),
(33, 'dgdg', 'dgfhb', '2021-11-05 07:30:00', '2021-11-05 08:00:00', NULL, 'Active', '2021-11-07 03:21:54', '2021-11-07 03:21:54', 3, 3, 1, 'rgb(173 86 86)'),
(34, 'dgbfdhb', 'fhbfh', '2021-11-03 07:30:00', '2021-11-03 08:00:00', NULL, 'Active', '2021-11-07 03:22:18', '2021-11-07 03:22:18', 2, 1, 1, 'rgb(173 86 86)'),
(35, 'act', 'asfcd', '2021-11-01 07:30:00', '2021-11-01 08:00:00', NULL, 'Active', '2021-11-07 03:49:56', '2021-11-07 03:49:56', 2, 3, 1, 'rgb(173 86 86)'),
(36, 'aaaa', 'ddfgfg', '2021-11-23 07:30:00', '2021-11-23 09:30:00', NULL, 'Active', '2021-11-24 03:28:16', '2021-11-24 03:28:16', 1, 1, 1, NULL),
(37, 'Verificar Terreno', 'hola', '2021-11-22 07:00:00', '2021-11-22 09:00:00', NULL, 'Active', '2021-11-26 16:32:51', '2021-11-26 16:32:51', 2, 2, 31, NULL),
(38, 'actividaddd', 'iuhuh', '2021-12-01 06:30:00', '2021-12-01 08:00:00', NULL, 'Active', '2021-12-02 02:01:16', '2021-12-02 02:33:23', 2, 2, 1, NULL),
(39, 'prueba2', 'oihuih', '2021-11-30 08:00:00', '2021-11-30 09:30:00', NULL, 'Active', '2021-12-02 02:33:40', '2021-12-02 02:33:40', 2, 4, 1, NULL),
(40, 'Recibir materiales', 'recibir pedidos de caucho y verificar que todo este acorde.', '2021-12-01 08:00:00', '2021-12-01 10:00:00', NULL, 'Active', '2021-12-02 04:28:35', '2021-12-02 04:28:35', 3, 2, 6, NULL),
(41, 'obraaaa', 'dgvfbg', '2021-11-30 07:30:00', '2021-11-30 09:00:00', NULL, 'Active', '2021-12-02 19:32:08', '2021-12-02 19:32:08', 3, 4, 40, NULL),
(42, 'omg', 'idjdfuij', '2021-12-03 09:00:00', '2021-12-03 09:30:00', NULL, 'Active', '2021-12-02 19:34:37', '2021-12-02 19:34:37', 1, 2, 40, NULL),
(43, 'Actividad prueba', 'iojik', '2021-11-29 07:00:00', '2021-11-30 09:00:00', NULL, 'Active', '2021-12-02 20:00:24', '2021-12-02 20:00:24', 2, 2, 46, NULL),
(44, 'evento', 'oihujn', '2021-12-03 08:00:00', '2021-12-03 10:30:00', NULL, 'Active', '2021-12-02 20:00:39', '2021-12-02 20:00:39', 3, 1, 46, NULL),
(45, 'evento', 'dojfkgm', '2021-11-29 07:30:00', '2021-11-29 08:30:00', NULL, 'Active', '2021-12-02 20:05:05', '2021-12-02 20:05:05', 3, 3, 38, NULL),
(46, 'Validar planilla', 'dfhfgh', '2021-11-30 08:30:00', '2021-11-30 09:00:00', NULL, 'Active', '2021-12-03 23:43:48', '2021-12-04 04:28:07', 1, 2, 3, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `actividadusuarios`
-- (See below for the actual view)
--
CREATE TABLE `actividadusuarios` (
`end` datetime
,`id` bigint unsigned
,`NombreRol` varchar(50)
,`start` datetime
,`title` varchar(65)
,`Usuarios_por_rol` bigint
);

-- --------------------------------------------------------

--
-- Table structure for table `actividad_usuario`
--

CREATE TABLE `actividad_usuario` (
  `id` bigint UNSIGNED NOT NULL,
  `actividad_id` bigint UNSIGNED NOT NULL,
  `empleado_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actividad_usuario`
--

INSERT INTO `actividad_usuario` (`id`, `actividad_id`, `empleado_id`, `created_at`, `updated_at`) VALUES
(1, 18, 2, '2021-11-27 23:38:29', '2021-11-27 23:38:29'),
(2, 9, 20, '2021-11-27 23:38:57', '2021-11-27 23:38:57'),
(3, 14, 6, NULL, NULL),
(4, 1, 6, NULL, NULL),
(5, 1, 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` tinyint UNSIGNED NOT NULL,
  `ciudad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `ciudad`) VALUES
(4, 'Barranquilla '),
(1, 'Bogota'),
(5, 'Bucaramanga'),
(3, 'Cali'),
(9, 'Cartagena'),
(6, 'Ibagué'),
(10, 'Manizales'),
(2, 'Medellín '),
(7, 'Sogamoso'),
(8, 'Tunja');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int UNSIGNED NOT NULL,
  `NombreCC` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NumIdentificacion` bigint UNSIGNED NOT NULL,
  `ContrasenaC` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CorreoCliente` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NumCelular` int UNSIGNED NOT NULL,
  `NumTelefono` int UNSIGNED NOT NULL,
  `FotoL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isActive` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `tipo_cliente_id` tinyint UNSIGNED NOT NULL,
  `tipo_identificacion_id` tinyint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `NombreCC`, `NumIdentificacion`, `ContrasenaC`, `CorreoCliente`, `NumCelular`, `NumTelefono`, `FotoL`, `isActive`, `tipo_cliente_id`, `tipo_identificacion_id`, `user_id`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Julia Andrés Castro Carreño ', 1001300365, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Julian@12gmail.com', 3166244803, 6760325, '', 'Inactive', 1, 1, 1, NULL, NULL, '2021-10-08 13:57:06'),
(2, 'IDRD ', 1001365896, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'IDRD1221@gmail.com', 3143962930, 5389656, NULL, 'Active', 2, 3, 2, NULL, NULL, '2021-10-02 13:19:36'),
(3, 'Giovanny Chaparro Castro', 1001345587, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'GiovanyCC@gmail.com', 3143562546, 5344878, '', 'Active', 1, 1, 3, NULL, NULL, '2021-09-09 19:53:20'),
(4, 'ProvedoresCo', 8078998769, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Provedor@gmail.com', 3153256595, 4569658, '', 'Active', 2, 3, 4, NULL, NULL, '2021-09-09 19:48:22'),
(5, 'Laura Valentina Avendaño', 1002365589, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'LauraVA10@gmail.com', 316625589, 5966953, '', 'Inactive', 1, 1, 5, NULL, NULL, '2021-11-04 17:00:15'),
(6, 'echo \"holaaaaaaaaa\"', 31459459, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'fumbraCO@gmail.com', 3145849584, 4934895, NULL, 'Inactive', 2, 3, 6, NULL, '2021-09-08 17:18:12', '2021-10-02 13:10:40'),
(7, 'mar sanchez', 945968595, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'marsan34@gmail.com', 3195849958, 4959689, NULL, 'Active', 1, 3, 7, NULL, '2021-09-08 17:29:50', '2021-10-02 13:23:31'),
(8, 'Jualiana Gomez', 39659695, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'jul05gom@hotmail.com', 3129738478, 4598588, NULL, 'Inactive', 1, 2, 8, NULL, '2021-09-08 17:30:57', '2021-10-02 13:10:45'),
(9, 'holaaa', 35757676, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'hola@gmail.com', 354565656, 446565, NULL, 'Inactive', 1, 3, 9, NULL, '2021-10-04 16:22:18', NULL),
(10, 'empresa', 30490594059, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'correo@gmail.com', 3305949503, 3948439589, NULL, 'Active', 2, 1, 10, NULL, '2021-10-07 09:24:21', '2021-10-07 09:24:21'),
(11, 'conjunto plem', 2493043948, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'pleconjj@gmail.com', 2432432424, 24243424, NULL, 'Active', 2, 3, 11, NULL, '2021-10-07 10:51:09', '2021-10-07 10:51:09'),
(12, 'aaaa', 343545, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'sdds', 354545, 3545, NULL, 'Active', 2, 2, 12, NULL, NULL, NULL),
(13, 'eee', 454, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'skfj@correo.com', 545, 45, NULL, 'Active', 1, 4, 13, NULL, NULL, NULL),
(14, 'cliente prueba', 38293848, '$2y$10$Mp4Q.5LO/0WWE8WmlB/cIOe31zQRJsrKUSsEup9JfTZY4pQ4Kxnru', 'cliente1@gmail.com', 3124343434, 2424234, NULL, 'Active', 1, 1, 32, NULL, '2021-11-12 16:53:34', '2021-11-12 16:53:34'),
(15, 'clientee', 30459459, '$2y$10$7izv8PSjx3h1ZD0NKZcHWeNXMZlg.0qgoyNRxg81yUQbqbYIWY2R6', 'cliente2@gmail.com', 3545495035, 4304050, NULL, 'Active', 1, 1, 33, NULL, '2021-11-12 16:55:19', '2021-11-12 16:55:19'),
(16, 'cliente otro', 34354545, '$2y$10$o4W6hBvX6x8tDvG9vqNZ/.PBlbK38MMTEcjQ55HOstCsuy0JIy7je', 'cliente3@gmail.com', 3454565643, 4466454, NULL, 'Active', 1, 1, 38, NULL, '2021-11-12 17:50:15', '2021-11-12 17:50:15'),
(17, 'ffdgfg', 43545454, '$2y$10$UHfOLg9pG6xcrpyEl/ort.GWTYpaZ5AbTZVKzl9KYUp.3pXR1zx3e', 'clienteeee@gmail.com', 3454545483, 1322323, NULL, 'Active', 2, 4, 39, NULL, '2021-11-12 18:07:13', '2021-11-12 18:07:13'),
(18, 'client', 23403955, '$2y$10$C79KZLn9EWKtHt1xPth1pOMRqYijOS4jQtTHndMz0c/0.hUB7RfIC', 'dijfigv@gmail.com', 3598459408, 3948459, NULL, 'Active', 2, 1, 40, NULL, '2021-11-21 01:26:03', '2021-11-21 01:26:03'),
(19, 'ni idea', 39584598, '$2y$10$0.oL/6tDPgkg7tNuHJsyjuoUCL83mtY8JSg9XKMk45fh6HPzfH4Q.', 'niIdea@gmail.com', 3148574857, 3859457, NULL, 'Active', 1, 1, 41, NULL, '2021-11-24 23:18:19', '2021-11-24 23:18:19'),
(20, 'clien', 4564656, '$2y$10$3Zxf9PIPXYnOE6wGOp2h0OwvktzqCE9CWl6nhMy3seDdzCWjARj.u', 'clirnyr@gmail.com', 3126565123, 3435354, NULL, 'Active', 1, 1, 43, NULL, '2021-12-01 02:16:04', '2021-12-01 02:16:04'),
(21, 'hbgfvnfg', 5657657, '$2y$10$RlZvtgzt5PdcXmJgubiqAu4bp7gRANNUzMS1UAN.eYggQeueDwfW2', 'cliente12@gmail.com', 3167575676, 4545456, NULL, 'Active', 1, 1, 44, NULL, '2021-12-01 02:17:41', '2021-12-01 02:17:41'),
(22, 'hgfhngf', 343556565, '$2y$10$ZuZwEfLszrS6VePi.D85Jeg/6mw79yMO5ITeswKSihkiXqi6LJzVu', 'clfgn@gmail.com', 3124545646, 4656554, NULL, 'Active', 1, 1, 45, NULL, '2021-12-01 02:19:21', '2021-12-01 02:19:21'),
(23, 'fvbhvn', 24345445, '$2y$10$Xp.zuCt/G793BO28Co3I6eDeXXSKkKQv44pkZSYDK6FryDlmWvBSi', 'dgfhfh@gmail.co', 3184546565, 3454354, NULL, 'Active', 1, 1, 46, NULL, '2021-12-01 02:26:14', '2021-12-01 02:26:14'),
(24, 'dfgdfhgf', 5465657, '$2y$10$3IrCJqGxAjqxACtBHKYCEOrf.EMQo1U75nQlGyZ48tdl7x7PmWDP.', 'sifunciona@gmail.com', 3133546464, 3545455, NULL, 'Active', 1, 1, 47, NULL, '2021-12-01 02:27:40', '2021-12-01 02:27:52'),
(25, 'Nuevo Cliente', 35454656, '$2y$10$n1QhuIretRPANKxRbOqY5ebjJUJBO8TjQ1KatdmEoK7VZlh251/0m', 'clientenew@gmail.com', 3154686909, 3446949, NULL, 'Active', 1, 1, 48, NULL, '2021-12-01 02:29:10', '2021-12-01 02:29:21'),
(26, 'sara', 6575676, '$2y$10$wzDju48Q6SNSYYvBeIaNLec8r/rlckSka343ZwcB9ZHpwl7AEn1Yu', 'evento@gmail.com', 3284515645, 4655765, NULL, 'Active', 1, 1, 49, NULL, '2021-12-01 02:35:54', '2021-12-01 02:36:02'),
(27, 'dgvfgb', 54765768, '$2y$10$su5XsF4KEQSCDLNWdsHsXeUbivdinPcRAHEigNC1bVj7rpKgn6JF.', 'dgfg@cfgm.com', 3154756768, 4545634, NULL, 'Active', 1, 1, 50, NULL, '2021-12-01 02:52:13', '2021-12-01 02:52:13'),
(28, 'hdfgghj', 878789, '$2y$10$I0nGIZ3Jk1Ef88xepv1cwuxNgmLyPZh5h/Q7fBUlpBqy2Tz5v28vy', 'dfngjn@gmail.com', 3124879878, 3545677, NULL, 'Active', 1, 1, 51, NULL, '2021-12-01 02:56:41', '2021-12-01 02:56:41'),
(29, 'client fgbmjk', 34546565, '$2y$10$fk8TKlDJYIxRTw4sKgCeh.xzs04Lgt2R9kuGmq1vgMT6FKzebp192', 'correoclient@gmail.com', 3154544545, 5453434, NULL, 'Active', 2, 4, 52, NULL, '2021-12-01 03:02:15', '2021-12-01 03:02:15'),
(30, 'sara cliente', 45869856, '$2y$10$BdlrVPhAS7IOheSh2Kag6.zJCoDW/HTtqVTjAwtPpsTNUkMKV6qL2', 'saraclien34@gmail.com', 3194685986, 4665643, NULL, 'Active', 1, 1, 53, NULL, '2021-12-01 03:05:37', '2021-12-01 03:05:37');

--
-- Triggers `clientes`
--
DELIMITER $$
CREATE TRIGGER `AfterInsertCliente` BEFORE INSERT ON `clientes` FOR EACH ROW BEGIN
insert into `users` (`name`, `email`, `password`, `RolExterno`,`profile_photo_path`, `created_at`, `updated_at`, `NumeroDocumento`) VALUES (new.`NombreCC`, new.`CorreoCliente`, new.`ContrasenaC`, 'cliente', new.`FotoL`, new.`created_at`, new.`updated_at`, new.`NumIdentificacion`);
set new.`user_id` = (SELECT MAX(id) FROM `users`);
insert into `model_has_roles` (`role_id`, `model_type`,`model_id`) values (2,'App\Models\User', new.`user_id`);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `AfterUpdateCliente` AFTER UPDATE ON `clientes` FOR EACH ROW UPDATE `users` set `name` = new.`NombreCC`, `email`= new.`CorreoCliente`, `password`= new.`ContrasenaC`, `profile_photo_path`= new.`FotoL`, `NumeroDocumento` = new.`NumIdentificacion`, `created_at`= new.`created_at`, `isActive` = new.`isActive`, `updated_at` = new.`updated_at`  where `id` = new.`user_id`
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` tinyint UNSIGNED NOT NULL,
  `Ncolor` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `Ncolor`) VALUES
(6, 'Amarillo'),
(7, 'Azul Aguamarina'),
(3, 'Azul Claro'),
(1, 'Blanco'),
(10, 'Golden'),
(4, 'Gris'),
(8, 'Naranja'),
(2, 'Negro'),
(9, 'Rojo'),
(5, 'Verde Oscuro');

-- --------------------------------------------------------

--
-- Table structure for table `disenos`
--

CREATE TABLE `disenos` (
  `id` int UNSIGNED NOT NULL,
  `ImagenPlano` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ObservacionDiseno` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isActive` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `obra_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disenos`
--

INSERT INTO `disenos` (`id`, `ImagenPlano`, `ObservacionDiseno`, `isActive`, `created_at`, `updated_at`, `obra_id`) VALUES
(2, '1', 'El diseño se modifica según las recomendaciones del comprador.', 'Active', '2021-08-06 11:00:00', '2021-12-03 15:04:36', 4),
(3, '1', 'El diseño se realiza acorde a las medidas tomadas por el ingeniero y a las recomendaciones del comprador', 'Active', '2021-05-17 20:42:12', '2021-12-03 15:08:42', 3),
(4, 'imagen', 'El diseño se realiza acorde a las medidas tomadas por el ingeniero y a las recomendaciones del comprador.', 'Active', '2021-05-14 03:03:26', '2021-10-08 21:08:35', 1),
(5, 'disenos/dxEBFzh2NhZ9CuY7V3RW0hc1ZMGmhmJgvvgq4JFZ.jpg', 'El diseño se realiza acorde a las medidas tomadas por el ingeniero y a las recomendaciones del comprador.', 'Active', '2021-06-08 01:29:15', '2021-10-12 02:57:02', 2),
(6, '1', 'El diseño se realiza acorde a las medidas tomadas por el ingeniero y a las recomendaciones del comprador', 'Active', '2021-08-06 11:00:00', '2021-12-03 15:10:39', 5),
(7, 'eifhiuhfhg', NULL, 'Inactive', '2021-10-08 22:00:26', '2021-10-08 22:00:26', 16),
(8, '1', 'diseño para gimnasio etc', 'Active', '2021-10-08 22:08:29', '2021-12-03 14:53:26', 8),
(9, 'disenos/mCmXGVhFIBdCC45vUFh6OqjyvTpqmYZo7spOYzGR.jpg', 'neghhjj', 'Active', '2021-10-13 10:15:22', '2021-10-13 10:15:22', 15),
(10, 'disenos/ie02I4jxgIVmbh0YVPNCRsEtcsor9jMlPFLZtq4c.png', '', 'Inactive', '2021-10-13 10:16:37', '2021-10-16 05:28:11', 17),
(11, '1', 'dgfgwsrfsf', 'Active', '2021-12-03 11:39:28', '2021-12-03 11:39:28', 3),
(12, '3', 'hooool', 'Active', '2021-12-03 11:44:25', '2021-12-03 11:44:25', 3),
(13, '1', '', 'Active', '2021-12-03 14:07:55', '2021-12-03 14:07:55', 8),
(14, '1', '', 'Active', '2021-12-03 14:38:34', '2021-12-03 14:52:50', 32),
(15, '1', '', 'Active', '2021-12-05 20:30:10', '2021-12-05 20:30:10', 8);

-- --------------------------------------------------------

--
-- Stand-in structure for view `documentousuarios`
-- (See below for the actual view)
--
CREATE TABLE `documentousuarios` (
`NombreCompleto` varchar(100)
,`NumeroDocumento` bigint unsigned
,`tipo_identificacion_id` tinyint unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `edadmayor25años`
-- (See below for the actual view)
--
CREATE TABLE `edadmayor25años` (
`EdadU` tinyint unsigned
,`NombreCompleto` varchar(100)
,`NumeroDocumento` bigint unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `edadmenor25años`
-- (See below for the actual view)
--
CREATE TABLE `edadmenor25años` (
`EdadU` tinyint unsigned
,`NombreCompleto` varchar(100)
,`NumeroDocumento` bigint unsigned
);

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id` bigint UNSIGNED NOT NULL,
  `NombreCompleto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NumeroDocumento` bigint UNSIGNED NOT NULL,
  `NumeCelular` bigint UNSIGNED NOT NULL,
  `NumTelefono` int UNSIGNED NOT NULL,
  `FechaNacimientoU` date NOT NULL,
  `CorreoUsuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `GeneroUsuario` enum('Masculino','Femenino','Otro') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `FotoUsuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DireccionUsuario` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `EdadU` tinyint UNSIGNED NOT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Disponibilidad` enum('Ocupado','No Disponible','Disponible') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Disponible',
  `EstadoUsuario` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `rol_id` tinyint UNSIGNED NOT NULL,
  `tipo_identificacion_id` tinyint UNSIGNED NOT NULL,
  `estado_civil_id` tinyint UNSIGNED NOT NULL,
  `city_id` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id`, `NombreCompleto`, `NumeroDocumento`, `NumeCelular`, `NumTelefono`, `FechaNacimientoU`, `CorreoUsuario`, `GeneroUsuario`, `FotoUsuario`, `DireccionUsuario`, `EdadU`, `contrasena`, `Disponibilidad`, `EstadoUsuario`, `rol_id`, `tipo_identificacion_id`, `estado_civil_id`, `city_id`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Maria Cardona', 1001347789, 3158745307, 6760159, '2003-12-27', 'Gomita@gmail.com', 'Femenino', 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', 'Calle 324#127 C28 P5', 27, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 4, 1, 2, 1, NULL, '2021-11-30 23:49:02', 14),
(2, 'Camilo Andrés', 1225354785, 3132355885, 53785695, '2003-08-11', 'CAMILO.andr23@gmail.com', 'Masculino', 'storage/perfil/blog1-2.jpg', 'Carrera 66 #69 P4', 37, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Inactive', 3, 1, 3, 5, NULL, '2021-08-08 00:14:07', 15),
(3, 'Juan Sebastian', 1069698231, 3182304784, 54698523, '2003-12-02', 'RinconCP@gmail.com', 'Masculino', '', 'Calle 128 #78 C9', 20, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 1, 1, 1, 4, NULL, NULL, 16),
(4, 'Carlos Manuel', 658768788, 3184968596, 6875869, '1995-05-01', 'Carlos354Gon@gmail.com', 'Masculino', '', 'cra 118 # 36 B 34', 26, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 3, 1, 2, 1, NULL, '2021-11-30 23:52:15', 17),
(5, 'Andres', 103215120651, 124235345, 234234234, '2021-07-27', 'andres@gmail.com', 'Masculino', 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'casita1#2-3', 19, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 2, 1, 1, 7, '2021-08-08 00:51:19', '2021-11-30 13:31:21', 18),
(6, 'Mariana', 20459409568, 3212394855489, 4854785, '1990-08-09', 'mariana@gmail.com', 'Femenino', 'storage/perfil/dia.PNG', 'cll 34 # 34 -45', 30, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 3, 4, 2, 1, '2021-09-10 12:38:11', '2021-09-10 12:40:21', 19),
(7, 'empleadosss', 4958906859, 8437897548, 9457487, '2021-10-04', 'empleado@gmail.com', 'Otro', NULL, 'cra 58#156 34', 30, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 1, 2, 3, 4, '2021-10-04 21:28:23', '2021-10-04 21:28:23', 20),
(8, 'lippp', 248349359, 313905945, 3955803, '2021-10-01', 'lip45@gmail.com', 'Femenino', NULL, 'cra 58#156 34', 18, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 3, 1, 2, 1, '2021-10-06 14:40:58', '2021-10-12 14:17:59', 21),
(9, 'lol 1', 350495400, 49059605096, 309540505, '1995-03-12', 'lip123@gmail.com', 'Femenino', NULL, 'cra 58#156 34', 18, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 4, 3, 3, 10, NULL, NULL, 22),
(10, 'Giovanny Castro Avendaño', 350495405, 4905960509, 3095405, '1995-03-12', 'lol123@gmail.com', 'Femenino', NULL, 'cra 58#156 34', 18, '$2y$10$bXHtfcsSVGtt93XHY57A6eQtVXZbg9E5248bBMNESUJz1X.yzMcHC', 'Ocupado', 'Active', 4, 3, 3, 10, NULL, '2021-12-03 01:44:34', 23),
(11, 'jean sanchez', 3318495400, 3159605096, 309540505, '1995-03-12', 'jeansanc34@gmail.com', 'Femenino', NULL, 'av 34 # 161 34', 45, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 2, 1, 3, 10, NULL, NULL, 24),
(12, 'Erick', 1001300341, 3166548977, 2566454, '2008-12-29', 'sumama@gmail.com', 'Femenino', 'xddddd', 'xdddddd', 18, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 2, 1, 3, 10, '2021-10-14 14:52:30', '2021-10-14 14:52:30', 25),
(13, 'Giovanny Chaparro Castro', 3493045049, 3434454656, 5454548, '2021-10-04', 'giogg08@gmail.com', 'Femenino', 'dv', 'cll # 353 - 56', 45, '$2y$10$PT8nd0kIjx.zBDn/rUCuwuOZzIR.eshBW4XFBz8FM5RnSlTbZ3NKe', 'Ocupado', 'Active', 1, 1, 1, 4, '2021-10-14 15:05:49', '2021-11-30 16:49:55', 26),
(14, 'Julian Andres Castro', 34545465, 3923084809, 3493941, '2021-10-14', 'correooo@gmail.com', 'Otro', NULL, 'ckll 35 # 343', 34, '$2y$10$dZ3RmFf5sEU1fQdJjZoWAO2HKHIGokw1dj1tGQOeSxH1MmWswqHMu', 'Ocupado', 'Active', 3, 1, 1, 3, '2021-10-14 15:31:07', '2021-11-30 16:52:38', 27),
(15, 'Juliana', 1001300365, 3164585455, 5368954, '2021-10-06', 'Papa@gmail.com', 'Femenino', 'xddddd', 'xdddddd', 18, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 2, 1, 1, 1, '2021-10-14 15:44:54', '2021-10-15 08:47:56', 28),
(16, 'adsfdf', 2646415, 3184968596, 6875869, '2021-10-19', 'camSuear349@gmail.com', 'Femenino', NULL, 'cra 58#156 34', 18, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 4, 4, 2, 6, NULL, NULL, 29),
(18, 'gerentee', 26466415, 31849696, 687589, '2021-10-19', 'camSear349@gmail.com', 'Femenino', NULL, 'cra 58#156 34', 18, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 'Ocupado', 'Active', 1, 4, 2, 6, NULL, NULL, 30),
(19, 'para correo', 23434344, 3435454523, 3434343, '2021-11-10', 'lauval7771@gmail.com', 'Masculino', NULL, 'Cra 98 #133 A 67', 18, '$2y$10$obHFf.R.y2ggpq6agMgFSOOwlEeT6VqasAqxuUW6i1nsaR4Zs1ZbS', 'Ocupado', 'Active', 2, 1, 2, 1, '2021-11-05 17:33:49', '2021-12-04 04:02:31', 31),
(20, 'Fernando', 1004523365, 3166598572, 5366985, '2001-06-06', 'GerenteT@gmail.com', 'Masculino', 'file.png', 'calle136c27t45', 20, '$2y$10$xwd2jrJ0fKBTLaVuuHKAweXzsRUF/Bxfr4GO0lNfzwns2iDnqmwpe', 'Ocupado', 'Active', 2, 1, 4, 4, '2021-11-12 17:05:42', '2021-11-27 21:48:30', 34),
(21, 'Gustavo', 1200563348, 3147588614, 9854752, '1992-06-30', 'CoordinadorT@gmail.com', 'Masculino', 'xddddd', 'calle136c27t85', 30, '$2y$10$lpdFlqdpJdYxi7DjgUjLBu/k3Od1U1miXxCaLUqecXdCsL38aH0KK', 'Disponible', 'Active', 2, 1, 1, 6, '2021-11-12 17:08:29', '2021-11-12 17:08:29', 35),
(22, 'Sandra ', 1400325641, 3152658577, 2563654, '2000-02-24', 'IngenieroT@gmail.com', 'Femenino', 'file.png', 'calle136c27t78', 21, '$2y$10$TTNVRDIXeOsiGMlzkMdCc.YPPZJJde.u3tFO.eMz2SwwbF9xISIEW', 'Ocupado', 'Inactive', 4, 1, 4, 3, '2021-11-12 17:11:15', '2021-12-04 04:23:43', 36),
(23, 'Bob', 1001325565, 3144875987, 3144524, '2002-06-20', 'InstaladorT@gmail.com', 'Masculino', 'xddd', 'calle186c27t85', 18, '$2y$10$7TXTTqp6eRoftxDgO4y2lukwrtVt.5/hOif0lb8LX89F5x9yVycV2', 'Ocupado', 'Active', 4, 1, 3, 8, '2021-11-12 17:13:30', '2021-11-12 17:13:30', 37),
(24, 'treball prueba', 394495940, 4059450904, 4594590, '1999-09-09', 'TreballCorp@gmail.com', 'Otro', NULL, 'Cra 98 #133 A 67', 18, '$2y$10$e6irHt.M4x5kgfMwmPDBoumJpBORuvSz2AyjBjZx4jSpcKU3FcJ26', 'No Disponible', 'Inactive', 1, 3, 3, 1, '2021-11-26 08:26:07', '2021-11-30 23:49:40', 42),
(25, 'Juan Ramirez', 4567747469, 3584576899, 4656563, '2000-02-09', 'juanram062@gmail.com', 'Masculino', NULL, 'cra 567', 23, '$2y$10$y70mvrvJmakw.VZeHlYtUubXFlrxy.n4dwpx.xoR2gzG.hA0fOnHG', 'Disponible', 'Active', 4, 1, 2, 1, '2021-12-01 03:19:42', '2021-12-01 03:19:42', 54),
(26, 'Danna Suarez', 359876598, 3194588977, 5456464, '1999-01-01', 'dan.suar123@gmail.com', 'Femenino', NULL, 'dfd', 23, '$2y$10$lB74A6N9uwuSdFmqcGqkXeAdxmClQJKfcPpHyFTES5m5mk6R5z0a2', 'Ocupado', 'Active', 2, 1, 1, 4, '2021-12-01 03:21:18', '2021-12-01 03:21:18', 55);

-- --------------------------------------------------------

--
-- Stand-in structure for view `estadocivilusuario`
-- (See below for the actual view)
--
CREATE TABLE `estadocivilusuario` (
`EstadoCivil` varchar(45)
,`NombreCompleto` varchar(100)
,`NumeroDocumento` bigint unsigned
);

-- --------------------------------------------------------

--
-- Table structure for table `estado_actividads`
--

CREATE TABLE `estado_actividads` (
  `id` tinyint UNSIGNED NOT NULL,
  `NombreEstado` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estado_actividads`
--

INSERT INTO `estado_actividads` (`id`, `NombreEstado`) VALUES
(3, 'Atrasado'),
(4, 'Completo '),
(2, 'En progreso '),
(1, 'Sin empezar');

-- --------------------------------------------------------

--
-- Table structure for table `estado_civils`
--

CREATE TABLE `estado_civils` (
  `id` tinyint UNSIGNED NOT NULL,
  `EstadoCivil` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estado_civils`
--

INSERT INTO `estado_civils` (`id`, `EstadoCivil`) VALUES
(1, 'Casado'),
(3, 'Divorciado'),
(4, 'Separación en proceso judicial'),
(2, 'Soltero'),
(5, 'Viudo');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fase_tareas`
--

CREATE TABLE `fase_tareas` (
  `id` tinyint UNSIGNED NOT NULL,
  `NombreFase` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DescripcionFase` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fase_tareas`
--

INSERT INTO `fase_tareas` (`id`, `NombreFase`, `DescripcionFase`) VALUES
(1, 'Recolección de Información', 'Etapa en inicial en la que se realiza la verificación del suelo y de sus condiciones, también se establecen los requisitos del cliente.'),
(2, 'Preparación y Diseño', 'Con los requisitos del cliente, se organizan los tiempos y tareas a realizar, de igual forma se realizan los diseños y planos respectivos.'),
(3, 'Desarrollo e Implementación', 'En esta etapa se realiza la ejecución de las actividades principales, y la instalación del caucho en el sitio.'),
(4, 'Fase de Evaluación y Control', 'Luego de el termino de realización de la instalación, se evalúa con el cliente si todos los requerimientos fueron cumplidos, en caso de que no, se realizan las correcciones correspondientes.'),
(5, 'Fase de Cierre', 'Cuando el cliente esta satisfecho con el resultado final, se realiza la etapa gestión de entrega y mantenimiento, y cierre formal del proyecto.');

-- --------------------------------------------------------

--
-- Stand-in structure for view `generofemenino`
-- (See below for the actual view)
--
CREATE TABLE `generofemenino` (
`GeneroUsuario` enum('Masculino','Femenino','Otro')
,`NombreCompleto` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `generomasculino`
-- (See below for the actual view)
--
CREATE TABLE `generomasculino` (
`GeneroUsuario` enum('Masculino','Femenino','Otro')
,`NombreCompleto` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `archivo` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modelo_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modelo_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `archivo`, `modelo_id`, `modelo_type`, `isActive`) VALUES
(1, 'obras/oPKmdYbXoPkXiLFE8PdOnODb1Fp3i7kirETURgHz.jpg', '1', 'App\\Models\\Obra', 'Active'),
(4, 'hola', '2', 'App\\Models\\Obra', 'Active'),
(5, 'hola', '2', 'App\\Models\\Diseno', 'Active'),
(6, 'hola', '2', 'App\\Models\\Diseno', 'Active'),
(7, 'hola', '2', 'App\\Models\\Diseno', 'Active'),
(8, 'hola', '0', 'App\\Models\\Diseno', 'Active'),
(10, 'hey', '9', 'App\\Models\\Obra', 'Active'),
(11, 'hey', '9', 'App\\Models\\Obra', 'Active'),
(12, 'obras/Hkgjyiy5SQKykxeb4lQnZBYutZ3dEcWoSdlucPyt.jpg', NULL, 'App\\Models\\Obra', 'Active'),
(13, 'obras/Y8tgaUVseUYPrV0c1DkALuvHrMiVYes6soLd6H6E.png', NULL, 'App\\Models\\Obra', 'Active'),
(14, 'hey', '9', 'App\\Models\\Obra', 'Active'),
(15, 'obras/f7gbgxG46IjHxYIT8QFBZPG9DVyXx5EWCPjoLcSW.jpg', '21', 'App\\Models\\Obra', 'Active'),
(16, 'hey', '9', 'App\\Models\\Obra', 'Active'),
(17, 'hey', '9', 'App\\Models\\Obra', 'Active'),
(18, 'hey', '9', 'App\\Models\\Obra', 'Active'),
(20, 'imagrn por fin', '9', 'App\\Models\\Obra', 'Active'),
(21, 'hey', '9', 'App\\Models\\Obra', 'Active'),
(22, 'obras/yHllo7yI9K69IN2IKRLS277Oks0ku2gNH6nITCbj.png', '23', 'App\\Models\\Obra', 'Active'),
(24, 'obras/mcLQIyB5ziUFZKzZrkkiOE3Etz0VVciNYjQmuKVK.png', '24', 'App\\Models\\Obra', 'Active'),
(25, 'obras/NCYXPaQ5Jk6ldzpNTiVr0rODfpr5Cz4yAuZzxbwR.png', '24', 'App\\Models\\Obra', 'Active'),
(26, 'obras/JK1mOIRoRK838AxaLOOMH4pr0v7rzxswd0y3IFJv.png', '24', 'App\\Models\\Obra', 'Active'),
(27, 'obras/VjhE4UOhVmZgmdTPz2paSNzKgeaF0XsMw3mzg0Dm.png', '24', 'App\\Models\\Obra', 'Active'),
(28, 'obras/srGSBBPBGjMcKwnNv5XE9BsSw4H19UshJvCpcDrf.png', '20', 'App\\Models\\Obra', 'Active'),
(43, 'obras/Dx9DyY3eExrbQ47jo7NQ1vcqOYsrGprqqBpcPR3W.png', '11', 'App\\Models\\Obra', 'Active'),
(44, 'obras/CjKidUcQARr6jOXxw263q4TziCmrQW1ISzNASzAQ.png', '11', 'App\\Models\\Obra', 'Active'),
(84, 'obras/2LEiuMDK44vpMIgnn1LpuFUXNOWz7oKdmMTgV9D7.png', '18', 'App\\Models\\Obra', 'Active'),
(85, 'obras/hrmtws6JMiOfGsiIw4WsdnqT6xJrWCwXBXCHhfs5.png', '18', 'App\\Models\\Obra', 'Active'),
(86, 'obras/3PUQ0xVtpsieHQARjlT2QIAngiwWGvrBY9Ft9cET.jpg', '25', 'App\\Models\\Obra', 'Active'),
(87, 'obras/ZBR1eqV4b979tKbR8AgmoEEnjDX0n5LZJd45GMwu.jpg', '25', 'App\\Models\\Obra', 'Active'),
(91, 'obras/sWpI8r1Bct2ddCwDrC3A9OyKa9Mp6F14JS3FbLDQ.png', '22', 'App\\Models\\Obra', 'Active'),
(92, 'obras/s4lACXZyI1E990i61rytDi5JZFuWjdeodn1F9HYX.png', '22', 'App\\Models\\Obra', 'Active'),
(93, 'obras/oXpkwg0saBL7VsNlYAwdrd0zNDRUIMB3dHhuztt1.png', '22', 'App\\Models\\Obra', 'Active'),
(96, 'obras/b1E8ELgZBtMEUajLgUxQpEDCqjrEQaAKR5e5Mwe0.jpg', '10', 'App\\Models\\Obra', 'Active'),
(97, 'obras/XjLIgQTCO2OuRFh50d94vYVagZtWF2U07EVXJADL.jpg', '10', 'App\\Models\\Obra', 'Active'),
(98, 'obras/17uTqSWBFrDWYRUmfjKRiOCrnNlDMbYdcQ3AfVwK.png', '10', 'App\\Models\\Obra', 'Active'),
(99, 'obras/lylozjXh18l2sdresCjMMB2K325AsKXSJEqPgKWR.png', '10', 'App\\Models\\Obra', 'Active'),
(100, 'obras/XjrW5VReplry5gPqfrGrdZEdBUv49xfGx29oGWEZ.png', '10', 'App\\Models\\Obra', 'Active'),
(101, 'obras/rCj7DgV8mw4llritmiZn3zTgDK6WzivDd4oWtJaG.png', '10', 'App\\Models\\Obra', 'Active'),
(104, 'obras/nqbzibgUZ4tb9SJN71UaJ5Ro36IYNwNRycwZtqYB.png', '26', 'App\\Models\\Obra', 'Active'),
(105, 'obras/h683opM1x5VOhuBgi2BsvP2XC5nHttxwfE0uwSFW.jpg', '26', 'App\\Models\\Obra', 'Active'),
(106, 'obras/rLiNMxTWUQzPg3AUC1SWQyH8z1OyBMYtoYMcNoZU.jpg', '14', 'App\\Models\\Obra', 'Active'),
(107, 'obras/F8dZ2TVyUrBco5B3ziPWkU3oz3hSMnlP0gtR7Qbb.png', '14', 'App\\Models\\Obra', 'Active'),
(141, 'obras/H188U6lmas7MeeROBk0XOMW1Fz6qeK9n4chNDdX7.png', '3', 'App\\Models\\Obra', 'Active'),
(161, 'obras/xymOx6TXZlY0cna6vXOZ0pmJTUlyji11lgTXmxtE.jpg', '8', 'App\\Models\\Obra', 'Active'),
(162, 'obras/jqv5dR4LTKbWBJlwKufw05GVXHqNVyHwJOxgWXMd.jpg', '8', 'App\\Models\\Obra', 'Active'),
(164, 'obras/gIfcxaxuyvZSzoR3nMJJ14peyDNDDO7Hq8wDCvhc.png', '28', 'App\\Models\\Obra', 'Active'),
(165, 'obras/JijvBlxsyAi16BmXEcvWd3Wa86ddjDwtkjtzx6tJ.jpg', '28', 'App\\Models\\Obra', 'Active'),
(166, 'obras/C9aVUg2rRf672MU8pcXRPRg88Ia3WiDd2WAHokQS.jpg', '15', 'App\\Models\\Obra', 'Active'),
(167, 'obras/foBdV6YBMuGzunxKFi3EmyEts8Fi8dL2WwO7fe8x.png', '6', 'App\\Models\\Obra', 'Active'),
(168, 'obras/T2hu23XZNC04v4ruUeqXXAh20b7hGu1VGNlZ0kBz.png', '6', 'App\\Models\\Obra', 'Active'),
(173, 'obras/zlUEHZPC2lLkldNqELLoFHuFwx2LgVfh278rjdv6.jpg', '5', 'App\\Models\\Obra', 'Active'),
(174, 'obras/Hcs0Yp28Bw6XWEgNK0Z0UEpnT0eSwM7GHVT5OBQ2.jpg', '5', 'App\\Models\\Obra', 'Active'),
(182, 'obras/7jRqRVMqq0LX3dDFE294aUjqfClV9IsU24JbFkZJ.png', '12', 'App\\Models\\Obra', 'Active'),
(183, 'obras/u8RsJxDDHhqszQFZNT8tIAOiDUnKCZntKPEqzKEq.jpg', '30', 'App\\Models\\Obra', 'Active'),
(184, 'obras/VnOZNH0i9mqSKyEqfFLJhwUibdNIMgoy4pEjwaP9.jpg', '29', 'App\\Models\\Obra', 'Active'),
(185, 'obras/GiC7NBI0Xk10HYVDx5zN5GWLRWx0lPzZW18s5HM4.jpg', '31', 'App\\Models\\Obra', 'Active'),
(186, 'obras/Kr75qDGI6PfF5LFDy7HaWotcM0n1XLqIrRMKqPLF.jpg', '45', 'App\\Models\\Obra', 'Active'),
(187, 'disenos/diseno_1638531513.png', '11', 'App\\Models\\Diseno', 'Active'),
(188, 'disenos/diseno_1638531857.png', '12', 'App\\Models\\Diseno', 'Active'),
(189, 'disenos/diseno_1638531857.png', '12', 'App\\Models\\Diseno', 'Active'),
(190, 'disenos/diseno_1638531857.png', '12', 'App\\Models\\Diseno', 'Active'),
(200, 'disenos/diseno_1638543875.jpg', '2', 'App\\Models\\Diseno', 'Active'),
(201, 'disenos/diseno_1638544691.png', '13', 'App\\Models\\Diseno', 'Active'),
(203, 'disenos/diseno_1638547293.jpg', '14', 'App\\Models\\Diseno', 'Active'),
(204, 'disenos/diseno_1638736187.png', '15', 'App\\Models\\Diseno', 'Active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `lugarnacimientousuarios`
-- (See below for the actual view)
--
CREATE TABLE `lugarnacimientousuarios` (
`ciudad` varchar(100)
,`NombreCompleto` varchar(100)
,`NumeroDocumento` bigint unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `materialespordiseno`
-- (See below for the actual view)
--
CREATE TABLE `materialespordiseno` (
`Cantidad_Material` double(19,2)
,`Codigo_Obra` varchar(60)
,`Color_Material` varchar(45)
,`created_at` timestamp
,`id` int unsigned
,`ImagenPlano` varchar(120)
,`material_id` bigint unsigned
,`NombreTipoM` varchar(55)
);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint UNSIGNED NOT NULL,
  `DescripcionMat` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `color_id` tinyint UNSIGNED DEFAULT NULL,
  `tipo_material_id` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `DescripcionMat`, `isActive`, `color_id`, `tipo_material_id`, `created_at`, `updated_at`) VALUES
(1, 'Piso en caucho granulado modular reciclado', 'Active', 2, 4, NULL, NULL),
(3, 'Base para suelo.', 'Active', 4, 2, NULL, NULL),
(4, 'Resina/Pegante \'No más clavos\'.', 'Active', NULL, 1, NULL, NULL),
(5, 'Caucho EPDS granulado, granulometría de 44mm.', 'Active', 6, 3, NULL, NULL),
(6, 'Caucho EPDM granulado, granulometría de 40mm.', 'Active', 9, 3, NULL, NULL),
(7, 'Caucho EPDM granulado, granulometría de 62mm.', 'Active', 3, 3, NULL, NULL),
(8, 'Caucho EPDM granulado, granulometría de 44mm.', 'Active', 10, 3, NULL, NULL),
(9, 'Pattex PL600, adhesivo resistente al agua y a temperaturas extremas, adhesivo de montaje para interiores y exteriores.', 'Active', NULL, 1, NULL, '2021-09-03 03:54:42'),
(10, 'Lamina Katami en EVA, area de 45cm2.', 'Active', 8, 4, NULL, NULL),
(11, 'Caucho EPDM granulado de 50mm.', 'Active', 10, 3, '2021-09-03 22:49:57', '2021-09-03 22:49:57'),
(12, 'Piso o tapete de caucho de 55 mm.', 'Active', 5, 4, '2021-09-03 22:52:32', '2021-11-04 16:24:57'),
(13, 'Cauchi azul', 'Active', 3, 3, '2021-09-03 23:03:03', '2021-09-03 23:16:35'),
(14, 'cauho azul claro epdm', 'Inactive', 3, 3, '2021-09-03 23:03:12', '2021-10-16 00:16:57'),
(16, 'caucho epdm dorado', 'Active', 10, 3, '2021-09-03 23:04:02', '2021-09-09 16:51:42'),
(20, 'blancooo', 'Active', 1, 3, '2021-09-29 22:31:48', '2021-09-29 22:31:48'),
(24, 'fhhghgg', 'Active', 1, 3, '2021-11-04 21:00:51', '2021-11-04 21:00:51'),
(25, 'dfhdhfhf', 'Active', 1, 3, '2021-11-04 16:19:57', '2021-11-04 16:19:57'),
(26, 'asasasas', 'Active', 3, 1, '2021-11-09 05:26:22', '2021-11-26 18:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `material_diseno`
--

CREATE TABLE `material_diseno` (
  `id` bigint UNSIGNED NOT NULL,
  `CantidadMaterial` double(8,2) NOT NULL,
  `material_id` bigint UNSIGNED NOT NULL,
  `diseno_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material_diseno`
--

INSERT INTO `material_diseno` (`id`, `CantidadMaterial`, `material_id`, `diseno_id`, `created_at`, `updated_at`) VALUES
(49, 0.00, 8, 2, '2021-09-14 03:00:00', '2021-09-14 22:47:05'),
(50, 20.00, 1, 4, NULL, NULL),
(51, 50.30, 4, 2, NULL, NULL),
(52, 5.00, 8, 6, NULL, NULL),
(53, 40.20, 9, 3, NULL, NULL),
(54, 2.00, 8, 3, NULL, NULL),
(55, 3.00, 5, 3, NULL, NULL),
(56, 70.40, 9, 3, NULL, NULL),
(57, 5.00, 7, 6, NULL, NULL),
(58, 62.30, 9, 5, NULL, NULL),
(59, 4.00, 7, 5, NULL, NULL),
(60, 6.00, 3, 5, NULL, NULL),
(61, 34.00, 16, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_08_03_164235_create_colors_table', 1),
(7, '2021_08_03_171927_create_tipo_materials_table', 1),
(8, '2021_08_03_173722_create_fase_tareas_table', 1),
(9, '2021_08_03_173825_create_estado_actividads_table', 1),
(10, '2021_08_03_174723_create_tipo_identificacions_table', 1),
(11, '2021_08_03_183444_create_tipo_clientes_table', 1),
(12, '2021_08_03_183600_create_materials_table', 1),
(13, '2021_08_03_194108_create_cities_table', 1),
(14, '2021_08_03_202616_create_tipo_obras_table', 1),
(15, '2021_08_03_220022_create_tipo_novedads_table', 1),
(16, '2021_08_03_223443_create_clientes_table', 1),
(17, '2021_08_03_232628_create_obras_table', 1),
(18, '2021_08_03_234000_create_rols_table', 1),
(19, '2021_08_03_234043_create_estado_civils_table', 1),
(20, '2021_08_03_243312_create_usuarios_table', 1),
(21, '2021_08_03_243403_create_disenos_table', 1),
(22, '2021_08_03_243423_create_actividads_table', 1),
(23, '2021_08_03_249900_create_novedads_table', 1),
(24, '2021_08_03_253527_create_planillas_table', 1),
(25, '2021_08_03_256614_create_seccions_table', 1),
(26, '2021_08_04_041437_create_actividad_usuario_table', 1),
(27, '2021_08_04_165538_create_images_table', 1),
(28, '2021_08_05_072325_create_obra_usuario_table', 1),
(29, '2021_08_06_160248_create_material_diseno_table', 1),
(30, '2021_08_10_124216_create_sessions_table', 1),
(31, '2021_08_17_225429_create_eventos_table', 1),
(34, '2021_10_14_204044_add_timestamps_to_seccions_table', 2),
(35, '2021_10_29_070239_create_permission_tables', 3),
(36, '2021_11_30_194106_create_notifications_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(6, 'App\\Models\\User', 14),
(5, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(5, 'App\\Models\\User', 17),
(4, 'App\\Models\\User', 18),
(5, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 20),
(5, 'App\\Models\\User', 21),
(6, 'App\\Models\\User', 22),
(1, 'App\\Models\\User', 23),
(4, 'App\\Models\\User', 24),
(4, 'App\\Models\\User', 25),
(3, 'App\\Models\\User', 26),
(5, 'App\\Models\\User', 27),
(4, 'App\\Models\\User', 28),
(6, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 30),
(3, 'App\\Models\\User', 31),
(2, 'App\\Models\\User', 32),
(2, 'App\\Models\\User', 33),
(4, 'App\\Models\\User', 34),
(4, 'App\\Models\\User', 35),
(6, 'App\\Models\\User', 36),
(6, 'App\\Models\\User', 37),
(2, 'App\\Models\\User', 38),
(2, 'App\\Models\\User', 39),
(2, 'App\\Models\\User', 40),
(2, 'App\\Models\\User', 41),
(3, 'App\\Models\\User', 42),
(2, 'App\\Models\\User', 43),
(2, 'App\\Models\\User', 44),
(2, 'App\\Models\\User', 45),
(2, 'App\\Models\\User', 46),
(2, 'App\\Models\\User', 47),
(2, 'App\\Models\\User', 48),
(2, 'App\\Models\\User', 49),
(2, 'App\\Models\\User', 50),
(2, 'App\\Models\\User', 51),
(2, 'App\\Models\\User', 52),
(2, 'App\\Models\\User', 53),
(6, 'App\\Models\\User', 54),
(4, 'App\\Models\\User', 55);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('4de53f33-5e38-4c5b-bbd4-86228aa64623', 'App\\Notifications\\NovedadNotification', 'App\\Models\\User', 2, '{\"id\":15,\"title\":\"Notificacion prueba 4\",\"subtitle\":\"Parque Ciudadela Porvenir Etapa\"}', NULL, '2021-12-02 01:50:16', '2021-12-02 01:50:16'),
('9ea2b800-031d-40f8-a5a2-01694ad13f5c', 'App\\Notifications\\NovedadNotification', 'App\\Models\\User', 31, '{\"id\":15,\"title\":\"Notificacion prueba 4\",\"subtitle\":\"Parque Ciudadela Porvenir Etapa\"}', NULL, '2021-12-02 01:50:16', '2021-12-02 01:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `novedads`
--

CREATE TABLE `novedads` (
  `id` int UNSIGNED NOT NULL,
  `AsuntoNovedad` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `EstadoNovedad` enum('Sin atender','Atendida','En espera') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin atender',
  `DescripcionN` varchar(355) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `tipo_novedad_id` tinyint UNSIGNED NOT NULL,
  `actividad_id` bigint UNSIGNED NOT NULL,
  `empleado_id` bigint UNSIGNED DEFAULT NULL,
  `cliente_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `novedads`
--

INSERT INTO `novedads` (`id`, `AsuntoNovedad`, `EstadoNovedad`, `DescripcionN`, `isActive`, `tipo_novedad_id`, `actividad_id`, `empleado_id`, `cliente_id`, `created_at`, `updated_at`) VALUES
(1, 'Diseño', 'Atendida', 'El diseño no corresponde con lo pedido por el cliente en el contrato, por favor verificar en el mismo según lo acordado.', 'Active', 1, 6, NULL, 2, '2021-10-14 11:00:00', '2021-10-14 19:35:47'),
(2, 'Suelo', 'En espera', 'El suelo con cumple con las condiciones para la instalación, se esperan las instrucciones del coordinador de proyectos.', 'Active', 2, 6, 3, NULL, '2021-10-14 11:00:00', NULL),
(3, 'Clima', 'En espera', 'El dia de la instalacion estaba lloviendo por lo cual no se pudo llevar a cabo la actividad propuesta.', 'Active', 2, 3, 1, NULL, '2021-10-14 11:00:00', '2021-10-14 11:00:00'),
(4, 'Diseño', 'Sin atender', 'El diseño no corresponde con lo pedido inicialmente en el contrato, los colores de las secciones 1 y 2 son incorrectos.', 'Inactive', 1, 6, NULL, 3, '2021-10-23 11:00:00', '2021-10-14 19:36:26'),
(5, 'Documentos Empleado', 'Atendida', 'El instalador \'David Rodriguez Gomez\' se presento sin documentos el día de la obra, por lo que se le impidió la entrada.', 'Active', 1, 1, NULL, 5, '2021-10-26 11:00:00', '2021-10-14 21:22:08'),
(6, 'prueba auth', 'Sin atender', 'dbgdfg', 'Active', 1, 37, 14, 11, '2021-10-14 20:23:25', '2021-11-26 18:28:55'),
(7, 'Problemaas', 'En espera', 'novedad', 'Active', 1, 1, 1, NULL, '2021-10-14 21:22:51', '2021-10-14 21:22:51'),
(8, 'pruebaa de novedad', 'Sin atender', 'sfdf', 'Active', 2, 3, 10, NULL, '2021-11-04 16:58:17', '2021-11-04 17:12:55'),
(9, 'novv', 'Atendida', 'aaa', 'Active', 2, 1, NULL, 8, '2021-11-04 17:05:55', '2021-11-26 18:44:17'),
(10, 'prueba', 'Atendida', 'prueba para ver si la dash funciona', 'Active', 1, 23, 10, NULL, '2021-11-24 23:56:16', '2021-11-24 23:56:16'),
(11, 'inavg', 'Sin atender', 'dxfdfvd', 'Active', 1, 22, 10, NULL, '2021-11-27 05:36:50', '2021-11-27 05:36:50'),
(12, 'Notificacion prueba', 'Sin atender', 'Esto es una prueba ', 'Active', 2, 3, 10, NULL, '2021-12-02 01:35:15', '2021-12-02 01:35:15'),
(13, 'Notificacion prueba 2', 'Sin atender', 'Esto es un ejemplo 2', 'Active', 2, 3, 10, NULL, '2021-12-02 01:41:39', '2021-12-02 01:41:39'),
(14, 'cbgfdbh', 'Sin atender', 'dsgdeh', 'Active', 1, 3, 10, NULL, '2021-12-02 01:45:21', '2021-12-02 01:45:21'),
(15, 'Notificacion prueba 4', 'Atendida', 'UN GRAN PROBLEMA', 'Active', 1, 3, 10, NULL, '2021-12-02 01:50:16', '2021-12-02 01:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `obras`
--

CREATE TABLE `obras` (
  `id` bigint UNSIGNED NOT NULL,
  `NombreObra` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MedidaArea` double DEFAULT NULL,
  `MedidaPerimetro` double DEFAULT NULL,
  `CondicionDesnivel` double DEFAULT NULL,
  `TipoMaterialSuelo` enum('Cemento','Asfalto') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DetalleCondicionPiso` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `EstadoVerificacion` tinyint(1) NOT NULL DEFAULT '0',
  `DireccionObra` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DatosAdicionales` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `EstadoObra` enum('Activa','Terminada','Sin Iniciar','Cancelada') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Iniciar',
  `isActive` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `tipo_obra_id` tinyint UNSIGNED NOT NULL,
  `cliente_id` int UNSIGNED NOT NULL,
  `city_id` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obras`
--

INSERT INTO `obras` (`id`, `NombreObra`, `MedidaArea`, `MedidaPerimetro`, `CondicionDesnivel`, `TipoMaterialSuelo`, `DetalleCondicionPiso`, `EstadoVerificacion`, `DireccionObra`, `DatosAdicionales`, `EstadoObra`, `isActive`, `tipo_obra_id`, `cliente_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Parque Ciudadela Porvenir Etapa', 733, 27.074, 75, 'Cemento', 'Condición optima para instalar, con el material de piso recomendable, limpio y adecuado.', 1, 'Calle 151 D # 148 53', 'Su área es irregular, y tiene barandas de encerramiento metálico en el borde de la zona.', 'Sin Iniciar', 'Active', 2, 2, 1, '2021-06-24 11:28:43', '2021-09-08 19:21:55'),
(2, 'Colegio Rogelio Salmona I.E.D - Madelena', 908, 30.13, 76, 'Asfalto', 'La condición de desnivel del suelo es optima para la instalación, aprobado. Sin embargo, se necesita adecuar el asfalto para el inicio de obra.', 1, 'Avenida 78 # 144 A 57', 'El encargado/conserje del colegio brindo un sitio especifico para colocar los materiales.', 'Sin Iniciar', 'Inactive', 2, 4, 1, '2021-06-23 18:32:55', '2021-09-09 17:26:33'),
(3, 'Gimnasio Mayorcas', 140, 11.832, 54, 'Asfalto', 'No tiene el desnivel suficiente, la zona no esta aprobada para ser instalada, se necesita adecuar la zona y asignar personal.', 0, 'Carrera 92 Bis # 136 A 67', 'El piso de cemento no tiene buen terminado, necesita rellenarse.', 'Sin Iniciar', 'Active', 1, 5, 1, '2021-06-23 18:32:55', '2021-11-03 22:08:36'),
(4, 'Parque Las Gatas', 72, 30.765, 40, 'Asfalto', 'Tiene ranuras que deben ser rellenadas y adecuadas, el material es ideal para instalar, la condición de desnivel necesita pruebas para verificar si es optimo.', 0, 'Avenida 87 # 34 C 54', 'El parque es de forma circular, y se requiere que los colores a utilizar en el diseño sean llamativos.', 'Sin Iniciar', 'Inactive', 2, 1, 2, '2021-06-24 11:13:10', '2021-09-08 19:44:35'),
(5, 'Institución Educativa Juan Lozano', 94.753, 39.33, 78.5, 'Cemento', 'El piso es optimo para la instalación, la zona esta un poco sucia y necesita la limpieza adecuada.', 1, 'Carrera 187 Bis # 23 A 04', 'Los instaladores solo pueden trabajar de 6am a 6pm por normativa del colegio.', 'Activa', 'Active', 2, 1, 5, '2021-06-24 11:13:10', '2021-11-04 01:56:02'),
(6, 'Parque Tibabuyes', 23, 56, 2, 'Cemento', 'Aun no es optimo el suelo.', 0, 'cra 30 # 45 -544', NULL, 'Cancelada', 'Active', 2, 2, 1, '2021-08-07 04:05:03', '2021-11-04 00:28:40'),
(8, 'Gimnasio Hoy Mas Fuerte', 88, 98, 98, 'Asfalto', NULL, 0, 'uibfeesf', NULL, 'Sin Iniciar', 'Active', 1, 4, 10, '2021-08-21 01:56:15', '2021-11-03 22:49:59'),
(9, 'Parque Gaitana', 5, 90, 98, 'Asfalto', NULL, 0, 'cll 68 # 45', NULL, 'Activa', 'Active', 2, 2, 1, '2021-08-21 02:00:43', '2021-09-07 18:25:38'),
(10, 'Conjunto residencial Las Flores ', 89, 980, 98, 'Asfalto', '', 0, 'idofjdoignifngo', '', 'Sin Iniciar', 'Active', 2, 5, 5, '2021-08-21 02:27:01', '2021-09-09 01:08:20'),
(11, 'Colegio San Francisco', 34, 56, 23, 'Cemento', NULL, 0, 'cra 23', NULL, 'Sin Iniciar', 'Active', 2, 2, 4, '2020-08-27 07:57:37', '2021-09-08 09:59:05'),
(12, 'Parque Veracruzzz', 34, 56, 23, 'Asfalto', NULL, 0, 'fhbfghnfgh', NULL, 'Terminada', 'Active', 2, 1, 3, '2021-08-27 08:00:05', '2021-11-04 02:08:33'),
(13, 'Gimnasio Alvares', 34, 23, 4, 'Cemento', NULL, 0, 'cll 45 # 45 -09', NULL, 'Sin Iniciar', 'Active', 1, 5, 1, '2021-08-28 01:16:36', '2021-09-08 10:53:25'),
(14, 'Conjunto residencial alborada', NULL, NULL, NULL, 'Cemento', NULL, 0, 'cra 45 #cbgfv', NULL, 'Sin Iniciar', 'Inactive', 2, 2, 1, '2021-09-02 06:23:21', '2021-09-09 08:49:14'),
(15, 'Jardin Infantil Restrepo', 88, 984, 98, 'Asfalto', NULL, 0, 'uibfeesf', NULL, 'Cancelada', 'Active', 2, 2, 1, '2021-09-07 07:13:28', '2021-11-14 01:32:13'),
(16, 'otrooo', NULL, NULL, 34, 'Cemento', NULL, 0, 'dfdgdg', NULL, 'Cancelada', 'Inactive', 2, 30, 1, '2021-09-07 15:51:28', '2021-09-08 09:58:54'),
(17, 'prueba usuarios', NULL, NULL, NULL, 'Asfalto', 'Mal', 0, 'cra 30 # 45 -02', NULL, 'Terminada', 'Inactive', 2, 2, 1, '2021-09-07 16:17:41', '2021-09-07 18:02:37'),
(18, 'Obra San Agustin', NULL, NULL, NULL, 'Asfalto', NULL, 0, 'cll 105 # 45 A -20', NULL, 'Terminada', 'Active', 2, 4, 5, '2021-09-07 17:10:01', '2021-09-09 00:07:31'),
(19, 'parque tunal', NULL, NULL, NULL, 'Cemento', NULL, 0, 'dgvdgfgd', NULL, 'Sin Iniciar', 'Active', 1, 2, 1, '2021-09-08 10:45:33', '2021-09-08 18:14:38'),
(20, 'parque img', NULL, NULL, NULL, 'Asfalto', NULL, 0, 'dvgfgfg', NULL, 'Sin Iniciar', 'Active', 2, 2, 1, '2021-09-08 10:47:16', '2021-09-08 10:47:16'),
(21, 'Parque Tibabuyesssss', NULL, NULL, NULL, 'Cemento', NULL, 0, 'cra 1234', NULL, 'Sin Iniciar', 'Active', 1, 3, 5, '2021-09-08 16:10:26', '2021-09-08 16:10:26'),
(22, 'Colegio Agustiniano', NULL, NULL, NULL, 'Asfalto', NULL, 0, 'Cra 98 #133 A 34', NULL, 'Sin Iniciar', 'Active', 1, 2, 1, '2021-09-08 17:10:08', '2021-09-09 17:03:35'),
(23, 'Conjunto residencial ', NULL, NULL, NULL, 'Cemento', NULL, 0, 'dfhdgjgfj', NULL, 'Sin Iniciar', 'Active', 2, 2, 1, '2021-09-08 18:41:33', '2021-09-08 23:08:04'),
(24, 'parque los rosales', NULL, NULL, NULL, 'Asfalto', NULL, 0, 'cll 45 # 45 C -09', NULL, 'Sin Iniciar', 'Active', 2, 2, 1, '2021-09-08 20:18:23', '2021-09-08 20:18:23'),
(25, 'Jardin Infantil Rosales', NULL, NULL, NULL, 'Asfalto', NULL, 0, 'sfdggfg', NULL, 'Sin Iniciar', 'Active', 2, 2, 4, '2021-09-08 23:37:16', '2021-09-09 01:10:49'),
(26, 'obra colegio Norte', NULL, NULL, NULL, 'Asfalto', NULL, 0, 'cll 105 # 45 A -20', NULL, 'Sin Iniciar', 'Inactive', 2, 2, 9, '2021-09-09 08:37:09', '2021-09-09 08:44:19'),
(27, 'Parque Tibabuies', 123, 123, 123, 'Cemento', '123123', 0, '123123', '12312213123', 'Sin Iniciar', 'Active', 1, 2, 4, '2021-09-25 22:20:19', '2021-09-25 22:20:19'),
(28, 'Parque Nueva Vida', 12, 32, 43, 'Cemento', 'nueva obra', 0, 'KR94#74-65', NULL, 'Sin Iniciar', 'Active', 1, 3, 1, '2021-10-04 04:29:26', '2021-11-03 22:56:46'),
(29, 'Parque las villas', 34, 45, 79, 'Cemento', 'wsfedgrgd', 0, 'cll 105 # 45 A -20', 'rdgf', 'Activa', 'Active', 1, 30, 1, '2021-11-04 12:33:02', '2021-11-30 16:32:59'),
(30, 'obra nov', 34, 45, 60, 'Cemento', 'fhfhfgghjhgj', 0, 'cra 30 # 45 -54', 'dgdfh', 'Sin Iniciar', 'Active', 2, 3, 5, '2021-11-24 17:02:47', '2021-11-30 18:17:49'),
(31, 'Parque Nueva granada', 45, 45, 60, 'Cemento', NULL, 0, 'cll 105 # 45 A -20', NULL, 'Activa', 'Active', 1, 3, 1, '2021-11-24 17:13:50', '2021-11-30 16:36:49'),
(32, 'parque not', 34, 56, 34, 'Cemento', NULL, 0, 'cll 90 # 56 -80', NULL, 'Sin Iniciar', 'Active', 2, 2, 4, '2021-12-01 01:06:14', '2021-12-01 01:06:14'),
(33, 'dfhgfh', 3, NULL, NULL, 'Cemento', NULL, 0, 'ghgfn', NULL, 'Sin Iniciar', 'Active', 1, 3, 1, '2021-12-01 01:16:37', '2021-12-01 01:16:37'),
(34, 'dfhgfhfd', 3, NULL, NULL, 'Cemento', NULL, 0, 'ghgfn', NULL, 'Sin Iniciar', 'Active', 1, 3, 1, '2021-12-01 01:17:05', '2021-12-01 01:17:05'),
(35, 'trhfrgth', 4, 4, NULL, 'Cemento', NULL, 0, 'fghngn', NULL, 'Cancelada', 'Active', 1, 7, 5, '2021-12-01 01:18:58', '2021-12-01 01:18:58'),
(36, 'fdgfdhg', 4, 4, NULL, 'Cemento', NULL, 0, 'fghngn', NULL, 'Sin Iniciar', 'Active', 1, 7, 5, '2021-12-01 01:23:59', '2021-12-01 01:23:59'),
(37, 'Prueba 1', 23, 980, NULL, 'Cemento', NULL, 0, 'bvnjvbm', NULL, 'Sin Iniciar', 'Active', 1, 4, 4, '2021-12-01 01:27:12', '2021-12-01 01:27:12'),
(38, 'gfbhgfn', 45, 56, 67, 'Asfalto', NULL, 0, 'fgjnfhj', NULL, 'Sin Iniciar', 'Active', 1, 7, 5, '2021-12-01 01:29:40', '2021-12-01 01:29:40'),
(39, 'ysiii', 45, 56, 67, 'Asfalto', NULL, 0, 'fgjnfhj', NULL, 'Sin Iniciar', 'Active', 1, 7, 5, '2021-12-01 01:31:04', '2021-12-01 01:31:04'),
(40, 'prueba img', 45, 56, 656, 'Asfalto', NULL, 0, 'skfnfdngvjg', NULL, 'Activa', 'Active', 1, 3, 5, '2021-12-01 01:32:04', '2021-12-01 01:32:04'),
(41, 'fnvmv', 45, 45, 56, 'Cemento', NULL, 0, 'dvdvd', NULL, 'Sin Iniciar', 'Active', 1, 3, 5, '2021-12-01 01:43:24', '2021-12-01 01:43:24'),
(43, 'parquerfgfbgh', 56, 56, 98, 'Cemento', NULL, 0, 'fghjnml', NULL, 'Sin Iniciar', 'Active', 1, 3, 5, '2021-12-01 01:47:40', '2021-12-01 01:49:09'),
(44, 'parque', 45, 45, 45, 'Cemento', NULL, 0, 'rdhfghfj', NULL, 'Sin Iniciar', 'Inactive', 1, 4, 5, '2021-12-01 02:38:00', '2021-12-01 02:38:00'),
(45, 'parque dgfg', 45, 45, 45, 'Cemento', NULL, 0, 'rdhfghfj', NULL, 'Sin Iniciar', 'Active', 1, 4, 5, '2021-12-01 02:41:18', '2021-12-01 02:41:18'),
(46, 'reglas', 45, 65, 45, 'Cemento', NULL, 0, 'ghfgh', NULL, 'Terminada', 'Active', 1, 4, 4, '2021-12-01 21:33:19', '2021-12-01 21:33:19');


-- --------------------------------------------------------

--
-- Table structure for table `obra_usuario`
--

CREATE TABLE `obra_usuario` (
  `id` bigint UNSIGNED NOT NULL,
  `obra_id` bigint UNSIGNED NOT NULL,
  `empleado_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obra_usuario`
--

INSERT INTO `obra_usuario` (`id`, `obra_id`, `empleado_id`, `created_at`, `updated_at`) VALUES
(76, 16, 11, NULL, NULL),
(80, 27, 9, NULL, NULL),
(81, 26, 10, NULL, NULL),
(97, 8, 11, '2021-11-03 22:49:59', '2021-11-03 22:49:59'),
(101, 11, 14, NULL, NULL),
(109, 32, 8, '2021-12-01 01:06:14', '2021-12-01 01:06:14'),
(110, 32, 9, '2021-12-01 01:06:14', '2021-12-01 01:06:14'),
(111, 35, 6, '2021-12-01 01:18:58', '2021-12-01 01:18:58'),
(112, 35, 22, '2021-12-01 01:18:58', '2021-12-01 01:18:58'),
(113, 38, 5, '2021-12-01 01:29:40', '2021-12-01 01:29:40'),
(114, 38, 4, '2021-12-01 01:29:40', '2021-12-01 01:29:40'),
(115, 38, 6, '2021-12-01 01:29:40', '2021-12-01 01:29:40'),
(116, 39, 7, '2021-12-01 01:31:04', '2021-12-01 01:31:04'),
(117, 39, 8, '2021-12-01 01:31:04', '2021-12-01 01:31:04'),
(118, 39, 9, '2021-12-01 01:31:04', '2021-12-01 01:31:04'),
(119, 40, 4, '2021-12-01 01:32:04', '2021-12-01 01:32:04'),
(120, 40, 5, '2021-12-01 01:32:04', '2021-12-01 01:32:04'),
(121, 40, 6, '2021-12-01 01:32:04', '2021-12-01 01:32:04'),
(122, 40, 7, '2021-12-01 01:32:04', '2021-12-01 01:32:04'),
(126, 43, 9, '2021-12-01 01:49:17', '2021-12-01 01:49:17'),
(127, 43, 10, '2021-12-01 01:49:17', '2021-12-01 01:49:17'),
(128, 44, 4, '2021-12-01 02:38:00', '2021-12-01 02:38:00'),
(129, 44, 5, '2021-12-01 02:38:00', '2021-12-01 02:38:00'),
(130, 44, 13, '2021-12-01 02:38:01', '2021-12-01 02:38:01'),
(131, 45, 1, '2021-12-01 02:41:18', '2021-12-01 02:41:18'),
(132, 45, 12, '2021-12-01 02:41:18', '2021-12-01 02:41:18'),
(133, 45, 13, '2021-12-01 02:41:18', '2021-12-01 02:41:18'),
(134, 45, 14, '2021-12-01 02:41:18', '2021-12-01 02:41:18'),
(135, 46, 5, '2021-12-01 21:33:19', '2021-12-01 21:33:19'),
(136, 46, 6, '2021-12-01 21:33:19', '2021-12-01 21:33:19'),
(137, 46, 8, '2021-12-01 21:33:19', '2021-12-01 21:33:19'),
(138, 46, 10, '2021-12-01 21:33:19', '2021-12-01 21:33:19'),
(139, 1, 18, NULL, NULL),
(140, 1, 19, NULL, NULL),
(141, 29, 6, NULL, NULL),
(143, 8, 5, NULL, NULL),
(144, 17, 22, NULL, NULL),
(145, 8, 22, NULL, NULL),
(146, 16, 5, NULL, NULL),
(147, 3, 5, NULL, NULL),
(148, 32, 22, NULL, NULL),
(149, 21, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('clienteeee@gmail.com', '$2y$10$OLrECLoo6A5LC1N89bhxruA1ywivAXy79g.TEQoAgFMekvVHSJYlW', '2021-11-24 22:50:36'),
('lol123@gmail.com', '$2y$10$rKWdJYZ74wChsMrC.e4qC.B8QAv6vpLgFHxoUKdHuwi8aNNfqUr5O', '2021-12-03 03:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user_management_access', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(2, 'view_dashboard', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(3, 'permission_create', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(4, 'permission_edit', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(5, 'permission_show', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(6, 'permission_delete', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(7, 'permission_access', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(8, 'role_create', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(9, 'role_edit', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(10, 'role_show', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(11, 'role_delete', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(12, 'role_access', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(13, 'empleado_create', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(14, 'empleado_edit', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(15, 'empleado_show', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(16, 'empleado_delete', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(17, 'empleado_active', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(18, 'empleado_access', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(19, 'empleado_all', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(20, 'cliente_create', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(21, 'cliente_edit', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(22, 'cliente_show', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(23, 'cliente_delete', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(24, 'cliente_active', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(25, 'cliente_access', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(26, 'obra_create', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(27, 'obra_usuario_save', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(28, 'obra_edit', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(29, 'obra_editcond', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(30, 'obra_show', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(31, 'obra_delete', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(32, 'obra_active', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(33, 'obra_all', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(34, 'obra_access', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(35, 'calendario_create', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(36, 'calendario_edit', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(37, 'calendario_usuario_save', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(38, 'calendario_show', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(39, 'calendario_active', 'web', '2021-11-05 13:32:12', '2021-11-05 13:32:12'),
(40, 'calendario_delete', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(41, 'calendario_access', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(42, 'calendario_all', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(43, 'diseno_create', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(44, 'diseno_edit', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(45, 'diseno_show', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(46, 'diseno_delete', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(47, 'diseno_access', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(48, 'diseno_all', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(49, 'material_create', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(50, 'material_edit', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(51, 'material_show', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(52, 'material_delete', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(53, 'material_active', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(54, 'material_diseno_save', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(55, 'material_access', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(56, 'novedad_create', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(57, 'novedad_edit', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(58, 'novedad_editTime', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(59, 'novedad_show', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(60, 'novedad_delete', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(61, 'novedad_active', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(62, 'novedad_access', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(63, 'novedad_all', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(64, 'planilla_create', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(65, 'planilla_edit', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(66, 'planilla_show', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(67, 'planilla_delete', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(68, 'planilla_active', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(69, 'planilla_access', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(70, 'planilla_all', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(71, 'seccion_create', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(72, 'seccion_edit', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(73, 'seccion_show', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(74, 'seccion_delete', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(75, 'seccion_active', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13'),
(76, 'seccion_access', 'web', '2021-11-05 13:32:13', '2021-11-05 13:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `planillas`
--

CREATE TABLE `planillas` (
  `id` bigint UNSIGNED NOT NULL,
  `ArchivoPlanilla` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `FechaPlanilla` date NOT NULL,
  `FechaExpiracion` date NOT NULL,
  `EstadoPlanilla` enum('vigente','vencida') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vigente',
  `isActive` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empleado_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `planillas`
--

INSERT INTO `planillas` (`id`, `ArchivoPlanilla`, `FechaPlanilla`, `FechaExpiracion`, `EstadoPlanilla`, `isActive`, `created_at`, `updated_at`, `empleado_id`) VALUES
(1, 'aqui', '2021-11-30', '2021-12-30', 'vigente', 'Active', '2021-06-24 11:20:46', '2021-11-30 22:58:17', 1),
(2, 'aqui', '1111-11-10', '1111-12-10', 'vencida', 'Inactive', '2021-06-24 11:20:46', '2021-12-01 00:21:32', 2),
(3, 'adgdg', '2021-10-15', '2021-11-14', 'vencida', 'Inactive', '2021-06-24 11:26:00', '2021-10-14 10:20:06', 3),
(4, 'aqui', '2021-12-06', '2022-01-05', 'vigente', 'Active', '2021-06-24 11:26:00', '2021-11-30 22:57:10', 5),
(5, 'dgfhfhfh', '2021-12-04', '2022-01-03', 'vigente', 'Active', '2021-10-14 10:02:11', '2021-11-30 22:56:00', 10),
(6, '2222', '2222-02-22', '2222-03-24', 'vigente', 'Active', '2021-10-14 10:19:01', '2021-10-14 10:19:57', 14),
(7, 'idk', '2021-10-27', '2021-11-26', 'vencida', 'Active', NULL, '2021-12-01 07:31:13', 14),
(8, 'planilla', '2021-12-01', '2021-12-31', 'vigente', 'Inactive', '2021-11-30 06:39:28', '2021-11-30 22:59:50', 22),
(9, 'qaue', '2021-10-11', '2021-11-10', 'vencida', 'Active', '2021-11-30 08:42:14', '2021-12-01 07:24:36', 16),
(10, 'archvi', '2021-12-01', '2021-12-31', 'vigente', 'Active', '2021-11-30 22:05:46', '2021-11-30 22:05:46', 7),
(11, 'sdgvdfg', '2021-11-30', '2021-12-30', 'vigente', 'Active', '2021-11-30 22:07:52', '2021-11-30 22:07:52', 4),
(12, 'sdgvdfg', '2021-11-30', '2021-12-30', 'vigente', 'Active', '2021-11-30 22:08:29', '2021-11-30 22:08:29', 4),
(13, 'aqui', '2021-11-30', '2021-12-30', 'vigente', 'Active', '2021-11-30 22:09:46', '2021-12-01 18:46:06', 6),
(14, 'aqui', '2021-11-30', '2021-12-30', 'vigente', 'Active', '2021-11-30 22:10:05', '2021-11-30 22:10:05', 6),
(15, 'xcvxcb', '2021-11-30', '2021-12-30', 'vigente', 'Active', '2021-11-30 22:11:11', '2021-11-30 22:11:11', 6),
(16, 'aqui', '2021-12-03', '2022-01-02', 'vigente', 'Active', '2021-11-30 22:18:02', '2021-11-30 22:18:02', 6),
(17, 'aaaa', '2021-12-01', '2021-12-31', 'vigente', 'Active', '2021-12-01 06:58:48', '2021-12-01 07:22:35', 1),
(18, 'planillaaaa', '2021-12-01', '2021-12-31', 'vigente', 'Inactive', '2021-12-01 07:17:54', '2021-12-01 07:22:42', 26),
(19, 'planilla_afiliacion', '2021-12-01', '2021-12-31', 'vigente', 'Active', '2021-12-01 12:40:30', '2021-12-01 12:40:30', 15),
(20, 'bob', '2021-12-01', '2021-12-31', 'vigente', 'Active', '2021-12-01 12:41:56', '2021-12-01 12:41:56', 23),
(21, 'erick', '2021-12-01', '2021-12-31', 'vigente', 'Active', '2021-12-01 12:43:59', '2021-12-01 12:43:59', 12),
(22, 'qaue', '2021-12-01', '2021-12-31', 'vigente', 'Active', '2021-12-01 12:45:48', '2021-12-01 12:45:48', 1),
(23, 'jgiji', '2021-12-01', '2021-12-31', 'vigente', 'Active', '2021-12-01 12:48:48', '2021-12-01 12:48:48', 21),
(24, 'planilla_juan', '2021-12-01', '2021-12-31', 'vigente', 'Active', '2021-12-01 12:50:46', '2021-12-01 12:50:46', 3),
(25, 'planilla_jean', '2021-12-01', '2021-12-31', 'vigente', 'Active', '2021-12-01 12:54:55', '2021-12-01 12:54:55', 11),
(26, 'planillas/afiliacion_MariaCardona_December.pdf', '2021-12-01', '2021-12-31', 'vigente', 'Active', '2021-12-01 18:33:54', '2021-12-01 18:33:54', 1),
(27, 'planillas/afiliacion_CarlosManuel_December.pdf', '2021-12-15', '2022-01-14', 'vigente', 'Active', '2021-12-01 21:29:54', '2021-12-01 21:29:54', 4),
(28, 'planillas/afiliacion_CarlosManuel_December.pdf', '2021-12-02', '2022-01-01', 'vigente', 'Active', '2021-12-02 04:58:39', '2021-12-02 04:58:39', 4),
(29, 'planillas/afiliacion_Juliana_December.pdf', '2021-12-15', '2022-01-14', 'vigente', 'Active', '2021-12-02 05:36:33', '2021-12-02 05:36:33', 15),
(30, 'planillas/afiliacion_Mariana_December.pdf', '2021-12-02', '2022-01-01', 'vigente', 'Active', '2021-12-02 08:10:56', '2021-12-02 08:10:56', 6),
(31, 'planillas/afiliacion_JuanSebastian_December.pdf', '2021-12-02', '2022-01-01', 'vigente', 'Active', '2021-12-03 04:32:35', '2021-12-03 04:32:35', 3);


-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-10-29 22:23:17', '2021-10-29 22:23:17'),
(2, 'Cliente', 'web', '2021-10-29 22:23:17', '2021-10-29 22:23:17'),
(3, 'Gerente', 'web', '2021-10-29 22:23:17', '2021-10-29 22:23:17'),
(4, 'Coordinador', 'web', '2021-10-29 22:23:17', '2021-10-29 22:23:17'),
(5, 'Instalador', 'web', '2021-10-29 22:23:17', '2021-10-29 22:23:17'),
(6, 'Ingeniero', 'web', '2021-10-29 22:23:17', '2021-10-29 22:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(30, 2),
(34, 2),
(38, 2),
(41, 2),
(45, 2),
(47, 2),
(55, 2),
(56, 2),
(58, 2),
(59, 2),
(62, 2),
(73, 2),
(76, 2),
(2, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(45, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(59, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 3),
(73, 3),
(76, 3),
(2, 4),
(15, 4),
(18, 4),
(25, 4),
(29, 4),
(30, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(45, 4),
(47, 4),
(51, 4),
(55, 4),
(56, 4),
(57, 4),
(59, 4),
(60, 4),
(61, 4),
(62, 4),
(66, 4),
(69, 4),
(73, 4),
(76, 4),
(2, 5),
(30, 5),
(34, 5),
(38, 5),
(41, 5),
(45, 5),
(47, 5),
(51, 5),
(55, 5),
(56, 5),
(58, 5),
(59, 5),
(62, 5),
(66, 5),
(69, 5),
(73, 5),
(76, 5),
(2, 6),
(30, 6),
(34, 6),
(38, 6),
(41, 6),
(43, 6),
(44, 6),
(45, 6),
(46, 6),
(47, 6),
(51, 6),
(54, 6),
(55, 6),
(59, 6),
(62, 6),
(66, 6),
(69, 6),
(71, 6),
(72, 6),
(73, 6),
(74, 6),
(75, 6),
(76, 6);

-- --------------------------------------------------------

--
-- Table structure for table `rols`
--

CREATE TABLE `rols` (
  `id` tinyint UNSIGNED NOT NULL,
  `NombreRol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rols`
--

INSERT INTO `rols` (`id`, `NombreRol`, `Descripcion`) VALUES
(1, 'Gerente', 'Es la persona que administra y maneja la empresa, todos las actividades referentes a contratos con el cliente, material, proyectos, nomina, entre otros.'),
(2, 'Coordinador de Proyecto', 'Dirige la obra vigente a realizar, asigna actividades a los demás empleados, y contabiliza los tiempos en que se lleva a cabo la obra.'),
(3, 'Instalador', 'Encargado de la instalación del caucho EMDM y realización del plano de obra.'),
(4, 'Ingeniero', 'Encargado del diseño y realización de planos de la obra.');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rolusuario`
-- (See below for the actual view)
--
CREATE TABLE `rolusuario` (
`NombreCompleto` varchar(100)
,`NombreRol` varchar(50)
,`NumeroDocumento` bigint unsigned
);

-- --------------------------------------------------------

--
-- Table structure for table `seccions`
--

CREATE TABLE `seccions` (
  `id` int UNSIGNED NOT NULL,
  `NombreSeccion` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `AreaSeccion` double(8,2) NOT NULL,
  `PerimetroSec` double(8,2) NOT NULL,
  `isActive` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `color_id` tinyint UNSIGNED DEFAULT NULL,
  `diseno_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seccions`
--

INSERT INTO `seccions` (`id`, `NombreSeccion`, `AreaSeccion`, `PerimetroSec`, `isActive`, `color_id`, `diseno_id`, `created_at`, `updated_at`) VALUES
(1, 'Seccion Sur 1', 30.40, 19.20, 'Inactive', 8, 2, '2021-10-15 16:53:31', '2021-10-15 22:55:46'),
(7, 'Seccion SurOeste 22', 33.30, 33.30, 'Active', 6, 2, '2021-10-15 16:53:31', '2021-10-15 22:59:53'),
(8, 'Seccion SurOeste 2', 27.30, 12.40, 'Active', 6, 2, '2021-10-15 16:53:31', '2021-10-15 16:53:05'),
(9, 'Seccion Izquierda 2', 21.40, 9.20, 'Active', 9, 2, '2021-10-15 16:53:31', '2021-10-15 16:53:05'),
(10, 'Seccion NorOeste 2', 28.40, 16.00, 'Active', 10, 3, '2021-10-15 16:53:31', '2021-10-15 16:53:05'),
(11, 'Seccion DerechaSur 0', 30.60, 14.70, 'Active', 4, 4, '2021-10-15 16:53:31', '2021-10-15 16:53:05'),
(12, 'seccion sur 34', 35.00, 45.00, 'Active', 6, 2, '2021-10-15 23:03:32', '2021-10-15 23:50:14'),
(13, 'otra seccion', 35.00, 45.00, 'Inactive', 7, 3, '2021-10-15 23:05:18', '2021-10-15 23:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5abuF5d9Ehb9U8MzVOVeAav1QOLCTtKa07r9Frjy', 31, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUUVqZGdoblFqTGV4V0lDZlBSd2lvblRkUFNCNU9Yd3Q0TXZoSVUxVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsZWFkb3MiO31zOjU6ImFsZXJ0IjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozMTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDVVQlNUdFFrQjZwZkpJbGx5QWkyRXVtVW5FN0p6Sy82cTNEVnU5NUlXVUcuTFlOQXc2LmZXIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ1VUJTVHRRa0I2cGZKSWxseUFpMkV1bVVuRTdKeksvNnEzRFZ1OTVJV1VHLkxZTkF3Ni5mVyI7fQ==', 1638592385),
('yJye4nuYFbkdf8peCoKNU1o5vH6iy0TDkLcyQrlL', 36, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicEFzaDNrdWVLYlpkemFnYXRMY1FuVWFwZnJrQ2p4akFOSnRPUmFnZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MzY7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRLNVFQZDl6eE1HcjliVUVybi5IZi91bktBSmhYVGpmV2FFRnJkc0Z3ZktnZDE5cFdsdUpucSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkSzVRUGQ5enhNR3I5YlVFcm4uSGYvdW5LQUpoWFRqZldhRUZyZHNGd2ZLZ2QxOXBXbHVKbnEiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9fQ==', 1638587851);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tipoidentificacionusuario`
-- (See below for the actual view)
--
CREATE TABLE `tipoidentificacionusuario` (
`NombreCompleto` varchar(100)
,`NumeroDocumento` bigint unsigned
,`TipoIdentificacion` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_clientes`
--

CREATE TABLE `tipo_clientes` (
  `id` tinyint UNSIGNED NOT NULL,
  `nombreTipoC` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DescripcionCl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_clientes`
--

INSERT INTO `tipo_clientes` (`id`, `nombreTipoC`, `DescripcionCl`) VALUES
(1, 'Persona Natural', 'Es un cliente que solicita el servicio de instalación individualmente con el nombre de la persona y sus contactos personales.'),
(2, 'Empresa', 'Organización/entidad que solicita el servicio de instalación, los datos de contacto son de la empresa.');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_identificacions`
--

CREATE TABLE `tipo_identificacions` (
  `id` tinyint UNSIGNED NOT NULL,
  `TipoIdentificacion` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_identificacions`
--

INSERT INTO `tipo_identificacions` (`id`, `TipoIdentificacion`) VALUES
(1, 'Cédula de Ciudadanía'),
(4, 'Cédula de Extranjería'),
(3, 'NIT'),
(2, 'Pasaporte');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_materials`
--

CREATE TABLE `tipo_materials` (
  `id` tinyint UNSIGNED NOT NULL,
  `NombreTipoM` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DescripcionMaterial` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_materials`
--

INSERT INTO `tipo_materials` (`id`, `NombreTipoM`, `DescripcionMaterial`) VALUES
(1, 'Resina', 'Pegante especial utilizado para adherir el material/caucho al piso.'),
(2, 'Base', 'El material base para fortalecer el piso, la textura y soporte cuando se implemente la obra, propiedad permeable para el agua.'),
(3, 'Caucho EPDM', 'Material rigido y elastico, ideal para el recubrimiento de diferentes tipos de superficies, además de ser antideslizante y permeable'),
(4, 'Pisos de caucho', 'Utilizado para obras interiores, tiene diferentes texturas, medidas y características. ');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_novedads`
--

CREATE TABLE `tipo_novedads` (
  `id` tinyint UNSIGNED NOT NULL,
  `NombreTipoN` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DescripcionTipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_novedads`
--

INSERT INTO `tipo_novedads` (`id`, `NombreTipoN`, `DescripcionTipo`) VALUES
(1, 'Cliente', 'Puede ser por cuenta del cliente registrado o una empresa '),
(2, 'Empleado', 'Puede ser cualquier funcionario de DRACOLSA');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_obras`
--

CREATE TABLE `tipo_obras` (
  `id` tinyint UNSIGNED NOT NULL,
  `TipoObra` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DescripcionTO` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_obras`
--

INSERT INTO `tipo_obras` (`id`, `TipoObra`, `DescripcionTO`) VALUES
(1, 'Interior', 'Tipo de obra que se realiza para establecimientos cerrados, puede ser realizada a partir de la línea de pisos en caucho o con la línea de pisos para exterior.'),
(2, 'Exterior', 'Tipo de obra que se realiza para establecimientos abiertos, generalmente parques o canchas, principalmente son con la línea de pisos para exterior.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NumeroDocumento` bigint UNSIGNED NOT NULL,
  `RolExterno` enum('cliente','empleado','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empleados_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `NumeroDocumento`, `RolExterno`, `isActive`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `empleados_id`) VALUES
(1, 'Julia Andrés Castro Carreño ', 'Julian@12gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 1001300365, 'cliente', 'Active', NULL, NULL, NULL, NULL, '', NULL, '2021-10-08 13:57:06', NULL),
(2, 'IDRD ', 'IDRD1221@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 1001365896, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-02 13:19:36', NULL),
(3, 'Giovanny Chaparro Castro', 'GiovanyCC@gmail.com', '2021-11-25 02:49:00', '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 1001345587, 'cliente', 'Active', NULL, NULL, NULL, NULL, '', NULL, '2021-09-09 19:53:20', NULL),
(4, 'ProvedoresCo', 'Provedor@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 8078998769, 'cliente', 'Active', NULL, NULL, NULL, NULL, '', NULL, '2021-09-09 19:48:22', NULL),
(5, 'Laura Valentina Avendaño', 'LauraVA10@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 1002365589, 'cliente', 'Inactive', NULL, NULL, NULL, NULL, '', NULL, '2021-11-04 17:00:15', NULL),
(6, 'echo \"holaaaaaaaaa\"', 'fumbraCO@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 31459459, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-09-08 17:18:12', '2021-10-02 13:10:40', NULL),
(7, 'mar sanchez', 'marsan34@gmail.com', '2021-11-05 17:36:38', '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 945968595, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-09-08 17:29:50', '2021-10-02 13:23:31', NULL),
(8, 'Jualiana Gomez', 'jul05gom@hotmail.com', '2021-11-11 14:03:43', '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 39659695, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-09-08 17:30:57', '2021-11-11 14:03:43', NULL),
(9, 'holaaa', 'hola@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 35757676, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-10-04 16:22:18', NULL, NULL),
(10, 'empresa', 'correo@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 30490594059, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-10-07 09:24:21', '2021-10-07 09:24:21', NULL),
(11, 'conjunto plem', 'pleconjj@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 2493043948, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-10-07 10:51:09', '2021-10-07 10:51:09', NULL),
(12, 'aaaa', 'sdds', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 343545, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'eee', 'skfj@correo.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 454, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Maria Cardona', 'Gomita@gmail.com', '2021-11-30 13:47:39', '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 1001347789, 'empleado', 'Active', NULL, NULL, NULL, NULL, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', NULL, '2021-11-30 23:49:02', NULL),
(15, 'Camilo Andrés', 'CAMILO.andr23@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 1225354785, 'empleado', 'Active', NULL, NULL, NULL, NULL, 'storage/perfil/blog1-2.jpg', NULL, NULL, NULL),
(16, 'Juan Sebastian', 'RinconCP@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 1069698231, 'empleado', 'Active', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(17, 'Carlos Manuel', 'Carlos354Gon@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 658768788, 'empleado', 'Active', NULL, NULL, NULL, NULL, '', NULL, '2021-11-30 23:52:15', NULL),
(18, 'Andres', 'andres@gmail.com', '2021-11-09 13:48:29', '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 103215120651, 'empleado', 'Active', NULL, NULL, NULL, NULL, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-08-08 00:51:19', '2021-11-30 13:31:21', NULL),
(19, 'Mariana', 'mariana@gmail.com', '2021-12-02 06:31:16', '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 20459409568, 'empleado', 'Active', NULL, NULL, NULL, NULL, 'storage/perfil/dia.PNG', '2021-09-10 12:38:11', '2021-09-10 12:40:21', NULL),
(20, 'empleadosss', 'empleado@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 4958906859, 'empleado', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-10-04 21:28:23', '2021-10-04 21:28:23', NULL),
(21, 'lippp', 'lip45@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 248349359, 'empleado', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-10-06 14:40:58', '2021-10-12 14:17:59', NULL),
(22, 'lol 1', 'lip123@gmail.com', '2021-12-01 03:41:05', '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 350495400, 'empleado', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-01 03:41:05', NULL),
(23, 'Giovanny Castro Avendaño', 'lol123@gmail.com', '2021-11-05 17:18:53', '$2y$10$hET40rP4CTkqn1ElcA1aTu9m6m797poA3sEyoxgLGexlIpqf03ukG', 350495405, 'empleado', 'Active', NULL, NULL, NULL, NULL, 'profile-photos/ziFklO4Ev7lVZgUcJtqHvKXdhxnzh2lg45Ytchoz.png', NULL, '2021-12-03 03:14:56', NULL),
(24, 'jean sanchez', 'jeansanc34@gmail.com', '2021-11-05 17:31:45', '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 3318495400, 'empleado', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Erick', 'sumama@gmail.com', '2021-11-30 17:44:25', '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 1001300341, 'empleado', 'Active', NULL, NULL, NULL, NULL, 'xddddd', '2021-10-14 14:52:30', '2021-10-14 14:52:30', NULL),
(26, 'Giovanny Chaparro Castro', 'giogg08@gmail.com', NULL, '$2y$10$PT8nd0kIjx.zBDn/rUCuwuOZzIR.eshBW4XFBz8FM5RnSlTbZ3NKe', 3493045049, 'empleado', 'Active', NULL, NULL, NULL, NULL, 'dv', '2021-10-14 15:05:49', '2021-11-30 16:49:55', NULL),
(27, 'Julian Andres Castro', 'correooo@gmail.com', '2021-11-12 14:34:21', '$2y$10$dZ3RmFf5sEU1fQdJjZoWAO2HKHIGokw1dj1tGQOeSxH1MmWswqHMu', 34545465, 'empleado', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-10-14 15:31:07', '2021-11-30 16:52:38', NULL),
(28, 'Juliana', 'Papa@gmail.com', '2021-11-27 07:42:19', '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 1001300365, 'empleado', 'Active', NULL, NULL, NULL, NULL, 'xddddd', '2021-10-14 15:44:54', '2021-11-27 07:42:19', NULL),
(29, 'adsfdf', 'camSuear349@gmail.com', NULL, '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 2646415, 'empleado', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'gerentee', 'camSear349@gmail.com', '2021-11-11 22:30:57', '$2y$10$fojWoXIX0cE3n6/fp2.P4eGrFzyO701sTsqWyfjlxJ/elIgDZBY12', 26466415, 'empleado', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'para correo', 'lauval7771@gmail.com', '2021-11-05 17:34:25', '$2y$10$5UBSTtQkB6pfJIllyAi2EumUnE7JzK/6q3DVu95IWUG.LYNAw6.fW', 23434344, 'empleado', 'Active', NULL, NULL, 'BASTEaXYR3XPC6aRWgrjWLScmzbVBQnJRw1Dms2RqYQofZUvXuQ2K5PCDiC8', NULL, NULL, '2021-11-05 17:33:49', '2021-12-04 04:19:58', NULL),
(32, 'cliente prueba', 'cliente1@gmail.com', NULL, '$2y$10$Mp4Q.5LO/0WWE8WmlB/cIOe31zQRJsrKUSsEup9JfTZY4pQ4Kxnru', 38293848, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-11-12 16:53:34', '2021-11-12 16:53:34', NULL),
(33, 'clientee', 'cliente2@gmail.com', NULL, '$2y$10$7izv8PSjx3h1ZD0NKZcHWeNXMZlg.0qgoyNRxg81yUQbqbYIWY2R6', 30459459, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-11-12 16:55:19', '2021-11-12 16:55:19', NULL),
(34, 'Fernando', 'GerenteT@gmail.com', NULL, '$2y$10$xwd2jrJ0fKBTLaVuuHKAweXzsRUF/Bxfr4GO0lNfzwns2iDnqmwpe', 1004523365, 'empleado', 'Active', NULL, NULL, NULL, NULL, 'file.png', '2021-11-12 17:05:42', '2021-11-27 21:48:30', NULL),
(35, 'Gustavo', 'CoordinadorT@gmail.com', '2021-11-12 17:45:13', '$2y$10$lpdFlqdpJdYxi7DjgUjLBu/k3Od1U1miXxCaLUqecXdCsL38aH0KK', 1200563348, 'empleado', 'Active', NULL, NULL, NULL, NULL, 'xddddd', '2021-11-12 17:08:29', '2021-11-12 17:45:13', NULL),
(36, 'Sandra ', 'IngenieroT@gmail.com', '2021-11-12 20:33:25', '$2y$10$TTNVRDIXeOsiGMlzkMdCc.YPPZJJde.u3tFO.eMz2SwwbF9xISIEW', 1400325641, 'empleado', 'Inactive', NULL, NULL, '2PEmgoTUK7QHdgBu6n5RlXNB0GNlTv4k2ymDjsaFh4rLwUlsXVkJ74c3QkZZ', NULL, 'file.png', '2021-11-12 17:11:15', '2021-12-04 04:23:43', NULL),
(37, 'Bob', 'InstaladorT@gmail.com', NULL, '$2y$10$7TXTTqp6eRoftxDgO4y2lukwrtVt.5/hOif0lb8LX89F5x9yVycV2', 1001325565, 'empleado', 'Active', NULL, NULL, NULL, NULL, 'xddd', '2021-11-12 17:13:30', NULL, NULL),
(38, 'cliente otro', 'cliente3@gmail.com', NULL, '$2y$10$o4W6hBvX6x8tDvG9vqNZ/.PBlbK38MMTEcjQ55HOstCsuy0JIy7je', 34354545, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-11-12 17:50:15', '2021-11-12 17:50:15', NULL),
(39, 'ffdgfg', 'clienteeee@gmail.com', '2021-11-23 14:24:26', '$2y$10$UHfOLg9pG6xcrpyEl/ort.GWTYpaZ5AbTZVKzl9KYUp.3pXR1zx3e', 43545454, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-11-12 18:07:13', '2021-11-23 14:24:26', NULL),
(40, 'client', 'dijfigv@gmail.com', NULL, '$2y$10$C79KZLn9EWKtHt1xPth1pOMRqYijOS4jQtTHndMz0c/0.hUB7RfIC', 23403955, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-11-21 01:26:03', '2021-11-21 01:26:03', NULL),
(41, 'ni idea', 'niIdea@gmail.com', NULL, '$2y$10$0.oL/6tDPgkg7tNuHJsyjuoUCL83mtY8JSg9XKMk45fh6HPzfH4Q.', 39584598, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-11-24 23:18:19', '2021-11-24 23:18:19', NULL),
(42, 'treball prueba', 'TreballCorp@gmail.com', '2021-11-26 08:28:22', '$2y$10$e6irHt.M4x5kgfMwmPDBoumJpBORuvSz2AyjBjZx4jSpcKU3FcJ26', 394495940, 'empleado', 'Inactive', NULL, NULL, NULL, NULL, NULL, '2021-11-26 08:26:07', '2021-11-30 23:49:40', NULL),
(43, 'clien', 'clirnyr@gmail.com', NULL, '$2y$10$3Zxf9PIPXYnOE6wGOp2h0OwvktzqCE9CWl6nhMy3seDdzCWjARj.u', 4564656, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 02:16:04', '2021-12-01 02:16:04', NULL),
(44, 'hbgfvnfg', 'cliente12@gmail.com', NULL, '$2y$10$RlZvtgzt5PdcXmJgubiqAu4bp7gRANNUzMS1UAN.eYggQeueDwfW2', 5657657, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 02:17:41', '2021-12-01 02:17:41', NULL),
(45, 'hgfhngf', 'clfgn@gmail.com', NULL, '$2y$10$ZuZwEfLszrS6VePi.D85Jeg/6mw79yMO5ITeswKSihkiXqi6LJzVu', 343556565, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 02:19:21', '2021-12-01 02:19:21', NULL),
(46, 'fvbhvn', 'dgfhfh@gmail.co', NULL, '$2y$10$Xp.zuCt/G793BO28Co3I6eDeXXSKkKQv44pkZSYDK6FryDlmWvBSi', 24345445, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 02:26:14', '2021-12-01 02:26:14', NULL),
(47, 'dfgdfhgf', 'sifunciona@gmail.com', NULL, '$2y$10$3IrCJqGxAjqxACtBHKYCEOrf.EMQo1U75nQlGyZ48tdl7x7PmWDP.', 5465657, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 02:27:40', '2021-12-01 02:27:52', NULL),
(48, 'Nuevo Cliente', 'clientenew@gmail.com', NULL, '$2y$10$n1QhuIretRPANKxRbOqY5ebjJUJBO8TjQ1KatdmEoK7VZlh251/0m', 35454656, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 02:29:10', '2021-12-01 02:29:21', NULL),
(49, 'sara', 'evento@gmail.com', NULL, '$2y$10$wzDju48Q6SNSYYvBeIaNLec8r/rlckSka343ZwcB9ZHpwl7AEn1Yu', 6575676, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 02:35:54', '2021-12-01 02:36:02', NULL),
(50, 'dgvfgb', 'dgfg@cfgm.com', NULL, '$2y$10$su5XsF4KEQSCDLNWdsHsXeUbivdinPcRAHEigNC1bVj7rpKgn6JF.', 54765768, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 02:52:13', '2021-12-01 02:52:13', NULL),
(51, 'hdfgghj', 'dfngjn@gmail.com', NULL, '$2y$10$I0nGIZ3Jk1Ef88xepv1cwuxNgmLyPZh5h/Q7fBUlpBqy2Tz5v28vy', 878789, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 02:56:41', '2021-12-01 02:56:41', NULL),
(52, 'client fgbmjk', 'correoclient@gmail.com', NULL, '$2y$10$fk8TKlDJYIxRTw4sKgCeh.xzs04Lgt2R9kuGmq1vgMT6FKzebp192', 34546565, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 03:02:15', '2021-12-01 03:02:15', NULL),
(53, 'sara cliente', 'saraclien34@gmail.com', '2021-12-02 15:51:11', '$2y$10$BdlrVPhAS7IOheSh2Kag6.zJCoDW/HTtqVTjAwtPpsTNUkMKV6qL2', 45869856, 'cliente', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 03:05:37', '2021-12-01 03:05:37', NULL),
(54, 'Juan Ramirez', 'juanram062@gmail.com', NULL, '$2y$10$y70mvrvJmakw.VZeHlYtUubXFlrxy.n4dwpx.xoR2gzG.hA0fOnHG', 4567747469, 'empleado', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 03:19:42', NULL, NULL),
(55, 'Danna Suarez', 'dan.suar123@gmail.com', NULL, '$2y$10$lB74A6N9uwuSdFmqcGqkXeAdxmClQJKfcPpHyFTES5m5mk6R5z0a2', 359876598, 'empleado', 'Active', NULL, NULL, NULL, NULL, NULL, '2021-12-01 03:21:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_actualizados`
--

CREATE TABLE `usuarios_actualizados` (
  `id` int NOT NULL,
  `Anterior_Nombre_Completo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Anterior_NumeroCelular` bigint NOT NULL,
  `Anterior_Correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Anterior_Edad` tinyint NOT NULL,
  `Anterior_Foto` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Nuevo_NombreCompleto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Nuevo_NumeroCelular` bigint NOT NULL,
  `Nuevo_Correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Nueva_Edad` tinyint NOT NULL,
  `Nueva_Foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Fecha_Modificación` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios_actualizados`
--

INSERT INTO `usuarios_actualizados` (`id`, `Anterior_Nombre_Completo`, `Anterior_NumeroCelular`, `Anterior_Correo`, `Anterior_Edad`, `Anterior_Foto`, `Nuevo_NombreCompleto`, `Nuevo_NumeroCelular`, `Nuevo_Correo`, `Nueva_Edad`, `Nueva_Foto`, `Fecha_Modificación`) VALUES
(1, 'Camilo Andrés', 3132355885, 'CAMILO@gmail.com', 70, 'storage/perfil/blog1-2.jpg', 'Camilo Fernando', 3132355885, 'CAMILO@gmail.com', 70, '0', '2021-09-02'),
(2, 'Camilo Fernando', 3132355885, 'CAMILO@gmail.com', 70, 'storage/perfil/blog1-2.jpg', 'Federico Ramírez', 3132355885, 'CAMILO@gmail.com', 70, '0', '2021-09-02'),
(3, 'Federico Ramírez', 3132355885, 'CAMILO@gmail.com', 70, 'storage/perfil/blog1-2.jpg', 'Pablo Felipe', 3132355885, 'CAMILO@gmail.com', 70, '0', '2021-09-02'),
(4, 'Katalina', 3158745307, 'Gomita@gmail.com', 18, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', 'Katalina', 3158745307, 'Gomita@gmail.com', 18, '0', '2021-09-03'),
(5, 'Juan David ', 3118726898, 'Juancho@gmail.com', 18, '', 'Juan David ', 3118726898, 'Juancho@gmail.com', 70, '0', '2021-09-03'),
(6, 'Pablo Felipe', 3132355885, 'CAMILO@gmail.com', 70, 'storage/perfil/blog1-2.jpg', 'Pablo Felipe', 3132355885, 'CAMILO@gmail.com', 18, '0', '2021-09-03'),
(7, 'Juan David ', 3118726898, 'Juancho@gmail.com', 29, '', 'Juan David ', 3118726898, 'Juancho@gmail.com', 2, '', '2021-09-08'),
(8, 'Juan David ', 3118726898, 'Juancho@gmail.com', 2, '', 'Juan David ', 3118726898, 'Juancho@gmail.com', 0, '', '2021-09-08'),
(9, 'Juan David ', 3118726898, 'Juancho@gmail.com', 18, '', 'Juan David ', 3118726898, 'Juancho@gmail.com', 4, '', '2021-09-08'),
(10, 'Juan David ', 3118726898, 'Juancho@gmail.com', 18, '', 'Juan David ', 3118726898, 'Juancho@gmail.com', 8, '', '2021-09-08'),
(11, 'Juan David ', 3118726898, 'Juancho@gmail.com', 18, '', 'Juan David ', 3118726898, 'Juancho@gmail.com', 70, '', '2021-09-08'),
(12, 'Juan David ', 3118726898, 'Juancho@gmail.com', 70, '', 'Juan David ', 3118726898, 'Juancho@gmail.com', 75, '', '2021-09-08'),
(13, 'Juan David ', 3118726898, 'Juancho@gmail.com', 75, '', 'Juan David ', 3118726898, 'Juancho@gmail.com', 70, '', '2021-09-08'),
(14, 'Juan David ', 3118726898, 'Juancho@gmail.com', 70, '', 'Juan David ', 3118726898, 'Juancho@gmail.com', 100, '', '2021-09-08'),
(15, 'Juan David ', 3118726898, 'Juancho@gmail.com', 70, '', 'Juan David ', 3118726898, 'Juancho@gmail.com', 71, '', '2021-09-08'),
(16, 'Juan David ', 3118726898, 'Juancho@gmail.com', 70, '', 'Juan David ', 3118726898, 'Juancho@gmail.com', 69, '', '2021-09-08'),
(17, 'Katalina', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', 'Katalina', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', '2021-09-08'),
(18, 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/cam.PNG', 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', '2021-09-09'),
(19, 'empleado', 8437897548, 'empleado@gmail.com', 30, NULL, 'empleado r', 8437897548, 'empleado@gmail.com', 30, NULL, '2021-10-03'),
(20, 'empleado r', 8437897548, 'empleado@gmail.com', 30, NULL, 'empleado t', 8437897548, 'empleado@gmail.com', 30, NULL, '2021-10-03'),
(21, 'empleado t', 8437897548, 'empleado@gmail.com', 30, NULL, 'empleado', 8437897548, 'empleado@gmail.com', 30, NULL, '2021-10-03'),
(43, 'empleado', 8437897548, 'empleado@gmail.com', 30, NULL, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, '2021-10-03'),
(45, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, '2021-10-05'),
(47, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, 'jean sanche', 3159605096, 'jeansanc34@gmail.com', 45, NULL, '2021-10-06'),
(48, 'jean sanche', 3159605096, 'jeansanc34@gmail.com', 45, NULL, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, '2021-10-06'),
(49, 'Katalina', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', 'Maria Cardona', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', '2021-10-06'),
(50, 'Camilo Andrés', 3132355885, 'CAMILO@gmail.com', 37, 'storage/perfil/blog1-2.jpg', 'Camilo Andrés', 3132355885, 'CAMILO@gmail.com', 37, 'storage/perfil/blog1-2.jpg', '2021-10-06'),
(51, 'Camilo Andrés', 3132355885, 'CAMILO@gmail.com', 37, 'storage/perfil/blog1-2.jpg', 'Camilo Andrés', 3132355885, 'CAMILO.andr23@gmail.com', 37, 'storage/perfil/blog1-2.jpg', '2021-10-06'),
(52, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, '2021-10-09'),
(53, 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', '2021-10-09'),
(54, 'lippp', 313905945, 'lip45@gmail.com', 3, NULL, 'lippp', 313905945, 'lip45@gmail.com', 3, NULL, '2021-10-11'),
(55, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, '2021-10-11'),
(56, 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', '2021-10-13'),
(57, 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', '2021-10-13'),
(58, 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', '2021-10-13'),
(59, 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', '2021-10-13'),
(60, 'Julianana', 3164585455, 'Papa@gmail.com', 12, 'xddddd', 'Juliananana', 3164585455, 'Papa@gmail.com', 12, 'xddddd', '2021-10-13'),
(61, 'Juliananana', 3164585455, 'Papa@gmail.com', 18, 'xddddd', 'Juliana', 3164585455, 'Papa@gmail.com', 18, 'xddddd', '2021-10-13'),
(62, 'lol', 49059605096, 'lip123@gmail.com', 3, NULL, 'lol', 49059605096, 'lip123@gmail.com', 3, NULL, '2021-10-14'),
(63, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, '2021-10-14'),
(64, 'Juliana', 3164585455, 'Papa@gmail.com', 18, 'xddddd', 'Juliana', 3164585455, 'Papa@gmail.com', 18, 'xddddd', '2021-10-14'),
(65, 'Juliana', 3164585455, 'Papa@gmail.com', 18, 'xddddd', 'Juliana', 3164585455, 'Papa@gmail.com', 18, 'xddddd', '2021-10-14'),
(66, 'Maria Cardona', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', 'Maria Cardona', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', '2021-10-29'),
(67, 'Camilo Andrés', 3132355885, 'CAMILO.andr23@gmail.com', 37, 'storage/perfil/blog1-2.jpg', 'Camilo Andrés', 3132355885, 'CAMILO.andr23@gmail.com', 37, 'storage/perfil/blog1-2.jpg', '2021-10-29'),
(68, 'Juan Sebastian', 3182304784, 'RinconCP@gmail.com', 20, '', 'Juan Sebastian', 3182304784, 'RinconCP@gmail.com', 20, '', '2021-10-29'),
(69, 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', '2021-10-29'),
(70, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-10-29'),
(71, 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', '2021-10-29'),
(72, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, '2021-10-29'),
(73, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, '2021-10-29'),
(74, 'lol', 49059605096, 'lip123@gmail.com', 18, NULL, 'lol', 49059605096, 'lip123@gmail.com', 18, NULL, '2021-10-29'),
(75, 'lol', 49059605096, 'lol123@gmail.com', 3, NULL, 'lol', 49059605096, 'lol123@gmail.com', 3, NULL, '2021-10-29'),
(76, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, '2021-10-29'),
(77, 'Erick', 3166548977, 'sumama@gmail.com', 12, 'xddddd', 'Erick', 3166548977, 'sumama@gmail.com', 12, 'xddddd', '2021-10-29'),
(78, 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', '2021-10-29'),
(79, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, '2021-10-29'),
(80, 'Juliana', 3164585455, 'Papa@gmail.com', 18, 'xddddd', 'Juliana', 3164585455, 'Papa@gmail.com', 18, 'xddddd', '2021-10-29'),
(81, 'adsfdf', 3184968596, 'camSuear349@gmail.com', 3, NULL, 'adsfdf', 3184968596, 'camSuear349@gmail.com', 3, NULL, '2021-10-29'),
(82, 'gerentee', 31849696, 'camSear349@gmail.com', 3, NULL, 'gerentee', 31849696, 'camSear349@gmail.com', 3, NULL, '2021-10-29'),
(83, 'Maria Cardona', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', 'Maria Cardona', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', '2021-10-29'),
(84, 'Camilo Andrés', 3132355885, 'CAMILO.andr23@gmail.com', 37, 'storage/perfil/blog1-2.jpg', 'Camilo Andrés', 3132355885, 'CAMILO.andr23@gmail.com', 37, 'storage/perfil/blog1-2.jpg', '2021-10-29'),
(85, 'Juan Sebastian', 3182304784, 'RinconCP@gmail.com', 20, '', 'Juan Sebastian', 3182304784, 'RinconCP@gmail.com', 20, '', '2021-10-29'),
(86, 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', '2021-10-29'),
(87, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-10-29'),
(88, 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', '2021-10-29'),
(89, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, '2021-10-29'),
(90, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, '2021-10-29'),
(91, 'lol', 49059605096, 'lip123@gmail.com', 18, NULL, 'lol', 49059605096, 'lip123@gmail.com', 18, NULL, '2021-10-29'),
(92, 'lol', 49059605096, 'lol123@gmail.com', 18, NULL, 'lol', 49059605096, 'lol123@gmail.com', 18, NULL, '2021-10-29'),
(93, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, '2021-10-29'),
(94, 'Erick', 3166548977, 'sumama@gmail.com', 18, 'xddddd', 'Erick', 3166548977, 'sumama@gmail.com', 18, 'xddddd', '2021-10-29'),
(95, 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', '2021-10-29'),
(96, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, '2021-10-29'),
(97, 'Juliana', 3164585455, 'Papa@gmail.com', 18, 'xddddd', 'Juliana', 3164585455, 'Papa@gmail.com', 18, 'xddddd', '2021-10-29'),
(98, 'adsfdf', 3184968596, 'camSuear349@gmail.com', 18, NULL, 'adsfdf', 3184968596, 'camSuear349@gmail.com', 18, NULL, '2021-10-29'),
(99, 'gerentee', 31849696, 'camSear349@gmail.com', 18, NULL, 'gerentee', 31849696, 'camSear349@gmail.com', 18, NULL, '2021-10-29'),
(100, 'lol', 49059605096, 'lip123@gmail.com', 18, NULL, 'lol', 49059605096, 'lip123@gmail.com', 18, NULL, '2021-11-02'),
(101, 'lol', 49059605096, 'lip123@gmail.com', 18, NULL, 'lol 1', 49059605096, 'lip123@gmail.com', 18, NULL, '2021-11-02'),
(102, 'lol', 49059605096, 'lol123@gmail.com', 18, NULL, 'lol', 49059605096, 'lol123@gmail.com', 18, NULL, '2021-11-02'),
(103, 'lol', 49059605096, 'lol123@gmail.com', 18, NULL, 'lol e', 49059605096, 'lol123@gmail.com', 18, NULL, '2021-11-02'),
(104, 'adsfdf', 3184968596, 'camSuear349@gmail.com', 18, NULL, 'adsfdf', 3184968596, 'camSuear349@gmail.com', 18, NULL, '2021-11-02'),
(105, 'gerentee', 31849696, 'camSear349@gmail.com', 18, NULL, 'gerentee', 31849696, 'camSear349@gmail.com', 18, NULL, '2021-11-02'),
(106, 'Erick', 3166548977, 'sumama@gmail.com', 18, 'xddddd', 'Erick', 3166548977, 'sumama@gmail.com', 18, 'xddddd', '2021-11-02'),
(107, 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', '2021-11-02'),
(108, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, '2021-11-02'),
(109, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, '2021-11-02'),
(110, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-11-02'),
(111, 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', '2021-11-02'),
(112, 'Erick', 3166548977, 'sumama@gmail.com', 18, 'xddddd', 'Erick', 3166548977, 'sumama@gmail.com', 18, 'xddddd', '2021-11-03'),
(113, 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', '2021-11-03'),
(114, 'Camilo Andrés', 3132355885, 'CAMILO.andr23@gmail.com', 37, 'storage/perfil/blog1-2.jpg', 'Camilo Andrés', 3132355885, 'CAMILO.andr23@gmail.com', 37, 'storage/perfil/blog1-2.jpg', '2021-11-03'),
(115, 'Juan Sebastian', 3182304784, 'RinconCP@gmail.com', 20, '', 'Juan Sebastian', 3182304784, 'RinconCP@gmail.com', 20, '', '2021-11-03'),
(116, 'adsfdf', 3184968596, 'camSuear349@gmail.com', 18, NULL, 'adsfdf', 3184968596, 'camSuear349@gmail.com', 18, NULL, '2021-11-03'),
(117, 'gerentee', 31849696, 'camSear349@gmail.com', 18, NULL, 'gerentee', 31849696, 'camSear349@gmail.com', 18, NULL, '2021-11-03'),
(118, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, '2021-11-03'),
(119, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, '2021-11-03'),
(120, 'Juan Sebastian', 3182304784, 'RinconCP@gmail.com', 20, '', 'Juan Sebastian', 3182304784, 'RinconCP@gmail.com', 20, '', '2021-11-04'),
(121, 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', '2021-11-04'),
(122, 'para correo', 3435454523, 'lauval7771@gmail.com', 16, NULL, 'para correo', 3435454523, 'lauval7771@gmail.com', 16, NULL, '2021-11-05'),
(123, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, '2021-11-12'),
(124, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, '2021-11-12'),
(125, 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', '2021-11-13'),
(126, 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', '2021-11-13'),
(127, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, '2021-11-13'),
(128, 'Juliana', 3164585455, 'Papa@gmail.com', 18, 'xddddd', 'Juliana', 3164585455, 'Papa@gmail.com', 18, 'xddddd', '2021-11-13'),
(129, 'Fernando', 3166598572, 'GerenteT@gmail.com', 20, 'xddddd', 'Fernando', 3166598572, 'GerenteT@gmail.com', 20, 'xddddd', '2021-11-13'),
(130, 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'xddddd', 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', '2021-11-27'),
(131, 'Fernando', 3166598572, 'GerenteT@gmail.com', 20, 'xddddd', 'Fernando', 3166598572, 'GerenteT@gmail.com', 20, 'file.png', '2021-11-27'),
(132, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, '2021-11-27'),
(133, 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', '2021-11-30'),
(134, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-11-30'),
(135, 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', '2021-11-30'),
(136, 'Maria Cardona', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', 'Maria Cardona', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', '2021-11-30'),
(137, 'usuuuuu', 3434454656, 'ñehhh@gmail.com', 45, 'dv', 'Giovanny Chaparro Castro', 3434454656, 'giogg08@gmail.com', 45, 'dv', '2021-11-30'),
(138, 'usuuu', 3923084809, 'correooo@gmail.com', 34, NULL, 'Julian Andres Castro', 3923084809, 'correooo@gmail.com', 34, NULL, '2021-11-30'),
(139, 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', 'treb', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', '2021-11-30'),
(140, 'treb', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', '2021-11-30'),
(141, 'Maria Cardona', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', 'Maria Cardona', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', '2021-11-30'),
(142, 'treball prueba', 4059450904, 'TreballCorp@gmail.com', 16, NULL, 'treball prueba', 4059450904, 'TreballCorp@gmail.com', 16, NULL, '2021-11-30'),
(143, 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', '2021-11-30'),
(144, 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', '2021-11-30'),
(145, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, '2021-11-30'),
(146, 'lol 1', 49059605096, 'lip123@gmail.com', 18, NULL, 'lol 1', 49059605096, 'lip123@gmail.com', 18, NULL, '2021-11-30'),
(147, 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', '2021-11-30'),
(148, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, '2021-11-30'),
(149, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-11-30'),
(150, 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', '2021-11-30'),
(151, 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', '2021-11-30'),
(152, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, '2021-11-30'),
(153, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, '2021-11-30'),
(154, 'lol 1', 49059605096, 'lip123@gmail.com', 18, NULL, 'lol 1', 49059605096, 'lip123@gmail.com', 18, NULL, '2021-11-30'),
(155, 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', '2021-11-30'),
(156, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-11-30'),
(157, 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', '2021-11-30'),
(158, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, 'empleadosss', 8437897548, 'empleado@gmail.com', 30, NULL, '2021-11-30'),
(159, 'lol e', 49059605096, 'lol123@gmail.com', 18, NULL, 'lol e', 49059605096, 'lol123@gmail.com', 18, NULL, '2021-11-30'),
(160, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, 'jean sanchez', 3159605096, 'jeansanc34@gmail.com', 45, NULL, '2021-11-30'),
(161, 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', '2021-11-30'),
(162, 'lol 1', 49059605096, 'lip123@gmail.com', 18, NULL, 'lol 1', 49059605096, 'lip123@gmail.com', 18, NULL, '2021-11-30'),
(163, 'lol e', 49059605096, 'lol123@gmail.com', 18, NULL, 'lol e', 49059605096, 'lol123@gmail.com', 18, NULL, '2021-11-30'),
(164, 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', 'Carlos Manuel', 3184968596, 'Carlos354Gon@gmail.com', 26, '', '2021-11-30'),
(165, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-11-30'),
(166, 'Giovanny Chaparro Castro', 3434454656, 'giogg08@gmail.com', 45, 'dv', 'Giovanny Chaparro Castro', 3434454656, 'giogg08@gmail.com', 45, 'dv', '2021-11-30'),
(167, 'Maria Cardona', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', 'Maria Cardona', 3158745307, 'Gomita@gmail.com', 27, 'storage/perfil/ba6cd163-e90c-4d8b-ac7f-601f49a28491.jpeg', '2021-11-30'),
(168, 'Erick', 3166548977, 'sumama@gmail.com', 18, 'xddddd', 'Erick', 3166548977, 'sumama@gmail.com', 18, 'xddddd', '2021-11-30'),
(169, 'Giovanny Chaparro Castro', 3434454656, 'giogg08@gmail.com', 45, 'dv', 'Giovanny Chaparro Castro', 3434454656, 'giogg08@gmail.com', 45, 'dv', '2021-11-30'),
(170, 'Julian Andres Castro', 3923084809, 'correooo@gmail.com', 34, NULL, 'Julian Andres Castro', 3923084809, 'correooo@gmail.com', 34, NULL, '2021-11-30'),
(171, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-12-01'),
(172, 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', '2021-12-01'),
(173, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, 'lippp', 313905945, 'lip45@gmail.com', 18, NULL, '2021-12-01'),
(174, 'lol e', 49059605096, 'lol123@gmail.com', 18, NULL, 'lol e', 49059605096, 'lol123@gmail.com', 18, NULL, '2021-12-01'),
(175, 'gerentee', 31849696, 'camSear349@gmail.com', 18, NULL, 'gerentee', 31849696, 'camSear349@gmail.com', 18, NULL, '2021-12-01'),
(176, 'para correo', 3435454523, 'lauval7771@gmail.com', 18, NULL, 'para correo', 3435454523, 'lauval7771@gmail.com', 18, NULL, '2021-12-01'),
(177, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-12-02'),
(178, 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', 'Mariana', 3212394855489, 'mariana@gmail.com', 30, 'storage/perfil/dia.PNG', '2021-12-02'),
(179, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-12-02'),
(180, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-12-02'),
(181, 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', '2021-12-02'),
(182, 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', '2021-12-02'),
(183, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-12-02'),
(184, 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', 'Andres', 124235345, 'andres@gmail.com', 19, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg', '2021-12-02'),
(185, 'lol e', 49059605096, 'lol123@gmail.com', 18, NULL, 'Giovanny Castro Avendaño', 4905960509, 'lol123@gmail.com', 18, NULL, '2021-12-02'),
(186, 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', '2021-12-03'),
(187, 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', '2021-12-03'),
(188, 'Sandra', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', 'Sandra Maria', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', '2021-12-03'),
(189, 'para correo', 3435454523, 'lauval7771@gmail.com', 18, NULL, 'para correo', 3435454523, 'lauval7771@gmail.com', 18, NULL, '2021-12-03'),
(190, 'para correo', 3435454523, 'lauval7771@gmail.com', 18, NULL, 'para correo', 3435454523, 'lauval7771@gmail.com', 18, NULL, '2021-12-03'),
(191, 'Sandra Maria', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', 'Sandra ', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', '2021-12-03'),
(192, 'Sandra ', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', 'Sandra ', 3152658577, 'IngenieroT@gmail.com', 21, 'file.png', '2021-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_eliminados`
--

CREATE TABLE `usuarios_eliminados` (
  `id` int NOT NULL,
  `Nombre_Completo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Numero_Documento` bigint NOT NULL,
  `Foto_Usuario` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios_eliminados`
--

INSERT INTO `usuarios_eliminados` (`id`, `Nombre_Completo`, `Numero_Documento`, `Foto_Usuario`) VALUES
(1, 'Andres', 103215120651, 'storage/perfil/a4b18401a51a42c1822addcd0e9c16eb.jpg'),
(2, 'Juan David ', 1005486624, ''),
(3, 'Federico Ramírez', 1400584569, NULL),
(4, 'Juan David ', 1005486624, '');

-- --------------------------------------------------------

--
-- Structure for view `actividadusuarios`
--
DROP TABLE IF EXISTS `actividadusuarios`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `actividadusuarios`  AS SELECT `a`.`id` AS `id`, `a`.`title` AS `title`, `a`.`start` AS `start`, `a`.`end` AS `end`, count(`au`.`empleado_id`) AS `Usuarios_por_rol`, `rols`.`NombreRol` AS `NombreRol` FROM (((`actividads` `a` join `actividad_usuario` `au` on((`a`.`id` = `au`.`actividad_id`))) join `empleados` `e` on((`au`.`empleado_id` = `e`.`id`))) left join `rols` on((`e`.`rol_id` = `rols`.`id`))) GROUP BY `a`.`id`, `rols`.`NombreRol` ;

-- --------------------------------------------------------

--
-- Structure for view `documentousuarios`
--
DROP TABLE IF EXISTS `documentousuarios`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `documentousuarios`  AS SELECT `empleados`.`NombreCompleto` AS `NombreCompleto`, `empleados`.`NumeroDocumento` AS `NumeroDocumento`, `empleados`.`tipo_identificacion_id` AS `tipo_identificacion_id` FROM (`empleados` join `tipo_identificacions` on((`empleados`.`id` = `tipo_identificacions`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `edadmayor25años`
--
DROP TABLE IF EXISTS `edadmayor25años`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `edadmayor25años`  AS SELECT `empleados`.`NombreCompleto` AS `NombreCompleto`, `empleados`.`NumeroDocumento` AS `NumeroDocumento`, `empleados`.`EdadU` AS `EdadU` FROM `empleados` WHERE (`empleados`.`EdadU` >= 25) ;

-- --------------------------------------------------------

--
-- Structure for view `edadmenor25años`
--
DROP TABLE IF EXISTS `edadmenor25años`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `edadmenor25años`  AS SELECT `empleados`.`NombreCompleto` AS `NombreCompleto`, `empleados`.`NumeroDocumento` AS `NumeroDocumento`, `empleados`.`EdadU` AS `EdadU` FROM `empleados` WHERE (`empleados`.`EdadU` <= 25) ;

-- --------------------------------------------------------

--
-- Structure for view `estadocivilusuario`
--
DROP TABLE IF EXISTS `estadocivilusuario`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `estadocivilusuario`  AS SELECT `empleados`.`NombreCompleto` AS `NombreCompleto`, `empleados`.`NumeroDocumento` AS `NumeroDocumento`, `estado_civils`.`EstadoCivil` AS `EstadoCivil` FROM (`empleados` join `estado_civils` on((`empleados`.`id` = `estado_civils`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `generofemenino`
--
DROP TABLE IF EXISTS `generofemenino`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `generofemenino`  AS SELECT `empleados`.`NombreCompleto` AS `NombreCompleto`, `empleados`.`GeneroUsuario` AS `GeneroUsuario` FROM `empleados` WHERE (`empleados`.`GeneroUsuario` = 'Femenino') ;

-- --------------------------------------------------------

--
-- Structure for view `generomasculino`
--
DROP TABLE IF EXISTS `generomasculino`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `generomasculino`  AS SELECT `empleados`.`NombreCompleto` AS `NombreCompleto`, `empleados`.`GeneroUsuario` AS `GeneroUsuario` FROM `empleados` WHERE (`empleados`.`GeneroUsuario` = 'Masculino') ;

-- --------------------------------------------------------

--
-- Structure for view `lugarnacimientousuarios`
--
DROP TABLE IF EXISTS `lugarnacimientousuarios`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `lugarnacimientousuarios`  AS SELECT `empleados`.`NombreCompleto` AS `NombreCompleto`, `empleados`.`NumeroDocumento` AS `NumeroDocumento`, `cities`.`ciudad` AS `ciudad` FROM (`empleados` join `cities` on((`empleados`.`id` = `cities`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `materialespordiseno`
--
DROP TABLE IF EXISTS `materialespordiseno`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `materialespordiseno`  AS SELECT `d`.`id` AS `id`, `d`.`ImagenPlano` AS `ImagenPlano`, `o`.`NombreObra` AS `Codigo_Obra`, `d`.`created_at` AS `created_at`, `md`.`material_id` AS `material_id`, sum(`md`.`CantidadMaterial`) AS `Cantidad_Material`, `tm`.`NombreTipoM` AS `NombreTipoM`, `c`.`Ncolor` AS `Color_Material` FROM (((((`disenos` `d` join `material_diseno` `md` on((`d`.`id` = `md`.`diseno_id`))) join `materials` `m` on((`m`.`id` = `md`.`material_id`))) left join `tipo_materials` `tm` on((`tm`.`id` = `m`.`tipo_material_id`))) left join `colors` `c` on((`m`.`color_id` = `c`.`id`))) join `obras` `o` on((`d`.`obra_id` = `o`.`id`))) GROUP BY `md`.`material_id` ;

-- --------------------------------------------------------

--
-- Structure for view `rolusuario`
--
DROP TABLE IF EXISTS `rolusuario`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `rolusuario`  AS SELECT `empleados`.`NombreCompleto` AS `NombreCompleto`, `empleados`.`NumeroDocumento` AS `NumeroDocumento`, `rols`.`NombreRol` AS `NombreRol` FROM (`empleados` join `rols` on((`empleados`.`id` = `rols`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `tipoidentificacionusuario`
--
DROP TABLE IF EXISTS `tipoidentificacionusuario`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `tipoidentificacionusuario`  AS SELECT `empleados`.`NombreCompleto` AS `NombreCompleto`, `empleados`.`NumeroDocumento` AS `NumeroDocumento`, `tipo_identificacions`.`TipoIdentificacion` AS `TipoIdentificacion` FROM (`empleados` join `tipo_identificacions` on((`empleados`.`id` = `tipo_identificacions`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividads`
--
ALTER TABLE `actividads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividads_estado_actividad_id_foreign` (`estado_actividad_id`),
  ADD KEY `actividads_fase_tarea_id_foreign` (`fase_tarea_id`),
  ADD KEY `actividads_obra_id_foreign` (`obra_id`);

--
-- Indexes for table `actividad_usuario`
--
ALTER TABLE `actividad_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividad_usuario_actividad_id_foreign` (`actividad_id`),
  ADD KEY `actividad_usuario_empleado_id_foreign` (`empleado_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_ciudad_unique` (`ciudad`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientes_nombrecc_unique` (`NombreCC`),
  ADD UNIQUE KEY `clientes_numidentificacion_unique` (`NumIdentificacion`),
  ADD UNIQUE KEY `correo_cliente_unique` (`CorreoCliente`),
  ADD UNIQUE KEY `user_id_unique` (`user_id`),
  ADD KEY `clientes_tipo_cliente_id_foreign` (`tipo_cliente_id`),
  ADD KEY `clientes_tipo_identificacion_id_foreign` (`tipo_identificacion_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_ncolor_unique` (`Ncolor`);

--
-- Indexes for table `disenos`
--
ALTER TABLE `disenos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disenos_obra_id_foreign` (`obra_id`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_numerodocumento_unique` (`NumeroDocumento`),
  ADD KEY `usuarios_rol_id_foreign` (`rol_id`),
  ADD KEY `usuarios_tipo_identificacion_id_foreign` (`tipo_identificacion_id`),
  ADD KEY `usuarios_estado_civil_id_foreign` (`estado_civil_id`),
  ADD KEY `usuarios_city_id_foreign` (`city_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `estado_actividads`
--
ALTER TABLE `estado_actividads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `estado_actividads_nombreestado_unique` (`NombreEstado`);

--
-- Indexes for table `estado_civils`
--
ALTER TABLE `estado_civils`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `estado_civils_estadocivil_unique` (`EstadoCivil`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fase_tareas`
--
ALTER TABLE `fase_tareas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fase_tareas_nombrefase_unique` (`NombreFase`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_color_id_foreign` (`color_id`),
  ADD KEY `materials_tipo_material_id_foreign` (`tipo_material_id`);

--
-- Indexes for table `material_diseno`
--
ALTER TABLE `material_diseno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_diseno_material_id_foreign` (`material_id`),
  ADD KEY `material_diseno_diseno_id_foreign` (`diseno_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `novedads`
--
ALTER TABLE `novedads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `novedads_tipo_novedad_id_foreign` (`tipo_novedad_id`),
  ADD KEY `novedads_actividad_id_foreign` (`actividad_id`),
  ADD KEY `novedads_empleado_id_foreign` (`empleado_id`),
  ADD KEY `novedads_cliente_id_foreign` (`cliente_id`);

--
-- Indexes for table `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `obras_nombreobra_unique` (`NombreObra`),
  ADD KEY `obras_tipo_obra_id_foreign` (`tipo_obra_id`),
  ADD KEY `obras_city_id_foreign` (`city_id`),
  ADD KEY `obras_cliente_id_foreign` (`cliente_id`);

--
-- Indexes for table `obra_usuario`
--
ALTER TABLE `obra_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obra_usuario_obra_id_foreign` (`obra_id`),
  ADD KEY `obra_usuario_empleado_id_foreign` (`empleado_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `planillas`
--
ALTER TABLE `planillas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `planillas_empleado_id_foreign` (`empleado_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rols_nombrerol_unique` (`NombreRol`);

--
-- Indexes for table `seccions`
--
ALTER TABLE `seccions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seccions_color_id_foreign` (`color_id`),
  ADD KEY `seccions_diseno_id_foreign` (`diseno_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tipo_clientes`
--
ALTER TABLE `tipo_clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_clientes_nombretipoc_unique` (`nombreTipoC`);

--
-- Indexes for table `tipo_identificacions`
--
ALTER TABLE `tipo_identificacions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_identificacions_tipoidentificacion_unique` (`TipoIdentificacion`);

--
-- Indexes for table `tipo_materials`
--
ALTER TABLE `tipo_materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_materials_nombretipom_unique` (`NombreTipoM`);

--
-- Indexes for table `tipo_novedads`
--
ALTER TABLE `tipo_novedads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_novedads_nombretipon_unique` (`NombreTipoN`);

--
-- Indexes for table `tipo_obras`
--
ALTER TABLE `tipo_obras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_obras_tipoobra_unique` (`TipoObra`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `empleados_id` (`empleados_id`);

--
-- Indexes for table `usuarios_actualizados`
--
ALTER TABLE `usuarios_actualizados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_eliminados`
--
ALTER TABLE `usuarios_eliminados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividads`
--
ALTER TABLE `actividads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `actividad_usuario`
--
ALTER TABLE `actividad_usuario`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `disenos`
--
ALTER TABLE `disenos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `estado_actividads`
--
ALTER TABLE `estado_actividads`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `estado_civils`
--
ALTER TABLE `estado_civils`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fase_tareas`
--
ALTER TABLE `fase_tareas`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `material_diseno`
--
ALTER TABLE `material_diseno`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `novedads`
--
ALTER TABLE `novedads`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `obras`
--
ALTER TABLE `obras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `obra_usuario`
--
ALTER TABLE `obra_usuario`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planillas`
--
ALTER TABLE `planillas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rols`
--
ALTER TABLE `rols`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seccions`
--
ALTER TABLE `seccions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tipo_clientes`
--
ALTER TABLE `tipo_clientes`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipo_identificacions`
--
ALTER TABLE `tipo_identificacions`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipo_materials`
--
ALTER TABLE `tipo_materials`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipo_novedads`
--
ALTER TABLE `tipo_novedads`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipo_obras`
--
ALTER TABLE `tipo_obras`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `usuarios_actualizados`
--
ALTER TABLE `usuarios_actualizados`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `usuarios_eliminados`
--
ALTER TABLE `usuarios_eliminados`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividads`
--
ALTER TABLE `actividads`
  ADD CONSTRAINT `actividads_estado_actividad_id_foreign` FOREIGN KEY (`estado_actividad_id`) REFERENCES `estado_actividads` (`id`),
  ADD CONSTRAINT `actividads_fase_tarea_id_foreign` FOREIGN KEY (`fase_tarea_id`) REFERENCES `fase_tareas` (`id`),
  ADD CONSTRAINT `actividads_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`);

--
-- Constraints for table `actividad_usuario`
--
ALTER TABLE `actividad_usuario`
  ADD CONSTRAINT `actividad_usuario_actividad_id_foreign` FOREIGN KEY (`actividad_id`) REFERENCES `actividads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividad_usuario_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `clientes_tipo_cliente_id_foreign` FOREIGN KEY (`tipo_cliente_id`) REFERENCES `tipo_clientes` (`id`),
  ADD CONSTRAINT `clientes_tipo_identificacion_id_foreign` FOREIGN KEY (`tipo_identificacion_id`) REFERENCES `tipo_identificacions` (`id`);

--
-- Constraints for table `disenos`
--
ALTER TABLE `disenos`
  ADD CONSTRAINT `disenos_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`);

--
-- Constraints for table `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `usuarios_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `usuarios_estado_civil_id_foreign` FOREIGN KEY (`estado_civil_id`) REFERENCES `estado_civils` (`id`),
  ADD CONSTRAINT `usuarios_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rols` (`id`),
  ADD CONSTRAINT `usuarios_tipo_identificacion_id_foreign` FOREIGN KEY (`tipo_identificacion_id`) REFERENCES `tipo_identificacions` (`id`);

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `materials_tipo_material_id_foreign` FOREIGN KEY (`tipo_material_id`) REFERENCES `tipo_materials` (`id`);

--
-- Constraints for table `material_diseno`
--
ALTER TABLE `material_diseno`
  ADD CONSTRAINT `material_diseno_diseno_id_foreign` FOREIGN KEY (`diseno_id`) REFERENCES `disenos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `material_diseno_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `novedads`
--
ALTER TABLE `novedads`
  ADD CONSTRAINT `novedads_actividad_id_foreign` FOREIGN KEY (`actividad_id`) REFERENCES `actividads` (`id`),
  ADD CONSTRAINT `novedads_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `novedads_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `novedads_tipo_novedad_id_foreign` FOREIGN KEY (`tipo_novedad_id`) REFERENCES `tipo_novedads` (`id`);

--
-- Constraints for table `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `obras_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `obras_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `obras_tipo_obra_id_foreign` FOREIGN KEY (`tipo_obra_id`) REFERENCES `tipo_obras` (`id`);

--
-- Constraints for table `obra_usuario`
--
ALTER TABLE `obra_usuario`
  ADD CONSTRAINT `obra_usuario_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obra_usuario_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `planillas`
--
ALTER TABLE `planillas`
  ADD CONSTRAINT `planillas_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seccions`
--
ALTER TABLE `seccions`
  ADD CONSTRAINT `seccions_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `seccions_diseno_id_foreign` FOREIGN KEY (`diseno_id`) REFERENCES `disenos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`empleados_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE EVENT `actualizar_planilla` ON SCHEDULE EVERY 5 SECOND STARTS '2020-11-29 00:00:01' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	update `planillas` set `EstadoPlanilla` = 'vigente' where `FechaExpiracion`>NOW();
	update `planillas` set `EstadoPlanilla` = 'vencida' where `FechaExpiracion`<=NOW();
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
