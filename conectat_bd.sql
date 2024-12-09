-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2024 a las 05:11:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `buquito2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permisos` varchar(50) NOT NULL,
  `remember_token` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `nombre`, `correo_electronico`, `password`, `permisos`, `remember_token`) VALUES
(2, 'Cristino Solís', 'crissolis115@gmail.com', '$2y$12$Bc4wo9kHWMqfoO6lIMDY0.29kAOhEovFHdSlgYFJR5r73ZoDqFGQG', 'admin', 'gl9DecEjvGATpk1KwcBnnVjXctOuexs0mI9oETi5NqlC8ZELdht34w1NTB2c'),
(3, 'javier Cahuich', 'canjavier5@gmail.com', '$2y$12$PdgzJ8IaM.mspGVvP4oj2.0livPOeDQFH0BKVgDTk8I0XIVaovw5G', 'admin', NULL),
(4, 'Jorge Angel Santamaria', 'jorge@ejemplo.com', '$2y$12$HfeWMHYljOZpESMTSZbiBeXBoT1O8Ca4tGAOEF6WADBy4AlU/HYlm', 'admin', NULL),
(6, 'Julian', 'julian@ejemplo.com', '$2y$12$AuD0vBjOShy8nx8h3wcM2O9Oi1VKrjszxu0K4lwp5lTrsGFz2HCZK', 'admin', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `es_cliente` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `contenido_comentario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id_contrato` int(11) NOT NULL,
  `fecha_inicio_contrato` date NOT NULL,
  `fecha_fin_contrato` date NOT NULL,
  `total_meses_contrato` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `monto_total_contrato` decimal(10,2) NOT NULL,
  `monto_total_mensualidad` decimal(10,2) NOT NULL,
  `fk_precontrato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `entidad_federativa` varchar(30) NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `referencia_domicilio` varchar(50) NOT NULL,
  `fk_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq_categorias`
--

CREATE TABLE `faq_categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq_preguntas`
--

CREATE TABLE `faq_preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `respuesta_pregunta` text NOT NULL,
  `fk_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `correo_mensaje` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombres_paquetes`
--

CREATE TABLE `nombres_paquetes` (
  `id_nombre_paquete` int(11) NOT NULL,
  `nombre_paquete` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `caracteristicas_paquete` varchar(150) NOT NULL,
  `velocidad_paquete` varchar(30) NOT NULL,
  `fk_promocion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `fk_contrato` int(11) NOT NULL,
  `fecha_inicio_mensualidad` date NOT NULL,
  `fecha_fin_mensualidad` date NOT NULL,
  `fecha_pago` date NOT NULL,
  `estado_pago` varchar(50) NOT NULL,
  `monto_acumulado_pagos` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precontratos`
--

CREATE TABLE `precontratos` (
  `id_precontrato` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `fk_direccion` int(11) NOT NULL,
  `fk_paquete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones_paquetes`
--

CREATE TABLE `promociones_paquetes` (
  `id_promocion` int(11) NOT NULL,
  `promocion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL,
  `folio` char(6) NOT NULL,
  `fk_contrato` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_reporte` datetime NOT NULL,
  `problema` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_app`
--

CREATE TABLE `usuarios_app` (
  `id_usuario_app` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 0,
  `fk_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `comentarios_fk_cliente` (`fk_cliente`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id_contrato`),
  ADD KEY `contratos_fk_precontrato` (`fk_precontrato`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `direcciones_fk_cliente` (`fk_cliente`);

--
-- Indices de la tabla `faq_categorias`
--
ALTER TABLE `faq_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `faq_preguntas`
--
ALTER TABLE `faq_preguntas`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `faq_preguntas_fk_categoria` (`fk_categoria`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `nombres_paquetes`
--
ALTER TABLE `nombres_paquetes`
  ADD PRIMARY KEY (`id_nombre_paquete`),
  ADD KEY `nombres_paquetes_fk_promocion` (`fk_promocion`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `pagos_fk_contrato` (`fk_contrato`);

--
-- Indices de la tabla `precontratos`
--
ALTER TABLE `precontratos`
  ADD PRIMARY KEY (`id_precontrato`),
  ADD KEY `precontratos_fk_cliente` (`fk_cliente`),
  ADD KEY `precontratos_fk_direccion` (`fk_direccion`),
  ADD KEY `precontratos_fk_paquete` (`fk_paquete`);

--
-- Indices de la tabla `promociones_paquetes`
--
ALTER TABLE `promociones_paquetes`
  ADD PRIMARY KEY (`id_promocion`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `tickets_fk_contrato` (`fk_contrato`);

--
-- Indices de la tabla `usuarios_app`
--
ALTER TABLE `usuarios_app`
  ADD PRIMARY KEY (`id_usuario_app`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`),
  ADD KEY `usuarios_app_fk_cliente` (`fk_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `faq_categorias`
--
ALTER TABLE `faq_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `faq_preguntas`
--
ALTER TABLE `faq_preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nombres_paquetes`
--
ALTER TABLE `nombres_paquetes`
  MODIFY `id_nombre_paquete` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `precontratos`
--
ALTER TABLE `precontratos`
  MODIFY `id_precontrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promociones_paquetes`
--
ALTER TABLE `promociones_paquetes`
  MODIFY `id_promocion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_app`
--
ALTER TABLE `usuarios_app`
  MODIFY `id_usuario_app` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_fk_cliente` FOREIGN KEY (`fk_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_fk_precontrato` FOREIGN KEY (`fk_precontrato`) REFERENCES `precontratos` (`id_precontrato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_fk_cliente` FOREIGN KEY (`fk_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `faq_preguntas`
--
ALTER TABLE `faq_preguntas`
  ADD CONSTRAINT `faq_preguntas_fk_categoria` FOREIGN KEY (`fk_categoria`) REFERENCES `faq_categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nombres_paquetes`
--
ALTER TABLE `nombres_paquetes`
  ADD CONSTRAINT `nombres_paquetes_fk_promocion` FOREIGN KEY (`fk_promocion`) REFERENCES `promociones_paquetes` (`id_promocion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_fk_contrato` FOREIGN KEY (`fk_contrato`) REFERENCES `contratos` (`id_contrato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `precontratos`
--
ALTER TABLE `precontratos`
  ADD CONSTRAINT `precontratos_fk_cliente` FOREIGN KEY (`fk_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `precontratos_fk_direccion` FOREIGN KEY (`fk_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `precontratos_fk_paquete` FOREIGN KEY (`fk_paquete`) REFERENCES `nombres_paquetes` (`id_nombre_paquete`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_fk_contrato` FOREIGN KEY (`fk_contrato`) REFERENCES `contratos` (`id_contrato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_app`
--
ALTER TABLE `usuarios_app`
  ADD CONSTRAINT `usuarios_app_fk_cliente` FOREIGN KEY (`fk_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
