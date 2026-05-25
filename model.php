<?php
require_once 'config.php';

class Model {
    protected $db;

       public function __construct() {
            $dbServer = new PDO('mysql:host=' . DB_HOST . ';charset=utf8', DB_USER, DB_PASS);

            $dbServer->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");

            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
            $this->db = $db;

            $this->_deploy();

    }
        private function _deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql = <<<'END'
            -- --------------------------------------------------------
--
-- Table structure for table `artistas`
--

CREATE TABLE `artistas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artistas`
--

INSERT INTO `artistas` (`id`, `nombre`, `pais`, `descripcion`) VALUES
(1, 'Deftones', 'USAp', 'Deftones have always defined boundless creativity in the music space. Across nine studio albums, they have carved out an unmistakable sonic identity — ferocious yet dreamlike, while making space for constant refinement and surprise. Now, decades on from the groove-forward sound of their era-defining debut, Adrenaline, and following a long line of masterpieces including 2000’s White Pony, 2010’s Diamond Eyes and 2020’s Ohms — an album that earned them their second and third Grammy nominations — they return with one of the most focused statements of their career: private music. Joining the band’s creative core of Chino Moreno, Stephen Carpenter, Abe Cunningham and Frank Delgado (as well as touring bassist Fred Sablan, who appears on the album) is producer Nick Raskulinecz, who previously worked on Diamond Eyes and 2012’s riveting Koi No Yokan. The result is a lean, masterfully paced 11-song set that plays like a new Deftones benchmark. Meditating on the beauty and peril of nature, the challenge of cultivating a positive mindset and visions of a journey beyond the physical realm, private music showcases Deftones at their most evolved. At once a psychedelic voyage and a skull-rattling wallop, it’s the latest peak in a catalog filled with immersive, emotive triumphs'),
(2, 'No Demuestra Interes', 'Argentina', 'No Demuestra Interés (NDI) is a traditional hardcore punk and post-hardcore band from Buenos Aires, Argentina. The band is active since 1990. NDI recorded 4 LPs named Extremo Sur (1993), Días de Furia (1994), Mensaje no preciso de imagen (1995) and Control ep (2019). Some participations in compilations can be found in other years. At this time, they are performing shows and working in new tracks.'),
(3, 'WRRN', 'Argentina', 'WRRN es un proyecto de post-hardcore y screamo de Buenos Aires, formado en 2017 por Gonza Morales y los hermanos Nico y Seba Soto. Provenientes del sur, y con un estilo agresivo y directo respecto a temas difíciles de encarar, la banda ha ido escalando y ganando su lugar como una de las más importantes del histórico movimiento emo de Argentina.\r\n\r\nA través de dos EP’s y cuatro sencillos, la banda ha explorado las dinámicas sonoras de estilos como el post-rock y la crudeza y la potencia del metalcore, incluso sumando y experimentando con texturas y ritmos provenientes del shoegaze y el post-punk, creando un imaginario sonoro para sus letras cargadas de nostalgia, dolor, tristeza e incertidumbre. Actualmente la banda se encuentra presentando su primer álbum, “¿Qué Se Siente Estar Mejor?”, recibido con grandes elogios de la prensa y los fans, con múltiples shows en vivo en multiples ciudades de Argentina, Chile y Uruguay.'),
(4, 'Cucsifae', 'Argentina', ''),
(5, 'Death', 'USA', 'Death is an American death metal band formed in 1983 by guitarist/vocalist Chuck Schuldiner in Florida, widely recognized as pioneering the death metal genre. Evolving from raw, gore-focused early sound to complex, progressive metal, the band is crucial to technical death metal. Schuldiner remained the sole constant member until the band disbanded in 2001 following his death xd.'),
(6, 'Deafheaven', 'USA', 'Deafheaven\'s Ragingly Beautiful \'Lonely People With Power\'Deafheaven is an acclaimed American band, formed in 2010 in San Francisco, widely recognized for pioneering the \"blackgaze\" genre, which blends the intense, high-pitched shrieks and blast beats of black metal with the dreamy, atmospheric textures of shoegaze and post-rock'),
(8, 'Cannibal Corpse', 'Estados Unidos', 'Banda icónica del death metal extremo, famosa por su sonido brutal, riffs rápidos y letras controversiales.'),
(9, 'Morbid Angel', 'Estados Unidos', 'Una de las bandas más influyentes del death metal, con un estilo oscuro, técnico y atmosférico que marcó el género.'),
(10, 'Obituary', 'Estados Unidos', 'Pioneros del death metal de Florida, conocidos por un sonido más lento, pesado y con groove característico.'),
(11, 'Deicide', 'Estados Unidos', 'Death metal blasfemo y agresivo, con una de las propuestas más extremas y directas del género.'),
(12, 'Suffocation', 'Estados Unidos', 'Referentes del death metal técnico y brutal, pioneros del breakdown moderno dentro del metal extremo.'),
(13, 'Cryptopsy', 'Canadá', 'Banda clave del death metal técnico, conocida por su velocidad extrema y complejidad instrumental.'),
(14, 'Entombed', 'Suecia', 'Pioneros del death metal sueco, con un sonido más sucio, pesado y característico del “buzzsaw tone”.'),
(15, 'Dying Fetus', 'Estados Unidos', 'Death metal técnico con influencias de hardcore, reconocido por riffs complejos y breakdowns pesados.'),
(16, 'Cannibal Corpse', 'Estados Unidos', 'Iconos del death metal extremo con una de las trayectorias más consistentes del género.'),
(17, '2 Minutos', 'Argentina', 'Banda icónica del punk rock argentino, con letras urbanas, callejeras y un estilo directo y crudo.'),
(18, 'Flema', 'Argentina', 'Punk crudo, desprolijo y emocional, con letras que reflejan caos, rebeldía y vida callejera.'),
(19, 'Doble Fuerza', 'Argentina', 'Punk rock clásico argentino con influencias del street punk británico y una estética bien callejera.'),
(20, 'Boom Boom Kid', 'Argentina', 'Proyecto de Carlos Rodríguez tras Fun People, con un estilo experimental entre punk, hardcore y pop alternativo.'),
(21, 'Fun People', 'Argentina', 'Banda fundamental del hardcore punk argentino, con letras emocionales y actitud DIY.'),
(22, 'Eterna Inocencia', 'Argentina', 'Punk melódico con fuerte carga poética y letras introspectivas sobre sociedad y emociones.'),
(23, 'Clamor', 'Argentina', 'Banda emo / hardcore de Quilmes, Zona Sur.'),
(24, 'Pantera', 'Estados Unidos', 'Banda clave del groove metal, revolucionó el thrash con un sonido más pesado, moderno y agresivo en los 90. Con riffs icónicos y una actitud arrolladora.'),
(25, 'Exodus', 'Estados Unidos', 'Pioneros del thrash metal de la Bay Area, con un sonido rápido, agresivo y crudo que influyó fuertemente en la escena metal mundial.');

-- --------------------------------------------------------

--
-- Table structure for table `coleccion_usuario`
--

CREATE TABLE `coleccion_usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_disco` int(11) NOT NULL,
  `fecha_agregado` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coleccion_usuario`
--

INSERT INTO `coleccion_usuario` (`id`, `id_usuario`, `id_disco`, `fecha_agregado`) VALUES
(1, 1, 2, '2026-05-24'),
(2, 1, 2, '2026-05-24'),
(3, 2, 2, '2026-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `discos`
--

CREATE TABLE `discos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `id_artista` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `temas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discos`
--

INSERT INTO `discos` (`id`, `titulo`, `fecha_lanzamiento`, `id_artista`, `id_genero`, `temas`) VALUES
(2, 'Private Music', '2025-08-22', 1, 5, ''),
(3, 'Mensaje No Preciso de Imagen', '1996-03-03', 2, 3, ''),
(4, '¿Qué Se Siente Estar Mejor?', '2023-08-21', 3, 6, ''),
(5, 'Brilla Como un Pequeño Niñ@', '2003-03-14', 4, 3, '01. TERROR\r\n02. ROCK EMO\r\n03. AENLI\r\n04. HAPPY HOURS\r\n05. DREAM AGAIN\r\n06. SONIC POP\r\n07. LAGRIMAS\r\n08. BE CAREFUL\r\n09. HELLCOMBS\r\n10. HUUU!!!\r\n11. SCARED\r\n12. POP PHUNX\r\n13. SITTING\r\n14. ONE LAST INNOCENCE\r\n15. SUNSHINE'),
(6, 'Spiritual Healing', '1990-02-16', 5, 2, ''),
(7, 'LPWP', '2025-03-28', 6, 2, ''),
(23, 'Blessed Are the Sick', '1991-07-02', 9, 2, NULL),
(26, 'Cause of Death', '1990-09-19', 10, 2, NULL),
(28, 'Deicide', '1990-06-25', 11, 2, NULL),
(34, 'Valentín Alsina', '1994-06-01', 17, 3, NULL),
(35, 'Nunca Nos Fuimos', '1994-01-01', 18, 3, NULL),
(37, 'El disco del verano', '2018-01-01', 20, 3, ''),
(38, 'The Fun People Experience', '1998-01-01', 21, 3, NULL),
(39, 'Kum Kum', '1996-01-01', 21, 3, NULL),
(42, 'para no olvidarte', '2024-05-31', 23, 6, NULL),
(43, 'The Law', '2000-10-03', 25, 8, NULL),
(44, 'Vulgar Display of Power', '1992-02-25', 24, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`id`, `nombre`) VALUES
(2, 'death'),
(3, 'punk'),
(5, 'Nu'),
(6, 'Post-Hardcore'),
(8, 'groove');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contraseña` varchar(225) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contraseña`, `rol`) VALUES
(1, 'usuario', '$2y$10$AY2cZt8QqFUCQFVVnNT7v.Yte4V5gq8aoQUka5CLmD8OggUVlMF22', ''),
(2, 'webadmin', '$2y$10$91gBXRlZdvoFtQUMV/Crb.gy8kTsgdONg6IGDtlazsyZzLnYNeOM2', 'admin');

END;
            $this->db->query($sql);
        }
    }
}
