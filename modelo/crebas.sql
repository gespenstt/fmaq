-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2015 a las 00:57:57
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `futumaq`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campo`
--

CREATE TABLE IF NOT EXISTS `campo` (
  `cam_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_id` int(11) DEFAULT NULL,
  `cam_nombre` varchar(50) DEFAULT NULL,
  `cam_direccion` varchar(100) DEFAULT NULL,
  `cam_contacto` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`cam_id`),
  KEY `fk_relationship_7` (`cli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nombre` varchar(50) DEFAULT NULL,
  `cli_apellido` varchar(50) DEFAULT NULL,
  `cli_usuario` varchar(20) DEFAULT NULL,
  `cli_password` varchar(30) DEFAULT NULL,
  `cli_empresa` varchar(100) DEFAULT NULL,
  `cli_correo` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curriculum`
--

CREATE TABLE IF NOT EXISTS `curriculum` (
  `cur_id` int(11) NOT NULL AUTO_INCREMENT,
  `cur_carta_presentacion` varchar(1024) DEFAULT NULL,
  `cur_nombre_archivo` varchar(100) DEFAULT NULL,
  `cur_ruta` varchar(100) DEFAULT NULL,
  `cur_nombre` varchar(100) DEFAULT NULL,
  `cur_rut` varchar(15) DEFAULT NULL,
  `cur_telefono` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinaria`
--

CREATE TABLE IF NOT EXISTS `maquinaria` (
  `maq_id` int(11) NOT NULL AUTO_INCREMENT,
  `mar_id` int(11) DEFAULT NULL,
  `maq_modelo` varchar(50) DEFAULT NULL,
  `maq_descripcion` varchar(1024) DEFAULT NULL,
  `maq_precio` int(11) DEFAULT NULL,
  `maq_fono` varchar(15) DEFAULT NULL,
  `maq_contacto` varchar(100) DEFAULT NULL,
  `maq_correo` varchar(100) DEFAULT NULL,
  `maq_ano` varchar(10) DEFAULT NULL,
  `maq_horas` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`maq_id`),
  KEY `fk_relationship_6` (`mar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinaria_foto`
--

CREATE TABLE IF NOT EXISTS `maquinaria_foto` (
  `mfo_id` int(11) NOT NULL AUTO_INCREMENT,
  `maq_id` int(11) DEFAULT NULL,
  `mfo_nombre` varchar(100) DEFAULT NULL,
  `mfo_ruta` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`mfo_id`),
  KEY `fk_relationship_5` (`maq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_maquinaria`
--

CREATE TABLE IF NOT EXISTS `marca_maquinaria` (
  `mar_id` int(11) NOT NULL AUTO_INCREMENT,
  `mar_nombre` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`mar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `not_id` int(11) NOT NULL AUTO_INCREMENT,
  `not_titulo` varchar(255) DEFAULT NULL,
  `not_url` varchar(255) DEFAULT NULL,
  `not_imagen` varchar(255) DEFAULT NULL,
  `not_descripcion` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`not_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `potrero`
--

CREATE TABLE IF NOT EXISTS `potrero` (
  `pot_id` int(11) NOT NULL AUTO_INCREMENT,
  `cam_id` int(11) DEFAULT NULL,
  `pot_nombre` varchar(100) DEFAULT NULL,
  `pot_ubicacion` varchar(100) DEFAULT NULL,
  `pot_cantidad_hectareas` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pot_id`),
  KEY `fk_relationship_8` (`cam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE IF NOT EXISTS `promocion` (
  `prom_id` int(11) NOT NULL AUTO_INCREMENT,
  `prom_titulo` varchar(50) DEFAULT NULL,
  `prom_descripcion` varchar(255) DEFAULT NULL,
  `prom_urlvideo` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`prom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pot_id` int(11) DEFAULT NULL,
  `tpr_id` int(11) DEFAULT NULL,
  `pro_nombre` varchar(1024) DEFAULT NULL,
  `pro_fecha` datetime DEFAULT NULL,
  `pro_descripcion` varchar(1024) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `fk_relationship_11` (`tpr_id`),
  KEY `fk_relationship_9` (`pot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_archivo`
--

CREATE TABLE IF NOT EXISTS `proyecto_archivo` (
  `par_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) DEFAULT NULL,
  `par_nombre` varchar(100) DEFAULT NULL,
  `par_ruta` varchar(100) DEFAULT NULL,
  `par_descripcion` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`par_id`),
  KEY `fk_relationship_10` (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `sec_nombre` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`sec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='quienes somos\r\nhome\r\ngaleria\r\nservicios\r\n                            -&#&' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proyecto`
--

CREATE TABLE IF NOT EXISTS `tipo_proyecto` (
  `tpr_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpr_nombre` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`tpr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Siembra\r\nCosecha\r\nFumigacion\r\nFertilizacion\r\n                                  ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nombre` varchar(100) DEFAULT NULL,
  `usu_apellido` varchar(100) DEFAULT NULL,
  `usu_correo` varchar(100) DEFAULT NULL,
  `usu_usuario` varchar(50) DEFAULT NULL,
  `usu_password` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nombre`, `usu_apellido`, `usu_correo`, `usu_usuario`, `usu_password`, `created_at`) VALUES
(1, 'Admin', 'Futumaq', 'admin@futumaq.cl', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-10-17 00:57:23');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campo`
--
ALTER TABLE `campo`
  ADD CONSTRAINT `fk_relationship_7` FOREIGN KEY (`cli_id`) REFERENCES `cliente` (`cli_id`);

--
-- Filtros para la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  ADD CONSTRAINT `fk_relationship_6` FOREIGN KEY (`mar_id`) REFERENCES `marca_maquinaria` (`mar_id`);

--
-- Filtros para la tabla `maquinaria_foto`
--
ALTER TABLE `maquinaria_foto`
  ADD CONSTRAINT `fk_relationship_5` FOREIGN KEY (`maq_id`) REFERENCES `maquinaria` (`maq_id`);

--
-- Filtros para la tabla `potrero`
--
ALTER TABLE `potrero`
  ADD CONSTRAINT `fk_relationship_8` FOREIGN KEY (`cam_id`) REFERENCES `campo` (`cam_id`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `fk_relationship_9` FOREIGN KEY (`pot_id`) REFERENCES `potrero` (`pot_id`),
  ADD CONSTRAINT `fk_relationship_11` FOREIGN KEY (`tpr_id`) REFERENCES `tipo_proyecto` (`tpr_id`);

--
-- Filtros para la tabla `proyecto_archivo`
--
ALTER TABLE `proyecto_archivo`
  ADD CONSTRAINT `fk_relationship_10` FOREIGN KEY (`pro_id`) REFERENCES `proyecto` (`pro_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
