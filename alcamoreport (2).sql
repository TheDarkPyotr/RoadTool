-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 06:36 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alcamoreport`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `num` int(11) NOT NULL,
  `id` text NOT NULL,
  `provider` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `current` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`num`, `id`, `provider`, `email`, `password`, `current`) VALUES
(1, '1_id', 'id', 'cros@assd.it', '5cf752e190a65f01faff6fec974e80b08753ddfc', 1),
(8, '12_id', 'id', 'asd@asd.it', '05f86a0b755c5fba64d4d2d521cd34d0540f7fc9', 12),
(7, '101603210887905958751', 'Google', 'pronoweb96@gmail.it', '9539963e973f4be0e2c5a18ba87766ffe183d727', 3),
(10, '14_id', 'id', 'admin@lv6.com', '9539963e973f4be0e2c5a18ba87766ffe183d727', 14),
(11, '15_id', 'id', 'super@admin.com', '9539963e973f4be0e2c5a18ba87766ffe183d727', 15),
(12, '16_id', 'id', 'admin@lv5.com', '9539963e973f4be0e2c5a18ba87766ffe183d727', 16),
(13, '0_id', 'Admin', 'ciao@ciao.com', '9539963e973f4be0e2c5a18ba87766ffe183d727', 0),
(14, '', 'Admin', 'ciao@ciao.com', '9539963e973f4be0e2c5a18ba87766ffe183d727', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bans`
--

