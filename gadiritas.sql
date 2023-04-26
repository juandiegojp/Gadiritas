--
-- PostgreSQL database dump
--

-- Dumped from database version 15.1
-- Dumped by pg_dump version 15.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: unaccent; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS unaccent WITH SCHEMA public;


--
-- Name: EXTENSION unaccent; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION unaccent IS 'text search dictionary that removes accents';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: actividads; Type: TABLE; Schema: public; Owner: tienda
--

CREATE TABLE public.actividads (
    id bigint NOT NULL,
    titulo character varying(255) NOT NULL,
    descripcion text NOT NULL,
    precio numeric(4,2) NOT NULL,
    duracion integer NOT NULL,
    max_personas integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    guia_id bigint NOT NULL,
    destino_id bigint NOT NULL
);


ALTER TABLE public.actividads OWNER TO tienda;

--
-- Name: actividads_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE public.actividads_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.actividads_id_seq OWNER TO tienda;

--
-- Name: actividads_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE public.actividads_id_seq OWNED BY public.actividads.id;


--
-- Name: comentarios; Type: TABLE; Schema: public; Owner: tienda
--

CREATE TABLE public.comentarios (
    id bigint NOT NULL,
    contenido text NOT NULL,
    positivo boolean,
    negativo boolean,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    user_id bigint NOT NULL,
    actividad_id bigint NOT NULL
);


ALTER TABLE public.comentarios OWNER TO tienda;

--
-- Name: comentarios_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE public.comentarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comentarios_id_seq OWNER TO tienda;

--
-- Name: comentarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE public.comentarios_id_seq OWNED BY public.comentarios.id;


--
-- Name: destinos; Type: TABLE; Schema: public; Owner: tienda
--

