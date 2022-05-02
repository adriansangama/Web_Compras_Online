-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2022 a las 09:02:17
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `preciouni` double NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` double NOT NULL,
  `Stock` varchar(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `Nombre`, `Descripcion`, `Precio`, `Stock`) VALUES
(1, 'Dota 2', 'Dota 2 es un videojuego gratuito distribuido por la plataforma Steam, de Valve. Se trata de uno de los máximos exponentes del género ARTS (por las siglas en inglés de “estrategia de acción en tiempo real”) o MOBA (del inglés Multiplayer Online Battle Arena). Lanzado en 2013, Dota 2 ha logrado convertirse en uno de los eSports más grandes y lucrativos del mundo. Claro, Dota 2 podrá ser un juego, pero también es algo muy serio.', 20.5, '1'),
(2, 'Call of Duty', 'Es un videojuego de guerra que comenzó ambientado en la Segunda Guerra Mundial, y que ahora se desarrolla en distintos escenarios: guerras históricas, enfrentamientos actuales, batallas futuristas e incluso duelos en el espacio exterior.', 21.6, '1'),
(3, 'Left 4 Dead', 'Left 4 Dead (abreviado como L4D) es un videojuego cooperativo multijugador de disparos en primera persona de acción y terror. Fue desarrollado por Valve Corporation. El juego usa el motor gráfico Source y está disponible para Microsoft Windows, y para Xbox 360. El desarrollo del juego fue completado el 13 de noviembre de 2008 y se lanzaron dos versiones del videojuego: una versión digital descargable, lanzada el 17 de noviembre de 2008; y una versión incluida en un disco, disponible el 18 de noviembre en Estados Unidos y Latinoamérica y el 21 del mismo mes en Europa y Japón.', 45.5, '1'),
(4, 'Grand Theft Auto V', 'Grand Theft Auto V: Premium Edition permite disfrutar por completo de la trama de Grand Theft Auto V, acceder gratuitamente al mundo en constante evolución de Grand Theft Auto Online y a todas las mejoras y contenidos existentes, como Golpe a Cayo Perico, The Diamond Casino & Resort, Golpe a The Diamond Casino, Tráfico de armas y mucho más. También se incluye el Criminal Enterprise Starter Pack, la forma más rápida de dar un impulso a tu imperio criminal en Grand Theft Auto Online.', 49.7, '1'),
(5, 'Fifa 2022', 'Participa en el modo más popular de FIFA, FIFA Ultimate Team. Crea el equipo de tus sueños con miles de futbolistas del mundo del fútbol. Crea tu propio club dentro y fuera del campo y dales equipamiento personalizado, insignias y un estadio de FUT completo en el que poder dejar tu huella, y haz que equipo juegue partidos contra la IA u otros jugadores de la comunidad FUT. Además, da la bienvenida a algunos de los jugadores más memorables del fútbol en forma de nuevos héroes de FUT: ¡algunas de estas leyendas del fútbol ahora regresan al campo!', 69.6, '1'),
(6, 'Fortnite', 'Fortnite es un videojuego del año 2017 desarrollado por la empresa Epic Games, lanzado como diferentes paquetes de software que presentan diferentes modos de juego, pero que comparten el mismo motor de juego y mecánicas. Fue anunciado en los Spike Video Game Awards en 2011.\\r\\nLos modos de juego publicados en 2017 incluyen Fortnite Battle Royale, un juego gratuito donde hasta cien jugadores luchan en una isla, en espacios cada vez más pequeños debido a la tormenta, para ser la última persona o equipo en pie, y Fortnite: Salvar el mundo, un juego cooperativo de hasta cuatro jugadores que consiste en luchar contra carcasas, criaturas parecidas a zombis, utilizando objetos, mejoras y fortificaciones.', 60.7, '1'),
(7, 'Fall Guys', 'Fall Guys: Ultimate Knockout enfrenta a hordas de contendientes online en un alocado enfrentamiento que se desarrolla ronda tras ronda entre un caos creciente hasta que solo queda un único vencedor. Supera obstáculos estrafalarios, ábrete paso entre competidores revoltosos y vence a las inflexibles leyes de la física en tu accidentado camino a la grandeza. ¡Deja la dignidad en la entrada y prepárate para sufrir descacharrantes fracasos en tu intento de reclamar la corona!', 76.7, '1'),
(8, 'God of War', 'Kratos ha dejado atrás su venganza contra los dioses del Olimpo y vive ahora como un hombre en los dominios de los dioses y monstruos nórdicos. En este mundo cruel e implacable debe luchar para sobrevivir… y enseñar a su hijo a hacerlo también.\\r\\nCon una cámara al hombro que acerca al jugador a la acción más que antes, las peleas de God of War™ son un reflejo del panteón de criaturas nórdicas que encontrará Kratos: grandiosas, duras y extenuantes. La nueva arma principal y las nuevas habilidades mantienen el espíritu que define la saga God of War y presentan una visión del conflicto que renueva el género.', 89.9, '1'),
(9, 'Five Nights at Freddy\\\'s', 'Five Nights at Freddy\\\'s: Security Breach es la última entrega de la saga de juegos de terror para toda la familia que ha cautivado a millones de jugadores en todo el mundo. Juega con Gregory, un joven que pasa la noche atrapado en Freddy Fazbear\\\'s Mega Pizzaplex. Con la ayuda del mismísimo Freddy Fazbear, Gregory debe sobrevivir a la inagotable cacería de las nuevas versiones de los personajes de Five Nights at Freddy\\\'s y a una serie de amenazas igualmente terroríficas.', 54.7, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idventa` (`idventa`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