CREATE TABLE `bans` (
  `id` int(11) NOT NULL,
  `bantype` enum('user','ip') NOT NULL DEFAULT 'user',
  `value` varchar(50) NOT NULL,
  `reason` text NOT NULL,
  `expire` double NOT NULL DEFAULT '0',
  `added_by` varchar(50) NOT NULL,
  `added_date` varchar(50) NOT NULL,
  `appeal_state` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bans_appeals`
--

CREATE TABLE `bans_appeals` (
  `id` int(11) NOT NULL,
  `ban_id` int(11) NOT NULL,
  `send_ip` varchar(50) NOT NULL,
  `send_date` varchar(120) NOT NULL,
  `mail` varchar(120) NOT NULL,
  `plea` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bans_appeals`
--

INSERT INTO `bans_appeals` (`id`, `ban_id`, `send_ip`, `send_date`, `mail`, `plea`) VALUES
(13, 192, '186.14.230.66', '25 October, 2012', '', 'Gaayys. Muy pronto los owneare >:D'),
(7, 184, '', '', '', ''),
(14, 191, '', '', '', ''),
(15, 193, '', '', '', ''),
(16, 194, '', '', '', ''),
(9, 186, '', '', '', ''),
(2, 178, '', '', '', ''),
(12, 190, '', '', '', ''),
(21, 207, '164.77.47.147', '27 October, 2012', '', '?Por que me banearon? Yo no hize nada :l Porfabor diganme\\r\\n'),
(18, 199, '189.159.196.1', '26 October, 2012', '', '.l.  l.l.  .l.  .l.  .l.    .l.    .l. .l.         .l.   .l.  .l.   .l. .l.     .l.    .l.        .l.     .l.        .l.      .l.     .l.'),
(22, 209, '', '', '', ''),
(23, 206, '', '', '', ''),
(24, 215, '187.139.142.202', '27 October, 2012', '', 'Que hise??'),
(25, 217, '190.5.124.42', '27 October, 2012', '', 'Hey, porqu? me expulsar?n yo no estaba haciendo nada, solo estaba haciendo fila para las entrevistas y gracias a esto me quede sin entrevistas qu? llevo 5 o 4 horas esperando las entrevistas para esto, muchisimas gracias, DF-Hotel.rn'),
(26, 219, '', '', '', ''),
(27, 221, '190.251.210.65', '27 October, 2012', '', '-.-\\'''),
(28, 223, '186.182.129.63', '27 October, 2012', '', 'Porque Si no insulte ni ise nada malo\\r\\n'),
(29, 225, '', '', '', ''),
(30, 227, '186.14.96.75', '27 October, 2012', '', '-.-\\" Dios porfa dilvul a jodido el holo a baneado a todo el mundo'),
(31, 208, '187.246.211.31', '27 October, 2012', '', 'deoz haha balla x decir mierda ._. hahaha segunyo antes te advertian 3/0'),
(32, 231, '', '', '', ''),
(33, 233, '', '', '', ''),
(34, 235, '', '', '', ''),
(35, 237, '187.171.125.151', '27 October, 2012', '', 'por estar creoqueen entrevistas falsas'),
(36, 229, '', '', '', ''),
(37, 239, '', '', '', ''),
(38, 241, '', '', '', ''),
(39, 238, '186.94.215.25', '27 October, 2012', '', 'Do, re, mi, fa, zo, rra, de, mier, da.'),
(40, 244, '', '', '', ''),
(41, 246, '200.77.117.162', '27 October, 2012', '', 'Denme una razon de por cual me banearon?\\r\\n\\r\\n\\r\\n'),
(42, 230, '190.19.4.235', '27 October, 2012', '', 'desbanenmen yo no ise nada minul me baneo diciendo publicdad de otro holo un hakeo'),
(43, 222, '186.182.129.63', '27 October, 2012', '', 'Estaba asiendo una cola de Entrevistas y me quede parada esperando y me Bannearon , Pero si no hise nada Porque lo Hicieron'),
(44, 249, '190.250.103.222', '27 October, 2012', '', 'men ay un adm muy grosero da liiks de otros hotels\\r\\n'),
(45, 251, '186.92.179.191', '27 October, 2012', '', 'porque me expulsaron del hotel cumplia los normas del hotel era bueno asia caso alos staff porque meresco ser readmitido\\r\\n'),
(46, 253, '186.106.0.139', '27 October, 2012', '', 'por que DDDDDDDDDD:'),
(47, 247, '', '', '', ''),
(48, 228, '186.169.89.53', '27 October, 2012', '', 'por q me banearon estaba en las entrevistas y ban  no hise naaa'),
(49, 255, '189.198.36.80', '27 October, 2012', '', 'perdon :( hellow me perdonan ok'),
(50, 220, '190.251.210.65', '27 October, 2012', '', 'NO JODAN T\\''T'),
(51, 236, '', '', '', ''),
(52, 257, '187.177.196.225', '27 October, 2012', '', 'no e dicho groserias'),
(53, 216, '190.5.124.42', '27 October, 2012', '', 'Por favor resulvanme este caso, esto es algo muy injusto.  Atte: Jake'),
(54, 259, '189.135.114.27', '27 October, 2012', '', 'no se porque me banearon por favor admitanme otra vez'),
(55, 261, '', '', '', ''),
(56, 226, '186.14.96.75', '27 October, 2012', '', 'Porfaaaa AYuda desbaneenmee DDD; AYudaa\\r\\n'),
(57, 263, '190.159.108.211', '27 October, 2012', '', 'ey por favor yo no hize nada\\r\\nnisiquiera se que hize de malo :( quedo muy trizte con esto\\r\\npues ayi me entrtenia mucho y pasab mi tiempo libre se los ruego no me expulsen\\r\\n'),
(58, 265, '187.158.113.50', '27 October, 2012', '', 'me dan ban porque ablo espa?ol y la espulsion fua lasuigiente razon todo en ingles me dieron ban porque soy mexicano \\r\\n'),
(59, 232, '190.22.83.92', '27 October, 2012', '', 'No e echo ninguna falta de las normas no e insultado a nadien no le e faltado el respeto a nadien y porque me expulsaron'),
(60, 267, '187.139.142.202', '27 October, 2012', '', 'Que hice? no ofend? a nadie solo entre al holo no es motivo de expulsi?n!'),
(61, 252, '', '', '', ''),
(62, 269, '187.192.64.234', '27 October, 2012', '', 'por que ???'),
(63, 240, '', '', '', ''),
(64, 258, '', '', '', ''),
(65, 270, '186.78.157.89', '27 October, 2012', '', 'Un hacker me baneo estaba acindo publicidad ..'),
(66, 272, '189.174.33.236', '27 October, 2012', '', 'Que paso?.. yo no me dedico al timo! solo soy famoso en otras partes que pasa!\\r\\nya no me dedico al timoo porfavoor'),
(67, 268, '', '', '', ''),
(68, 254, '', '', '', ''),
(69, 274, '', '', '', ''),
(70, 276, '189.173.157.166', '27 October, 2012', '', 'no hise nada hise una monta?a rusa nomas y me cambie ya ya'),
(71, 273, '201.236.25.38', '27 October, 2012', '', 'POR  QUE  ME  ESX  PULSARON  YO  ESTAVA   SUPER  BIEN'),
(72, 278, '186.121.117.131', '27 October, 2012', '', 'ola kiero saber la razon x la cual fui expulsada,yo he traido muchos  ingresados aki en delixe asi ke no veo el motivo x el cual me expulzaron.la verdad son injustos.ac 0087 lo traje yo.shey la traje yo y doa mas ke no recuerdo sus nombre de habodelux.'),
(73, 256, '', '', '', ''),
(74, 280, '83.35.160.150', '27 October, 2012', '', 'Me expulsaron por meterme en Una Sala nose por que'),
(75, 282, '186.95.255.124', '27 October, 2012', '', 'disculpa buenas noches no e faltado a nad y tampoko e insultado a nadie mas bn trato de ke se keden y tratarlos komo se debe sera posible ke me dejar volver a entrar'),
(76, 284, '190.130.169.152', '27 October, 2012', '', 'Por que me banean no ise nada deos por favor desbaneenme -.-'),
(77, 286, '', '', '', ''),
(78, 288, '', '', '', ''),
(79, 279, '83.35.160.150', '27 October, 2012', '', 'Por favor me podrian desbanear'),
(80, 275, '189.173.157.166', '27 October, 2012', '', 'no hise nada era para los staff esa monta?a rusa para animarlos dejenme entrar tengo 1 hijita ahi \\r\\nplis dejenme entrar mi hijita esta solita sin compa?ia\\r\\n'),
(81, 290, '181.133.52.115', '27 October, 2012', '', 'eeeeeeeeeeeeee por que e baneanrn porfabor\\r\\n disculpa la palabra estaba rabioso\\r\\n'),
(82, 294, '', '', '', ''),
(83, 292, '', '', '', ''),
(84, 291, '', '', '', ''),
(85, 296, '', '', '', ''),
(86, 289, '', '', '', ''),
(87, 298, '201.209.61.163', '27 October, 2012', '', 'Hola, buenas noche yo no he hecho nada malo en el juego porfavor vuelvanme a meter! =)'),
(88, 300, '190.37.169.137', '27 October, 2012', '', 'lMinul Tengo Evidensia Napa De La Mierdaaa'),
(89, 281, '', '', '', ''),
(90, 302, '', '', '', ''),
(91, 301, '', '', '', ''),
(92, 304, '181.160.77.71', '27 October, 2012', '', 'ayuda esque yo no hise nada solo un user que se llama lMinuL me baneo no fue mi intenci?n porque lMinul est? dando ban\\''s a todos y esta quitando rank\\''s porfavor baneen a lMinuL -.-\\"'),
(93, 305, '', '', '', ''),
(94, 297, '', '', '', ''),
(95, 307, '', '', '', ''),
(96, 308, '186.112.246.160', '27 October, 2012', '', 'asdasd\\r\\n'),
(97, 310, '190.244.160.121', '27 October, 2012', '', 'porq me banean si no ise nada apenas empesava a jugar a ese hotelrn'),
(98, 311, '', '', '', ''),
(99, 313, '', '', '', ''),
(100, 315, '190.27.141.185', '27 October, 2012', '', 'U_u lMinul Que napa'),
(101, 317, '190.14.189.153', '27 October, 2012', '', 'Quiero saber por que fui baneado si no he hecho nada, solamente hice la entrevista como toda la gentey ademas si me banean, pongan el \\"por que\\" que se entienda\\r\\n'),
(102, 266, '', '', '', ''),
(103, 319, '200.126.90.27', '27 October, 2012', '', 'Nose yo no eh echo nada se los juro por favor yo no eh insultado ni nada,Por favor yo soy feliz ah? por favor Un usuario Lunatica anda echando a todos y anda diciendo cosas sobre sexo y cosas asi e insulta igual\\r\\n'),
(104, 320, '', '', '', ''),
(105, 322, '181.160.155.103', '27 October, 2012', '', '._. No Hice Nada Malo -.- Recien 2 segundos en el Hotel y Ban ?? Muy Buenos MOD e.'),
(106, 324, '190.22.165.72', '27 October, 2012', '', 'por q expulsado ????rnno cacho si recien me meti al hotel no e echo nada'),
(107, 321, '', '', '', ''),
(108, 326, '', '', '', ''),
(109, 325, '', '', '', ''),
(110, 328, '186.113.138.159', '27 October, 2012', '', 'porque motivo todo mis salas todo hptas .l.'),
(111, 285, '', '', '', ''),
(112, 330, '', '', '', ''),
(113, 332, '', '', '', ''),
(114, 334, '186.153.128.5', '27 October, 2012', '', 'SOY NOV Y ESTOY HACIENDO UNA PAGINA EN FACEBOOK DE MI AVATAR Y PONER MI REFER PARA QUE LA GENTE ENTE SI QUIEREN READMITIRME SE LOS AGRADESCO'),
(115, 338, '', '', '', ''),
(116, 318, '', '', '', ''),
(117, 337, '', '', '', ''),
(118, 340, '', '', '', ''),
(119, 303, '', '', '', ''),
(120, 331, '', '', '', ''),
(121, 339, '', '', '', ''),
(122, 335, '186.84.155.186', '27 October, 2012', '', 'No Entiendo X Q Me An Sacado Del Hotel Si Apenas Soy Nueva Y Estaba Haciendo Mi Casa Y Me Desconecte Y Bolvi A Entrar Y Ya No Pude'),
(123, 287, '201.222.133.147', '27 October, 2012', '', 'QUEMRDAX. XDholaholahola'),
(124, 342, '', '', '', ''),
(125, 344, '', '', '', ''),
(126, 347, '', '', '', ''),
(127, 349, '', '', '', ''),
(128, 299, '', '', '', ''),
(129, 352, '', '', '', ''),
(130, 350, '', '', '', ''),
(131, 314, '', '', '', ''),
(132, 355, '189.175.178.212', '27 October, 2012', '', 'no ise nada solo estaba en una sala'),
(157, 54, '173.245.53.194', '02 November, 2012', '', 'me obligastes a tumbar!\\r\\n'),
(137, 8, '', '', '', ''),
(138, 11, '', '', '', ''),
(139, 13, '', '', '', ''),
(140, 15, '', '', '', ''),
(148, 37, '', '', '', ''),
(149, 39, '', '', '', ''),
(150, 40, '', '', '', ''),
(151, 42, '108.162.210.157', '01 November, 2012', '', 'Lo siento'),
(152, 48, '', '', '', ''),
(153, 49, '', '', '', ''),
(154, 50, '', '', '', ''),
(155, 51, '', '', '', ''),
(156, 52, '', '', '', ''),
(146, 34, '', '', '', ''),
(147, 36, '108.162.210.133', '31 October, 2012', '', 'Chupame esta .l. xDD ! VOLVEREEEEEEEEEE MUCHAS MUCHAS VECES :3'),
(145, 28, '108.162.229.56', '30 October, 2012', '', 'Bueno me parece bien lo que aveis echo pense que los staff no se enteravan de nada adios'),
(159, 56, '', '', '', ''),
(160, 57, '', '', '', ''),
(161, 58, '', '', '', ''),
(162, 60, '', '', '', ''),
(163, 61, '108.162.215.62', '02 November, 2012', '', 'yo no dije que era estaff estos nomas me querian fuera del habbo'),
(164, 64, '', '', '', ''),
(165, 65, '108.162.237.44', '03 November, 2012', '', 'Perdon se?ores por las molestias pero mi prima siempre juega con mis habbos y esta vez empeso a publicar el habbo que eya usa porfavor devuelvanme al hotel perdon por las molestias\\r\\n'),
(171, 77, '141.101.99.110', '04 November, 2012', '', 'Maricones a habboci.eu mejor holo con 200 ons'),
(167, 70, '', '', '', ''),
(168, 71, '', '', '', ''),
(169, 73, '173.245.53.206', '04 November, 2012', '', 'Me perdona?s, porfavor?'),
(170, 75, '', '', '', ''),
(172, 74, '', '', '', ''),
(173, 72, '79.152.182.154', '04 November, 2012', '', 'Hola.\\r\\nDisculpen las molest?as, se que he hecho un mal uso del hotel, me podr?an dar una ultia oportunidad esque no puedo mas , porfavor perdoneme.Os lo suplico, Porfavor.');

-- --------------------------------------------------------

--
-- Table structure for table `city_report`
--

CREATE TABLE `city_report` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` char(100) NOT NULL,
  `surname` char(100) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(150) NOT NULL,
  `home_address` varchar(250) NOT NULL,
  `report_address` varchar(250) NOT NULL,
  `report_type` int(11) NOT NULL,
  `report_title` varchar(255) NOT NULL,
  `report_desc` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `report_insertdate` varchar(100) NOT NULL,
  `report_setdate` varchar(200) NOT NULL,
  `status` enum('ATTESA','APPROVATA','RIGETTATA','RISOLTA') NOT NULL DEFAULT 'ATTESA',
  `answer` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `priority` enum('0','1') NOT NULL DEFAULT '0',
  `hide` enum('0','1') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `visibility` enum('0','1') NOT NULL DEFAULT '0',
  `view` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_report`
--

INSERT INTO `city_report` (`id`, `name`, `surname`, `phone`, `email`, `home_address`, `report_address`, `report_type`, `report_title`, `report_desc`, `report_insertdate`, `report_setdate`, `status`, `answer`, `priority`, `hide`, `visibility`, `view`) VALUES
(10, 'Luca', 'Pinta', '3477646494', 'lucapinta@live.it', 'Via Nonloso, 8', 'Via Garibaldi, 8', 1, 'Problema elettrico', 'Qualcosa qui che non so cosa', '16/11/2016', '07/05/2017 20:19:23', 'RIGETTATA', 'sss', '1', '0', '0', '0'),
(11, 'Danilo', 'Ferrara', '3200000000', 'agostinomessina@gmail.com', 'Villa San Qualcosa', 'Via Garibaldi, 21', 1, 'C''Ã¨ un problema', 'Eh ma tu qui programmatore sei', '16/11/2016', '26/11/2016 16:42:58', 'APPROVATA', '', '1', '1', '0', '0'),
(12, 'Luca', 'Armando', '', '', 'Via Brahms,8,Alcamo', 'Via Garibaldi, 8', 1, 'Buca per strada', 'Buca nel manto stradale all''altezza del numero 8 di via garibaldi la quale crea disagi per i pedoni ma soprattutto per gli automobilisti.', '17/11/2016', '23/04/2017 09:57:17', 'APPROVATA', 'Amministrazione', '1', '0', '0', '0'),
(13, 'Leonardo', 'Acabo', '', '', 'Via mazzini', 'Via giotto', 3, 'Pedoni che roba', 'eh ma qui tu Ã¨ una roba assurda ma allora cos''Ã¨ ma dove siamo eh tu', '17/11/2016', '23/04/2017 10:32:34', 'RISOLTA', 'EH MA TU QUI SEGNALATORE SEI ', '1', '0', '0', '0'),
(14, 'Rami', 'Maleek', '', '', 'Via Jhonson', 'Via Dirac', 2, 'Eh ty', '&lt;b&gt;CIAO&lt;/b&gt;&lt;img src=&quot;http://localhost/roadtool/assets/img/logo-city.png&quot;&gt; eheheheh', '17/11/2016', '23/04/2017 10:42:23', 'RIGETTATA', 'ASDEA', '1', '1', '0', '0'),
(15, 'Bruce', 'Lee', '', '', 'Via Paramount, 28', 'Via Pixar,2', 2, 'Problemi di pixel', 'Pixel che non funzionano cioÃ¨ dai noÃ¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨', '17/11/2016 23:11:43', '23/04/2017 10:39:05', 'RIGETTATA', 'SSA', '1', '0', '0', '0'),
(16, 'John', 'Newton', '', '', 'Via Marsala,1', 'Via Gerusalemme,8', 1, 'C''Ã¨ un problema', 'Ã¨ un grosso problema', '17/11/2016 23:21:17', '', 'RIGETTATA', '', '1', '1', '1', '0'),
(17, 'Mark', 'Zucky', '', '', 'Via Canal Street, Palo Alto,9', 'Via John Cena,1', 2, 'Miao Bau', 'Non far vdere niente a noi Ã¨Ã¨', '17/11/2016 23:24:52', '', 'RIGETTATA', '', '0', '0', '0', '0'),
(18, 'Priscilla', 'Chang', '', '', 'Via Zhin Thau, 2667', 'Via Xi Jin Ping', 1, 'Made in PRC', 'mA HC''Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Â°Â°Â°Ã§Ã§Ã§Ã§*', '17/11/2016 23:26:33', '22/11/2016 21:30:06', 'RISOLTA', 'jdjdjdj', '0', '0', '1', '0'),
(19, 'Priscilla', 'Chang', '', '', 'Via Ciullo, 9, Alcamo', 'Via Garibaldi, 8', 2, 'C''Ã¨ un problema', 'ekdksd,lf++fdÃ²fsdÃ©Ã©Ã©Ã©Ã§:Ã§Ã§@fpdÃ¨sÃ²', '17/11/2016 23:27:07', '23/04/2017 10:30:50', 'APPROVATA', 'DWER', '0', '0', '1', '0'),
(20, 'Luna', 'Lovegood', '', '', 'Via Scarpa,1', 'Via MMI,76', 2, 'Ministero', 'Magic', '19/11/2016 21:42:41', '', 'ATTESA', '', '0', '0', '1', '0'),
(21, 'Harry', 'Potter', '', '', 'Via Privet Drive,4', 'Via Unmasked,1', 2, 'Crucio', '#LOL', '19/11/2016 23:25:24', '', 'ATTESA', '', '0', '0', '1', '0'),
(22, 'Vio', 'Ciao', '', '', 'Via Pioggia,1', 'Via Manzo,2', 2, 'Miao', 'Bay bay', '20/11/2016 08:55:31', '', 'ATTESA', '', '0', '0', '1', '0'),
(23, 'Acquila', 'Trento', '', '', 'Via Brahms,8,Alcamo', 'Via Marsala', 3, 'Ridi Pagliaccio', 'Vesti la Giubba', '20/11/2016 08:56:23', '21/11/2016 00:02:04', 'APPROVATA', '', '0', '0', '1', '0'),
(24, 'Luca', 'Pinta', '', '', 'Via Nonloso', 'Via Garibaldi, 8', 3, 'C''Ã¨ un problema', 'ffffffffffffffffffffffffffff', '20/11/2016 12:09:58', '21/11/2016 01:43:33', 'APPROVATA', '', '0', '0', '1', '0'),
(25, 'Luca', 'Ferrara', '', '', 'Via Nonloso', 'Via Garibaldi, 8', 1, 'rrrrrrrr', 'rrrrrrrrr', '20/11/2016 12:10:27', '20/11/2016 23:58:38', 'APPROVATA', '', '0', '0', '1', '0'),
(26, 'Priscilla', 'Tizio', '', '', 'Via Nonloso', 'Eh ma tu qui', 2, 'TGRF', 'ddddddddddddddddd', '21/11/2016 01:13:04', '21/11/2016 11:47:47', 'RISOLTA', 'Abbiamo giÃ  provveduto. Basta.', '0', '0', '1', '0'),
(27, 'Luca', 'Armadillo', '', '', 'Viale Ionio,15', 'Via Franz Liszt, 1', 1, 'Problema Illuminazione', 'Problema c''Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨ Ã¨Ã¨Ã¨Ã¨Ã¨ #Ã¹Ã¹Ã #@@meid Ã¨Ã¨Ã¨+++Ã Ã ', '22/11/2016 23:29:19', '', 'ATTESA', '', '0', '0', '1', '0'),
(28, 'Luca', 'Armadio', '', '', 'Viale Sardegna, 11', 'Via Kongo, 13', 1, 'Spaccio Criminale', 'SpacciÃ²Ã²Ã² Ã¨Ã²Ã -.Ã²Ã¨@#*11^', '22/11/2016 23:33:42', '', 'ATTESA', '', '0', '0', '0', '0'),
(29, 'Mirko', 'Burgarella', '', '', 'Via Japan,1', 'Via Diecimila,4', 1, 'Mafia Cinese', 'Ã¨Ã¨Ã¨ Ã²vÃ¹nqÃ¹Ã¨Ã¨Ã¨', '22/11/2016 23:41:10', '', 'ATTESA', '', '0', '0', '0', '0'),
(30, 'Mauro', 'Casciari', '', '', 'Via Cambodia,34', 'Via Korea,11', 1, 'CIA, FBI,', 'LOLLÃ²Ã²Ã²Ã²Ã² Ã¹Ã¹Ã¹Ã¨Ã¨Ã Ã Ã Ã²Ã²--++Ã¨Ã¨^^', '22/11/2016 23:45:15', '', 'ATTESA', '', '0', '0', '0', '0'),
(31, 'Mauro', 'Casciari', '', '', 'Via Cambodia,34', 'Via Korea,11', 1, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit', 'LOLLÃ²Ã²Ã²Ã²Ã² Ã¹Ã¹Ã¹Ã¨Ã¨Ã Ã Ã Ã²Ã²--++Ã¨Ã¨^^\r\nI''m in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.: \r\nI''m in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.: \r\nI''m in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.: ', '22/11/2016 23:46:43', '23/11/2016 23:17:48', 'ATTESA', '', '0', '0', '0', '0'),
(32, 'Uno', 'Due', '', '', 'Via TRE', 'via boh', 1, '1234', 'LOLLÃ²Ã²Ã²Ã²Ã² Ã¹Ã¹Ã¹Ã¨Ã¨Ã Ã Ã Ã²Ã²--++Ã¨Ã¨^^\r\nI''m in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.: \r\nI''m in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.: \r\nI''m in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.: ', '24/11/2016 07:29:45', '16/12/2016 06:54:18', 'APPROVATA', '', '0', '0', '0', '0'),
(33, 'Uno', 'Due', '', '', 'Via TRE', 'via boh', 1, 'Problema manto stradale interrotto tratto via Garibaldi incrocio via Marsala ', '11111111111111111111111111111111111111111', '24/11/2016 07:31:17', '', 'ATTESA', '', '0', '0', '0', '0'),
(34, 'Federico', 'Pappalardo', '', '', 'Viale Ionio, 15', 'Via Battaglia, 67', 1, 'EHEHEHEH', '#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys', '18/12/2016 14:10:21', '', 'ATTESA', '', '0', '0', '0', '0'),
(35, 'Federico', 'Pappalardo', '', '', 'Viale Ionio, 15', 'Via Battaglia, 67', 1, 'EHEHEHEH', '#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys', '18/12/2016 14:10:53', '', 'ATTESA', '', '0', '0', '0', '0'),
(36, 'Federico', 'Pappalardo', '', '', 'Viale Ionio, 15', 'Via Battaglia, 67', 1, 'EHEHEHEH', '#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys', '18/12/2016 14:11:16', '18/12/2016 16:44:19', 'ATTESA', '', '0', '0', '0', '0'),
(37, 'Salvatore', 'Longo', '', '', 'Vis eh ma tu qui', 'jfkdlnfkjsdnfsdnmfk', 2, 'VUOTO', '$title, $desc, $type, $date = NULL, $name = NULL, $surname =  NULL, $address = NULL$title, $desc, $type, $date = NULL, $name = NULL, $surname =  NULL, $address = NULL$title, $desc, $type, $date = NULL, $name = NULL, $surname =  NULL, $address = NULL$title, $desc, $type, $date = NULL, $name = NULL, $surname =  NULL, $address = NULL', '18/12/2016 14:32:56', '23/04/2017 10:36:40', 'ATTESA', 'CXZ', '0', '0', '1', '0'),
(38, 'Indios', 'Lumsa', '', '', 'Via mazzini', 'Via Garibaldi, 8', 1, 'TWWET DA OIDFJIF FVKDSK', '$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);', '18/12/2016 14:54:33', '18/12/2016 16:03:20', 'ATTESA', '', '0', '0', '1', '0'),
(39, 'Luca', 'Chang', '', '', 'Via Ciullo, 9, Alcamo', 'Via Garibaldi, 8', 1, 'Questo Ã¨ un inferno di cose impossibili', 'or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error());', '18/12/2016 15:18:26', '', 'ATTESA', '', '0', '0', '1', '0'),
(40, 'Luca', 'Chang', '', '', 'Via Ciullo, 9, Alcamo', 'Via Garibaldi, 8', 1, 'Questo Ã¨ un inferno di cose impossibili', 'or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error());', '18/12/2016 15:22:28', '18/12/2016 15:37:43', 'APPROVATA', '', '0', '0', '1', '0'),
(41, 'Luca', 'Chang', '', '', 'Via Ciullo, 9, Alcamo', 'Via Garibaldi, 8', 3, 'Questo Ã¨ un inferno di cose impossibili', 'or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error());', '18/12/2016 15:24:00', '10/04/2017 18:44:57', 'RIGETTATA', 'Bene OKee', '1', '0', '1', '0'),
(42, 'Luca', 'Chang', '', '', 'Via Ciullo, 9, Alcamo', 'Via Garibaldi, 8', 3, 'Questo Ã¨ un inferno di cose impossibili', 'or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error());', '18/12/2016 15:24:34', '23/04/2017 09:34:08', 'RIGETTATA', 'hh', '0', '0', '1', '0'),
(43, 'KAOIJOI', 'OISAJDIA', '', '', 'DJASJIDOAJD', 'IJSIJDIO', 2, 'JDOISJDOI', 'DJSOIDIOS', '31/01/2017 14:49:06', '', 'ATTESA', '', '0', '0', '0', '0'),
(44, 'wekjfpdkf', 'kfodjfoi', '', '', 'djfoejo', 'jfodjf', 6, 'pdkfoijfdoi', 'edjfodijfoi', '31/01/2017 20:33:15', '25/05/2017 14:19:59', 'ATTESA', 'ok', '0', '0', '0', '1'),
(45, 'Luca', 'Pinta', '3200691636', 'lucapinta@protonmail.com', 'Via Franz Liszt,1', 'Viale Ionio, 15', 3, 'Lol', 'joke', '14/05/2017 13:44:38', '', 'ATTESA', '', '0', '0', '', '0'),
(46, 'Luca', 'Pinta', '39000998', 'lucapinta@protonmail.com', 'Via Mazara, 1', 'Viale Europe, 89', 3, 'Problemi idrici', 'Ciaone', '15/05/2017 18:20:48', '', 'ATTESA', '', '0', '0', '', '0'),
(47, 'Lucas', 'Armandos', '89867', 'LUCAPINTA@LIVE.IT', 'vialeionio15', 'ciaone', 5, 'fkjdk', 'fkm', '15/05/2017 18:36:44', '', 'ATTESA', '', '0', '0', '1', '0'),
(48, 'djsdjsjs', 'fdjsjdkj', '4343', 'jfj@it.com', 'dfjdiojfi', 'fijfroij', 4, 'fjdenddjdjÃ¨p+Ã¨+Ã¨+Ã¨Ã Ã¨rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrr', '15/05/2017 18:41:29', '', 'ATTESA', '', '0', '0', '1', '0'),
(49, 'andrew', 'fdfefrewfwe', 'fff', 'ff@flkdk.it', 'dfdf', 'sfsf', 4, 'dfdfdfdfdff', 'sdlkdjklas', '15/05/2017 18:48:09', '', 'ATTESA', '', '0', '0', '1', '0'),
(50, 'Luca', 'Pinta', 'lkfdkf', 'lu@lit.it', 'kfkf', 'kfkf', 3, 'fkfkf', 'kfkf', '18/05/2017 00:41:42', '', 'ATTESA', '', '0', '0', '1', '0'),
(51, 'fkkfkf', 'lflfl', 'kfkf', 'kfkf@lfl.iy', 'kfkf', 'ffkkf', 3, 'mffmk', 'kfkfk', '18/05/2017 00:42:40', '', 'ATTESA', '', '0', '0', '1', '0'),
(52, 'fkkfkf', 'lflfl', 'kfkf', 'kfkf@lfl.iy', 'kfkf', 'ffkkf', 3, 'mffmk', 'kfkfk', '18/05/2017 00:43:34', '', 'ATTESA', '', '0', '0', '1', '0'),
(53, 'fkkfkf', 'lflfl', 'kfkf', 'kfkf@lfl.iy', 'kfkf', 'ffkkf', 3, 'mffmk', 'kfkfk', '18/05/2017 00:45:32', '', 'ATTESA', '', '0', '0', '1', '0'),
(54, 'fkkfkf', 'lflfl', 'kfkf', 'kfkf@lfl.iy', 'kfkf', 'ffkkf', 3, 'mffmk', 'kfkfk', '18/05/2017 00:47:13', '', 'ATTESA', '', '0', '0', '1', '0'),
(55, 'fkkfkf', 'lflfl', 'kfkf', 'kfkf@lfl.iy', 'kfkf', 'ffkkf', 3, 'mffmk', 'kfkfk', '18/05/2017 00:48:31', '', 'ATTESA', '', '0', '0', '1', '0'),
(56, 'fkkfkf', 'lflfl', 'kfkf', 'kfkf@lfl.iy', 'kfkf', 'ffkkf', 3, 'mffmk', 'kfkfk', '18/05/2017 00:49:03', '', 'ATTESA', '', '0', '0', '1', '0'),
(57, 'Boris', 'Johnson', '235678986', 'boris@ukgov.uk.com', 'Downing Street, 10', 'Trafalgar Square,2118', 3, 'HTTO', 'NNHO', '18/05/2017 14:10:46', '', 'ATTESA', '', '0', '0', '1', '0'),
(58, 'Boris', 'Johnson', '235678986', 'boris@ukgov.uk.com', 'Downing Street, 10', 'Trafalgar Square,2118', 3, 'HTTO', 'NNHO', '18/05/2017 14:11:09', '', 'ATTESA', '', '0', '0', '1', '0'),
(59, 'hjfj', 'jfjf', 'jfjf', 'fjf@jfj.com', 'kjfjf', 'jfjfj', 5, 'fnfjj', 'fhfh', '18/05/2017 14:11:38', '', 'ATTESA', '', '0', '0', '1', '0'),
(60, 'fkekk', 'kfkfk', 'kfkf', 'kflkf@jjff.com', 'fjjfj', 'fjfj', 1, 'fjfj', 'fjjf', '18/05/2017 14:14:54', '', 'ATTESA', '', '0', '0', '1', '0'),
(61, 'jdjdkd', 'kdkdk', 'kdkd', 'kfkf@jfjf.omc', 'jfjfj', 'djdj', 4, 'fjf', 'fff', '18/05/2017 14:17:42', '', 'ATTESA', '', '0', '0', '1', '0'),
(62, 'fggg', 'ggjrgoirhgoirjgijfgj', 'ggg', 'gggg@jjjgg.com', 'fjfjff', 'ffff', 1, 'fff', 'fffff', '18/05/2017 14:20:40', '', 'ATTESA', '', '0', '0', '1', '0'),
(63, 'fffffefrgfg', 'fffgfsefr', 'ffff', 'fjdf@fj.com', 'rrrrr', 'rrr', 5, 'rrr', 'rrrr', '18/05/2017 14:27:09', '', 'ATTESA', '', '0', '0', '1', '0'),
(64, 'Marco', 'Lillo', '993939303939', 'marco@lillo.it', 'kfkfkf', 'fjjf', 2, 'fff', 'fffff', '18/05/2017 14:30:13', '', 'ATTESA', '', '0', '0', '1', '0'),
(65, 'ee', 'eeefjf', 'ffwee', 'jjgjg@com.com', 'fjfjfj', 'jfjfe', 2, 'fff', 'fffff', '18/05/2017 14:33:50', '', 'ATTESA', '', '0', '0', '1', '0'),
(66, 'ddd', 'fmdjdkjj', 'jjjfjfj', 'fjjff@jfjf.com', 'fjfjfj', 'jfjfjfj', 4, 'fjjfjf', 'jfjfjjff', '18/05/2017 14:37:43', '', 'ATTESA', '', '0', '0', '0', '0'),
(67, 'Scontrini', 'Firenze', '3477646489', 'jfjfjjf@lk.com', 'jffjjf', 'fhjjd', 4, 'ffff', 'ffffff', '18/05/2017 14:38:22', '', 'ATTESA', '', '0', '0', '', '0'),
(68, 'eeefef', 'dfedfdf', 'fdfdfd', 'dfdfd@dlfld.com', 'fkifkfj', 'jfjfjf', 4, 'rrrrr', 'rerere', '18/05/2017 14:39:31', '', 'ATTESA', '', '0', '0', '1', '0'),
(69, 'Tiziano', 'Babbo', 'njfjfjj', 'jfjf@kfjjf.com', 'jfdjdjdj', 'jdjdjdj', 4, 'fffff', 'fefe', '18/05/2017 14:40:02', '25/05/2017 14:23:13', 'ATTESA', '', '0', '0', '0', '1'),
(70, 'fdhdjjd', 'jfjfjj', 'fjfjfj', 'jfjfjjf@fjjf.com', 'jfjfj', 'jfjfj', 4, 'dfdfd', 'fdfdf', '18/05/2017 15:18:52', '20/05/2017 12:37:54', 'ATTESA', '', '0', '0', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `city_report-backup`
--

CREATE TABLE `city_report-backup` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` char(100) NOT NULL,
  `surname` char(100) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(150) NOT NULL,
  `home_address` varchar(250) NOT NULL,
  `report_address` varchar(250) NOT NULL,
  `report_type` enum('URBANISTICA','STRADALE','PEDONALE','INSEGNISTICA','RIFIUTI') NOT NULL,
  `report_title` varchar(255) NOT NULL,
  `report_desc` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `report_insertdate` varchar(100) NOT NULL,
  `report_setdate` varchar(200) NOT NULL,
  `status` enum('ATTESA','APPROVATA','RIGETTATA','RISOLTA') NOT NULL DEFAULT 'ATTESA',
  `answer` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `priority` enum('0','1') NOT NULL DEFAULT '0',
  `hide` enum('0','1') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `visibility` enum('0','1') NOT NULL DEFAULT '1',
  `view` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_report-backup`
--

INSERT INTO `city_report-backup` (`id`, `name`, `surname`, `phone`, `email`, `home_address`, `report_address`, `report_type`, `report_title`, `report_desc`, `report_insertdate`, `report_setdate`, `status`, `answer`, `priority`, `hide`, `visibility`, `view`) VALUES
(10, 'Luca', 'Pinta', '3477646494', 'lucapinta@live.it', 'Via Nonloso, 8', 'Via Garibaldi, 8', 'PEDONALE', 'Problema elettrico', 'Qualcosa qui che non so cosa', '16/11/2016', '26/11/2016 18:12:41', 'RIGETTATA', 'Bene OK', '1', '0', '0', '0'),
(11, 'Danilo', 'Ferrara', '3200000000', 'agostinomessina@gmail.com', 'Villa San Qualcosa', 'Via Garibaldi, 21', 'URBANISTICA', 'C''Ã¨ un problema', 'Eh ma tu qui programmatore sei', '16/11/2016', '26/11/2016 16:42:58', 'APPROVATA', '', '1', '1', '0', '0'),
(12, 'Luca', 'Armando', '', '', 'Via Brahms,8,Alcamo', 'Via Garibaldi, 8', 'STRADALE', 'Buca per strada', 'Buca nel manto stradale all''altezza del numero 8 di via garibaldi la quale crea disagi per i pedoni ma soprattutto per gli automobilisti.', '17/11/2016', '27/11/2016 18:08:10', 'APPROVATA', 'Amministrazione', '1', '0', '0', '0'),
(13, 'Leonardo', 'Acabo', '', '', 'Via mazzini', 'Via giotto', 'PEDONALE', 'Pedoni che roba', 'eh ma qui tu Ã¨ una roba assurda ma allora cos''Ã¨ ma dove siamo eh tu', '17/11/2016', '22/11/2016 21:32:33', 'RISOLTA', 'EH MA TU QUI SEGNALATORE SEI EH', '1', '0', '0', '0'),
(14, 'Rami', 'Maleek', '', '', 'Via Jhonson', 'Via Dirac', 'STRADALE', 'Eh ty', '&lt;b&gt;CIAO&lt;/b&gt;&lt;img src=&quot;http://localhost/roadtool/assets/img/logo-city.png&quot;&gt; eheheheh', '17/11/2016', '', 'RIGETTATA', '', '1', '0', '0', '0'),
(15, 'Bruce', 'Lee', '', '', 'Via Paramount, 28', 'Via Pixar,2', 'STRADALE', 'Problemi di pixel', 'Pixel che non funzionano cioÃ¨ dai noÃ¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨', '17/11/2016 23:11:43', '', 'RIGETTATA', '', '1', '0', '0', '0'),
(16, 'John', 'Newton', '', '', 'Via Marsala,1', 'Via Gerusalemme,8', 'URBANISTICA', 'C''Ã¨ un problema', 'Ã¨ un grosso problema', '17/11/2016 23:21:17', '', 'RIGETTATA', '', '1', '1', '1', '0'),
(17, 'Mark', 'Zucky', '', '', 'Via Canal Street, Palo Alto,9', 'Via John Cena,1', 'STRADALE', 'Miao Bau', 'Non far vdere niente a noi Ã¨Ã¨', '17/11/2016 23:24:52', '', 'RIGETTATA', '', '0', '0', '0', '0'),
(18, 'Priscilla', 'Chang', '', '', 'Via Zhin Thau, 2667', 'Via Xi Jin Ping', 'URBANISTICA', 'Made in PRC', 'mA HC''Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Â°Â°Â°Ã§Ã§Ã§Ã§*', '17/11/2016 23:26:33', '22/11/2016 21:30:06', 'RISOLTA', 'jdjdjdj', '0', '0', '1', '0'),
(19, 'Priscilla', 'Chang', '', '', 'Via Ciullo, 9, Alcamo', 'Via Garibaldi, 8', 'STRADALE', 'C''Ã¨ un problema', 'ekdksd,lf++fdÃ²fsdÃ©Ã©Ã©Ã©Ã§:Ã§Ã§@fpdÃ¨sÃ²', '17/11/2016 23:27:07', '22/11/2016 21:30:47', 'APPROVATA', '', '0', '0', '1', '0'),
(20, 'Luna', 'Lovegood', '', '', 'Via Scarpa,1', 'Via MMI,76', 'STRADALE', 'Ministero', 'Magic', '19/11/2016 21:42:41', '', 'ATTESA', '', '0', '0', '1', '0'),
(21, 'Harry', 'Potter', '', '', 'Via Privet Drive,4', 'Via Unmasked,1', 'STRADALE', 'Crucio', '#LOL', '19/11/2016 23:25:24', '', 'ATTESA', '', '0', '0', '1', '0'),
(22, 'Vio', 'Ciao', '', '', 'Via Pioggia,1', 'Via Manzo,2', 'STRADALE', 'Miao', 'Bay bay', '20/11/2016 08:55:31', '', 'ATTESA', '', '0', '0', '1', '0'),
(23, 'Acquila', 'Trento', '', '', 'Via Brahms,8,Alcamo', 'Via Marsala', 'PEDONALE', 'Ridi Pagliaccio', 'Vesti la Giubba', '20/11/2016 08:56:23', '21/11/2016 00:02:04', 'APPROVATA', '', '0', '0', '1', '0'),
(24, 'Luca', 'Pinta', '', '', 'Via Nonloso', 'Via Garibaldi, 8', 'PEDONALE', 'C''Ã¨ un problema', 'ffffffffffffffffffffffffffff', '20/11/2016 12:09:58', '21/11/2016 01:43:33', 'APPROVATA', '', '0', '0', '1', '0'),
(25, 'Luca', 'Ferrara', '', '', 'Via Nonloso', 'Via Garibaldi, 8', 'URBANISTICA', 'rrrrrrrr', 'rrrrrrrrr', '20/11/2016 12:10:27', '20/11/2016 23:58:38', 'APPROVATA', '', '0', '0', '1', '0'),
(26, 'Priscilla', 'Tizio', '', '', 'Via Nonloso', 'Eh ma tu qui', 'STRADALE', 'TGRF', 'ddddddddddddddddd', '21/11/2016 01:13:04', '21/11/2016 11:47:47', 'RISOLTA', 'Abbiamo giÃ  provveduto. Basta.', '0', '0', '1', '0'),
(27, 'Luca', 'Armadillo', '', '', 'Viale Ionio,15', 'Via Franz Liszt, 1', 'URBANISTICA', 'Problema Illuminazione', 'Problema c''Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨ Ã¨Ã¨Ã¨Ã¨Ã¨ #Ã¹Ã¹Ã #@@meid Ã¨Ã¨Ã¨+++Ã Ã ', '22/11/2016 23:29:19', '', 'ATTESA', '', '0', '0', '1', '0'),
(28, 'Luca', 'Armadio', '', '', 'Viale Sardegna, 11', 'Via Kongo, 13', 'URBANISTICA', 'Spaccio Criminale', 'SpacciÃ²Ã²Ã² Ã¨Ã²Ã -.Ã²Ã¨@#*11^', '22/11/2016 23:33:42', '', 'ATTESA', '', '0', '0', '0', '0'),
(29, 'Mirko', 'Burgarella', '', '', 'Via Japan,1', 'Via Diecimila,4', 'URBANISTICA', 'Mafia Cinese', 'Ã¨Ã¨Ã¨ Ã²vÃ¹nqÃ¹Ã¨Ã¨Ã¨', '22/11/2016 23:41:10', '', 'ATTESA', '', '0', '0', '0', '0'),
(30, 'Mauro', 'Casciari', '', '', 'Via Cambodia,34', 'Via Korea,11', 'URBANISTICA', 'CIA, FBI,', 'LOLLÃ²Ã²Ã²Ã²Ã² Ã¹Ã¹Ã¹Ã¨Ã¨Ã Ã Ã Ã²Ã²--++Ã¨Ã¨^^', '22/11/2016 23:45:15', '', 'ATTESA', '', '0', '0', '0', '0'),
(31, 'Mauro', 'Casciari', '', '', 'Via Cambodia,34', 'Via Korea,11', 'URBANISTICA', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit', 'LOLLÃ²Ã²Ã²Ã²Ã² Ã¹Ã¹Ã¹Ã¨Ã¨Ã Ã Ã Ã²Ã²--++Ã¨Ã¨^^\r\nI''m in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.: \r\nI''m in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.: \r\nI''m in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.: ', '22/11/2016 23:46:43', '23/11/2016 23:17:48', 'ATTESA', '', '0', '0', '0', '0'),
(32, 'Uno', 'Due', '', '', 'Via TRE', 'via boh', 'URBANISTICA', '1234', 'LOLLÃ²Ã²Ã²Ã²Ã² Ã¹Ã¹Ã¹Ã¨Ã¨Ã Ã Ã Ã²Ã²--++Ã¨Ã¨^^\r\nI''m in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.: \r\nI''m in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.: \r\nI''m in Section 1. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel eleifend nisl. Nulla eget erat ac massa suscipit suscipit.: ', '24/11/2016 07:29:45', '16/12/2016 06:54:18', 'APPROVATA', '', '0', '0', '0', '0'),
(33, 'Uno', 'Due', '', '', 'Via TRE', 'via boh', 'URBANISTICA', 'Problema manto stradale interrotto tratto via Garibaldi incrocio via Marsala ', '11111111111111111111111111111111111111111', '24/11/2016 07:31:17', '', 'ATTESA', '', '0', '0', '0', '0'),
(34, 'Federico', 'Pappalardo', '', '', 'Viale Ionio, 15', 'Via Battaglia, 67', 'URBANISTICA', 'EHEHEHEH', '#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys', '18/12/2016 14:10:21', '', 'ATTESA', '', '0', '0', '0', '0'),
(35, 'Federico', 'Pappalardo', '', '', 'Viale Ionio, 15', 'Via Battaglia, 67', 'URBANISTICA', 'EHEHEHEH', '#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys', '18/12/2016 14:10:53', '', 'ATTESA', '', '0', '0', '0', '0'),
(36, 'Federico', 'Pappalardo', '', '', 'Viale Ionio, 15', 'Via Battaglia, 67', 'URBANISTICA', 'EHEHEHEH', '#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys', '18/12/2016 14:11:16', '18/12/2016 16:44:19', 'ATTESA', '', '0', '0', '0', '0'),
(37, 'Salvatore', 'Longo', '', '', 'Vis eh ma tu qui', 'jfkdlnfkjsdnfsdnmfk', 'STRADALE', 'VUOTO', '$title, $desc, $type, $date = NULL, $name = NULL, $surname =  NULL, $address = NULL$title, $desc, $type, $date = NULL, $name = NULL, $surname =  NULL, $address = NULL$title, $desc, $type, $date = NULL, $name = NULL, $surname =  NULL, $address = NULL$title, $desc, $type, $date = NULL, $name = NULL, $surname =  NULL, $address = NULL', '18/12/2016 14:32:56', '18/12/2016 16:39:31', 'ATTESA', '', '0', '0', '1', '0'),
(38, 'Indios', 'Lumsa', '', '', 'Via mazzini', 'Via Garibaldi, 8', 'URBANISTICA', 'TWWET DA OIDFJIF FVKDSK', '$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);', '18/12/2016 14:54:33', '18/12/2016 16:03:20', 'ATTESA', '', '0', '0', '1', '0'),
(39, 'Luca', 'Chang', '', '', 'Via Ciullo, 9, Alcamo', 'Via Garibaldi, 8', 'URBANISTICA', 'Questo Ã¨ un inferno di cose impossibili', 'or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error());', '18/12/2016 15:18:26', '', 'ATTESA', '', '0', '0', '1', '0'),
(40, 'Luca', 'Chang', '', '', 'Via Ciullo, 9, Alcamo', 'Via Garibaldi, 8', 'URBANISTICA', 'Questo Ã¨ un inferno di cose impossibili', 'or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error());', '18/12/2016 15:22:28', '18/12/2016 15:37:43', 'APPROVATA', '', '0', '0', '1', '0'),
(41, 'Luca', 'Chang', '', '', 'Via Ciullo, 9, Alcamo', 'Via Garibaldi, 8', 'URBANISTICA', 'Questo Ã¨ un inferno di cose impossibili', 'or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error());', '18/12/2016 15:24:00', '18/12/2016 15:37:26', 'RIGETTATA', 'no', '0', '0', '1', '0'),
(42, 'Luca', 'Chang', '', '', 'Via Ciullo, 9, Alcamo', 'Via Garibaldi, 8', 'RIFIUTI', 'Questo Ã¨ un inferno di cose impossibili', 'or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error());', '18/12/2016 15:24:34', '03/01/2017 11:26:41', 'RIGETTATA', 'hh', '0', '0', '1', '0'),
(43, 'KAOIJOI', 'OISAJDIA', '', '', 'DJASJIDOAJD', 'IJSIJDIO', 'STRADALE', 'JDOISJDOI', 'DJSOIDIOS', '31/01/2017 14:49:06', '', 'ATTESA', '', '0', '0', '0', '0'),
(44, 'wekjfpdkf', 'kfodjfoi', '', '', 'djfoejo', 'jfodjf', 'PEDONALE', 'pdkfoijfdoi', 'edjfodijfoi', '31/01/2017 20:33:15', '12/02/2017 15:37:36', 'APPROVATA', '', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cms_alert`
--

CREATE TABLE `cms_alert` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_alert`
--

INSERT INTO `cms_alert` (`id`, `user_id`, `text`) VALUES
(15, 21, 'eheh'),
(16, 22, 'eheh'),
(17, 23, 'eheh'),
(20, 26, 'eheh');

-- --------------------------------------------------------

--
-- Table structure for table `cms_help`
--

CREATE TABLE `cms_help` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `message` mediumtext NOT NULL,
  `date` varchar(50) NOT NULL,
  `picked_up` enum('0','1') NOT NULL,
  `subject` varchar(50) NOT NULL,
  `roomid` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_ratings`
--

CREATE TABLE `cms_ratings` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `raterid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_reset`
--

CREATE TABLE `cms_reset` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_reset`
--

INSERT INTO `cms_reset` (`id`, `mail`, `token`) VALUES
(1, 'lol', '2620c5f1018ab54ff54a9662d1530fff2f1fd95a'),
(2, '', '67a74306b06d0c01624fe0d0249a570f4d093747'),
(3, 'fakemailer@gmail.com', 'd901df6fc9e8fe6f7d06abdd1c4bf0da377c866d'),
(4, 'lucapinta@live.it', 'a73d6c0ed7dfb7266774c99c9c883f24d2c587f7');

-- --------------------------------------------------------

--
-- Table structure for table `cms_system`
--

CREATE TABLE `cms_system` (
  `sitename` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `shortname` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `site_closed` enum('0','1') COLLATE latin1_general_ci NOT NULL COMMENT 'Maintenance Mode',
  `redirect_status` enum('0','1') COLLATE latin1_general_ci NOT NULL,
  `language` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `message` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `public_message` text COLLATE latin1_general_ci NOT NULL,
  `viewm_status` enum('0','1') COLLATE latin1_general_ci NOT NULL,
  `redirect_link` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `admin_notes` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='HoloCMS';

--
-- Dumping data for table `cms_system`
--

INSERT INTO `cms_system` (`sitename`, `shortname`, `site_closed`, `redirect_status`, `language`, `message`, `public_message`, `viewm_status`, `redirect_link`, `admin_notes`) VALUES
('Holo Hotel', 'Holo', '0', '0', 'it', '', '', '0', 'http://www.comune.alcamo.tp.it/', '');

-- --------------------------------------------------------

--
-- Table structure for table `country_banned`
--

CREATE TABLE `country_banned` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country_sites`
--

CREATE TABLE `country_sites` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `theme_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `theme_id`) VALUES
(1, 'How can I be staff?', 'Wait for sollicitations', 1),
(2, 'Can I have more credits?', 'You get 3000 new credits each day when you log in', 2),
(3, 'Can I have a rare?', 'No', 3),
(4, 'Can I have more pixels?', 'No, pixels are given out as long as you are online', 4),
(5, 'When will pets get released?', 'They are allready in the catalog.', 1),
(9, 'Can I be friend with staff?', '<b>no</b>', 2),
(10, 'Can i have a Badge?', 'No', 6);

-- --------------------------------------------------------

--
-- Table structure for table `faq_theme`
--

CREATE TABLE `faq_theme` (
  `id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_theme`
--

INSERT INTO `faq_theme` (`id`, `content`, `date`, `description`) VALUES
(1, 'Segnalazioni', '02/04/2017 20:40:59', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.'),
(2, 'Impostazioni account\n\n', '10/04/2017 17:24:43', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.'),
(3, 'Iter richiesta\n\n', '08/03/2017 07:30:46', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.'),
(4, 'Settori di riferimento\n\n', '08/03/2017 07:30:46', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.'),
(6, 'Risoluzione richiesta', '08/03/2017 07:34:52', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.'),
(7, 'Luca', '20/05/2017 18:07', 'jeje');

-- --------------------------------------------------------

--
-- Table structure for table `hk_board`
--

CREATE TABLE `hk_board` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hk_board`
--

INSERT INTO `hk_board` (`id`, `content`) VALUES
(1, '[Hotel Manager DonG: USE http://habbo.vg/manage/index.php?_cmd=forum] << USE THIS INSTEAD\r\n[Hotel Manager DonG: USE http://habbo.vg/manage/index.php?_cmd=forum] << USE THIS INSTEAD\r\n[Hotel Manager DonG: USE http://habbo.vg/manage/index.php?_cmd=forum] << USE THIS INSTEAD\r\n[Hotel Manager DonG: USE http://habbo.vg/manage/index.php?_cmd=forum] << USE THIS INSTEAD\r\n[Hotel Manager DonG: USE http://habbo.vg/manage/index.php?_cmd=forum] << USE THIS INSTEAD\r\n[Hotel Manager DonG: USE http://habbo.vg/manage/index.php?_cmd=forum] << USE THIS INSTEAD\r\n[Hotel Manager DonG: USE http://habbo.vg/manage/index.php?_cmd=forum] << USE THIS INSTEAD\r\n[Hotel Manager DonG: USE http://habbo.vg/manage/index.php?_cmd=forum] << USE THIS INSTEAD');

-- --------------------------------------------------------

--
-- Table structure for table `ipn_requests`
--

CREATE TABLE `ipn_requests` (
  `id` int(11) NOT NULL,
  `date` text NOT NULL,
  `ip` text NOT NULL,
  `status` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0 = Error, 1 = OK, 2 = Forced, 3 = Auth failure, 4 = UID not found, 5 = Forced, 6 = Data failure',
  `request_data` text NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `balance_diff` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ip_cache`
--

CREATE TABLE `ip_cache` (
  `ip` varchar(16) NOT NULL,
  `country` varchar(75) NOT NULL DEFAULT 'UNKNOWN',
  `isSafe` enum('false','true') DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `admin_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `content`, `date`, `admin_id`) VALUES
(1, 'CIaone', '12/12/1967', 0),
(15, 'ood', '', 0),
(16, 'ood', '', 0),
(17, 'ood', '08/03/2017 07:30:46', 0),
(18, 'lsl', '08/03/2017 07:31:03', 0),
(19, 'lsl', '08/03/2017 07:34:52', 0),
(20, 'lsl1', '08/03/2017 07:36:24', 0),
(21, 'lsl22', '08/03/2017 07:36:30', 0),
(22, 'lsl22gg', '14/03/2017 09:39:19', 0),
(23, 'lsl22gggdsg ÃƒÂ¨ÃƒÂ¨ '' sakfsÃƒÂ¨efcÃƒÂ¨', '01/04/2017 19:01:22', 0),
(24, 'lsl22gg ÃƒÂ¨ÃƒÂ¨', '01/04/2017 19:01:28', 0),
(25, 'lsl22gg "" ÃƒÂ¨ÃƒÂ¨', '01/04/2017 19:02:31', 0),
(26, 'lsl22gg ÃƒÂƒÃ‚Â¨ÃƒÂ¨ÃƒÂ¨', '01/04/2017 19:02:35', 0),
(27, 'lsl22gg ÃƒÂ¨ÃƒÂ¨ÃƒÂ¨ ', '01/04/2017 19:02:46', 0),
(28, 'lsl22gg ÃƒÂ¨ÃƒÂ¨ÃƒÂ¨ ""ÃƒÂ ÃƒÂ¨+ÃƒÂ²ÃƒÂ ', '01/04/2017 19:08:02', 0),
(29, 'dddff', '25/05/2017 08:27:47', 15),
(30, 'Benvenuto', '25/05/2017 08:28:42', 16);

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `prefix` text NOT NULL,
  `suffix` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `name`, `prefix`, `suffix`) VALUES
(1, 'User', '', ''),
(2, 'eXpert', '<b>', '</b>'),
(3, 'Silver Hobba', '<span style="color: #darkgreen;">', '</span>'),
(4, 'Gold Hobba', '<b style="color: #04B404;">', '</b>'),
(5, 'Trial Moderator', '<b style="color: lime">', '</b>'),
(6, 'Moderator', '<b style="color: red;">', '</b>'),
(7, 'Assistent Manager', '<span style="font-weight: bold;color:grey;background: url(http://i.imgur.com/Jnoq2.gif)">', '</span>'),
(8, 'Hotel Managment', '<span style="font-weight: bold;color:grey;background: url(http://i.imgur.com/Jnoq2.gif)">', '</span>');

-- --------------------------------------------------------

--
-- Table structure for table `request_refer`
--

CREATE TABLE `request_refer` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `request_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_refer`
--

INSERT INTO `request_refer` (`id`, `user_id`, `request_id`) VALUES
(8, 16, 44),
(5, 16, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`id`, `content`, `date`, `description`) VALUES
(41, 'Direzione VI - Qualcosa', '07/05/2017 20:44:04', ''),
(2, 'Direzione II - Affari Generali', '08/05/2017 21:45:36', ''),
(3, 'Direzione III - Servizi al Cittadino e Risorse Umane', '09/04/2017 19:21:57', ''),
(5, 'Direzione IV - Lavori Pubblici e Servizi Tecnici ed Ambientali', '09/04/2017 19:22:55', ''),
(38, 'Direzione I - Sviluppo economico territoriale', '10/04/2017 14:31:57', 'fkkf'),
(39, 'Direzione VII - Controllo e sicurezza del territorio', '10/04/2017 14:32:40', 'jf');

-- --------------------------------------------------------

--
-- Table structure for table `sector_refer`
--

CREATE TABLE `sector_refer` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `sector_id` int(11) UNSIGNED NOT NULL,
  `rank_id` int(1) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sector_refer`
--

INSERT INTO `sector_refer` (`id`, `user_id`, `sector_id`, `rank_id`) VALUES
(9, 16, 2, 5),
(8, 16, 41, 5),
(7, 14, 41, 6),
(11, 14, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `stafflog`
--

CREATE TABLE `stafflog` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `command` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stafflogs`
--

CREATE TABLE `stafflogs` (
  `id` int(5) NOT NULL,
  `action` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `message` text COLLATE latin1_general_ci,
  `note` text COLLATE latin1_general_ci,
  `userid` int(11) NOT NULL,
  `targetid` int(11) DEFAULT '0',
  `timestamp` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `details` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '-/-'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_bios`
--

CREATE TABLE `staff_bios` (
  `id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(250) DEFAULT NULL,
  `bio` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_bios`
--

INSERT INTO `staff_bios` (`id`, `user`, `bio`) VALUES
(1, 'Various', 'im gay in a box.');

-- --------------------------------------------------------

--
-- Table structure for table `staff_logs`
--

CREATE TABLE `staff_logs` (
  `id` int(11) NOT NULL,
  `staffuser` varchar(40) NOT NULL,
  `target` varchar(40) NOT NULL,
  `action_type` varchar(40) NOT NULL,
  `description` text,
  `extra_info` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_logs`
--

INSERT INTO `staff_logs` (`id`, `staffuser`, `target`, `action_type`, `description`, `extra_info`, `time`, `deleted`) VALUES
(1, 'Doraemon', '', 'Chat command', 'Issued chat command :commands', NULL, '2012-11-25 10:49:51', 0),
(2, 'Doraemon', '', 'Chat command', 'Issued chat command :commands', NULL, '2012-11-25 10:50:58', 0),
(3, 'Impossibol', '', 'Chat command', 'Issued chat command :moonwalk', NULL, '2013-03-03 15:19:25', 0),
(4, 'Impossibol', '', 'Chat command', 'Issued chat command :push x', NULL, '2013-03-03 15:19:32', 0),
(5, 'Impossibol', '', 'Chat command', 'Issued chat command :moonwalk', NULL, '2013-03-03 15:23:53', 0),
(6, 'Impossibol', '', 'Chat command', 'Issued chat command :info', NULL, '2013-03-03 16:25:38', 0),
(7, 'Impossibol', '', 'Chat command', 'Issued chat command :info', NULL, '2013-03-03 16:33:23', 0),
(8, 'Impossibol', '', 'Chat command', 'Issued chat command :info', NULL, '2013-03-03 16:45:04', 0),
(9, 'Impossibol', '', 'Chat command', 'Issued chat command :pickall', NULL, '2013-03-04 17:07:30', 0),
(10, 'Juventuss', '', 'Chat command', 'Issued chat command :crystals Juventuss 1000', NULL, '2013-03-17 12:15:41', 0),
(11, 'Juventuss', '', 'Chat command', 'Issued chat command :crystals Juventuss 100000', NULL, '2013-03-17 12:16:01', 0),
(12, 'Juventuss', '', 'Chat command', 'Issued chat command :crystals Juventuss 10000', NULL, '2013-03-17 12:22:08', 0),
(13, 'Juventuss', '', 'Chat command', 'Issued chat command :crystals Juventuss 1000', NULL, '2013-03-17 12:22:31', 0),
(14, 'Juventuss', '', 'Chat command', 'Issued chat command :crystals Juventuss 1000000000000000', NULL, '2013-03-17 12:22:41', 0),
(15, 'Juventuss', '', 'Chat command', 'Issued chat command :crystals Juventuss 10000', NULL, '2013-03-17 12:22:50', 0),
(16, 'Juventuss', '', 'Chat command', 'Issued chat command :crystals Juventuss 100000', NULL, '2013-03-17 12:31:03', 0),
(17, 'Juventuss', '', 'Chat command', 'Issued chat command :crystals Juventuss 1000000', NULL, '2013-03-17 12:31:19', 0),
(18, 'Juventuss', '', 'Chat command', 'Issued chat command :crystals Juventuss 1000', NULL, '2013-03-17 12:41:52', 0),
(19, 'Juventuss', '', 'Chat command', 'Issued chat command :commands', NULL, '2013-03-18 18:19:17', 0),
(20, 'Juventuss', '', 'Chat command', 'Issued chat command :crystals Juventuss 10000', NULL, '2013-03-18 18:19:34', 0),
(21, 'Juventuss', '', 'Chat command', 'Issued chat command :commands', NULL, '2013-03-19 17:02:01', 0),
(22, 'Juventuss', '', 'Chat command', 'Issued chat command :enable 90', NULL, '2013-03-19 17:02:53', 0),
(23, 'Juventuss', '', 'Chat command', 'Issued chat command :commands', NULL, '2013-03-19 17:03:24', 0),
(24, 'Juventuss', '', 'Chat command', 'Issued chat command :finvotacion', NULL, '2013-03-19 17:03:42', 0),
(25, 'Juventuss', '', 'Chat command', 'Issued chat command :faq', NULL, '2013-03-19 17:03:50', 0),
(26, 'Juventuss', '', 'Chat command', 'Issued chat command :pickall', NULL, '2013-03-19 18:07:39', 0),
(27, 'Juventuss', '', 'Chat command', 'Issued chat command :shutdown', NULL, '2013-03-19 18:14:26', 0),
(28, 'Juventuss', '', 'Chat command', 'Issued chat command :info', NULL, '2013-03-19 19:19:52', 0),
(29, 'Juventuss', '', 'Chat command', 'Issued chat command :reload', NULL, '2013-03-19 19:23:19', 0),
(30, 'Juventuss', '', 'Chat command', 'Issued chat command :jetpack', NULL, '2013-03-19 20:22:53', 0),
(31, 'Juventuss', '', 'Chat command', 'Issued chat command :jetpack', NULL, '2013-03-19 20:22:56', 0),
(32, 'Juventuss', '', 'Chat command', 'Issued chat command :sleep', NULL, '2013-03-19 20:23:38', 0),
(33, 'Juventuss', '', 'Chat command', 'Issued chat command :sleep', NULL, '2013-03-19 20:23:40', 0),
(34, 'Juventuss', '', 'Chat command', 'Issued chat command :sleep', NULL, '2013-03-19 20:23:42', 0),
(35, 'Juventuss', '', 'Chat command', 'Issued chat command :sleep', NULL, '2013-03-19 20:23:44', 0),
(36, 'Juventuss', '', 'Chat command', 'Issued chat command :sleep', NULL, '2013-03-19 20:23:45', 0),
(37, 'Juventuss', '', 'Chat command', 'Issued chat command :pickall', NULL, '2013-03-20 14:28:58', 0),
(38, 'crix14', '', 'Chat command', 'Issued chat command :commands', NULL, '2013-10-25 19:02:05', 0),
(39, 'crix14', '', 'Chat command', 'Issued chat command :pickall', NULL, '2013-10-25 19:07:38', 0),
(40, 'crix14', '', 'Chat command', 'Issued chat command :empty', NULL, '2013-10-25 19:07:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_config`
--

CREATE TABLE `system_config` (
  `id` int(10) NOT NULL,
  `skey` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sval` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_log`
--

CREATE TABLE `system_log` (
  `id` int(11) UNSIGNED NOT NULL,
  `account` varchar(50) NOT NULL,
  `type` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `date` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `toolpage` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `toolrank` int(1) UNSIGNED NOT NULL,
  `userrank` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_log`
--

INSERT INTO `system_log` (`id`, `account`, `type`, `description`, `date`, `toolpage`, `toolrank`, `userrank`) VALUES
(1, 'super@admin.com', 'Tentativo accesso area riservata', 'Tentativo di accesso', '25/05/2017 14:22:38', 'Accesso Area Riservata', 0, 0),
(2, 'super@admin.com', 'Accesso area riservata', 'Accesso eseguito', '25/05/2017 14:22:39', 'Accesso Area Riservata', 0, 0),
(3, 'admin@lv6.com', 'Tentativo accesso area riservata', 'Tentativo di accesso', '25/05/2017 19:04:15', 'Accesso Area Riservata', 0, 0),
(4, 'admin@lv6.com', 'Accesso area riservata', 'Accesso eseguito', '25/05/2017 19:04:16', 'Accesso Area Riservata', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_notify`
--

CREATE TABLE `system_notify` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `title` varchar(255) NOT NULL,
  `info` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `link` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `view` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_notify`
--

INSERT INTO `system_notify` (`id`, `type`, `title`, `info`, `link`, `date`, `view`) VALUES
(1, 'report', 'EHEHEHEH', '#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys\r\n#1089 - Incorrect prefix key; the used key part isn''t a string, the used length is longer than the key part, or the storage engine doesn''t support unique prefix keys', './all?edit=36', '18/12/2016 14:11:16', '1'),
(2, 'report', 'VUOTO', '$title, $desc, $type, $date = NULL, $name = NULL, $surname =  NULL, $address = NULL$title, $desc, $type, $date = NULL, $name = NULL, $surname =  NULL, $address = NULL$title, $desc, $type, $date = NULL, $name = NULL, $surname =  NULL, $address = NULL$title, $desc, $type, $date = NULL, $name = NULL, $surname =  NULL, $address = NULL', './all?edit=37', '18/12/2016 14:32:56', '1'),
(3, 'report', 'TWWET DA OIDFJIF FVKDSK', '$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);\r\n		$input-&gt;systemNotify(&quot;Modifica indirizzo email&quot;, &quot;Hai modificato l''indirizzo email associata al tuo account.&quot;, &quot;account&quot;, date(''d/m/Y H:i:s''), &quot;Disabled&quot;, &quot;Disabled&quot;, &quot;Disabled&quot;);', './all?edit=38', '18/12/2016 14:54:33', '1'),
(4, 'report', 'Questo Ã¨ un inferno di cose impossibili', 'or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error());', './all?edit=', '18/12/2016 15:18:27', '0'),
(5, 'report', 'Questo Ã¨ un inferno di cose impossibili', 'or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error());', './all?edit=40', '18/12/2016 15:22:28', ''),
(6, 'report', 'Questo Ã¨ un inferno di cose impossibili', 'or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error());', './home', '18/12/2016 15:24:00', ''),
(7, 'report', 'Questo Ã¨ un inferno di cose impossibili', 'or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error()); or die(mysql_error());', './home', '18/12/2016 15:24:34', ''),
(8, 'account', 'Modifica indirizzo email', 'Hai modificato lindirizzo email associata al tuo account', './home', '18/12/2016 15:24:34', '0'),
(9, 'account', 'Modifica indirizzo email', 'Hai modificato l''indirizzo email associata al tuo account', './profile', '18/12/2016 15:41:28', '0');

-- --------------------------------------------------------

--
-- Table structure for table `system_stafflog`
--

CREATE TABLE `system_stafflog` (
  `id` int(5) NOT NULL,
  `action` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `message` text COLLATE latin1_general_ci,
  `note` text COLLATE latin1_general_ci,
  `userid` int(11) NOT NULL,
  `targetid` int(11) DEFAULT NULL,
  `timestamp` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `system_stafflog`
--

INSERT INTO `system_stafflog` (`id`, `action`, `message`, `note`, `userid`, `targetid`, `timestamp`) VALUES
(1, 'Housekeeping', 'Raikas77 authenticated from 127.0.0.1', 'login.php', 2, 0, '05-09-2012 21:12:17'),
(2, 'Housekeeping', 'Raikas77 authenticated from 127.0.0.1', 'login.php', 2, 0, '07-09-2012 12:48:11'),
(3, 'Housekeeping', 'Raikas77 authenticated from 127.0.0.1', 'login.php', 2, 0, '10-09-2012 13:17:16'),
(4, 'Housekeeping', 'Edited user', 'edituser.php', 2, 3, '10-09-2012 13:17:32'),
(5, 'Housekeeping', 'Assegnamento distintivo FAN', 'badgetool.php', 2, 2, '10-09-2012 13:17:54'),
(6, 'Housekeeping', 'Assegnamento distintivo FAN', 'badgetool.php', 2, 2, '10-09-2012 13:24:25'),
(7, 'Housekeeping', 'Assegnamento distintivo FAN', 'badgetool.php', 2, 2, '10-09-2012 13:24:54'),
(8, 'Housekeeping', 'Assegnamento distintivo ADM', 'badgetool.php', 2, 2, '10-09-2012 13:28:26'),
(9, 'Housekeeping', 'Impossibol authenticated from 127.0.0.1', 'login.php', 6, 0, '14-09-2012 15:19:02'),
(10, 'Housekeeping', 'Impossibol authenticated from 127.0.0.1', 'login.php', 6, 0, '14-09-2012 17:59:15'),
(11, 'Housekeeping', 'Impossibol authenticated from 127.0.0.1', 'login.php', 6, 0, '14-09-2012 18:01:49'),
(12, 'Housekeeping', 'Impossibol authenticated from 127.0.0.1', 'login.php', 6, 0, '14-09-2012 20:40:52'),
(13, 'Housekeeping', 'Impossibol authenticated from 127.0.0.1', 'login.php', 6, 0, '14-09-2012 21:16:11'),
(14, 'Housekeeping', 'Impossibol authenticated from 127.0.0.1', 'login.php', 6, 0, '14-09-2012 21:35:43'),
(15, 'Housekeeping', 'Impossibol authenticated from 127.0.0.1', 'login.php', 6, 0, '16-09-2012 16:48:05'),
(16, 'Housekeeping', 'Opzioni Stile Barra % Manutenzione', '.php', 6, 0, '16-09-2012 16:56:43'),
(17, 'Housekeeping', 'Impossibol authenticated from 127.0.0.1', 'login.php', 6, 0, '19-09-2012 15:13:53'),
(18, 'Housekeeping', 'Impossibol authenticated from 127.0.0.1', 'login.php', 6, 0, '19-09-2012 19:28:29'),
(19, 'Housekeeping', 'Impossibol authenticated from 127.0.0.1', 'login.php', 6, 0, '19-09-2012 20:04:09'),
(20, 'Housekeeping', 'Impossibol authenticated from 127.0.0.1', 'login.php', 6, 0, '23-12-2012 15:42:12'),
(21, 'Housekeeping', 'Privacy authenticated from 25.115.88.1', 'login.php', 132, 0, '12-02-2013 14:48:53'),
(22, 'Housekeeping', 'Wawys authenticated from 25.171.82.237', 'login.php', 136, 0, '12-02-2013 14:54:25'),
(23, 'Housekeeping', 'Impossibol authenticated from 127.0.0.1', 'login.php', 130, 0, '12-02-2013 14:57:08'),
(24, 'Housekeeping', 'Edited user', 'edituser.php', 136, 136, '12-02-2013 14:58:04'),
(25, 'Housekeeping', 'Gave user HC2 badge', 'badgetool.php', 136, 136, '12-02-2013 15:00:26'),
(26, 'Housekeeping', 'Gave user ES6 badge', 'badgetool.php', 136, 136, '12-02-2013 15:00:53'),
(27, 'Housekeeping', 'Gave user HX5 badge', 'badgetool.php', 136, 136, '12-02-2013 15:01:05'),
(28, 'Housekeeping', 'Gave user HX9 badge', 'badgetool.php', 136, 136, '12-02-2013 15:01:14'),
(29, 'Housekeeping', 'Gave user HX6 badge', 'badgetool.php', 136, 136, '12-02-2013 15:01:22'),
(30, 'Housekeeping', 'Gave user HX7 badge', 'badgetool.php', 136, 136, '12-02-2013 15:01:27'),
(31, 'Housekeeping', 'Gave user HX8 badge', 'badgetool.php', 136, 136, '12-02-2013 15:01:36'),
(32, 'Housekeeping', 'Gave user H01 badge', 'badgetool.php', 136, 136, '12-02-2013 15:01:45'),
(33, 'Housekeeping', 'Gave user HX1 badge', 'badgetool.php', 136, 136, '12-02-2013 15:02:52'),
(34, 'Housekeeping', 'Gave user HX2 badge', 'badgetool.php', 136, 136, '12-02-2013 15:03:00'),
(35, 'Housekeeping', 'Gave user HX3 badge', 'badgetool.php', 136, 136, '12-02-2013 15:03:04'),
(36, 'Housekeeping', 'Updated CMS Settings (Turn your site on/off)', 'maintenance.php', 21, 0, '20-03-2013 19:22:54'),
(37, 'Housekeeping', 'Updated CMS Settings (Turn your site on/off)', 'maintenance.php', 21, 0, '20-03-2013 19:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `type_refer`
--

CREATE TABLE `type_refer` (
  `id` int(11) NOT NULL,
  `type_id` int(11) UNSIGNED NOT NULL,
  `sector_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_refer`
--

INSERT INTO `type_refer` (`id`, `type_id`, `sector_id`) VALUES
(40, 2, 41),
(39, 1, 41),
(38, 6, 2),
(37, 5, 2),
(36, 4, 41),
(35, 3, 41);

-- --------------------------------------------------------

--
-- Table structure for table `typology`
--

CREATE TABLE `typology` (
  `id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typology`
--

INSERT INTO `typology` (`id`, `content`, `date`, `description`) VALUES
(1, 'Graffiti', '02/04/2017 20:40:59', 'Pinta Luca'),
(2, 'Illuminazione pubblica', '10/04/2017 17:24:43', ''),
(3, 'Strade', '08/03/2017 07:30:46', ''),
(4, 'Rifiuti e cassonetti', '08/03/2017 07:30:46', ''),
(5, 'Segnaletica', '08/03/2017 07:31:03', ''),
(6, 'Sanitaria', '08/03/2017 07:34:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` char(50) NOT NULL,
  `surname` char(50) NOT NULL,
  `real_name` char(100) NOT NULL DEFAULT '',
  `password` char(42) NOT NULL,
  `mail` varchar(50) NOT NULL DEFAULT 'defaultuser@meth0d.org',
  `auth_ticket` varchar(60) NOT NULL DEFAULT '',
  `rank` int(1) UNSIGNED NOT NULL DEFAULT '1',
  `sector` int(11) NOT NULL DEFAULT '1',
  `request_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `description` text,
  `credits` int(11) NOT NULL DEFAULT '0',
  `vip_points` int(11) NOT NULL DEFAULT '0',
  `activity_points` int(11) NOT NULL DEFAULT '0',
  `activity_points_lastupdate` double NOT NULL DEFAULT '0',
  `look` char(100) NOT NULL DEFAULT 'hr-115-42.hd-190-1.ch-215-62.lg-285-91.sh-290-62',
  `gender` enum('M','F') NOT NULL DEFAULT 'M',
  `motto` char(50) NOT NULL,
  `account_created` char(12) NOT NULL,
  `last_online` varchar(20) NOT NULL,
  `online` enum('0','1') NOT NULL DEFAULT '0',
  `ip_last` char(20) NOT NULL,
  `ip_reg` char(20) NOT NULL,
  `postcount` int(11) NOT NULL DEFAULT '0',
  `home_room` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `respect` int(11) NOT NULL DEFAULT '0',
  `daily_respect_points` int(1) NOT NULL DEFAULT '3',
  `daily_pet_respect_points` int(1) NOT NULL DEFAULT '3',
  `newbie_status` int(1) NOT NULL DEFAULT '3',
  `is_muted` enum('0','1') NOT NULL DEFAULT '0',
  `mutant_penalty` enum('0','1','2') NOT NULL DEFAULT '0',
  `mutant_penalty_expire` int(11) NOT NULL DEFAULT '0',
  `block_newfriends` enum('0','1') NOT NULL DEFAULT '0',
  `hide_online` enum('0','1') NOT NULL DEFAULT '0',
  `hide_inroom` enum('0','1') NOT NULL DEFAULT '0',
  `mail_verified` varchar(6) NOT NULL DEFAULT '0',
  `vip` enum('0','1') NOT NULL DEFAULT '0',
  `working` varchar(50) NOT NULL DEFAULT '0',
  `secretcode` varchar(8) NOT NULL DEFAULT '0',
  `mymusik` varchar(100) NOT NULL DEFAULT '0',
  `getmoney_date` varchar(20) NOT NULL DEFAULT '0',
  `visibility` enum('EVERYONE','FRIENDS','NOBODY') NOT NULL DEFAULT 'EVERYONE',
  `birth` varchar(10) NOT NULL DEFAULT '0',
  `volume` int(3) NOT NULL DEFAULT '100',
  `dolares` int(11) NOT NULL DEFAULT '0',
  `Weights` int(11) NOT NULL DEFAULT '0',
  `lastdailycredits` char(18) NOT NULL DEFAULT '',
  `points` int(11) NOT NULL DEFAULT '0',
  `block_trade` enum('1','0') NOT NULL DEFAULT '0',
  `crystals` int(11) NOT NULL DEFAULT '0',
  `achievement_points` int(11) NOT NULL DEFAULT '0',
  `quests` varchar(200) NOT NULL DEFAULT '0',
  `queststates` varchar(200) NOT NULL DEFAULT '0',
  `canchangename` enum('0','1') NOT NULL DEFAULT '1',
  `FavoriteGroup` int(11) NOT NULL DEFAULT '0',
  `one_password` varchar(500) NOT NULL DEFAULT '0',
  `datosreg` varchar(500) NOT NULL DEFAULT '0',
  `country` varchar(500) NOT NULL DEFAULT '0',
  `facebook_id` varchar(255) NOT NULL DEFAULT '0',
  `marketing` varchar(1) NOT NULL DEFAULT '0',
  `showhome` varchar(10) NOT NULL DEFAULT '1',
  `main` varchar(10) NOT NULL DEFAULT '1',
  `registered` varchar(10) NOT NULL DEFAULT '0000000000',
  `lastonline` varchar(10) NOT NULL DEFAULT '000000000',
  `passed_quiz` enum('0','1') NOT NULL DEFAULT '0',
  `points_online` int(11) NOT NULL DEFAULT '0',
  `online1` text,
  `ipaddress_last` varchar(100) DEFAULT NULL,
  `lastvisit` varchar(50) DEFAULT NULL,
  `badge_status` int(10) DEFAULT NULL,
  `hbirth` varchar(100) DEFAULT NULL,
  `lpt` int(11) NOT NULL DEFAULT '0',
  `account` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `real_name`, `password`, `mail`, `auth_ticket`, `rank`, `sector`, `request_id`, `description`, `credits`, `vip_points`, `activity_points`, `activity_points_lastupdate`, `look`, `gender`, `motto`, `account_created`, `last_online`, `online`, `ip_last`, `ip_reg`, `postcount`, `home_room`, `respect`, `daily_respect_points`, `daily_pet_respect_points`, `newbie_status`, `is_muted`, `mutant_penalty`, `mutant_penalty_expire`, `block_newfriends`, `hide_online`, `hide_inroom`, `mail_verified`, `vip`, `working`, `secretcode`, `mymusik`, `getmoney_date`, `visibility`, `birth`, `volume`, `dolares`, `Weights`, `lastdailycredits`, `points`, `block_trade`, `crystals`, `achievement_points`, `quests`, `queststates`, `canchangename`, `FavoriteGroup`, `one_password`, `datosreg`, `country`, `facebook_id`, `marketing`, `showhome`, `main`, `registered`, `lastonline`, `passed_quiz`, `points_online`, `online1`, `ipaddress_last`, `lastvisit`, `badge_status`, `hbirth`, `lpt`, `account`) VALUES
(1, '', '', '', '05f86a0b755c5fba64d4d2d521cd34d0540f7fc9', 'cris_forever@live.it', 'HABLUX-1015466731266401558897644691', 7, 1, 0, NULL, 52843, 1000, 0, 0, 'hd-180-2.lg-285-81.hr-828-42.sh-290-90.ch-215-92', 'M', 'Benvenuto! lol', '1371792625', '1382725856', '1', '::1', '::1', 0, 0, 0, 3, 0, 3, '0', '0', 0, '1', '0', '0', '0', '0', '0', '0', '0', '0', 'EVERYONE', '0', 100, 0, 0, '10/25', 0, '0', 0, 45, '0', '0', '1', 0, '0', '0', '0', '0', '0', '1', '1', '0000000000', '000000000', '1', 0, NULL, NULL, NULL, NULL, NULL, 0, '1_id'),
(2, '', '', '', '', 'pronoweb96@gmail.com', 'HABLUX-860597537185822818295623363', 1, 1, 0, NULL, 49975, 0, 0, 0, 'hr-893-32.hd-209-4.ch-3030-62.lg-281-63.ea-1401-63.wa-3211-64-64', 'M', 'Benvenuto!', '1371927198', '1382416575', '0', '::1', '::1', 0, 0, 0, 3, 3, 3, '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'EVERYONE', '0', 100, 0, 0, '', 0, '0', 0, 0, '0', '0', '1', 0, '0', '0', '0', '0', '0', '1', '1', '0000000000', '000000000', '0', 0, NULL, NULL, NULL, NULL, NULL, 0, '1_id'),
(4, '', '', '', '', 'pronoweb96@gmail.com', '', 1, 1, 0, NULL, 50000, 0, 0, 0, 'hr-155-38.hd-180-2.ch-878-70-64.lg-275-72', 'M', 'Benvenuto!', '1382253440', '1382419798', '0', '::1', '::1', 0, 0, 0, 3, 3, 3, '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'EVERYONE', '0', 100, 0, 0, '', 0, '0', 0, 0, '0', '0', '1', 0, '0', '0', '0', '0', '0', '1', '1', '0000000000', '000000000', '0', 0, NULL, NULL, NULL, NULL, NULL, 0, '101603210887905958751'),
(5, 'Test', 'Account5', '', '4e0b8f1acdfe536a32d863aa949ca1d06e46aa56', 'pronoweb96@gmail.com', '', 6, 1, 0, NULL, 50000, 0, 0, 0, 'hr-165-31.hd-180-2.ch-878-62-62.lg-270-62.sh-295-62.fa-1201', 'M', 'Benvenuto!', '1382419638', '1382419638', '0', '::1', '::1', 0, 0, 0, 3, 3, 3, '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'EVERYONE', '0', 100, 0, 0, '', 0, '0', 0, 0, '0', '0', '1', 0, '0', '0', '0', '0', '0', '1', '1', '0000000000', '000000000', '0', 0, NULL, NULL, NULL, NULL, NULL, 0, '1_id'),
(6, 'Test', 'Account4', '', '4e0b8f1acdfe536a32d863aa949ca1d06e46aa56', 'pronoweb96@gmail.com', '', 6, 1, 0, NULL, 50000, 0, 0, 0, 'hr-679-36.hd-209-3.ch-235-62.lg-275-82.sh-295-82.ha-1009-82.ea-1401-81.fa-1201.wa-3211-82-62', 'M', 'Benvenuto!', '1382419798', '1382443475', '0', '::1', '::1', 0, 0, 0, 3, 3, 3, '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'EVERYONE', '0', 100, 0, 0, '', 0, '0', 0, 0, '0', '0', '1', 0, '0', '0', '0', '0', '0', '1', '1', '0000000000', '000000000', '0', 0, NULL, NULL, NULL, NULL, NULL, 0, '1_id'),
(9, 'Test', 'Account3', '', '4e0b8f1acdfe536a32d863aa949ca1d06e46aa56', 'pronoweb96@gmail.com', '', 6, 1, 0, NULL, 50000, 0, 0, 0, 'hd-180-2.lg-285-81.hr-828-42.sh-290-90.ch-215-92', 'M', 'Benvenuto!', '1382530855', '1382530855', '0', '::1', '::1', 0, 0, 0, 3, 3, 3, '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'EVERYONE', '0', 100, 0, 0, '', 0, '0', 0, 0, '0', '0', '1', 0, '0', '0', '0', '0', '0', '1', '1', '0000000000', '000000000', '0', 0, NULL, NULL, NULL, NULL, NULL, 0, '101603210887905958751'),
(10, 'Test', 'Account2', '', '9539963e973f4be0e2c5a18ba87766ffe183d727', 'pronoweb96@gmail.com', '', 6, 1, 0, NULL, 50000, 0, 0, 0, 'hd-180-2.lg-285-81.hr-828-42.sh-290-90.ch-215-92', 'M', 'Benvenuto!', '1382531083', '1491752058', '0', '::1', '::1', 0, 0, 0, 3, 3, 3, '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'EVERYONE', '0', 100, 0, 0, '', 0, '0', 0, 0, '0', '0', '1', 0, '0', '0', '0', '0', '0', '1', '1', '0000000000', '000000000', '0', 0, NULL, NULL, NULL, NULL, NULL, 0, '101603210887905958751'),
(14, 'Account', 'Test2', '', '9539963e973f4be0e2c5a18ba87766ffe183d727', 'admin@lv6.com', '', 6, 1, 0, NULL, 50000, 0, 0, 0, 'hd-180-2.lg-285-81.hr-828-42.sh-290-90.ch-215-92', 'M', 'Benvenuto!', '1382531248', '1495731855', '0', '::1', '::1', 0, 0, 0, 3, 3, 3, '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'EVERYONE', '0', 100, 0, 0, '', 0, '0', 0, 0, '0', '0', '1', 0, '0', '0', '0', '0', '0', '1', '1', '0000000000', '000000000', '0', 0, NULL, NULL, NULL, NULL, NULL, 0, '14_id'),
(15, 'Super Admin', 'Account', '', '9539963e973f4be0e2c5a18ba87766ffe183d727', 'super@admin.com', '', 7, 1, 0, NULL, 50000, 0, 0, 0, 'hd-180-2.lg-285-81.hr-828-42.sh-290-90.ch-215-92', 'M', 'Benvenuto!', '1479450248', '1495714958', '0', '::1', '::1', 0, 0, 0, 3, 3, 3, '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'EVERYONE', '0', 100, 0, 0, '', 0, '0', 0, 0, '0', '0', '1', 0, '0', '0', '0', '0', '0', '1', '1', '0000000000', '000000000', '0', 0, NULL, NULL, NULL, NULL, NULL, 0, '15_id'),
(16, 'Account', 'Test1', '', '9539963e973f4be0e2c5a18ba87766ffe183d727', 'admin@lv5.com', '', 5, 1, 0, NULL, 50000, 0, 0, 0, 'hd-180-2.lg-285-81.hr-828-42.sh-290-90.ch-215-92', 'M', 'Benvenuto!', '1479450248', '1495690198', '0', '::1', '::1', 0, 0, 0, 3, 3, 3, '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'EVERYONE', '0', 100, 0, 0, '', 0, '0', 0, 0, '0', '0', '1', 0, '0', '0', '0', '0', '0', '1', '1', '0000000000', '000000000', '0', 0, NULL, NULL, NULL, NULL, NULL, 0, '16_id');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `UserId` int(11) NOT NULL,
  `GroupId` int(11) NOT NULL,
  `GroupDate` varchar(100) NOT NULL,
  `Rank` int(11) NOT NULL DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `bans` int(11) NOT NULL DEFAULT '0',
  `cautions` int(11) NOT NULL DEFAULT '0',
  `reg_timestamp` double NOT NULL DEFAULT '0',
  `login_timestamp` double NOT NULL DEFAULT '0',
  `cfhs` int(11) NOT NULL DEFAULT '0',
  `cfhs_abusive` int(11) NOT NULL DEFAULT '0',
  `home_show` enum('0','1') NOT NULL DEFAULT '1',
  `online_show` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `bans`, `cautions`, `reg_timestamp`, `login_timestamp`, `cfhs`, `cfhs_abusive`, `home_show`, `online_show`) VALUES
(1, 0, 0, 1371792625, 1382727634, 0, 0, '1', '0'),
(2, 0, 0, 1371927198, 0, 0, 0, '1', '1'),
(3, 0, 0, 1382253027, 0, 0, 0, '1', '1'),
(4, 0, 0, 1382253440, 0, 0, 0, '1', '1'),
(5, 0, 0, 1382419638, 0, 0, 0, '1', '1'),
(6, 0, 0, 1382419798, 0, 0, 0, '1', '1'),
(7, 0, 0, 1382530512, 0, 0, 0, '1', '1'),
(8, 0, 0, 1382530697, 0, 0, 0, '1', '1'),
(9, 0, 0, 1382530855, 0, 0, 0, '1', '1'),
(10, 0, 0, 1382531083, 0, 0, 0, '1', '1'),
(11, 0, 0, 1382531248, 0, 0, 0, '1', '1'),
(12, 0, 0, 1382531428, 0, 0, 0, '1', '1'),
(13, 0, 0, 1382531449, 0, 0, 0, '1', '1'),
(14, 0, 0, 1382531544, 0, 0, 0, '1', '1'),
(15, 0, 0, 1479450248, 0, 0, 0, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `userid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`userid`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `user_rankings`
--

CREATE TABLE `user_rankings` (
  `userid` int(10) NOT NULL,
  `type` varchar(1000) NOT NULL DEFAULT 'competitions',
  `information` varchar(1000) NOT NULL,
  `achievement_id` int(2) UNSIGNED NOT NULL,
  `roomid` int(255) NOT NULL DEFAULT '0',
  `score` int(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_stats`
--

CREATE TABLE `user_stats` (
  `id` int(7) NOT NULL,
  `RoomVisits` int(7) NOT NULL DEFAULT '0',
  `OnlineTime` int(7) NOT NULL DEFAULT '0',
  `Respect` int(6) NOT NULL DEFAULT '0',
  `RespectGiven` int(6) NOT NULL DEFAULT '0',
  `GiftsGiven` int(6) NOT NULL DEFAULT '0',
  `GiftsReceived` int(6) NOT NULL DEFAULT '0',
  `DailyRespectPoints` int(1) NOT NULL DEFAULT '3',
  `DailyPetRespectPoints` int(1) NOT NULL DEFAULT '3',
  `AchievementScore` int(7) NOT NULL DEFAULT '0',
  `quest_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `quest_progress` int(10) NOT NULL DEFAULT '0',
  `lev_builder` int(10) NOT NULL DEFAULT '0',
  `lev_social` int(10) NOT NULL DEFAULT '0',
  `lev_identity` int(10) NOT NULL DEFAULT '0',
  `lev_explore` int(10) NOT NULL DEFAULT '0',
  `groupid` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_stats`
--

INSERT INTO `user_stats` (`id`, `RoomVisits`, `OnlineTime`, `Respect`, `RespectGiven`, `GiftsGiven`, `GiftsReceived`, `DailyRespectPoints`, `DailyPetRespectPoints`, `AchievementScore`, `quest_id`, `quest_progress`, `lev_builder`, `lev_social`, `lev_identity`, `lev_explore`, `groupid`) VALUES
(1, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `bans`
--
ALTER TABLE `bans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bans_appeals`
--
ALTER TABLE `bans_appeals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ban_id` (`ban_id`) USING BTREE;

--
-- Indexes for table `city_report`
--
ALTER TABLE `city_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_report-backup`
--
ALTER TABLE `city_report-backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_alert`
--
ALTER TABLE `cms_alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_help`
--
ALTER TABLE `cms_help`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`username`);

--
-- Indexes for table `cms_ratings`
--
ALTER TABLE `cms_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_reset`
--
ALTER TABLE `cms_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_banned`
--
ALTER TABLE `country_banned`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country` (`country`);

--
-- Indexes for table `country_sites`
--
ALTER TABLE `country_sites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `faq_theme`
--
ALTER TABLE `faq_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hk_board`
--
ALTER TABLE `hk_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipn_requests`
--
ALTER TABLE `ipn_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_cache`
--
ALTER TABLE `ip_cache`
  ADD PRIMARY KEY (`ip`),
  ADD UNIQUE KEY `ip` (`ip`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_refer`
--
ALTER TABLE `request_refer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sector_refer`
--
ALTER TABLE `sector_refer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stafflog`
--
ALTER TABLE `stafflog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stafflogs`
--
ALTER TABLE `stafflogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_bios`
--
ALTER TABLE `staff_bios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_logs`
--
ALTER TABLE `staff_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_config`
--
ALTER TABLE `system_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_log`
--
ALTER TABLE `system_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_notify`
--
ALTER TABLE `system_notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_stafflog`
--
ALTER TABLE `system_stafflog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_refer`
--
ALTER TABLE `type_refer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typology`
--
ALTER TABLE `typology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`) USING HASH;

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `userid` (`user_id`) USING BTREE;

--
-- Indexes for table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid` (`userid`) USING HASH;

--
-- Indexes for table `user_stats`
--
ALTER TABLE `user_stats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `bans`
--
ALTER TABLE `bans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bans_appeals`
--
ALTER TABLE `bans_appeals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `city_report`
--
ALTER TABLE `city_report`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `city_report-backup`
--
ALTER TABLE `city_report-backup`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `cms_alert`
--
ALTER TABLE `cms_alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `cms_help`
--
ALTER TABLE `cms_help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_ratings`
--
ALTER TABLE `cms_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_reset`
--
ALTER TABLE `cms_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `country_banned`
--
ALTER TABLE `country_banned`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country_sites`
--
ALTER TABLE `country_sites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `faq_theme`
--
ALTER TABLE `faq_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `hk_board`
--
ALTER TABLE `hk_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ipn_requests`
--
ALTER TABLE `ipn_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9002;
--
-- AUTO_INCREMENT for table `request_refer`
--
ALTER TABLE `request_refer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `sector_refer`
--
ALTER TABLE `sector_refer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `stafflogs`
--
ALTER TABLE `stafflogs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff_logs`
--
ALTER TABLE `staff_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `system_config`
--
ALTER TABLE `system_config`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `system_log`
--
ALTER TABLE `system_log`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `system_notify`
--
ALTER TABLE `system_notify`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `system_stafflog`
--
ALTER TABLE `system_stafflog`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `type_refer`
--
ALTER TABLE `type_refer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `typology`
--
ALTER TABLE `typology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
