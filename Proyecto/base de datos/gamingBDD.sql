DROP DATABASE IF EXISTS gaming;
CREATE database if not exists gaming;
use gaming;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2022 a las 21:31:00
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gaming`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'General'),
(2, 'Off-Topic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(10) NOT NULL,
  `txtcomentario` text NOT NULL,
  `id_post` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `txtcomentario`, `id_post`, `id_usuario`) VALUES
(15, 'El texto de arriba es una explicación de lo que es el off topic, un saludo', 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia`
--

CREATE TABLE `guia` (
  `id_guia` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `texto_guia` text NOT NULL,
  `id_juego` int(10) DEFAULT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `guia`
--

INSERT INTO `guia` (`id_guia`, `titulo`, `texto_guia`, `id_juego`, `img`) VALUES
(5, 'Guía Horizon Forbidden West', 'Te contamos todo lo que necesitas para completar Horizon Forbidden West al 100%. Acompaña a Aloy en esta nueva aventura donde descubriremos más sobre los misterios del nuevo mundo.\r\nINICIO DE LA GUÍA\r\nTe damos la bienvenida nuestra guía de Horizon Forbidden West, la secuela del aclamado juego de Guerrilla. A lo largo de decenas de horas, te ayudaremos a explorar el Oeste Prohibido y buscaremos la manera de evitar lo que parece podría ser un nuevo cataclismo que acabe con la humanidad de una vez por todas; todo ello sin dejar de recuperar objetos antiguos, mejorar nuestras armas y más, mucho más.\r\nLa historia de Horizon Forbidden West vuelve a presentarte a Aloy, heroína de la tribu de los Nora. Han pasado varios meses desde los eventos del primer juego y ahora te toca acompañar a la exploradora al legendario Oeste Prohibido, para averiguar qué está sucediendo con la naturaleza, que parece empeñada en erradicar por completo lo poco que queda de la raza humana...\r\n\r\nComo siempre en juegos de este tipo, contaremos con varias decenas de misiones secundarias que podremos completar. A través de ellas viviremos historias y aventuras opcionales, al tiempo que conseguimos jugosas recompensas para nuestra heroína. Aquí te contaremos cómo y cuándo completarlas todas, para que no dejes nada pendiente.', NULL, 'HorizonForbiddenWest.png'),
(6, 'Guía Lost Ark', 'Esto es todo lo que necesitas saber para lanzarte a jugar a Lost Ark. Las mejores clases, builds, secretos y consejos para meterte de lleno en un nuevo juego de rol y fantasía.\r\nINICIO DE LA GUÍA\r\nLost Ark es la nueva apuesta de Amazon Games después del exitoso New World. En esta ocasión nos metemos de lleno en un juego de rol y acción que recuerda mucho a títulos como Diablo, aunque os advertimos que eso es así únicamente en apariencia.\r\n\r\nA lo largo de esta guía, os queremos presentar las clases disponibles, cuáles son las mejores y algunas dudas más que os puedan surgir. Una vez la versión final del juego esté disponible, os ofreceremos mucho más contenido para que podáis sacarle todo el juego a este prometedor titulo de Amazon Games.\r\n\r\nLost Ark cuenta con un total de 7 clases distintas. Cada una de ellas tiene además entre 1 y 3 clases avanzadas, lo que da pie a bastante versatilidad en lo que a escoger a nuestro personaje se refiere. Aquí so contaremos todo sobre ellas\r\n', NULL, 'guialostark.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `id_juego` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id_juego`, `nombre`, `descripcion`, `foto`, `tag`) VALUES
(1, 'Battlefield 2042', 'Battlefield™ 2042 es un shooter en primera persona que marca el regreso a la emblemática guerra total de la franquicia. Adáptate y sobrevive en un mundo en un futuro cercano transformado por el desorden. Forma tu patrulla y utiliza un arsenal de vanguardia en campos de batalla en constante cambio con 128 jugadores, una escala sin precedentes y una destrucción épica.. La nueva generación de los modos favoritos de los aficionados Conquista y Avance presenta los mapas más grandes de Battlefield con hasta 128 jugadores. Vive la intensidad de la guerra total en mapas repletos de climas dinámicos y eventos del mundo espectaculares.  Conquista Vuelve el emblemático modo de mundo abierto de Battlefield, esta vez con 128 jugadores en PC. Los mapas se han diseñado específicamente para esta gran escala, con la acción dividida en ', 'battlefield2042.png', 'shooter'),
(2, 'Halo Infinite', 'Conviértete en el Jefe Maestro:\r\nCuando se pierde toda esperanza y el destino de la humanidad pende de un hilo, el Jefe Maestro está listo para enfrentarse al enemigo más despiadado al que jamás haya hecho frente. Ponte la armadura del mayor héroe de la humanidad para vivir una aventura épica y explorar el descomunal anillo de Halo.\r\n\r\nExplora Halo Zeta:\r\nHalo Infinite ofrece la campaña de Halo más extensa y espectacular hasta la fecha, ambientada en el amplio escenario del antiguo anillo Halo Zeta. Explora zonas muy extensas en la instalación 07: desde zonas elevadas que quitan el hipo hasta lugares misteriosos en las profundidades del anillo. Rescata a los marines de la UNSC para obtener refuerzos en tu afán por acabar con los temibles enemigos conocidos como \"\"desterrados\"\".\r\n\r\nDerrota a los desterrados:\r\nAmbientado después de los sucesos de Halo 5, y poco después de una derrota aplastante, Halo Infinite nos muestra una flota de la UNSC arrasada que permanece varada en la superficie de la instalación 07, también gravemente dañada. Entre esos restos, un aterrador clan de guerreros Brute, los desterrados, parece controlar ahora el anillo. Superado en todos los sentidos, el Jefe Maestro trata de impedir que los desterrados reparen el anillo de Halo y se apoderen de la mayor amenaza de la galaxia.\r\n\r\nConfiguración y optimización para PC:\r\nHalo: Infinite está diseñado para jugar en PC. Entre otras cosas, dispone de ajustes gráficos avanzados, compatibilidad con pantallas ultrapanorámicas y super ultrapanorámicas, asignación de botones triple y características como el escalado dinámico y los FPS variables, lo que convierte a Halo: Infinite en la mejor experiencia de Halo en PC hasta la fecha.', 'Haloinfinite.png', 'Shooter RPG'),
(3, 'Age of empires IV', 'Age of Empires IV para PC es un juego de estrategia en tiempo real, el cuarto de la serie Age of Empires, que además llega quince años después del tercer título de la saga. Esta versión está ambientada en la Edad Media y tiene mucha implicación con la campaña de los normandos. Si eras un gran fanático del tercer juego podrás transferir algunas de las mecánicas de aquel título a esta nueva y mejorada plataforma.Acerca del JuegoHay cuatro campañas históricas de estilo documental para jugar, así como los primeros nómadas de la franquicia. Los nómadas son los mongoles, que parecen ser muy interesantes, ya que tienen la primera base móvil jamás vista en este tipo de juegos de estrategia en tiempo real. Estaban en el segundo juego, pero estáticos, como las otras civilizaciones mencionadas.Las cuatro campañas son: la conquista normanda; la Guerra de los 100 Años; el Imperio Mongol y el Ascenso de Moscú. Habrá combates en murallas, batallas en el mar y las armas de asedio reducirán el trabajo de algunas fortificaciones, así que construye bien la tuya.Comenzarás el juego en tu base, recolectando madera y piedra para construir estructuras simples al principio, aumentando lentamente en tamaño y fuerza. También entrenarás tropas (en grupos de 200 aproximadamente) antes de enviarlas a luchar para ganar territorio en tu nombre.Tu elección de civilización importa: cada una de las civilizaciones funciona de manera diferente, luchan de manera diferente y, en general, dejan claro que no son las mismas que las demás. Existe cierto margen que permite que se puedan llevar elementos de una civilización a otra, pero estos se adaptan cuidadosamente para ganar autenticidad, es decir, si las civilizaciones se comunicaron o estaban geográficamente cerca, es posible que las influencias se propaguen de una a otra.A medida que avanzas a lo largo de los años, tu civilización cambia de una manera bastante auténtica, pasando del lenguaje medieval temprano a una gramática y sintaxis más sofisticadas. Esto sucede en todas las civilizaciones y es una característica deliberada: los desarrolladores del juego buscaron hablantes y eruditos de los idiomas antiguos para ganar verosimilitud.¿Qué Hay Nuevo?En este juego, el enfoque es deliberadamente amplio, mirando a la nación como una entidad completa, en lugar de mirar a los individuos. Esto funciona sorprendentemente bien, y prueba con cosas extravagantes como poder esconder tu ejército en el bosque, donde estarán escondidos a menos que un explorador enemigo pase a su lado sin poder verlos. Te susurrarán hasta que comience la batalla y podrán abandonar su ocultación, volviendo a sus voces normales.Disfruta de imágenes de acción real con perspectiva aérea, que es una característica nueva, además de poder activar la narración durante las batallas y eventos de la vida real, para que puedas seguir exactamente lo que está pasando. El juego presenta una música fabulosa, que ha sido creada por el compositor que se encargó de la banda sonora de The Witcher 3.¿Quién Puedo Ser?Hay ocho civilizaciones incluidas en el juego:Los Ingleses – luchando contra la invasión normanda y cambiando la forma en que se gobierna la pequeña nación insular para siempreLos Chinos – conocidos por largas dinastías, los tiempos intermedios siempre fueron emocionantes en China. El juego trata sobre un período breve pero brutal en el que el asesinato era prácticamente una causa natural de muerte para un emperadorLos Mongoles – bajo el liderazgo incomparable de Genghis Khan, este pueblo belicoso se extendió por gran parte de Asia hasta que tuvo un inmenso imperioEl Sultanato de Delhi – una especie de precursor del Imperio Otomano, el Sultanato fue una serie de cinco dinastías musulmanas que gobernaron gran parte de la India en su apogeo. El gran punto de interpretar a esta civilización es que tiene elefantes de caballeríaLos Franceses – atrapados en una guerra aparentemente interminable con los británicos, la Guerra de los Cien Años fue de hecho una serie de mini guerras. Con ambos bandos igualados e igualmente hambrientos de victoria, los dos países se vieron atrapados en un ciclo de guerra y paz durante unos 107 años en totalEl Califato Abasí – otra dinastía musulmana, esta descendía del tío del profeta Mahoma, cuyo nombre era Abbas. Esta se extendía por gran parte de Oriente Próximo y era una potencia militar formidable cuando los mongoles llegaron buscando extender su esfera de influencia en la regiónEl Sacro Imperio Romano – el descendiente de quizás el imperio más conocido, sin duda el más pernicioso (salvo quizá el posterior Imperio Británico), en el momento del juego, el Sacro Imperio Romano, bajo el mando del Vaticano, se había reducido un poco a simplemente una parte de Europa, a diferencia de sus territorios anteriores que se extendían por el Reino Unido, África y Asia occidentalLos Rus – el nombre implica que son rusos y ciertamente esa parte del mundo estaba incluida en el Imperio Rus. Sin embargo, también incluyó a varios países eslavos y de Europa del Este en su poder. Como muchos grandes imperios, alcanzó su punto máximo y luego comenzó a declinar, derrumbándose por completo a las pocas décadas de su máximo esplendorAge of Empires IV para PC está disponible para su compra en Instant Gaming por una fracción de su precio de venta al público. Recibirás una clave oficial y podrás disfrutar del juego en segundos. Play Smart. Pay Less.', 'AOE4.png', 'Estrategia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id_noticias` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `texto_noticia` text NOT NULL,
  `id_juego` int(10) DEFAULT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_noticias`, `titulo`, `texto_noticia`, `id_juego`, `img`) VALUES
(5, 'La ópera de FF tendrá canciones en español', 'Final Fantasy VI Pixel Remaster se lanzará en un par de días, el 23 de febrero, en PC, iOS y Android. Esta nueva versión del clásico JRPG será la última entrega de la saga de Square Enix en recibir un relanzamiento de estas características, y al parecer lo hará por todo lo alto con un contenido muy especial que encantará a los fans del juego original: la famosa escena de la ópera de Final Fantasy VI se ha transformado ahora para ofrecer un estilo en tres dimensiones, similar al ya icónico HD-2D de la compañía, e incluirá canciones grabadas en varios idiomas.\r\n\r\nAsí lo cuenta Famitsu en un artículo publicado hoy mismo en el que, además, se han mostrado las primeras imágenes de esta escena con su nuevo estilo en tres dimensiones. El cambio no sólo se notará en la nueva perspectiva de los planos, sino también en las canciones que cantan los personajes, que se han grabado interpretadas por cantantes reales en siete idiomas: español, japonés, inglés, francés, italiano, alemán y coreano. Bajo estas líneas podéis ver un tráiler en el que se puede oír y ver uno de los temas de la ópera.\r\n\r\nOtras mejoras de los Pixel Remaster\r\nEstas mejoras, concretas de la escena de la ópera, se suman a las demás realizadas para actualizar el clásico Final Fantasy a estándares modernos. En Vandal jugamos la remasterización de la entrega anterior, Final Fantasy V Pixel Remaster, para contaros en nuestro análisis que \"es, sin duda, la mejor versión que se ha lanzado nunca de este clasicazo. (...) Su renovado apartado visual, su espectacular banda sonora y las pequeñas mejoras que se han introducido aquí y allá para hacer de la aventura algo más actual y disfrutable, acaban compensando de sobra\".\r\n\r\n', NULL, 'finalfantasypixel.jpg'),
(6, 'Lost Ark ya trabaja en resolver los problemas', 'Lost Ark continúa con una concurrencia de jugadores bestial. Los servidores están colapsados y el equipo de Smilegate RPG no da abasto para solucionar este grave problema, que hace que los jugadores hagan colas interminables para tratar de echarse unas partidas. Por suerte, los trabajadores del título son conscientes de la cantidad de controversias que hay en el MMO y su principal preocupación es solucionar todos y cada uno de esos problemas, para que la experiencia de juego sea lo mejor posible para todos. Eso de ser free-to-play ha dado muchísimo tirón en Steam y aunque pasen los días, el juego sigue echando humo.\r\n\r\nEn un reciente comunicado, se han mostrado cuáles son los puntos más destacados que se van a tratar en los próximos días y las soluciones que actualmente están en marcha. Para resumir, grosso modo, lo más importante, lo que Smilegate RPG tratará en futuras actualizaciones:\r\nSolucionar los errores de emparejamiento más allá del reinicio de servidores.\r\nEstabilizar y reducir la latencia del Aura cristalina y solucionar otros problemas de la tienda y el inventario de productos.\r\nSe estima con el primer cambio que os hemos mencionado que los servidores se reinicien. Serán los de Europa central el 21/02 a las 00:00 CET (23:00 UTC del 20/2). Esto debería ayudar a que los jugadores puedan realizar misiones en cooperativo, en equipo organizado. Lo malo es que, como siempre, el primer paso será apagar esos servidores y por tanto el videojuego quedará inactivo durante el periodo de tiempo mencionado.', NULL, 'lostark.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id_post` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `texto_post` text NOT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `id_usuario` int(10) DEFAULT NULL,
  `id_categoria` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id_post`, `titulo`, `texto_post`, `comentario`, `id_usuario`, `id_categoria`) VALUES
(20, 'Esto es la Categoría de Off - Topic', 'El término off topic (fuera de tema) se refiere a todas aquellas contribuciones que, de alguna manera, no guardan relación con la discusión que dio origen al tema. Se trata de una digresión, pero se prefiere este término fundamentalmente en el contexto de las listas de correo, grupos de noticias, foros de discusión y wikis.1​\r\n\r\nPor cortesía, es común indicar que se está posteando un mensaje off-topic añadiendo estas palabras al comienzo del asunto o bien sus siglas OT.2​ Por ejemplo, en un foro que discuta el funcionamiento de Linux, alguien podría publicar un mensaje con el asunto: \"OT: ¿Habían notado el temblor?\".\r\n\r\nEn muchos casos podemos encontrar en los foros de discusión un lugar dedicado precisamente a temas off-topic, es decir, sin relación a los temas de la línea principal del foro, entonces en estricto rigor, off-topic es una sección en donde se tratan temas de corte banal y misceláneo. Por ejemplo, en la sección off-topic de un foro de coches podríamos encontrar comentarios de videojuegos (y no necesariamente videojuegos de coches).\r\n\r\nLos trolls suelen insertar comentarios off-topic deliberadamente para enfadar a los miembros o secuestrar una discusión.\r\n\r\nEl antónimo de esta expresión es on topic.', NULL, 1, 2),
(21, 'Post General', 'Aquí irán todos los posts generales o de ayuda al usuario. \r\n\r\nUn saludo.', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `review`
--

CREATE TABLE `review` (
  `id_review` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `texto_review` text NOT NULL,
  `id_juego` int(10) DEFAULT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `review`
--

INSERT INTO `review` (`id_review`, `titulo`, `texto_review`, `id_juego`, `img`) VALUES
(7, 'Análisis Monark, un nuevo JRPG', 'Veteranos de Atlus nos traen un juego de rol inspirado en Shin Megami Tensei con un entretenido sistema de combate.\r\nEn los últimos años hemos visto varias propuestas que han intentado seguir los pasos de Atlus y sus JRPG, aunque ninguno ha capturado la calidad y frescura de los Shin Megami Tensei o Persona. Monark es un nuevo juego de rol japonés desarrollado por Lancarse en el que muchos fans de SMT habían puesto su atención, quizás no tanto como para desbancar a Atlus pero sí al menos para hacer la espera más llevadera entre lanzamientos. Unas expectativas que tenían su base: parte del equipo responsable de Monark ha trabajado en los primeros Shin Megami Tensei.\r\n\r\nNo diga Persona cuando quiere decir Ego\r\nMás de un jugador se preguntará a qué nos referimos exactamente con \"un RPG estilo SMT/Persona\", algo que se entiende fácilmente con un resumen de su historia: nuestro personaje se encuentra en la Shin Mikado Academy, un instituto que está envuelto en una misteriosa niebla que vuelve locos a los estudiantes y mantiene el centro aislado. El protagonista no tiene mucha idea de lo que ocurre cuando despierta amnésico, pero muy pronto descubrirá la existencia de otro mundo, el Otherworld, al que se accede con los móviles. Efectivamente, una temática actual y estudiantil, la existencia de una dimensión oculta con demonios, un poder oculto, unas dosis de filosofía, los pactos entre personajes y demonios… Son estos elementos los que hacen que Monark pueda atraer a los seguidores de Atlus, aunque si profundizamos un poco salen a flote varias diferencias importantes.\r\nAsí pues, Monark nos ofrece secciones de juego bien diferenciadas. En la escuela transcurre la historia e iremos apartando la niebla que bloquea diferentes pisos del campus. Esto supone entrar en un piso consumido por una niebla dañina para nuestros personajes –cuanto más tiempo pasamos aquí, más sube el indicador MAD, que como da a entender la palabra en inglés tiene relación con la locura y afecta a uno de los sistemas de combate-. Explorar los pasillos en este estado puede recordar a un juego de terror, con compañeros en estado catatónico y alguno que pedirá nuestra ayuda, pequeños puzles que requieren explorar el mapa, obtener información, abrir cajas fuertes, dialogar, etc. El objetivo aquí es llegar a unos teléfonos móviles que dan acceso al Otherworld y así destruir la fuente de los poderes de los Pactbearers –los personajes que han hecho pactos con uno de los Monark que corresponden con los siete pecados capitales-.\r\nEste es el ciclo del juego: despejar la niebla piso a piso hasta que derrotamos a nuestro enemigo y luego pasamos a otro edificio envuelto en el mismo problema. Monark se da tiempo suficiente para conocer bien a los personajes, así que incluso si es inevitable que caiga en algunos tópicos de estas historias y el anime, los compañeros de aventuras se desarrollan bien, y debajo de la trama está siempre el tema de la personalidad; el propio RPG nos recibe con un pequeño test de personalidad, y en diversos momentos nos harán exámenes con preguntas que revelarán rasgos de nuestro comportamiento.\r\nDentro de las buenas ideas que encontramos en Monark, esta parte de exploración del instituto revela uno de los grandes problemas del juego que se extiende por varios apartados: la repetitividad general. Donde la saga Persona ha triunfado con apenas un puñado de localizaciones diferentes en los que pasar el tiempo de ocio, Monark transcurre en pasillos de un colegio japonés con sus salas y pupitres. Cruzar un piso con la niebla y la presión de sus efectos es emocionante, pero pronto esta fórmula cansará, e incluso la escasa variedad gráfica hace que en ocasiones sea difícil orientarse. Es un bucle del que se ve todo en las primeras horas y los documentos coleccionables que dan pequeñas dosis de información sobre la vida de los estudiantes no será un incentivo de peso para todos los jugadores.\r\n\r\n', NULL, 'Monark.png'),
(8, 'Análisis Dying Light 2', 'La largamente esperada secuela del divertido juego de zombis de Techland se estrena finalmente con unas buenas mecánicas de parkour y un diseño de misiones muy atractivo, pero también con muchísimos problemas técnicos y numerosas promesas incumplidas.\r\n\r\nAnálisis de versiones Xbox Series X/S, PC, PS5.\r\nDying Light 2 es un juego que invitaba al optimismo desde su mismísimo anuncio. No en vano, estamos hablando de la secuela de uno de los títulos más divertidos y entretenidos de 2015, y cada nueva información que Techland nos ofrecía sobre ella parecía apuntar a una obra tremendamente ambiciosa, prometedora y con muchísimo potencial en la que todas nuestras acciones y decisiones darían forma a su mundo. Tanto es así que todo parecía demasiado bonito para ser cierto.\r\n\r\nSin embargo, y de manera inesperada, la compañía anunció que el juego se retrasaba de forma indefinida, algo que parecía apuntar a problemas con su desarrollo, un temor que tiempo después se confirmaría con las declaraciones de varios de sus trabajadores, quienes definieron la creación de esta segunda parte como un completo caos. Y, sinceramente, tras haber jugado a su versión final nos lo creemos totalmente. De alguna manera, el estudio polaco ha conseguido sacar adelante el proyecto y lo que ahora llega a las tiendas es un producto que sí, es entretenido y tiene grandes aciertos, pero que dista muchísimo de ser lo que nos prometieron y que no aporta nada a un mercado saturado de juegos de mundo abierto.\r\nEl viaje del peregrino\r\nAsí pues, Dying Light 2 nos vuelve a ofrecer una posapocalíptica aventura de acción en primera persona con toques de rol en la que podremos movernos con total libertad por un gigantesco mapeado mientras cumplimos todo tipo de misiones, tomamos decisiones, ponemos en práctica nuestras habilidades de parkour, recolectamos recursos, encontramos equipo y luchamos contra zombis u otros supervivientes. No es un juego que pretenda revolucionar el género de ninguna manera y solo busca ofrecernos más y mejor de lo que vimos en su primera parte, algo en lo que se ha quedado un tanto a medias.\r\n\r\nEsta vez su premisa argumental nos llevará a encarnar a Aiden Caldwel, un peregrino que tras años buscando a su hermana desaparecida por fin encuentra una pista sólida sobre su paradero. De este modo, viajaremos hasta una enorme ciudad para seguir su rastro, donde tal y como podréis intuir, no tardaremos en vernos implicados en las rencillas y problemas de sus habitantes.\r\n\r\nLamentablemente, el guion nos ha parecido flojísimo y nunca ha conseguido terminar de captar nuestro interés por culpa de unas conversaciones muy mal escritas y unos personajes con los que no hemos conseguido conectar. La propia historia está plagada de clichés, sucesos que se desarrollan torpemente, revelaciones que se ven venir a la legua, detalles mal explicados y momentos que pretenden ser emotivos con muy poca fortuna.\r\n\r\nEs una pena, pues la narrativa es una parte muy importante de su propuesta y no os van a faltar multitud de secuencias de vídeos ni largas conversaciones con sus correspondientes opciones de respuesta. Curiosamente, las pequeñas historias secundarias con las que nos hemos topado en las misiones opcionales nos han parecido más interesantes y disfrutables que la propia trama principal, pues suelen tener mucha más miga de lo que parece a simple vista, tratan temas más humanos y nos plantean algunos dilemas morales que han conseguido hacernos reflexionar y dudar.\r\n\r\nEl poder de elección\r\nEs precisamente en este tipo de dilemas y conflictos donde encontramos uno de los puntos más llamativos del juego, pues vamos a tener que tomar muchas decisiones que irán moldeando el desarrollo de los acontecimientos, la mayoría de las cuales no resultan nada fáciles. Aquí no hay opciones buenas ni malas y muchas veces no nos va a quedar otra que apostar por la que consideremos que es el mal menor, lo que puede desembocar en muertes de personajes, enemistades o resoluciones muy dramáticas de ciertas tramas.\r\nQuizá lo más decepcionante sea que nuestros actos solo influyan en el cómo se desarrollan las cosas, pero sin poder alterar demasiado el rumbo de la historia principal, pues esta siempre se va dirigiendo a los mismos puntos comunes independientemente de la ruta que tomemos (eso sí, hay varios finales y diversas variantes de los mismos). Por suerte, la fantasía de que somos algo más que actores pasivos y que nuestra influencia puede determinar el destino de otros supervivientes está conseguida y ayuda a hacer de nuestra aventura algo mucho más entretenido. Eso sí, no esperéis grandes consecuencias que tengan demasiado impacto en el juego como tal ni en el propio mapa, pues estas afectan solo a la historia y a la aparición o no de unas pocas misiones secundarias, por lo que no hay nada ni remotamente similar a lo que nos prometieron en su famoso gameplay de 2019.\r\n\r\nOtro problema del sistema de decisiones viene derivado por lo que os hemos comentado anteriormente de su guion, ya que al ser tan flojo y tener tan poco interés afecta negativamente a nuestro grado de implicación con lo que nos están contando, lo que puede provocar que nos acabe dando exactamente igual escoger una opción u otra al no importarnos demasiado el destino que puedan correr los personajes con los que interactuamos.\r\n\r\n\r\n', NULL, 'DyingLight2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(10) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'registrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contraseña` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_rol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contraseña`, `email`, `id_rol`) VALUES
(1, 'admin', 'admin', 'admin@admin.es', 1),
(2, 'prueba', 'hola', 'hola@hola.com', 2),
(8, 'Cristian', '1234', 'hola@hola.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `guia`
--
ALTER TABLE `guia`
  ADD PRIMARY KEY (`id_guia`),
  ADD KEY `id_juego` (`id_juego`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id_juego`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticias`),
  ADD KEY `id_juego` (`id_juego`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_juego` (`id_juego`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `guia`
--
ALTER TABLE `guia`
  MODIFY `id_guia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id_juego` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticias` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `guia`
--
ALTER TABLE `guia`
  ADD CONSTRAINT `guia_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id_juego`);

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id_juego`);

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id_juego`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
