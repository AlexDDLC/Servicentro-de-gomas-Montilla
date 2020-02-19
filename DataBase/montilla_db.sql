-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2020 a las 03:44:57
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `montilla_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`id`, `idventa`, `idproducto`, `precio`, `cantidad`, `total`) VALUES
(1, 1, 4, 8500, 2, '17000.00'),
(2, 2, 2, 12000, 4, '48000.00'),
(3, 2, 15, 6000, 2, '12000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `foto` varchar(150) CHARACTER SET utf8 NOT NULL,
  `marca` varchar(15) CHARACTER SET utf8 NOT NULL,
  `modelo` varchar(15) CHARACTER SET utf8 NOT NULL,
  `categoria` varchar(15) CHARACTER SET utf8 NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `descripcion_corta` varchar(500) CHARACTER SET utf8 NOT NULL,
  `descripcion_larga` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `foto`, `marca`, `modelo`, `categoria`, `precio_compra`, `precio_venta`, `descripcion_corta`, `descripcion_larga`, `stock`, `estado`) VALUES
(1, 'Imagenes/pzero-nuovo.jpgPirelliSedanesP Zero', 'Pirelli', 'P Zero', 'Sedanes', '5700.00', '15000.00', 'NeumÃ¡tico para automÃ³viles Premium y SUVs especÃ­ficamente diseÃ±ado para asegurar la mÃ¡xima seguridad, control y rendimiento en cualquier condiciÃ³n meteorolÃ³gica', 'P ZEROâ„¢ es el Ãºnico producto de MÃ¡ximas Prestaciones que combina los conocimientos adquiridos por la marca en las competiciones gracias a la alianza de Pirelli con los principales fabricantes de automÃ³viles, garantizando el equipamiento perfecto para el rendimiento de cada vehÃ­culo.', 32, 'Disponible'),
(2, 'Imagenes/pzero-nero-3-4-1505470088560.jpgPirelliSedanesP Zero Nero', 'Pirelli', 'P Zero Nero', 'Sedanes', '5000.00', '12000.00', 'Prestaciones constantes y confort durante toda la vida del neumÃ¡tico. Una opciÃ³n excelente para conductores que buscan prestaciones deportivas. Ideal para neumÃ¡ticos de perfil ultrabajo con llantas de mayor diÃ¡metro.', 'Prestaciones constantes y confort durante toda la vida del neumÃ¡tico. Una opciÃ³n excelente para conductores que buscan prestaciones deportivas. Ideal para neumÃ¡ticos de perfil ultrabajo con llantas de mayor diÃ¡metro.', 26, 'Disponible'),
(3, 'Imagenes/DiabloRossoIII-Image-3-4-4505479702782.jpgPirelliMotocicletasDiablo Rosso 3', 'Pirelli', 'Diablo Rosso 3', 'Motocicletas', '3500.00', '8000.00', 'TecnologÃ­a Pirelli del Campeonato del Mundo de Superbikes  Manejabilidad nunca vista para una nueva generaciÃ³n de comportamiento deportivo  Bicompuesto con flanco lateral blando ofreciendo un total agarre en cualquier inclinaciÃ³n  Mayor Ã¡rea de contacto para una adherencia mejorada', 'La marca registrada DIABLO representa la excelencia de Pirelli en la industria de los neumÃ¡ticos para motocicletas. La familia Diablo ha evolucionado rÃ¡pidamente desde su introducciÃ³n en 2002 en el segmento supersport para cubrir muchos otros segmentos de mercado, desde el Racing hasta el Hypersport. La actual marca registrada Diablo es el resultado de 13 aÃ±os de experiencia, tecnologÃ­a y triunfos en prestigiosos test y competiciones. Elegido de manera habitual como equipaciÃ³n de serie por los mÃ¡s prestigiosos fabricantes de motocicletas, todos los productos Diablo son considerados una referencia por la prensa y revistas internacionales. De esta tradiciÃ³n y rico pasado ha nacido el nuevo DIABLO ROSSO III.', 58, 'Disponible'),
(4, 'Imagenes/AngelGTII-Image3-4-4505502395245.jpgPirelliMotocicletasAngel GT', 'Pirelli', 'Angel GT', 'Motocicletas', '4000.00', '8500.00', 'La evoluciÃ³n del PIRELLI ANGELâ„¢ GT llevÃ¡ aÃºn mÃ¡s lejos el concepto de Gran Turismo de PIRELLI MÃ¡xima manejabilidad en lÃ­nea con el ADN Pirelli y una nueva referencia en kilometraje en el segmento de los neumÃ¡ticos Sport-Touring', 'La evoluciÃ³n del PIRELLI ANGELâ„¢ GT llevÃ¡ aÃºn mÃ¡s lejos el concepto de Gran Turismo de PIRELLI MÃ¡xima manejabilidad en lÃ­nea con el ADN Pirelli y una nueva referencia en kilometraje en el segmento de los neumÃ¡ticos Sport-Touring Excelente comportamiento en mojado gracias tambiÃ©n a una banda de rodadura innovadora y que deriva directamente de los neumÃ¡ticos de competiciÃ³n PIRELLI DIABLOâ„¢ para lluvia Un producto que marca la diferencia gracias a su buena interacciÃ³n con las ayudas electrÃ³nicas a la conducciÃ³n Bi-compuesto en los neumÃ¡ticos traseros', 44, 'Disponible'),
(5, 'Imagenes/original.jpgBridgestoneSedanesTuranza', 'Bridgestone', 'Turanza', 'Sedanes', '5000.00', '15000.00', 'El Turanza QuietTrack es un neumÃ¡tico para todas las estaciones diseÃ±ado para brindar control en condiciones de humedad o nieve y amortiguar el ruido de la carretera. Construido para rendir por 80,000 millas *, este neumÃ¡tico ofrece una conducciÃ³n silenciosa y cÃ³moda.', 'El Turanza QuietTrack es un neumÃ¡tico para todas las estaciones diseÃ±ado para brindar control en condiciones de humedad o nieve y amortiguar el ruido de la carretera. Construido para rendir por 80,000 millas *, este neumÃ¡tico ofrece una conducciÃ³n silenciosa y cÃ³moda.', 50, 'Disponible'),
(6, 'Imagenes/original (1).jpgBridgestoneSedanesPotenza', 'Bridgestone', 'Potenza', 'Sedanes', '6500.00', '16000.00', 'Los neumÃ¡ticos de rendimiento de verano de Potenza estÃ¡n desarrollados con compuestos Ãºnicos de construcciÃ³n y banda de rodadura para un agarre mÃ¡ximo y diseÃ±ados con la tecnologÃ­a mÃ¡s extrema inspirada en las carreras de Bridgestone para una conducciÃ³n de rendimiento en pista. Combine eso con la rigidez de los hombros, este neumÃ¡tico permite curvas y frenadas extremas, lo que lo convierte en el neumÃ¡tico de calle de mayor rendimiento de Bridgestone.', 'Los neumÃ¡ticos de rendimiento de verano de Potenza estÃ¡n desarrollados con compuestos Ãºnicos de construcciÃ³n y banda de rodadura para un agarre mÃ¡ximo y diseÃ±ados con la tecnologÃ­a mÃ¡s extrema inspirada en las carreras de Bridgestone para una conducciÃ³n de rendimiento en pista. Combine eso con la rigidez de los hombros, este neumÃ¡tico permite curvas y frenadas extremas, lo que lo convierte en el neumÃ¡tico de calle de mayor rendimiento de Bridgestone.', 35, 'Disponible'),
(7, 'Imagenes/original (2).jpgBridgestoneSedanesEcopia', 'Bridgestone', 'Ecopia', 'Sedanes', '3000.00', '7500.00', 'El nuevo Bridgestone Ecopia EP422 Plus estÃ¡ cambiando el juego en el rendimiento de los neumÃ¡ticos de baja resistencia a la rodadura y estÃ¡ diseÃ±ado para hacer que su automÃ³vil sea mÃ¡s eficiente en combustible.', 'El nuevo Bridgestone Ecopia EP422 Plus estÃ¡ cambiando el juego en el rendimiento de los neumÃ¡ticos de baja resistencia a la rodadura y estÃ¡ diseÃ±ado para hacer que su automÃ³vil sea mÃ¡s eficiente en combustible', 25, 'Disponible'),
(8, 'Imagenes/original (3).jpgBridgestoneSUV y Pick-UpDueler', 'Bridgestone', 'Dueler', 'SUV y Pick-Up', '5000.00', '13500.00', 'El Bridgestone Dueler H / L Alenza Plus es nuestro neumÃ¡tico de carretera premium que ofrece una garantÃ­a de hasta 80,000 millas limitadas *. Este neumÃ¡tico estÃ¡ diseÃ±ado para ofrecer una conducciÃ³n silenciosa y cÃ³moda para su SUV de lujo, crossover o camioneta. ', 'El Bridgestone Dueler H / L Alenza Plus es nuestro neumÃ¡tico de carretera premium que ofrece una garantÃ­a de hasta 80,000 millas limitadas *. Este neumÃ¡tico estÃ¡ diseÃ±ado para ofrecer una conducciÃ³n silenciosa y cÃ³moda para su SUV de lujo, crossover o camioneta. GarantÃ­a de millaje limitado de 80,000 millas para llantas con clasificaciÃ³n de velocidad H, T y V; GarantÃ­a de millaje limitado de 55,000 millas para llantas con velocidad W. Se aplican ciertas condiciones y limitaciones.', 45, 'Disponible'),
(9, 'Imagenes/original (4).jpgBridgestoneSUV y Pick-UpBlizzak', 'Bridgestone', 'Blizzak', 'SUV y Pick-Up', '5250.00', '12500.00', 'El Bridgestone Blizzak WS80 es lo Ãºltimo en rendimiento de invierno para cupÃ©s, sedanes, minivans y crossovers. Blizzak te ayuda a conquistar la nieve y el hielo con una tracciÃ³n segura en el clima invernal.', 'El Bridgestone Blizzak WS80 es lo Ãºltimo en rendimiento de invierno para cupÃ©s, sedanes, minivans y crossovers. Blizzak te ayuda a conquistar la nieve y el hielo con una tracciÃ³n segura en el clima invernal.', 43, 'Disponible'),
(10, 'Imagenes/R284_1280.1280.png.thumb.1280.1280.pngBridgestoneAutobusesR284 ECOPIA', 'Bridgestone', 'R284 ECOPIA', 'Autobuses', '15000.00', '25000.00', 'El R284 Ecopia es un neumÃ¡tico de direcciÃ³n que le brinda lo mejor de ambos mundos: larga vida Ãºtil y los beneficios de eficiencia de combustible por los que los neumÃ¡ticos Ecopia son conocidos. Gracias a la tecnologÃ­a innovadora, el R284 ofrece una vida Ãºtil significativa al tiempo que mejora la resistencia a la rodadura en un 5%, en comparaciÃ³n con el R283A.', 'El R284 Ecopia es un neumÃ¡tico de direcciÃ³n que le brinda lo mejor de ambos mundos: larga vida Ãºtil y los beneficios de eficiencia de combustible por los que los neumÃ¡ticos Ecopia son conocidos. Gracias a la tecnologÃ­a innovadora, el R284 ofrece una vida Ãºtil significativa al tiempo que mejora la resistencia a la rodadura en un 5%, en comparaciÃ³n con el R283A.', 42, 'Disponible'),
(11, 'Imagenes/M864.png.thumb.1280.1280.pngBridgestoneCamionesM864 TIRE', 'Bridgestone', 'M864 TIRE', 'Camiones', '16000.00', '22000.00', 'El neumÃ¡tico radial Bridgestone M864 para todas las posiciones estÃ¡ diseÃ±ado para proporcionar durabilidad y aumentar el desgaste de la banda de rodadura hasta en un 30% con respecto al Bridgestone M854 y 28% con respecto al Michelin XZY3. Su construcciÃ³n avanzada y sus amplios tamaÃ±os de base lo convierten en la opciÃ³n ideal para aplicaciones de servicio severo.', 'El neumÃ¡tico radial Bridgestone M864 para todas las posiciones estÃ¡ diseÃ±ado para proporcionar durabilidad y aumentar el desgaste de la banda de rodadura hasta en un 30% con respecto al Bridgestone M854 y 28% con respecto al Michelin XZY3. Su construcciÃ³n avanzada y sus amplios tamaÃ±os de base lo convierten en la opciÃ³n ideal para aplicaciones de servicio severo.', 40, 'Disponible'),
(12, 'Imagenes/Greatec-M835A.png.thumb.1280.1280.pngBridgestoneCamionesGREATEC M835A ECOPIA', 'Bridgestone', 'GREATEC M835A E', 'Camiones', '15400.00', '26000.00', 'Gracias a una mejora significativa en la resistencia al desgaste irregular, el neumÃ¡tico Greatec M835A ofrece hasta un 20% mÃ¡s de millas de remociÃ³n ** que la generaciÃ³n anterior, el Greatec M835 sin comprometer la baja resistencia a la rodadura y los excelentes beneficios de recaÃ­da ', 'Gracias a una mejora significativa en la resistencia al desgaste irregular, el neumÃ¡tico Greatec M835A ofrece hasta un 20% mÃ¡s de millas de remociÃ³n ** que la generaciÃ³n anterior, el Greatec M835 sin comprometer la baja resistencia a la rodadura y los excelentes beneficios de recaÃ­da ', 41, 'Disponible'),
(13, 'Imagenes/M729F.png.thumb.1280.1280.pngBridgestoneAutobusesM729F', 'Bridgestone', 'M729F', 'Autobuses', '17500.00', '28000.00', 'El patrÃ³n agresivo mejora la tracciÃ³n en todas las condiciones climÃ¡ticas. La construcciÃ³n de la carcasa y la composiciÃ³n de la tapa / base mejoran la durabilidad y la capacidad de recalado Las costillas protectoras de las paredes laterales resisten los cortes y las abrasiones causadas por frenos e impactos', 'El patrÃ³n agresivo mejora la tracciÃ³n en todas las condiciones climÃ¡ticas. La construcciÃ³n de la carcasa y la composiciÃ³n de la tapa / base mejoran la durabilidad y la capacidad de recalado Las costillas protectoras de las paredes laterales resisten los cortes y las abrasiones causadas por frenos e impactos', 26, 'Disponible'),
(14, 'Imagenes/terra-trail-40-622-28-1-5-black-black-p.pngContinentalBicicletasTerra Trail', 'Continental', 'Terra Trail', 'Bicicletas', '1500.00', '5000.00', 'Para tu camino fuera de la carretera. Para mayor comodidad Por la aventura. Ya sea el recorrido largo o el atajo de camino a casa. La nueva serie Terra de grava de Continental lo lleva allÃ­. Hecho para hacerte mÃ¡s Ã¡spero y suave.', 'Para tu camino fuera de la carretera. Para mayor comodidad Por la aventura. Ya sea el recorrido largo o el atajo de camino a casa. La nueva serie Terra de grava de Continental lo lleva allÃ­. Hecho para hacerte mÃ¡s Ã¡spero y suave.', 50, 'Disponible'),
(15, 'Imagenes/mountain-king-pt-mtb-s1-01.pngContinentalBicicletasMountain King ProTection', 'Continental', 'Mountain King P', 'Bicicletas', '3500.00', '6000.00', 'Con nuestro exclusivo compuesto de la banda de rodadura, que se produce solo en Alemania, hemos revolucionado el deporte del ciclismo. Con el legendario Compuesto BlackChili hemos respondido a la eterna pregunta del mejor equilibrio de agarre y resistencia a la rodadura para el ciclismo.', 'Con nuestro exclusivo compuesto de la banda de rodadura, que se produce solo en Alemania, hemos revolucionado el deporte del ciclismo. Con el legendario Compuesto BlackChili hemos respondido a la eterna pregunta del mejor equilibrio de agarre y resistencia a la rodadura para el ciclismo.', 43, 'Disponible'),
(16, 'Imagenes/DL.png.thumb.1280.1280.pngBridgestoneTractoresDL Tire', 'Bridgestone', 'DL Tire', 'Tractores', '20000.00', '30000.00', 'Banda de rodadura extra profunda y carcasa resistente para terrenos difÃ­ciles Excepcional resistencia al corte y al impacto. PatrÃ³n de banda de rodadura de engranaje Las costillas de goma y de hombro especialmente profundas y especialmente compuestas garantizan la mÃ¡xima facilidad de servicio Excelente tracciÃ³n y estabilidad diseÃ±ada para superficies rocosas severas Costillas de protecciÃ³n de hombro y deflectores de roca', 'Banda de rodadura extra profunda y carcasa resistente para terrenos difÃ­ciles Excepcional resistencia al corte y al impacto. PatrÃ³n de banda de rodadura de engranaje Las costillas de goma y de hombro especialmente profundas y especialmente compuestas garantizan la mÃ¡xima facilidad de servicio Excelente tracciÃ³n y estabilidad diseÃ±ada para superficies rocosas severas Costillas de protecciÃ³n de hombro y deflectores de roca', 45, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `nombre_usuario` varchar(60) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `telefono1` varchar(20) NOT NULL,
  `telefono2` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `sueldo` decimal(10,2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedula`, `nombre_usuario`, `foto`, `telefono1`, `telefono2`, `direccion`, `rol`, `cargo`, `sueldo`, `email`, `contrasena`) VALUES