CREATE TABLE public.destinos (
    id bigint NOT NULL,
    nombre character varying(255) NOT NULL,
    comarca character varying(255) NOT NULL,
    codigo_postal integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.destinos OWNER TO tienda;

--
-- Name: destinos_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE public.destinos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.destinos_id_seq OWNER TO tienda;

--
-- Name: destinos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE public.destinos_id_seq OWNED BY public.destinos.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: tienda
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO tienda;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO tienda;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: guias; Type: TABLE; Schema: public; Owner: tienda
--

CREATE TABLE public.guias (
    id bigint NOT NULL,
    nombre character varying(255) NOT NULL,
    apellidos character varying(255) NOT NULL,
    tlf character varying(255),
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.guias OWNER TO tienda;

--
-- Name: guias_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE public.guias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.guias_id_seq OWNER TO tienda;

--
-- Name: guias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE public.guias_id_seq OWNED BY public.guias.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: tienda
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO tienda;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO tienda;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: tienda
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO tienda;

--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: tienda
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO tienda;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO tienda;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: reservas; Type: TABLE; Schema: public; Owner: tienda
--

CREATE TABLE public.reservas (
    id bigint NOT NULL,
    actividad_id bigint NOT NULL,
    user_id bigint NOT NULL,
    fecha date NOT NULL,
    hora time(0) without time zone NOT NULL,
    personas integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.reservas OWNER TO tienda;

--
-- Name: reservas_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE public.reservas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reservas_id_seq OWNER TO tienda;

--
-- Name: reservas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE public.reservas_id_seq OWNED BY public.reservas.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: tienda
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    apellidos character varying(255),
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    telefono character varying(255),
    password character varying(255) NOT NULL,
    is_admin boolean DEFAULT false NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO tienda;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO tienda;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: actividads id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.actividads ALTER COLUMN id SET DEFAULT nextval('public.actividads_id_seq'::regclass);


--
-- Name: comentarios id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.comentarios ALTER COLUMN id SET DEFAULT nextval('public.comentarios_id_seq'::regclass);


--
-- Name: destinos id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.destinos ALTER COLUMN id SET DEFAULT nextval('public.destinos_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: guias id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.guias ALTER COLUMN id SET DEFAULT nextval('public.guias_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: reservas id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.reservas ALTER COLUMN id SET DEFAULT nextval('public.reservas_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: actividads; Type: TABLE DATA; Schema: public; Owner: tienda
--

COPY public.actividads (id, titulo, descripcion, precio, duracion, max_personas, created_at, updated_at, guia_id, destino_id) FROM stdin;
4	Faro de Chipiona	Un verdadero icono de la ciudad y un punto obligado de visita para cualquier persona que pise Chipiona.\r\n\r\nUbicado en la Punta del Perro, junto a la Playa de la Regla, ostenta el récord de ser el faro más alto de España, con sus 69 metros por sobre el nivel del mar y para ascender a su cima hay que subir los 322 escalones de su escalera caracol. Desde lo alto, se logra apreciar desde Rota y el Puerto de Santa María hasta Matalascañas, en Huelva.\r\n\r\nLa construcción de este faro comenzó el 30 de abril de 1863, bajo las órdenes del ingeniero catalán Jaime Font Escolá, y encendió su luz por primera vez el 28 de noviembre de 1867.\r\n\r\nEl material que se utilizó para construirlo es piedra ostionera -una mezcla de conchas, residuos de moluscos marinos y arenisca-, proveniente de Chipiona y Rota, losas de Tarifa y materiales procedente de Sierra Carbonera.\r\n\r\nActualmente continúa funcionando como un faro aeromarítimo.\r\n\r\nSus señales orientan a los marinos que buscan ingresar a la entrada del río Guadalquivir y también sirve de ayuda a los aviones, gracias a que su haz de luz ilumina vertical y horizontalmente. Su lámpara es halógena y alcanza hasta 30 millas en destellos cada diez segundos.\r\n\r\nDato de interés: desde su inauguración sólo interrumpió su funcionamiento durante la Guerra de Cuba y los tres años que duró la Guerra Civil de España, de 1936 a 1939.\r\n\r\nSe estima que en los tiempos de los romanos, según algunos registros escritos que han quedado, hubo un faro emplazado en este mismo lugar.	15.00	1	10	2023-04-16 22:57:11	2023-04-16 22:57:11	1	3
5	Parroquia Nuestra Señora de la O.	Construida en el siglo XVI, esta iglesia de estilo gótico no fue siempre una construcción cristiana. Aparentemente existen restos de una mezquita árabe debajo de la parroquia actual.\r\n\r\nSu origen está documentado por un poder notarial de 1533 que reconoce a Diego De Riaño como Maestro Mayor de esta iglesia.\r\n\r\nA lo largo de la historia tuvo distintas reformas con influencias barrocas y neoclasicistas pero de su arquitectura gótica inicial conserva las distribución espacial, el ábside y la portada lateral del muro de la epístola fabricada en piedra.\r\n\r\nEl origen de la escultura de la Santísima Virgen de la O que se venera en el Altar Mayor data del año 1785. Es obra del tallista Manuel García de Santiago y el pintor José de Guevara, que le dieron forma a esta imagen de madera, con estofado y dorado traída desde Sevilla, encargada por el Cardenal Solís.\r\n\r\nEsta iglesia también fue residencia temporal de la Virgen de Regla, tras el decreto de Mendizábal en 1835, alojándose allí durante diecisiete años.	2.00	1	10	2023-04-17 00:28:14	2023-04-17 00:28:14	1	3
6	Castillo de Chipiona y Centro de Interpretación “Cádiz y el Nuevo Mundo”	Entre el Faro y la Playa Cruz del Mar se ubica junto al mar esta antigua construcción de la cual no se conoce su origen con exactitud.\r\n\r\nAlgunos investigadores creen que data del siglo XIII, cuando Alfonso X lo fortificó durante la reconquista de Cádiz. Otra hipótesis cree que su aparición fue durante el siglo XV, mientras que también existe la versión de que se originó en la época musulmana.\r\n\r\nLo que sí se sabe es que a lo largo de los siglos sufrió distintos usos y modificaciones en su arquitectura.\r\n\r\nActualmente consta de una estructura totalmente almenada, de planta cuadrada, con dos pisos que se cubren con bóvedas de aristas, una torre cuadrada junto al lienzo de muralla que se extiende desde la Cruz del Mar hasta la Playa de Las Canteras y ventanas ojivales.\r\n\r\nSu utilidad inicial durante su primera época fue como sistema de defensa para el pueblo de Chipiona, en el siglo XVII fue la vivienda del cura párroco, sala capitular del consistorio chipionero, una prisión a principios del siglo XVIII y un hotel entre 1890 y 1989.\r\n\r\nA pesar de haber sido declarado Bien de Interés Cultural en 1985, llegaron posteriormente los años de abandono, hasta que en el año 2000 el Ayuntamiento de Chipiona determinó su adquisición para restaurarlo, ponerlo en valor y que sea la sede del Centro de Interpretación “Cádiz y el Nuevo Mundo”.\r\n\r\n\r\nEl centro de Interpretación está integrado al Castillo de Chipiona, este centro está dedicado a la vinculación de la provincia de Cádiz con el descubrimiento, colonización y explotación del Nuevo Mundo.\r\n\r\nTres de los cuatro viajes colombinos partieron desde esta provincia y también fue punto de partida y llegada de la primera vuelta al mundo. Tiene una exposición que muestra el recorrido histórico de la situación de Cádiz desde antes del descubrimiento hasta la promulgación de la Constitución de 1812.\r\n\r\nEl centro está compuesto por 14 bloques distribuidos en 5 salas, que comprenden las siguientes temáticas:\r\n- La situación privilegiada que tenía la provincia de Cádiz, pues esta situación convirtió a la provincia de Cádiz en el centro neurálgico del mundo.\r\n- El papel que destacados gaditanos tuvieron en el descubrimiento y colonización de América y  los diferentes tipos de barcos que se utilizaron en los viajes.\r\n- El entramado de técnicas empresariales financieras que estaban relacionadas con la navegación y la actividad comercial.\r\n- La reproducción de la bodega de un barco de los que zarparon hacia el Nuevo Mundo.\r\n- El sistema defensivo de la Bahía de Cádiz.\r\n- La situación comercial, la sociedad gaditana, el desarrollo urbanístico y artístico y los avances científicos de la época.	5.00	1	10	2023-04-17 00:33:24	2023-04-17 00:33:24	1	3
7	Ruta de Rocío Jurado	- La Estrella de Rocío Jurado.\r\nAl estilo de los famosos de Hoollywood, desde el 9 de mayo de 2009 se puede ver en el paseo marítimo del humilladero, junto al Santuario de la Virgen de Regla, un monolito de mármol con una estrella que conmemora la figura de Rocío Jurado.\r\n\r\nDentro de la estrella se puede ver grabada la firma de la cantante y un clavel, flor típica de la zona que solía acompañar a la cantante en sus presentaciones. Este homenaje fue promovido por la asociación cultural “RJ la más grande” en conjunto con el Ayuntamiento chipionero.\r\n\r\n- El Chalet “Mi Abuela Rocío”.\r\nEstá situada en la Avenida Nuestra Señora de Regla, 61, y actualmente pertenece a Gloria Mohedano, su hermana.\r\n\r\nFue su residencia en Chipiona durante muchos años y su hogar en la ciudad hasta la última de sus visitas. Aquí se concentraron la mayor cantidad de homenajes y ofrendas por parte de su público el día posterior a su muerte.\r\n\r\nDesde su balcón todos los 8 de Septiembre y junto a su familia, Rocío veía pasar a la Virgen de Regla en procesión, de quien era una fiel devota.\r\n\r\nEn su fachada, miles son los mensajes que los seguidores de la artista dejaron en su recuerdo de forma espontánea.\r\n\r\n- Bar Museo Tani.\r\nEn pleno centro de Chipiona, más precisamente en la calle peatonal Isaac Peral, se encuentra este bar museo.\r\n\r\nRicardo Naval, ya fallecido, era el dueño de este lugar y amigo personal de Rocío.\r\n\r\nEste hombre fue clave en los comienzos de la carrera de la cantante ayudándola con la promoción de sus shows y abriéndole las puertas de los principales escenarios de Sevilla.\r\n\r\nHoy se pueden ver allí más de 800 cuadros con fotos de “la más grande” y otros artistas reconocidos.\r\n\r\nEl bar posee un bellísimo patio, mesas en su exterior y es un agradable sitio para comer y beber en Chipiona.\r\n\r\n- Casa natal de Rocío Jurado\r\nEstá en la calle Larga 115, nació en esta calle, en esta casa, sus padres se llamaban Fernando Mohedano y Rosario Jurado. Tenía dos hermanos Amador y Gloria y se colocó una azulejo que recuerda los primeros años de vida en ese sitio de la cantaora.\r\n\r\nNació el 18 de septiembre de 1946 y allí vivió en su primera infancia.\r\n\r\n- Monumento a Rocío Jurado Chipiona.\r\nHay en Chipiona una avenida que lleva su nombre, y en esta misma avenida, un monumento de bronce y piedra, con una fuente debajo, justo enfrente del Puerto Pesquero y Deportivo. ( Av. de Rocío Jurado, 60).\r\n\r\nEsta escultura, creada por el artista Juan de Ávalos en 1994, tiene 2,40 metros de altura y se eleva sobre un pedestal de mármol ubicado en el centro de una rotonda en uno de los sitios más transitados de la ciudad.\r\n\r\nEl Mausoleo Rocío Jurado se encuentra en el cementerio municipal de la Calle San José, se encuentran enterrados sus restos, en un mausoleo que puede visitarse en el horario habitual del cementerio.\r\n\r\nDesde septiembre de 2008 se recuerda a la cantante con un monumento en su mausoleo.\r\n\r\nSe trata de una escultura sedente de la artista realizada en bronce, sobre una estructura escalonada de mármol en tres alturas. Corona el conjunto una pirámide de cristal.\r\n\r\nObra del artista Luis Sanguino, la cantante aparece vestida con un traje de cola, sujetando con la mano izquierda un clavel y con la derecha una medalla con la imagen de la virgen de Regla, que tiene colgada al cuello.\r\n\r\n- Avenida Rocío Jurado y Monumento de Juan Ávalos\r\nEl 27 de junio de 1977, el Ayuntamiento de Chipiona, rotuló la entonces Avenida hasta el Puerto Pesquero, con el nombre de “Avenida Rocío Jurado”. Siendo alcalde El Sr. Antonio Rodríguez Caballero.\r\n\r\nEn torno a esta Avenida el Ayuntamiento ideó crear una barriada en torno a la figura de la copla (Las Calles Paquita Rico, Juanita Reina, Gracia Montes, Ricardo Naval Mellado).\r\n\r\nMirando al frente, al barrio que la vio nacer, y en la Avenida que lleva su nombre, se encuentra su monumento.\r\n\r\nSe trata de una estatua de cuerpo entero de 2.40 metros de altura, rodeada de pilastras de 8 metros, de bronce obra de Juan de Avalos\r\n\r\n- Plaza Juan Carlos I, Parroquia de Ntra. Sra. De la O. Ermita del Cristo de las Misericordias. \r\nLugar donde se le otorgó la Medalla al Mérito Turístico Gracias a la iniciativa del Centro de Iniciativas y Turismo de Chipiona, presidida por José Díaz Martín, en abril de 1984. El acto se celebró en esta plaza donde se congregaron en cifra que hay que contar por miles.\r\n\r\nAsistieron, además, al homenaje el Presidente de la Junta de Andalucía, José Rodríguez de la Borbolla y su esposa, el Director General de Turismo, Miguel Villegas, el Presidente de la Diputación Provincial de Cádiz, Alfonso Perales, el Gobernador Civil, Mariano Baquedano, y toda la Corporación Local.\r\n\r\nDesde esta plaza también salió acompañando a la Virgen del Carmen en procesión, embarcándose posteriormente en el muelle y acompañándola durante todo el tiempo que la Virgen estuvo embarcada.\r\n\r\nEl 20 de Febrero de 1974, a la vuelta de una de sus giras por Latinoamérica, graba la gala “Aires de España” para TVE en esta plaza.\r\n\r\nEn la Parroquia, donde se encuentra la titular del pueblo Nuestra Sra. De la O. se bautizó Rocío Jurado con una concha de plata del Siglo XVII, la misma que se utilizó para bautizar a su hija Rocío nacida en 1977 en Nuestra Señora del Rocío de Huelva.\r\n\r\n- Santuario de Regla\r\nDe todos es conocida la devoción de la artista por la Virgen de Regla, patrona de la localidad.\r\n\r\nAquí se casa el 21 de Mayo de 1976, con el famoso boxeador Pedro Carrasco. Rocío llegó a la iglesia en calesa. Toda Chipiona salió a la calle para verla y hubo cohetes, aclamaciones y vítores para Rocío Jurado. Para nuestra Chipionera más universal.\r\n\r\nEn esta plaza, y ante más de 7.000 personas, en este incomparable marco del Santuario de Regla, Rocío Jurado realizó una actuación apoteósica junto con la orquesta filarmónica de Málaga y la guitarra de Enrique de Melchor, en apoyo del Centro internacional de la Música.\r\n\r\nLas cinco mil sillas dispuestas por los organizadores del evento, resultaron insuficientes, tal era la cantidad de personas que se sumaron al acto.\r\n\r\n- Playa de las Canteras y Playa de Camarón.\r\nEn la primera rodó Rocío el videoclip de la canción “Me ha dicho la luna”, y en la segunda se rodaron escenas para la película “La Lola se va a los puertos”, en la que actuaron como extra varios vecinos de la localidad.\r\n\r\n- Museo de Rocío Jurado\r\nUbicado en el Palacio de Ferias y Exposiciones de Chipiona, el museo ofrecerá al visitante un recorrido de la vida y obra de la artista chipionera.\r\n\r\nEn el mismo se podrá contemplar vestidos y fotografías de la artista, así como una sala Multimedia en la que se podrán visualizar actuaciones de la chipionera más universal.	20.00	3	10	2023-04-17 00:39:49	2023-04-17 00:39:49	1	3
3	Visita el Castillo de Santiago	El Castillo de Santiago es un enclave único y un marco incomparable para celebración de todo tipo de eventos. Sus instalaciones están totalmente climatizadas y acondicionadas, siendo todo un referente en cuanto a este tipo de servicios se refiere. Para la realización de estas actividades, disponemos de diferentes zonas y circuitos a tu disposición, a continuación puede ver imagen de cada espacio así como información sobre sus dimensiones.	12.00	2	20	2023-04-09 21:59:48	2023-04-09 21:59:48	4	5
16	Palacio de Orleans-Borbón	El Palacio de Orleans y Borbón en Sanlúcar de Barrameda se construyó entre 1853 y 1870. Fue la residencia de verano de los Infantes de España y Duques de Montpensier, Antonio de Orleans y María Luisa Fernanda de Borbón. Adquirieron en el Barrio Alto tres fincas: el Seminario conciliar de San Francisco Javier, la casa de la familia Páez de la Cadena y los claustros arruinados del Convento de la Merced.\r\n \r\nLos arquitectos encargados de rehabilitar dichas fincas para el palacio fueron Juan de Talavera y Balbino Marrón. A finales del siglo XIX se reformó por Juan Antonio Arévalo Martínez. Todo un capricho constructivo de la época, donde no falta la exquisitez y elegancia.\r\n\r\nFue habitado por la familia Orleans y borbón hasta 1955. En 1971 se vendió para ser demolido, pero ocho años más tarde, fue adquirido y recuperado por el Ayuntamiento de Sanlúcar de Barrameda. \r\n\r\nHoy es la sede de las Casas Consistoriales de la ciudad.\r\n \r\nConsta de dos partes: el seminario y la casa Páez de la Cadena. Cada uno se organiza entorno a un patio central. Un conjunto residencial que está formado por un cuerpo compacto de tres plantas, unas dependencias exentas tipo pabellón y unas zonas ajardinadas a su alrededor.\r\n\r\nSu colorido y decoración exterior llama la atención del visitante. En él destacan los estilos historicistas y ecléctico. En su fachada se utilizó el estilo neomudéjar además del clasicismo italiano. Sus salas interiores están decoradas con multitud de estilos historicistas, como son el neomudéjar, el inglés, egipcio, rococó o chinesco.\r\n\r\nLos jardines de este palacio se diseñaron por el jardinero francés Lecolant. En su origen fue un jardín de estilo inglés, donde se buscaba la apariencia natural y silvestre. Se combinan diferentes especies arbóreas y plantas, la mayoría de ellas de origen tropical y de gran tamaño. Destacan la colonia de dragos, árboles del amor, naranjos chinos, o cipreses. \r\n\r\nEl 19 de diciembre de 2007 se inscribió en el Catálogo General del Patrimonio Histórico Andaluz.	5.00	1	10	2023-04-17 01:51:07	2023-04-17 01:51:07	4	5
8	Centro de Interpretación del camaleón	En la Zona Litoral del Plan Parcial de la Laguna, junto a la pasarela de madera en la Avenida del Camaleón se encuentra este sitio dedicado al análisis y estudio de esta especie autóctona y al medio ambiente en general.\r\n\r\nEstá conformado por tres construcciones con forma de cabañas, cubiertas con estructuras de madera y brezo natural. Su entorno exterior está compuesto por un humedal y una extensa zona de dunas, donde en los días soleados se puede apreciar una gran cantidad de camaleones en su hábitat natural.\r\n\r\nEn este complejo se puede acceder a didácticas explicaciones sobre la vida de esta especie protegida. Propone conocer desde cómo está compuesto su organismo, qué comen, dónde viven, cómo se reproducen y hasta develar el misterio de por qué y cómo cambian de color. Actualmente se encuentra bajo un costoso proceso de restauración por un incendio que afectó gravemente sus instalaciones en octubre de 2018.\r\n\r\nEl Centro de Interpretación de la Naturaleza y el Camaleón es uno de los proyectos más emblemáticos que se están llevando a cabo en Chipiona. El centro supondrá un importante espacio para el análisis y estudio del Camaleón, especie animal autóctona de Chipiona, así como de toda la zona natural de la localidad.	5.00	1	10	2023-04-17 00:43:44	2023-04-17 00:43:44	1	3
9	Museo del Moscatel Chipiona	Perteneciente a la Ruta del Vino y Brandy del Marco de Jerez\r\n\r\nEnclavado cerca del centro histórico de la ciudad, el Museo del Moscatel de Chipiona ofrece al visitante un paseo por la historia y la cultura del vino.\r\n\r\nFormado por siete áreas temáticas, el visitante contará con escenarios reales y virtuales donde podrá ver e interactuar con modos de vida y prácticas artesanales de producción del vino en diferentes épocas históricas y podrá conocer las técnicas de producción actuales. El objetivo es lograr que el visitante pueda hacerse una imagen global y entender el universo enológico.\r\n\r\nEn el centro histórico la ciudad se encuentra este sitio que permite adentrarse en la historia y cultura del vino.\r\n\r\nLa idea del museo es que sus visitantes puedan ver, comprender e interactuar con las distintas prácticas y métodos de producción artesanal del vino a lo largo de las distintas épocas hasta la actualidad.\r\n\r\nTambién aprender sobre el vino dulce de uva moscatel, una marca característica de Chipiona. Para ello se determinó un paseo muy didáctico dividido en distintas áreas:\r\n- Ecomuseo del viñedo del moscatel de Chipiona.\r\n- Bodega romana y alfarería. Lonja romana de Caepia.\r\n- Siglo XV. Renacimiento.\r\n- Época moderna S. XV-XVII.\r\n- Viñatería contemporánea S.VIII-XX.\r\n- Museo corporativo de la bodega.\r\n- Museo de la ciencia del vino.\r\n- Ruta enoturística por la bodega.\r\n- Museo de la cultura del moscatel.	5.00	1	10	2023-04-17 00:46:50	2023-04-17 00:46:50	1	3
10	Castillo de Luna	El Castillo de Luna es una fortaleza que se encuentra en la Villa de Rota. Declarado Bien de Interés Cultural con la categoría de monumento, fue construido por la casa de Arcos, señores jurisdiccionales de la villa durante siglos. Actualmente es la sede del ayuntamiento del municipio, del que es propiedad. Al parecer el nombre del castillo procede del matrimonio de Pedro Ponce de León, primogénito y heredero malogrado del I marqués de Cádiz, con una hija de Álvaro de Luna, que también dio nombre al Castillo de Luna de Mairena del Alcor.	5.00	1	10	2023-04-17 01:04:16	2023-04-17 01:04:16	3	4
11	Iglesia Mayor Parroquial de Nuestra Señora de la O	Esta iglesia es el producto de una serie de transformaciones, por ello hay que tener en cuenta dos partes distintas: la nave central de estilo gótico-renacentista y las capillas cinco capillas añadidas, dos a un lado y tres al otro, cada una con advocaciones y usos distintos, y todas de gran interés por las obras que albergan, como las azulejerías de Triana del siglo XVIII, la reja barroca de la capilla del Rosario, distintas tablas y cuadros, bordados y platería.	5.00	1	10	2023-04-17 01:07:33	2023-04-17 01:07:33	3	4
12	Muralla Urbana	La muralla urbana de la Villa de Rota formaba un óvalo imperfecto que rodeaba la ciudad, construida en mampostería con un grosor de 2 metros. Esta separaba la parte rural y de huertas de la Villa, que quedaba dentro de la misma. En la parte exterior se fue desarrollando un asentamiento arrabal o árabe. La gente que trabajaba fuera o vivía en pequeñas haciendas fuera de la muralla se refugiaban en tiempos de peligro dentro de los muros. A pesar de su carácter defensivo sus muros no tenían la altura ni la solidez de otras fortificaciones vecinas. La primitiva muralla careció de torreones defensivos, si bien en las torres que flanqueaban las puertas y en las zonas más vulnerables poseería puestos de centinelas que más tarde se convertirían ante los ataques en baluartes y baterías.	5.00	1	10	2023-04-17 01:09:15	2023-04-17 01:09:15	3	4
13	Capilla de San Roque	Consta de tres naves separadas por columnas bajas y gruesas, siendo la nave central más larga que las laterales. Entrando en la nave de la derecha se hallan dos altares, uno de Ntro. Padre Jesús Cautivo, imagen con pelo natural y la de San Roque. En la nave de la izquierda existe otro altar con la imagen de la Inmaculada Concepción. En el altar mayor se conserva la imagen del Cristo de la Veracruz, del siglo XVIII y de gran valor artístico. La imagen de San Roque, adquirida en 1942, es de tamaño mediano y de las llamadas de Olot. En el altar situado a la izquierda se conserva el escudo del Carmelo, que atestigua la presencia de la cofradía de Ntra. Sra. del Carmen, que radicó antiguamente en esta Iglesia.	5.00	1	10	2023-04-17 01:23:25	2023-04-17 01:23:25	3	4
14	Torre de la Merced	La Torre de la Merced no tiene una misión específica y es por ello que la parte superior carece de acceso. Actualmente se encuentra adosada al muro sur de la fachada del Mercado de Abastos. Sus muros son todos de mampostería con aristas de cantería.\r\n\r\nPresenta planta cuadrada hasta el primer cuerpo de campana, mientras el segundo presenta planta ochavada con varios ventanales en forma de arco para las campanas en cada uno de sus frentes.\r\n\r\nSe cubre con una cúpula también de piedra, en forma de media naranja, revestida de brillantes azulejos blancos y azules.	5.00	1	10	2023-04-17 01:26:29	2023-04-17 01:26:29	3	4
18	Visita al conjunto Monumental Catedral de Cádiz	- La Catedral\r\nLa Catedral de Cádiz ” Santa Cruz sobre el mar” o Santa Cruz sobre las Aguas” es también conocida por los gaditanos como la Catedral Nueva, en contraposición de la Vieja, edificada en el S.XVI sobre la antigua Catedral gótica mandada construir por Alfonso X El Sabio. La Catedral gótica perduró con algunas reformas realizadas en los siglos XV y XVI hasta que fue quemada por la escuadra angloholandesa comandada por el almirante Howard y el conde de Essex, que atacó, invadió y saqueó Cádiz en 1.596 hasta que la abandonó, ya incendiada, a mediados del mes de julio.\r\n\r\nHubo que levantar la actual iglesia columnaria de orden toscano y de estilo manierista, obra conjunta del ingeniero militar Cristóbal de Rojas y del maestro mayor del obispado Ginés Martín de Aranda, que se consagró el 15 de junio de 1.602. El siglo XVII trajo el enriquecimiento de la Catedral de Santa Cruz con el retablo mayor de Alejandro  de Saavedra, las capillas de los genoveses y de los vizcaínos, la capilla de las reliquias y cuadros e imágenes debidas al mecenazgo del obispo Fr. Alonso Vázquez de Toledo, y la portada lateral de mármoles genoveses de Andreoli. Fr. Gerónimo de la Concepción nos describe una catedral dotada de una dignidad acorde con su condición de primer templo de la diócesis. Pero la población creció y la ciudad alcanzó una gran prosperidad con el comercio de las Indias en la segunda mitad del citado siglo.\r\n\r\n- Cripta\r\nLa Cripta se construyó entre 1732 y 1730 realizada en piedra ostionera. Contrasta el esplendor del mármol de la parte superior con la sobriedad de este recinto.\r\n\r\nCon la realización de esta bóveda vaída, casi plana, el maestro Vicente Acero llevó a cabo sus conocimientos de arquitectura demostrando que, con los cálculos adecuados, el material podía resistir, dando cobijo de esta forma a uno de los espacios más emblemáticos de la Catedral de Cádiz: la cripta.\r\n\r\nEspacio circular dotado de magnífica sonoridad por su cercanía con el mar (lo que puede notarse fácilmente en la humedad del ambiente)  e incluso sentir, ya que al tocar sus muros se pueden sentir las olas del mar, cuya visita es posible, se da paso a la capilla de los sepulcros de los Obispos, donde descansan los prelados que han muerto en Cádiz desde la consagración de la Catedral Nueva. Preside el recinto el Cristo de Aguiniga, traido de América a principios del siglo XVII.\r\n\r\n- Torre del Reloj\r\nLa  Torre del Reloj de la Catedral de Cádiz es, sin lugar a duda, uno de los elementos exteriores más característicos de este primer templo gaditano, desde sus torres puede apreciarse una vista completa de toda la urbe y maravillosas vistas al Océano Atlántico.\r\n\r\nDestaca su estructura tan propia de la influencia neoclásica fruto de la época en la que fue levantada, coincidiendo con el período dorado de la historia gaditana y su resurgir urbano como consecuencia del monopolio del comercio con América, en el siglo XVIII; la torre ha sido testigo de primer orden del devenir histórico de la ciudad de Cádiz y es por ello protagonista, arte y parte, de mil y una anécdotas.	15.00	2	10	2023-04-17 02:40:11	2023-04-17 02:40:11	5	7
19	Gran Teatro Falla	Es uno de los edificios más populares y emblemáticos de la capital gaditana. Data del siglo XIX, siendo de estilo neomudéjar y proyecto de Adolfo Morales y Adolfo del Castillo. El solar del antiguo Gran Teatro, construido en madera, se incendió en 1881 y hasta 1905 no terminaron de restaurarlo. En 1910 se inauguró y en 1916 se le adjudicó el nombre actual en honor al hijo predilecto de Cádiz: Manuel de Falla. Un año después sonó por primera vez el carnaval en el teatro, hasta el día de hoy, considerándose para los aficionados “el templo del carnaval”.	16.00	1	10	2023-04-17 02:51:12	2023-04-17 02:51:12	5	7
20	Iglesia de San Felipe Neri	El Oratorio de San Felipe Neri es el principal protagonista de la Constitución de 1812. En él se ideó y firmó la Carta Magna y es, al fin y al cabo, donde tuvieron lugar los debates de los diputados doceañistas.\r\n\r\nTemplo de planta elíptica construido entre 1685 y 1719, según planos del alarife Blas Díaz. Su cúpula, encamonada, de doble tramo y con ocho ventanales se rehizo tras el terremoto de 1755, por el maestro Pedro Afanador en 1764. Su retablo mayor goza de una de las mejores obras del pintor Murillo, La Inmaculada Concepción. En su exterior las lápidas conmemoran el centenario de las Cortes de Cádiz, que dieron a luz la Constitución de 1812.	5.00	1	10	2023-04-17 02:53:54	2023-04-17 02:53:54	5	7
15	Palacio Ducal de Medina-Sidonia	El Palacio Ducal de Medina Sidonia, se ubica sobre la base de un alcázar andalusí del S.XII y contenido sobre muros medievales, en una situación privilegiada en el borde de la barranca natural que divide el Barrio Alto del Barrio Bajo de Sanlúcar de Barrameda.\r\n\r\nLa antigua residencia de los Duques de Medina Sidonia fue declarado monumento histórico artístico en 1978\r\n\r\nSus salones están decorados con bellas pinturas de artistas europeos y un elegante mobiliario barroco. Cuenta con unos amplios jardines que guardan la más profunda tradición de los diseños renacentistas y barrocos.\r\n\r\nSu fachada es sobria, a lo que contribuyen el blanco paramento, los frontones de sus balcones y la proporcionalidad clásica entre muro y vano. Acodada a ésta, la portada se anima con la inclusión, en el cuerpo superior, de dos vanos ajimezados. Con este exterior destaca aún más la rejería.\r\n\r\nLos jardines que rodean el Palacio fueron creados en el siglo XVI, transformando la “barranca”, hasta convertirla en un entramado exótico de terrazas y paseos ajardinados, que hoy conocemos bajo el nombre de Bosque de Acantos, y que en la actualidad sirve de lugar de remanso y de paz, donde se puede disfrutar del silencio y del suave cantar de los pájaros.	10.00	1	10	2023-04-17 01:47:34	2023-04-17 01:47:34	4	5
21	Museo de Cádiz	El origen del Museo de Cádiz, comienza con la Desmortización de Mendizábal (ley de expropiación de los bienes del clero) en 1835 y el depósito, en la Academia de Bellas Artes de la ciudad, de una serie de pinturas de diversos secularizados conventos. Entre estas obras se encontraba la serie Zurbarán, procedente de la Cartuja de Jerez de la Frontera. Mientras tanto, en torno a la Academia de Bellas Artes, a lo largo del siglo XIX, se empezaron a recopilar una serie de obras de la floreciente escuela de pintura gaditana, con las últimas reminiscencias del neoclasicismo, el romanticismo, el costumbrismo y el marco de la historia.\r\n\r\nEl hallazgo accidental, en 1887, del sarcófago antropoide fenicio masculino en los terrenos del actual astillero gaditano, marcó el punto de partida de la colección arqueológica. La sección de Arqueología del museo está dividida en salas, en cuyo interior se exhibe la evolución de la provincia de Cádiz, desde la prehistoria, pasando por el Gadir fenicio-púnico, hasta las romanas de Gades y Baelo Claudia. En este tramo, además de los sugestivos sarcófagos antropoides fenicios, destacan por su uso los objetos funerarios y ajuares púnicos y fenicios recuperados en Cádiz y en el santuario de Melkart - Ercole en Sancti Petri y en la Villa de Doña Blanca importancia.en el Puerto de Santa María, así como los restos romanos originales de Cádiz, Medina Sidonia, Sancti Petri y Baelo Claudia,\r\n\r\nLa sección de Bellas Artes también se divide en salas e implica un recorrido por la pintura desde el siglo XVI hasta la actualidad. Entre ellas, cabe destacar las obras flamencas y españolas del siglo XVI, las obras realizadas por Zurbarán para la cartuja de Jerez entre 1637 y 1639, varios cuadros de Murillo y sus discípulos de la colección barroca o un cuadro de Joan. Miró en la sección de Arte Contemporáneo.\r\n\r\nCasa Pinillos es un edificio ubicado cerca del museo conectado a él. La adecuación de este edificio y su integración con el museo de Cádiz supone la adquisición de un nuevo y moderno espacio de uso cultural, con aproximadamente 1600 m2 de superficie. El museo de Cádiz abre al público las puertas de este nuevo edificio, gracias a la generosa donación de Doña Carmen Martínez de Pinillo y Toro, quien en 2004 donó su vivienda para la ampliación del museo. En 2009 se inició el trámite de rehabilitación de la casa, de gran valor histórico, para convertirla en un excelente ejemplo de casa burguesa de principios del siglo XVIII.	5.00	1	10	2023-04-17 02:56:41	2023-04-17 02:56:41	5	7
2	Visita guiada por las Bodegas Barbadillo	La manzanilla de Sanlúcar es uno de los símbolos de la localidad gaditana. Disfruta de una cata de sus variedades con esta visita guiada por las conocidas Bodegas Barbadillo.\r\n\r\nUna vez nos reunamos frente a las instalaciones que la afamada compañía Barbadillo posee en la calle Sevilla de Sanlúcar, podréis comenzar el tour visitando a través de una audioguía el Museo de la Manzanilla. ¿Conocéis el origen de esta popular bebida, de gran arraigo en la provincia de Cádiz?\r\n\r\nContinuaremos el recorrido con una visita guiada por las Bodegas Barbadillo. Fundadas a principios del siglo XIX por el empresario Benigno Barbadillo y Ortigüela y el primo de este, su producción vitivinícola constituye uno de los principales motores económicos de Sanlúcar. Mientras visitamos las dependencias donde se almacenan los barriles, así como también otros destacados lugares de las bodegas, iremos conociendo cómo fue evolucionando este negocio familiar.\r\n\r\nComo broche final, disfrutaremos de una cata de cuatro vinos producidos en la casa. Aprenderemos a distinguir las diferentes variedades no solo a través de su color y su aroma, sino también por medio de los diferentes matices que nos sugieren estas bebidas en contacto con el paladar. ¡Una experiencia imprescindible para los amantes de la enología!\r\n\r\nAunque los menores de edad también podrán participar en esta visita guiada acompañados por un adulto, solo se servirá bebidas alcohólicas a las personas mayores de 18 años.	15.00	1	20	2023-04-09 20:46:41	2023-04-09 20:46:41	4	5
17	Ruta por Sanlúcar de Barrameda	- Plaza del Cabildo: se encuentra en pleno Barrio Bajo y es el punto de encuentro para aquellas personas que buscan un lugar de recreo y paseo, rodeado de bares y tiendas, y presidida por una preciosa fuente. Esta plaza responde al arquetipo de la plaza más importante de cada municipio.\r\n\r\n- Arco de Rota: también conocido como Puerta de Rota, formaba parte de la antigua puerta de la Fuente, que era una de las que estaban abiertas en la muralla que rodeaba el municipio y que lo comunicaba con el exterior. Sobre esta puerta se formó el Arrabal de la Fuente en el siglo XV. Se le conoce como Arco o Puerta de Rota porque desde este lugar comenzaba el camino que unía la ciudad con la localidad roteña.\r\n\r\n- Jardín del Palacio Orleans-Borbón: el origen de estos jardines se remonta al siglo XIX, cuando los duques de Montpensier optan por Sanlúcar como lugar de residencia donde pasar la época estival. El duque de Montpensier contrató a Lecolant, quien trabajó en los jardines del Palacio de San Telmo de Sevilla, y utilizó un diseño paisajista para el trazado del jardín, en donde se utilizaron muchas y variadas especies de vegetales de todas partes del mundo.​\r\n\r\n- Las Covachas: se trata de diez arcos que recaen sobre pilastras de estilo gótico que presentan figuras mitológicas marinas aladas muy propias de la arquitectura del siglo XV. Conforman una galería interior comunicada con la Cuesta de Belén a través de diez pasadizos que está formada por arcos apuntados. Fueron construidas por don Enrique de Guzmán, el segundo duque de Medina-Sidonia a finales del siglo XV, aprovechando la próspera economía de la zona.\r\n\r\n- Monumento a la Circunnavegación: relieve de Jesús Guerrero García que fue inaugurado el 6 de septiembre de 2013. Es de gran altura y representa la primera vuelta al mundo, realizada por Fernando de Magallanes y Juan Sebastián Elcano. Se encuentra también un azulejo que conmemora la primera circunnavegación mundial, la expedición de Magallanes-Elcano, que zarpó desde Sanlúcar en septiembre de 1519.	5.00	2	10	2023-04-17 01:52:44	2023-04-17 01:52:44	4	5
22	Oratorio de la Santa Cueva	Junto a la Parroquia del Rosario, se encuentra el Oratorio de la Santa Cueva, que perteneció a la Congregación del Retiro Espiritual, fundada en Cádiz hacia 1730. Entre sus miembros, se encontraban los personajes más eminentes de la sociedad gaditana del siglo XVIII. Uno de ellos, el marqués de Valde-Iñigo, utilizó gran parte de la fortuna familiar, derivada del comercio con México, en la construcción del actual oratorio.\r\n\r\nLa fachada del conjunto es muy sencilla, articulada por pilastras dóricas, entre las que se encuentra el retablo público con la pintura de la Virgen del Refugio de Franz Riedmayer.\r\n\r\nEl interior se divide en dos salas: un sótano dedicado a la pasión y muerte de Cristo, y el otro superior consagrado a la exaltación de la Eucaristía. La capilla inferior, construida en 1783, fue diseñada por Torcuato Cayón como un espacio austero apto para prácticas penitenciales, donde se encuentra la imagen del Calvario, de gran interés. En este lugar, cada Viernes Santo, se celebra la ceremonia del Sermón de las Siete Palabras, acompañada musicalmente por un cuarteto que interpreta la obra de Hadyn, compuesta a petición del Marqués de Valde-Iñigo.\r\n\r\nLa capilla alta o sacramental ofrece, por su riqueza decorativa, un refinado contraste con la zona penitencial, en la que el pequeño templo es de gran interés. Fue terminado en 1796 y es obra de Torcuato Bejumeda, quien concibió un espacio unitario de planta ovalada siguiendo la tradición manierista. En la zona superior de este espacio son de gran interés artístico los lienzos redondos, tres de los cuales son obra de Francisco Goya y que representan la multiplicación de los panes y los peces, la parábola del invitado a la boda y la Santa Cena; considerado como el grupo de obras de arte de temática religiosa más exitoso del artista aragonés.	8.00	1	10	2023-04-17 02:58:42	2023-04-17 02:58:42	5	7
\.


--
-- Data for Name: comentarios; Type: TABLE DATA; Schema: public; Owner: tienda
--

COPY public.comentarios (id, contenido, positivo, negativo, created_at, updated_at, user_id, actividad_id) FROM stdin;
\.


--
-- Data for Name: destinos; Type: TABLE DATA; Schema: public; Owner: tienda
--

COPY public.destinos (id, nombre, comarca, codigo_postal, created_at, updated_at) FROM stdin;
3	Chipiona	Costa Noroeste	11550	2023-04-09 18:26:52	2023-04-09 18:26:52
4	Rota	Costa Noroeste	11520	2023-04-09 18:29:42	2023-04-09 18:29:42
5	Sanlúcar de Barrameda	Costa Noroeste	11540	2023-04-09 18:30:14	2023-04-09 18:30:14
6	Trebujena	Costa Noroeste	11560	2023-04-09 18:30:48	2023-04-09 18:30:48
7	Cádiz	Bahía de Cádiz	11005	2023-04-09 18:34:08	2023-04-09 18:34:08
8	El Puerto de Santa María	Bahía de Cádiz	11500	2023-04-09 18:35:06	2023-04-09 18:35:06
9	Jerez de la Frontera	Campiña de Jerez	11403	2023-04-09 18:37:53	2023-04-09 18:37:53
10	Medina-Sidonia	La Janda	11170	2023-04-09 18:39:59	2023-04-09 18:39:59
11	Tarifa	Campo de Gibraltar	11380	2023-04-09 18:41:17	2023-04-09 18:41:17
12	Setenil de las Bodegas	Sierra de Cádiz	11692	2023-04-09 18:51:44	2023-04-09 18:51:44
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: tienda
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: guias; Type: TABLE DATA; Schema: public; Owner: tienda
--

COPY public.guias (id, nombre, apellidos, tlf, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
1	Amelia	Jurado	225544639	ame@ame.com	\N	$2y$10$nsOig/gH0PCUuv/.jxVh.u2dz/h.RZHvW6M1fOul7ZcEH6fa6KSce	\N	2023-04-09 15:14:02	2023-04-09 15:18:29
3	Carlos	Estratega	699332144	carlos@carlos.com	\N	$2y$10$SvSKuUSoZqoQJnbSnvdG4eTw5s82F2Jhzr50.1qZj8G2D7EkJS8Cq	\N	2023-04-09 20:05:49	2023-04-09 20:05:49
4	Alberto	Puerto	621348976	alberto@alberto.com	\N	$2y$10$gdVu8dbbLmDqiG0V3YJ8fORBDp9C77T38wf3Qzj/rVeFTNc0PvQ3K	\N	2023-04-09 20:08:06	2023-04-21 00:29:44
5	Alicia	Zurera	784512365	aliciaz@gadiritas.com	\N	$2y$10$8.Edi.QeVfP1n.7Q9a908uk6.xTNvhkPRdAr0MDwE5XUZMcXVqGOm	\N	2023-04-21 00:30:27	2023-04-21 00:30:27
6	Mercedes	Benítez	687695256	merben@gadiritas.com	\N	$2y$10$4HDiDcUctfdJKKrOW/pPJO7fQhG3HYDqinJuoAF6gqY1L4xp34OXe	\N	2023-04-21 00:31:40	2023-04-21 00:31:40
7	Martín	García	625632669	marting@gadiritas.com	\N	$2y$10$pn14vXrkvZiQj8s3j8.48.OYCkyzH0mARx1nBF7hHzgo47ZA70DDW	\N	2023-04-21 00:32:51	2023-04-21 00:32:51
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: tienda
--

COPY public.migrations (id, migration, batch) FROM stdin;
118	2014_10_12_000000_create_users_table	1
119	2014_10_12_100000_create_password_reset_tokens_table	1
120	2019_08_19_000000_create_failed_jobs_table	1
121	2019_12_14_000001_create_personal_access_tokens_table	1
122	2023_04_06_112207_create_destinos_table	1
123	2023_04_06_122741_create_guias_table	1
124	2023_04_06_122742_create_actividads_table	1
125	2023_04_06_122812_create_comentarios_table	1
126	2023_04_06_122824_create_reservas_table	1
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: tienda
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: tienda
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: reservas; Type: TABLE DATA; Schema: public; Owner: tienda
--

COPY public.reservas (id, actividad_id, user_id, fecha, hora, personas, created_at, updated_at) FROM stdin;
3	5	4	2023-04-24	11:00:00	3	2023-04-23 13:14:11	2023-04-23 13:14:11
1	19	4	2023-04-26	11:00:00	6	2023-04-23 13:11:56	2023-04-23 13:11:56
5	3	4	2023-04-28	12:00:00	3	2023-04-23 13:25:05	2023-04-23 13:25:05
6	3	4	2023-04-26	12:00:00	2	2023-04-23 13:25:35	2023-04-23 13:25:35
7	6	4	2023-04-26	11:00:00	2	2023-04-23 13:27:12	2023-04-23 13:27:12
8	12	4	2023-04-24	11:00:00	2	2023-04-23 16:51:02	2023-04-23 16:51:02
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: tienda
--

COPY public.users (id, name, apellidos, email, email_verified_at, telefono, password, is_admin, remember_token, created_at, updated_at) FROM stdin;
4	prueba	prueba	prueba@prueba.com	\N	624135789	$2y$10$TprKw4/ogUDJCx.yNpDC8.SQWKoyvO1djknrO5Gz9pDtJ1zQGM.s2	t	\N	2023-04-08 22:24:24	2023-04-08 22:24:24
6	prueba	no admin	noadmin@admin.com	\N	622111333	$2y$10$nxYYNWsLSuhPJcqFUnCfMeeM7YXkKEdWdZBkT3tUFmjIo.seDcUvi	f	\N	2023-04-08 22:33:21	2023-04-08 22:33:21
1	juan diego	jurado	admin@admin.com	\N	622199719	$2y$10$w0ndLeWheFk08pebClFwz.MHrS0aKHmYxPPyKee7pLGKSN5GXqehC	t	\N	2023-04-08 21:48:07	2023-04-09 13:45:02
14	Pilar	Zurera	pilar@gadiritas.com	\N	653487913	$2y$10$ilbax/Dc2PYtDcQQiwApt.aXH6WTh6Nw/0kmZmkMR0xK1wmbeE7ve	f	\N	2023-04-21 00:26:45	2023-04-21 00:26:45
13	Miguel Ángel	Puyana	mapuyana@gadiritas.com	\N	785412314	$2y$10$eUx3bkQGZWWnEIgVygt2yu./dHo1Ciz0xoJVnaVuFeTLKM97zA9N2	f	\N	2023-04-09 15:16:41	2023-04-21 00:27:55
\.


--
-- Name: actividads_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tienda
--

SELECT pg_catalog.setval('public.actividads_id_seq', 22, true);


--
-- Name: comentarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tienda
--

SELECT pg_catalog.setval('public.comentarios_id_seq', 1, false);


--
-- Name: destinos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tienda
--

SELECT pg_catalog.setval('public.destinos_id_seq', 12, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tienda
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: guias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tienda
--

SELECT pg_catalog.setval('public.guias_id_seq', 8, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tienda
--

SELECT pg_catalog.setval('public.migrations_id_seq', 126, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tienda
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: reservas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tienda
--

SELECT pg_catalog.setval('public.reservas_id_seq', 8, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tienda
--

SELECT pg_catalog.setval('public.users_id_seq', 14, true);


--
-- Name: actividads actividads_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.actividads
    ADD CONSTRAINT actividads_pkey PRIMARY KEY (id);


--
-- Name: comentarios comentarios_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.comentarios
    ADD CONSTRAINT comentarios_pkey PRIMARY KEY (id);


--
-- Name: destinos destinos_codigo_postal_unique; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.destinos
    ADD CONSTRAINT destinos_codigo_postal_unique UNIQUE (codigo_postal);


--
-- Name: destinos destinos_nombre_unique; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.destinos
    ADD CONSTRAINT destinos_nombre_unique UNIQUE (nombre);


--
-- Name: destinos destinos_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.destinos
    ADD CONSTRAINT destinos_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: guias guias_email_unique; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.guias
    ADD CONSTRAINT guias_email_unique UNIQUE (email);


--
-- Name: guias guias_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.guias
    ADD CONSTRAINT guias_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: reservas reservas_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_telefono_unique; Type: CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_telefono_unique UNIQUE (telefono);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: tienda
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: actividads actividads_destino_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.actividads
    ADD CONSTRAINT actividads_destino_id_foreign FOREIGN KEY (destino_id) REFERENCES public.destinos(id) ON DELETE CASCADE;


--
-- Name: actividads actividads_guia_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.actividads
    ADD CONSTRAINT actividads_guia_id_foreign FOREIGN KEY (guia_id) REFERENCES public.guias(id) ON DELETE CASCADE;


--
-- Name: comentarios comentarios_actividad_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.comentarios
    ADD CONSTRAINT comentarios_actividad_id_foreign FOREIGN KEY (actividad_id) REFERENCES public.actividads(id) ON DELETE CASCADE;


--
-- Name: comentarios comentarios_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.comentarios
    ADD CONSTRAINT comentarios_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: reservas reservas_actividad_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_actividad_id_foreign FOREIGN KEY (actividad_id) REFERENCES public.actividads(id) ON DELETE CASCADE;


--
-- Name: reservas reservas_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: pg_database_owner
--

GRANT USAGE ON SCHEMA public TO tienda;


--
-- Name: FUNCTION unaccent(text); Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL ON FUNCTION public.unaccent(text) TO tienda;


--
-- Name: FUNCTION unaccent(regdictionary, text); Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL ON FUNCTION public.unaccent(regdictionary, text) TO tienda;


--
-- Name: FUNCTION unaccent_init(internal); Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL ON FUNCTION public.unaccent_init(internal) TO tienda;


--
-- Name: FUNCTION unaccent_lexize(internal, internal, internal, internal); Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL ON FUNCTION public.unaccent_lexize(internal, internal, internal, internal) TO tienda;


--
-- PostgreSQL database dump complete
--

