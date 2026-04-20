-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2026 at 08:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coleccion_discos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `artista`
--

CREATE TABLE `artista` (
  `id_artista` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artista`
--

INSERT INTO `artista` (`id_artista`, `nombre`, `pais`, `descripcion`) VALUES
(1, 'Deftones', 'USA', 'Deftones have always defined boundless creativity in the music space. Across nine studio albums, they have carved out an unmistakable sonic identity — ferocious yet dreamlike, while making space for constant refinement and surprise. Now, decades on from the groove-forward sound of their era-defining debut, Adrenaline, and following a long line of masterpieces including 2000’s White Pony, 2010’s Diamond Eyes and 2020’s Ohms — an album that earned them their second and third Grammy nominations — they return with one of the most focused statements of their career: private music. Joining the band’s creative core of Chino Moreno, Stephen Carpenter, Abe Cunningham and Frank Delgado (as well as touring bassist Fred Sablan, who appears on the album) is producer Nick Raskulinecz, who previously worked on Diamond Eyes and 2012’s riveting Koi No Yokan. The result is a lean, masterfully paced 11-song set that plays like a new Deftones benchmark. Meditating on the beauty and peril of nature, the challenge of cultivating a positive mindset and visions of a journey beyond the physical realm, private music showcases Deftones at their most evolved. At once a psychedelic voyage and a skull-rattling wallop, it’s the latest peak in a catalog filled with immersive, emotive triumphs'),
(2, 'No Demuestra Interes', 'Argentina', 'No Demuestra Interés (NDI) is a traditional hardcore punk and post-hardcore band from Buenos Aires, Argentina. The band is active since 1990. NDI recorded 4 LPs named Extremo Sur (1993), Días de Furia (1994), Mensaje no preciso de imagen (1995) and Control ep (2019). Some participations in compilations can be found in other years. At this time, they are performing shows and working in new tracks.'),
(3, 'WRRN', 'Argentina', 'WRRN es un proyecto de post-hardcore y screamo de Buenos Aires, formado en 2017 por Gonza Morales y los hermanos Nico y Seba Soto. Provenientes del sur, y con un estilo agresivo y directo respecto a temas difíciles de encarar, la banda ha ido escalando y ganando su lugar como una de las más importantes del histórico movimiento emo de Argentina.\r\n\r\nA través de dos EP’s y cuatro sencillos, la banda ha explorado las dinámicas sonoras de estilos como el post-rock y la crudeza y la potencia del metalcore, incluso sumando y experimentando con texturas y ritmos provenientes del shoegaze y el post-punk, creando un imaginario sonoro para sus letras cargadas de nostalgia, dolor, tristeza e incertidumbre. Actualmente la banda se encuentra presentando su primer álbum, “¿Qué Se Siente Estar Mejor?”, recibido con grandes elogios de la prensa y los fans, con múltiples shows en vivo en multiples ciudades de Argentina, Chile y Uruguay.'),
(4, 'Cucsifae', 'Argentina', ''),
(5, 'Death', 'USA', 'Death is an American death metal band formed in 1983 by guitarist/vocalist Chuck Schuldiner in Florida, widely recognized as pioneering the death metal genre. Evolving from raw, gore-focused early sound to complex, progressive metal, the band is crucial to technical death metal. Schuldiner remained the sole constant member until the band disbanded in 2001 following his death xd.'),
(6, 'Deafheaven', 'USA', 'Deafheaven\'s Ragingly Beautiful \'Lonely People With Power\'Deafheaven is an acclaimed American band, formed in 2010 in San Francisco, widely recognized for pioneering the \"blackgaze\" genre, which blends the intense, high-pitched shrieks and blast beats of black metal with the dreamy, atmospheric textures of shoegaze and post-rock');

-- --------------------------------------------------------

--
-- Table structure for table `disco`
--

CREATE TABLE `disco` (
  `id_disco` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `id_artista` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disco`
--

INSERT INTO `disco` (`id_disco`, `titulo`, `fecha_lanzamiento`, `id_artista`, `genero`) VALUES
(2, 'Private Music', '2025-08-22', 1, 'Alt Metal'),
(3, 'Mensaje No Preciso de Imagen', '1996-03-03', 2, 'Punk'),
(4, '¿Qué Se Siente Estar Mejor?', '2023-08-21', 3, 'Post-Hardcore'),
(5, 'Brilla Como un Pequeño Niñ@', '2003-03-14', 4, 'Post-Hardcore, Punk'),
(6, 'Spiritual Healing', '1990-02-16', 5, 'Death Metal'),
(7, 'LPWP', '2025-03-28', 6, 'Blackgaze');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id_artista`);

--
-- Indexes for table `disco`
--
ALTER TABLE `disco`
  ADD PRIMARY KEY (`id_disco`),
  ADD KEY `id_artista` (`id_artista`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artista`
--
ALTER TABLE `artista`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `disco`
--
ALTER TABLE `disco`
  MODIFY `id_disco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disco`
--
ALTER TABLE `disco`
  ADD CONSTRAINT `disco_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id_artista`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
