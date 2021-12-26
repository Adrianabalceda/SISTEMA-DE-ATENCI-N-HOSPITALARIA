-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-12-2021 a las 01:22:51
-- Versión del servidor: 8.0.26
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sah`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `contraseña`, `email`) VALUES
(1, 'admin', '1234', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asegurado`
--

CREATE TABLE `asegurado` (
  `id` int NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `DNI` int NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `celular` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asegurado_atender`
--

CREATE TABLE `asegurado_atender` (
  `id` int NOT NULL,
  `id_asegurado` int NOT NULL,
  `id_especialidad` int NOT NULL,
  `id_doctor` int DEFAULT NULL,
  `id_cama` int DEFAULT NULL,
  `estado` varchar(100) NOT NULL,
  `id_enfermedad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cama`
--

CREATE TABLE `cama` (
  `id` int NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'desocupada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_familiar_doctor`
--

CREATE TABLE `cita_familiar_doctor` (
  `id_cita` int NOT NULL,
  `id_familiar` int NOT NULL,
  `id_doctor` int NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tipo` varchar(20) NOT NULL DEFAULT 'asegurado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_paciente_doctor`
--

CREATE TABLE `cita_paciente_doctor` (
  `id_cita` int NOT NULL,
  `id_asegurado` int NOT NULL,
  `id_doctor` int NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tipo` varchar(20) NOT NULL DEFAULT 'asegurado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id` int NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `id_especialidad` int NOT NULL,
  `celular` int NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE `enfermedad` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `especialidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int NOT NULL,
  `nombre` int NOT NULL,
  `referencia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar`
--

CREATE TABLE `familiar` (
  `id_familiar` int NOT NULL,
  `id_asegurado` int NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `DNI` int NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar_atender`
--

CREATE TABLE `familiar_atender` (
  `id` int NOT NULL,
  `id_familiar` int NOT NULL,
  `id_cama` int NOT NULL,
  `id_doctor` int DEFAULT NULL,
  `estado` varchar(100) NOT NULL,
  `id_enfermedad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `asegurado`
--
ALTER TABLE `asegurado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asegurado_atender`
--
ALTER TABLE `asegurado_atender`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_asegurado`),
  ADD KEY `id_especialidad` (`id_especialidad`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_cama` (`id_cama`),
  ADD KEY `id_enfermedad` (`id_enfermedad`);

--
-- Indices de la tabla `cama`
--
ALTER TABLE `cama`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cita_familiar_doctor`
--
ALTER TABLE `cita_familiar_doctor`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_familiar` (`id_familiar`);

--
-- Indices de la tabla `cita_paciente_doctor`
--
ALTER TABLE `cita_paciente_doctor`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_asegurado` (`id_asegurado`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`id_familiar`),
  ADD KEY `id_asegurado` (`id_asegurado`);

--
-- Indices de la tabla `familiar_atender`
--
ALTER TABLE `familiar_atender`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_familiar` (`id_familiar`),
  ADD KEY `id_cama` (`id_cama`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_enfermedad` (`id_enfermedad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cama`
--
ALTER TABLE `cama`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cita_familiar_doctor`
--
ALTER TABLE `cita_familiar_doctor`
  MODIFY `id_cita` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cita_paciente_doctor`
--
ALTER TABLE `cita_paciente_doctor`
  MODIFY `id_cita` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `familiar`
--
ALTER TABLE `familiar`
  MODIFY `id_familiar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `familiar_atender`
--
ALTER TABLE `familiar_atender`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asegurado_atender`
--
ALTER TABLE `asegurado_atender`
  ADD CONSTRAINT `asegurado_atender_ibfk_1` FOREIGN KEY (`id_asegurado`) REFERENCES `asegurado` (`id`),
  ADD CONSTRAINT `asegurado_atender_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `asegurado_atender_ibfk_3` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `asegurado_atender_ibfk_4` FOREIGN KEY (`id_cama`) REFERENCES `cama` (`id`),
  ADD CONSTRAINT `asegurado_atender_ibfk_5` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedad` (`id`);

--
-- Filtros para la tabla `cita_familiar_doctor`
--
ALTER TABLE `cita_familiar_doctor`
  ADD CONSTRAINT `cita_familiar_doctor_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `cita_familiar_doctor_ibfk_2` FOREIGN KEY (`id_familiar`) REFERENCES `familiar` (`id_familiar`);

--
-- Filtros para la tabla `cita_paciente_doctor`
--
ALTER TABLE `cita_paciente_doctor`
  ADD CONSTRAINT `cita_paciente_doctor_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `cita_paciente_doctor_ibfk_2` FOREIGN KEY (`id_asegurado`) REFERENCES `asegurado` (`id`);

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`);

--
-- Filtros para la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD CONSTRAINT `familiar_ibfk_1` FOREIGN KEY (`id_asegurado`) REFERENCES `asegurado` (`id`);

--
-- Filtros para la tabla `familiar_atender`
--
ALTER TABLE `familiar_atender`
  ADD CONSTRAINT `familiar_atender_ibfk_1` FOREIGN KEY (`id_familiar`) REFERENCES `familiar` (`id_familiar`),
  ADD CONSTRAINT `familiar_atender_ibfk_2` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedad` (`id`),
  ADD CONSTRAINT `familiar_atender_ibfk_3` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `familiar_atender_ibfk_4` FOREIGN KEY (`id_cama`) REFERENCES `cama` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
