-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-07-2020 a las 18:45:17
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redsocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idPublicacion` int(11) NOT NULL,
  `comentario` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `registrado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idComentario`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idPublicacion` (`idPublicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `idUsuario`, `idPublicacion`, `comentario`, `registrado`) VALUES
(3, 2, 7, 'esta bien chida tu publicacion', '2020-07-13 17:41:44'),
(4, 2, 8, 'kaulifla es un gran personaje', '2020-07-13 18:15:58'),
(5, 1, 8, 'tienes toda la razon', '2020-07-13 18:28:43'),
(6, 1, 9, 'me gusta ver dragon ball', '2020-07-13 18:30:32'),
(7, 2, 9, 'a mi tambien xD', '2020-07-13 18:31:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `idLike` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idPublicacion` int(11) NOT NULL,
  PRIMARY KEY (`idLike`),
  KEY `idPublicacion` (`idPublicacion`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`idLike`, `idUsuario`, `idPublicacion`) VALUES
(1, 2, 8),
(2, 1, 9),
(3, 1, 8),
(4, 2, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE IF NOT EXISTS `notificaciones` (
  `idNotificacion` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idUsuarioAccion` int(11) NOT NULL,
  `idTipoNotificacion` int(11) NOT NULL,
  PRIMARY KEY (`idNotificacion`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idUsuarioAccion` (`idUsuarioAccion`),
  KEY `idTipoNotificacion` (`idTipoNotificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `idPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `nombreCompleto` varchar(255) NOT NULL,
  `fotoPerfil` varchar(255) NOT NULL,
  PRIMARY KEY (`idPerfil`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `idUsuario`, `nombreCompleto`, `fotoPerfil`) VALUES
(1, 1, 'Dennis Alexander Tulen Martel', 'img/imgPerfil/dragon-ball-super-broly-goku.jpeg'),
(2, 2, 'Gustavo Ariel Martel Guinea', 'img/imgPerfil/a0fb6dd09849f6486178ba4b1871f3e7444e4451_00.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
CREATE TABLE IF NOT EXISTS `publicaciones` (
  `idPublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `descripcion` longtext NOT NULL,
  `foto` varchar(255) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `registrado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idPublicacion`),
  KEY `idUsuario` (`idUsuario`),
  KEY `numLikes` (`num_likes`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idPublicacion`, `idUsuario`, `descripcion`, `foto`, `num_likes`, `registrado`) VALUES
(8, 2, 'kaulifla', 'img/imgPublicacion/a0fb6dd09849f6486178ba4b1871f3e7444e4451_00.jpg', 2, '2020-07-13 18:35:41'),
(9, 1, 'goku', 'img/imgPublicacion/dragon-ball-super-broly-goku.jpeg', 2, '2020-07-13 18:31:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiponotificaciones`
--

DROP TABLE IF EXISTS `tiponotificaciones`;
CREATE TABLE IF NOT EXISTS `tiponotificaciones` (
  `idTipoNotificacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipoNotificacion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombreNotificacion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idTipoNotificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tiponotificaciones`
--

INSERT INTO `tiponotificaciones` (`idTipoNotificacion`, `tipoNotificacion`, `nombreNotificacion`) VALUES
(1, 'like', 'le ha dado like a tu publicacion'),
(2, 'comentario', 'ha comentado tu publicacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `registrado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `email`, `contrasena`, `registrado`) VALUES
(1, 'dennis', 'dennis@gmail.com', '$2y$10$6BAjlUiLVpsc7ZdDx4aaBOi3mwZpyAOVk9/m/ZK3jOwlflJo/Wbcu', '2020-07-11 17:53:17'),
(2, 'gustavo', 'gustavo@gmail.com', '$2y$10$evO03MWUMBCXfYfnYaOvsucoqQFk7y756G4A1tj2F29qIY7VSlINK', '2020-07-13 17:40:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