(1, '001-4857632-1', 'Nelson Alexander Diaz De La Cruz', 'Imagenes/Screenshot_20190805-123505.jpgNelson Alexander Diaz De La Cruzalexddlc139@gmail.com', '809-784-1236', '809-784-1236', 'Calle Anzonia #10, Villa Mella, Santo Domingo', 'Empleado', 'Admin', '65000.00', 'alexddlc139@gmail.com', '$2y$10$9ER.O3Njk72aJYvL0GGDhOsc4pDDzj.hCGHpyJ32JGu9Vx//RAKga'),
(2, '001-8756934-1', 'Genesis Marlenis Bido Rodriguez', 'Imagenes/IMG_20190707_201455.jpgGenesis Marlenis Bido Rodriguezgenesisbr@gmail.com', '809-325-7410', '809-325-7410', 'Mirador Isabela #7', 'Empleado', 'Admin', '65000.00', 'genesisbr@gmail.com', '$2y$10$ChPi/hjZydxtD37cuYDkg.iu9sirXaOKgOkgFunB5z7YdgF72B60G'),
(3, '002-7896125-2', 'Ana Maria Perez Gomez', 'Imagenes/maria.jpgAna Maria Perez Gomezmaria@gmail.com', '809-7410596', '809-7410596', 'Calle Julia #5', 'Empleado', 'Contable', '50000.00', 'maria@gmail.com', '$2y$10$2pQsYx3W9n8DHNK5uE7ODOsAPPvIfBy8xZc2PHaHkqdfc0aICIgKC'),
(4, '002-7840234-2', 'Juan Manuel Ruiz Ruiz', 'Imagenes/juan.jpgJuan Manuel Ruiz Ruizjuan@gmail.com', '809-777-6530', '809-777-6530', 'Calle Maria Camacho #15', 'Empleado', 'Bodeguero', '45000.00', 'juan@gmail.com', '$2y$10$/gy9ucZn9YJHTvv3D22YMu.gfuxM4DrA6xxYqLV1vC0JxJz2bpyZC'),
(5, '', 'Miguel Manuel Luciano Diaz', '', '', '', '', 'Cliente', '', '0.00', 'cliente@gmail.com', '$2y$10$YE3rDGZmxQiVUo5Ai17m3.ZMaKJZXG.0qztE.XoHOd9qy7p/W5eSO'),
(6, '', 'Genesis Marlenis Bido Rodriguez', '', '', '', '', 'Cliente', '', '0.00', 'gbr0696@gmail.com', '$2y$10$TMUbY8ftqT9e0Efop/n2xePSzaoA8Iq7lWySYXS4t.jW8TSZqANKi'),
(7, '', 'Juan Perez', '', '', '', '', 'Cliente', '', '0.00', 'juanitoalimaÃ±a@gmail.com', '$2y$10$NtxP4yMdRCcREA9xOYGr8OVj/fwLqK1XM6wyBby3gi96K6pynIpC.'),
(8, '', 'stir', '', '', '', '', 'Cliente', '', '0.00', '12345@hotmail.com', '$2y$10$sAuOPkNjpizpGV.i/7xbWupMrM06QSSo7KQA/bAXb/lSyymErWvV6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `correocomprador` varchar(50) NOT NULL,
  `vendedor` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `clavetransaccion` varchar(250) NOT NULL,
  `paypaldatos` text NOT NULL,
  `estado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `correocomprador`, `vendedor`, `fecha`, `total`, `clavetransaccion`, `paypaldatos`, `estado`) VALUES
(1, 'gbr0696@gmail.com', 'Sistema', '2019-08-11 17:20:30', '17000.00', 'n9mfj046h4vfivrpru7rm5g2rp', '', ''),
(2, 'alexddlc139@gmail.com', 'alexddlc139@gmail.com', '2019-08-11 17:23:35', '60000.00', 'n9mfj046h4vfivrpru7rm5g2rp', '', '');

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
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
