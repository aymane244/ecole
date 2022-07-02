-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 02 juil. 2022 à 17:25
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `abs_id` int(11) NOT NULL,
  `abs_etudiant` int(11) NOT NULL,
  `abs_date` date NOT NULL,
  `abs_formation` int(11) NOT NULL,
  `abs_matiere` int(11) NOT NULL,
  `abs_absence` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`abs_id`, `abs_etudiant`, `abs_date`, `abs_formation`, `abs_matiere`, `abs_absence`) VALUES
(10, 127, '2022-03-10', 2, 5, 'Présent'),
(17, 90, '2022-04-20', 2, 5, 'Absent'),
(21, 90, '2022-04-12', 2, 5, 'Absent'),
(25, 90, '2022-04-11', 2, 5, 'Absent'),
(32, 127, '2022-04-05', 2, 69, 'Absent'),
(35, 134, '2022-06-20', 2, 5, 'Présent'),
(36, 134, '2022-06-21', 2, 5, 'Absent');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `adm_prenom` varchar(50) NOT NULL,
  `adm_nom` varchar(50) NOT NULL,
  `adm_email` varchar(50) NOT NULL,
  `adm_password` varchar(50) NOT NULL,
  `adm_image` varchar(100) NOT NULL,
  `adm_registre` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_prenom`, `adm_nom`, `adm_email`, `adm_password`, `adm_image`, `adm_registre`) VALUES
(2, 'Aymane', 'Chnaif', 'a.chnaif2010@gmail.com', 'ab4f63f9ac65152575886860dde480a1', './images/admin/', '2022-07-01');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `art_id` int(11) NOT NULL,
  `art_titre` varchar(200) NOT NULL,
  `art_titre_arab` varchar(200) NOT NULL,
  `art_texte` text NOT NULL,
  `art_texte_arab` text NOT NULL,
  `art_image` varchar(200) NOT NULL,
  `art_ajout` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`art_id`, `art_titre`, `art_titre_arab`, `art_texte`, `art_texte_arab`, `art_image`, `art_ajout`) VALUES
(1, 'Parentologie : comment les parents se sont transformés en communicants de crise', 'علم الوالدين: كيف تحول الآباء إلى متصلين بالأزمات', '<p>Il y a deux ans, on a d&eacute;j&agrave; d&ucirc; faire assaut de p&eacute;dagogie pour expliquer ce qu&rsquo;&eacute;tait le Covid-19. La premi&egrave;re difficult&eacute;, c&rsquo;est que l&rsquo;adulte, cens&eacute; incarner un savoir sans limite, est souvent lui-m&ecirc;me compl&egrave;tement largu&eacute;. A la simple question &laquo; qu&rsquo;est-ce qu&rsquo;un virus ? &raquo;, il lui faut, dans la majorit&eacute; des cas, foncer en douce sur Wikip&eacute;dia pour pouvoir ensuite ass&eacute;ner d&rsquo;un ton docte : &laquo; Un virus est un agent infectieux n&eacute;cessitant un h&ocirc;te, souvent une cellule, dont les constituants et le m&eacute;tabolisme d&eacute;clenchent la r&eacute;plication. &raquo; Puis, son enfant haussant un sourcil en signe d&rsquo;incompr&eacute;hension, l&rsquo;adulte devra entreprendre de traduire ce jargon comme il peut, en utilisant pourquoi pas des images mentales, des sch&eacute;mas, ou encore le pouvoir didactique de la mie de pain, en une sorte de remake domestique de l&rsquo;&eacute;mission &laquo; C&rsquo;est pas sorcier &raquo;.</p>\r\n', 'قبل عامين ، كان علينا بالفعل القيام بهجوم تربوي لشرح ماهية Covid-19. تتمثل الصعوبة الأولى في أن البالغ ، الذي من المفترض أن يجسد معرفة غير محدودة ، غالبًا ما يتم إسقاطه تمامًا. على السؤال البسيط \"ما هو الفيروس؟\" \"، من الضروري بالنسبة له ، في معظم الحالات ، الاستعجال على ويكيبيديا حتى يتمكن بعد ذلك من الضرب بنبرة مكتسبة:\" الفيروس عامل معدي يتطلب مضيفًا ، غالبًا خلية ، مكوناته وعملية الأيض التي تؤدي إلى التكاثر. بعد ذلك ، يرفع طفله حاجبًا كعلامة لعدم الفهم ، سيتعين على الشخص البالغ أن يترجم هذه المصطلحات على أفضل وجه ممكن ، فلماذا لا يستخدم الصور الذهنية أو المخططات أو حتى القوة التعليمية لفتات الخبز ، في نوع ما من النسخة المحلية من العرض \"إنه ليس علم الصواريخ\".', './images/etudiants/logo.jpeg', '2022-02-05'),
(2, 'Dans les supermarchés, les prix vont augmenter d’au moins 3 % sur 2022', 'في محلات السوبر ماركت ، سترتفع الأسعار بنسبة 3٪ على الأقل في عام 2022', 'Selon le gouvernement, certaines négociations se sont finalement achevées mercredi à 8 heures. A ce jour, le taux de signature des contrats dépasse les 80 % dans la plupart des enseignes, à une ou deux exceptions près. Dans les cas les plus conflictuels, le médiateur est saisi et une soixantaine de médiations sont en cours. Même s’il faudra attendre fin mars pour avoir une image claire des résultats, des tendances se dessinent d’ores et déjà.\n\nTout d’abord, les prix des produits alimentaires sont, globalement, en hausse, alors que ceux des produits d’hygiène, de beauté et d’entretien sont, eux, en déflation ou stables. Une conséquence directe de la loi EGalim 2, qui sanctuarise la part agricole dans les produits alimentaires. Les enseignes tentent ainsi de limiter l’inflation du panier de courses du consommateur en se rattrapant sur le non-alimentaire.', 'وفقا للحكومة ، تم الانتهاء أخيرا من بعض المفاوضات يوم الأربعاء في الساعة 8 صباحا. حتى الآن ، تجاوز معدل توقيع العقد 80٪ في معظم العلامات التجارية ، مع استثناء واحد أو اثنين. في الحالات الأكثر تضاربًا ، يتم الاتصال بالوسيط وحوالي ستين عملية وساطة جارية. حتى لو اضطررنا إلى الانتظار حتى نهاية شهر مارس للحصول على صورة واضحة للنتائج ، فإن الاتجاهات بدأت بالفعل في الظهور.  بادئ ذي بدء ، أسعار المنتجات الغذائية بشكل عام آخذة في الارتفاع ، في حين أن أسعار منتجات النظافة والجمال والصيانة في حالة انكماش أو مستقرة. نتيجة مباشرة لقانون EGalim 2 ، الذي يحمي الحصة الزراعية في المنتجات الغذائية. وبالتالي تحاول العلامات التجارية الحد من تضخم سلة تسوق المستهلك من خلال اللحاق بالمواد غير الغذائية.', './images/etudiants/téléchar.jfif', '2022-02-05'),
(6, 'Nouveau article', 'مقال جديد', '<p>Article nouveau</p>\r\n', '<p>مقال جديد</p>\r\n', './images/articles/630.jpg', '2022-03-22');

-- --------------------------------------------------------

--
-- Structure de la table `attestation`
--

CREATE TABLE `attestation` (
  `att_id` int(11) NOT NULL,
  `att_etudiant` int(11) NOT NULL,
  `att_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `com_id` int(11) NOT NULL,
  `com_nom` varchar(200) CHARACTER SET utf8 NOT NULL,
  `com_prenom` varchar(200) CHARACTER SET utf8 NOT NULL,
  `com_comentaire` text CHARACTER SET utf8 NOT NULL,
  `com_article` int(11) NOT NULL,
  `com_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`com_id`, `com_nom`, `com_prenom`, `com_comentaire`, `com_article`, `com_time`) VALUES
(1, 'Chammi', 'Achraf', 'Salut c\'est mon premier commentaire', 1, '2022-02-15'),
(2, 'Zghlouli', 'Mourad', 'Salut c\'est mon deuxième commentaire', 2, '2022-02-15'),
(23, 'Chnaif', 'Aimane', 'Hello c\'est un commentaire', 1, '2022-03-05'),
(24, 'Aimane', 'Chnaif', 'On présente', 1, '2022-03-05'),
(25, 'Chnaif', 'Aimane', 'un commentaire', 6, '2022-03-26'),
(28, 'Chnaif', 'Aimane', 'hello xorld', 6, '2022-04-21'),
(29, 'Chnaif', 'Aimane', 'hello world', 6, '2022-04-21'),
(30, 'Chnaif', 'Aimane', 'hello world comment', 6, '2022-04-21'),
(32, 'Chnaif', 'Aimane', 'wcwxcwxc', 6, '2022-04-21'),
(33, 'Chnaif', 'Aimane', 'cccoioicoicoci', 6, '2022-04-21'),
(34, 'Chnaif', 'Aimane', 'hello worldncncncncnc', 6, '2022-04-21'),
(35, 'qsdqsd', 'Fah', 'qsdqsdqd', 6, '2022-04-21'),
(36, 'wxcwxc', ';wxc', 'wxcwxcwxc', 6, '2022-04-21'),
(37, 'wxcwxc', 'wxcwc', 'wxcwxcwx', 6, '2022-04-21'),
(39, 'ئءؤئءؤ', ',wxcw', 'ئءؤئءؤ', 6, '2022-04-21');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(11) NOT NULL,
  `con_nom` varchar(200) NOT NULL,
  `con_email` varchar(200) NOT NULL,
  `con_sujet` varchar(200) NOT NULL,
  `con_message` text NOT NULL,
  `con_envoie` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`con_id`, `con_nom`, `con_email`, `con_sujet`, `con_message`, `con_envoie`) VALUES
(11, 'Aimane', 'a.chnaif2010@gmail.com', 'Message test', 'Test', '2022-02-19'),
(12, 'Aimane', 'Chnaif', 'Test', 'Test message', '2022-02-20'),
(13, 'Aimane', 'Chnaif', 'Test', 'Test message', '2022-02-20'),
(33, 'aimane', 'a.chnaif2010@gmail.com', 'Reclamation', '', '2022-04-20'),
(36, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'wqsdqsd', 'wxcwxcwxcwxc', '2022-04-21'),
(37, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'xcvxcv', 'xcvxcvxcv', '2022-05-02'),
(38, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'xcvxcv', 'xcvxcvxcv', '2022-05-02'),
(39, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'xcvxcv', 'xcvxcvxcvxcv', '2022-05-02'),
(40, 'Aimane Chnaif', 'xcvxcv', 'xcvxcv', 'qsdqsdqsd', '2022-05-02'),
(41, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'wxcwxc', 'wxcwxcwxcwxcqsdazeaze', '2022-05-02'),
(42, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'Reclamation', 'wxcwxcwxcwxc', '2022-05-03'),
(43, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'wxcwxc', 'wxcwxcwxcwxcwxc', '2022-05-03'),
(44, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'Reclamationwxcwx', 'wxcwxcwxcwxcwxc', '2022-05-03'),
(45, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'Reclamation', 'hjklmljhgfdsq', '2022-05-03'),
(46, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'Reclamation', 'sdfgh,nbvcx', '2022-05-03'),
(47, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'vbn,', 'sdfghjk', '2022-05-03'),
(48, 'Aymane Chnaif', 'a.chnaif2010@gmail.com', 'bn,;', 'dfghj,nbvcx', '2022-05-03'),
(49, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'Reclamation', 'qsdfghj,nbvcx', '2022-05-03'),
(50, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'a.chnaif2010@gmail.com', 'wXWXWxWXWx', '2022-05-04'),
(51, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'Reclamation', 'XWxWxWXWxW', '2022-05-04');

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE `diplome` (
  `dip_id` int(11) NOT NULL,
  `dip_etudiant` int(11) NOT NULL,
  `dip_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `douane`
--

CREATE TABLE `douane` (
  `dou_id` int(11) NOT NULL,
  `dou_nom` varchar(200) NOT NULL,
  `dou_res_nom` varchar(200) NOT NULL,
  `dou_res_email` varchar(200) NOT NULL,
  `dou_res_message` text NOT NULL,
  `dou_res_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `etud_id` int(11) NOT NULL,
  `etud_nom` varchar(200) NOT NULL,
  `etud_nom_arab` varchar(200) NOT NULL,
  `etud_prenom` varchar(200) NOT NULL,
  `etud_prenom_arabe` varchar(200) NOT NULL,
  `etud_email` varchar(200) NOT NULL,
  `etud_telephone` varchar(200) NOT NULL,
  `etud_motdepasse` varchar(200) NOT NULL,
  `etud_cin` varchar(200) NOT NULL,
  `etud_formation` int(11) NOT NULL,
  `etud_naissance` date NOT NULL,
  `etud_lieu_naissance` varchar(50) NOT NULL,
  `etud_adress` varchar(200) NOT NULL,
  `etud_permis` varchar(200) NOT NULL,
  `etud_cat_permis` varchar(200) NOT NULL,
  `etude_carte_pro` varchar(200) NOT NULL,
  `etud_permis_obt` date NOT NULL DEFAULT current_timestamp(),
  `etud_scan_cin` varchar(200) NOT NULL,
  `etud_cin_name` varchar(100) NOT NULL,
  `etud_scan_permis` varchar(200) NOT NULL,
  `etud_permis_name` varchar(100) NOT NULL,
  `etud_scan_visite` varchar(200) NOT NULL,
  `etud_visite_name` varchar(100) NOT NULL,
  `etud_promos` int(11) DEFAULT NULL,
  `etud_image` varchar(500) NOT NULL,
  `etud_inscription` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`etud_id`, `etud_nom`, `etud_nom_arab`, `etud_prenom`, `etud_prenom_arabe`, `etud_email`, `etud_telephone`, `etud_motdepasse`, `etud_cin`, `etud_formation`, `etud_naissance`, `etud_lieu_naissance`, `etud_adress`, `etud_permis`, `etud_cat_permis`, `etude_carte_pro`, `etud_permis_obt`, `etud_scan_cin`, `etud_cin_name`, `etud_scan_permis`, `etud_permis_name`, `etud_scan_visite`, `etud_visite_name`, `etud_promos`, `etud_image`, `etud_inscription`) VALUES
(90, 'Aboussabr', '', 'Othmane', '', 'aboussabryanina@gmail.com', '0606118291', '25f9e794323b453885f5181f1b624d0b', 'G621097', 2, '1991-11-26', '', '', '', '', 'azertyuiop', '2022-04-13', '', '', '', '', '', '', 1, './images/etudiants/IMG_20191229_020502_262.jpg', '2022-02-01'),
(127, 'Aboussabr', '', 'Othmane', '', 'aboussabryanina@gmail.com', '0606118291', '25f9e794323b453885f5181f1b624d0b', 'G621097', 2, '1991-11-26', '', '', '', '', '123456789', '2022-04-13', '', '', '', '', '', '', 1, './images/etudiants/IMG_20191229_020502_262.jpg', '2022-02-01'),
(128, 'Chnaif', 'اشنايف', 'Aimane', 'أيمن', 'a.chnaif2010@gmail.com', '0644776612', 'ab4f63f9ac65152575886860dde480a1', 'G621092', 1, '1991-11-26', 'Kénitra', 'Riad Ahlan', 'GH67688', 'B', '', '2015-06-29', './dossiers-stagiaires/Aimane-Chnaif/cin-Cahier des charges.pdf', 'cin-Cahier des charges.pdf', './dossiers-stagiaires/Aimane-Chnaif/permis-null (1).pdf', '', './dossiers-stagiaires/Aimane-Chnaif/visite-CV Aimane chnaif.pdf', '', 5, './dossiers-stagiaires/Aimane-Chnaif/image-IMG_20191229_020502_262.jpg', '2022-06-23'),
(132, 'Metaab', 'متعب', 'Imad', 'عماد', 'imad@gmail.com', '0644776612', 'ab4f63f9ac65152575886860dde480a1', 'Y78990', 1, '1997-08-11', 'Tanger', 'Residence AL Houda', 'TH66667', 'B', '', '2022-06-13', './dossiers-stagiaires/Imad-Metaab/cin-Cahier des charges.pdf', 'cin-Cahier des charges.pdf', './dossiers-stagiaires/Imad-Metaab/permis-Liste des informations.pdf', 'permis-Liste des informations.pdf', './dossiers-stagiaires/Imad-Metaab/visite-Cahier des charges.pdf', 'visite-Cahier des charges.pdf', 5, './dossiers-stagiaires/Imad-Metaab/image-Logo ARTL.jpeg', '2022-06-23'),
(134, 'Chnaif', 'اشنايف', 'Aimane', 'أيمن', 'a.chnaif2010@gmail.com', '0644776612', 'ab4f63f9ac65152575886860dde480a1', 'G621092', 2, '1991-11-26', 'Kénitra', 'Riad Ahlan', 'GH67688', 'B', '234567', '2015-06-29', './dossiers-stagiaires/Aimane-Chnaif/cin-Cahier des charges.pdf', 'cin-Cahier des charges.pdf', './dossiers-stagiaires/Aimane-Chnaif/permis-null (1).pdf', 'permis-null (1).pdf', './dossiers-stagiaires/Aimane-Chnaif/visite-CV Aimane chnaif.pdf', 'visite-CV Aimane chnaif.pdf', 3, './dossiers-stagiaires/Aimane-Chnaif/image-IMG_20191229_020502_262.jpg', '2022-06-27'),
(135, 'Bou', 'بو', 'Hicham', 'هشام', 'hicham@gmail.com', '0644776612', 'ab4f63f9ac65152575886860dde480a1', 'L676543', 1, '1998-08-12', 'Tanger', 'HAY AHLAN', 'HY76543', 'B', '', '2022-06-23', './dossiers-stagiaires/Hicham-Bou/cin-CV Aimane chnaif.pdf', 'cin-CV Aimane chnaif.pdf', './dossiers-stagiaires/Hicham-Bou/permis-CV Aimane chnaif.pdf', 'permis-CV Aimane chnaif.pdf', './dossiers-stagiaires/Hicham-Bou/visite-CV Aimane chnaif.pdf', 'visite-CV Aimane chnaif.pdf', 5, './dossiers-stagiaires/Hicham-Bou/image-', '2022-07-01');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `for_id` int(11) NOT NULL,
  `for_nom` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `for_nom_arab` varchar(200) NOT NULL,
  `for_pres` varchar(200) NOT NULL,
  `for_pres_arab` varchar(200) NOT NULL,
  `for_descr` text NOT NULL,
  `for_desc_arab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`for_id`, `for_nom`, `for_nom_arab`, `for_pres`, `for_pres_arab`, `for_descr`, `for_desc_arab`) VALUES
(1, 'Formation Qualifiante Initiale Minimum Obligatoire (FQIMO) des conducteurs professionnels', 'الحد الأدنى الإلزامي من تدريب التأهيل الأولي للسائقين المحترفين (FQIMO)', '<p><strong>Formation pour toute personne </strong>int&eacute;ress&eacute;e d&#39;avoir un permis de conduite professionnel des grands camions et petit</p>\r\n', '<p>تدريب أي شخص مهتم بالحصول على رخصة قيادة شاحنة مهنية بالنسبة للشاحنات الكبرى والصغرى</p>\r\n', '<p>Tout conducteur de v&eacute;hicule de transport de marchandises dont le poids total autoris&eacute; en charge (PTAC) exc&egrave;de 3,5 tonnes doit avoir satisfait, pr&eacute;alablement &agrave; l&rsquo;exercice de son activit&eacute; de conduite, &agrave; une obligation de qualification initiale. Cette qualification initiale est obtenue &agrave; l&rsquo;issue d&rsquo;une formation professionnelle qui peut &ecirc;tre longue ou acc&eacute;l&eacute;r&eacute;e. La qualification initiale peut &ecirc;tre obtenue &agrave; l&rsquo;issue d&rsquo;une formation professionnelle longue de 280 heures minimum, sanctionn&eacute;e par l&rsquo;obtention d&rsquo;un titre professionnel de conduite routi&egrave;re ou d&rsquo;un dipl&ocirc;me de niveau V de conducteur routier. Sont ainsi vis&eacute;s :</p>\r\n\r\n<p>- le Certificat d&rsquo;Aptitude Professionnelle (CAP) conducteur routier de marchandises,</p>\r\n\r\n<p>- le Brevet d&rsquo;&Eacute;tudes Professionnelles (BEP) conduite et services dans le transport routier,</p>\r\n\r\n<p>- le titre professionnel de Conducteur du Transport Routier de Marchandises sur tous V&eacute;hicules (CTRMV) d&eacute;livr&eacute; par le Ministre charg&eacute; de l&rsquo;emploi et de la formation professionnelle, - le titre professionnel de Conducteur du Transport Routier de Marchandises sur Porteur (CTRMP) d&eacute;livr&eacute; par le Ministre charg&eacute; de l&rsquo;emploi et de la formation professionnelle.</p>\r\n\r\n<p>L&rsquo;obtention de l&rsquo;un de ces titres ou dipl&ocirc;mes permet &agrave; son titulaire de conduire, d&egrave;s l&rsquo;&acirc;ge de 18 ans, les v&eacute;hicules pour lesquels un permis de conduire des cat&eacute;gories C ou EC est requis. Au vu du dipl&ocirc;me ou du titre professionnel, le pr&eacute;fet du d&eacute;partement dans lequel a &eacute;t&eacute; d&eacute;livr&eacute; le titre ou le dipl&ocirc;me, d&eacute;livre au conducteur, apr&egrave;s avoir v&eacute;rifi&eacute; la validit&eacute; de son permis de conduire, une carte de qualification de conducteur (mod&egrave;le &agrave; para&icirc;tre prochainement). Cette carte doit &ecirc;tre renouvel&eacute;e tous les 5 ans apr&egrave;s chaque session de formation continue</p>\r\n', '<p>تدريب أي شخص مهتم بالحصول على رخصة قيادة شاحنة مهنية</p>\r\n'),
(2, 'Formation des conducteurs professionnels', 'تدريب السائقين المحترفين', 'Formation pour toute personne intéreseé d\'avoir un permis de conduite professionnel des camions', 'تدريب أي شخص مهتم بالحصول على رخصة قيادة شاحنة مهنية', 'Tout conducteur de véhicule de transport de marchandises dont le poids total autorisé en charge (PTAC) excède 3,5 tonnes doit avoir satisfait, préalablement à l’exercice de son activité de conduite, à une obligation de qualification initiale. Cette qualification initiale est\r\nobtenue à l’issue d’une formation professionnelle qui peut être longue ou accélérée. La qualification initiale peut être obtenue à l’issue d’une formation professionnelle longue de 280 heures minimum, sanctionnée par l’obtention d’un titre professionnel de conduite routière ou d’un diplôme de niveau V de conducteur routier.\r\nSont ainsi visés :\r\n- le Certificat d’Aptitude Professionnelle (CAP) conducteur routier de marchandises,\r\n- le Brevet d’Études Professionnelles (BEP) conduite et services dans le transport routier,\r\n- le titre professionnel de Conducteur du Transport Routier de Marchandises sur tous Véhicules (CTRMV) délivré par le Ministre chargé de l’emploi et de la \r\n   formation professionnelle,\r\n- le titre professionnel de Conducteur du Transport Routier de Marchandises sur Porteur (CTRMP) délivré par le Ministre chargé de l’emploi et de la \r\n   formation professionnelle.\r\n\r\nL’obtention de l’un de ces titres ou diplômes permet à son titulaire de conduire, dès l’âge de 18 ans, les véhicules pour lesquels un permis de conduire des catégories C ou EC est requis.\r\nAu vu du diplôme ou du titre professionnel, le préfet du département dans lequel a été délivré le titre ou le diplôme, délivre au conducteur, après avoir vérifié la validité de son permis de conduire, une carte de qualification de conducteur (modèle à paraître prochainement). Cette carte doit être renouvelée tous les 5 ans après chaque session de formation continue', 'تدريب أي شخص مهتم بالحصول على رخصة قيادة شاحنة مهنية'),
(10, 'Nouvelle Formation', 'تكوين جديد', '<p>C&#39;est une nouvelle formation</p>\r\n', '<p>تكوين جديد</p>\r\n', '<p>Une nouvelle formation</p>\r\n\r\n<p>Pour les &eacute;tudiants int&eacute;ress&eacute; de voyager &agrave; l&#39;&eacute;tranger pour continuer leurs &eacute;tudes.</p>\r\n', '<p>تكوين لصالح الطلبة المهتمين بالسفر إلى الخارج للدراسة</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `img_salle`
--

CREATE TABLE `img_salle` (
  `img_id` int(11) NOT NULL,
  `img_salle` int(11) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `img2` varchar(200) NOT NULL,
  `img3` varchar(200) NOT NULL,
  `img4` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `img_salle`
--

INSERT INTO `img_salle` (`img_id`, `img_salle`, `img1`, `img2`, `img3`, `img4`) VALUES
(4, 1, './images/salles/salle1.jfif', './images/salles/salle2.jpg', './images/salles/salle3.jfif', './images/salles/salle4.jfif'),
(7, 3, './images/salles/salle1.jpg', './images/salles/salle2.jfif', './images/salles/salle3.jpg', './images/salles/salle4.jfif'),
(8, 4, './images/salles/logo.png', './images/salles/location-salle-de-formation.jpg', './images/salles/location-salle-de-formation.jpg', './images/salles/location-salle-de-formation.jpg'),
(9, 5, './images/salles/630.jpg', './images/salles/class_a.jpg', './images/salles/iso-9001.jpg', './images/salles/entropot.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `iso`
--

CREATE TABLE `iso` (
  `iso_id` int(11) NOT NULL,
  `iso_nom` varchar(200) NOT NULL,
  `iso_presentation` text NOT NULL,
  `iso_res_nom` varchar(200) NOT NULL,
  `iso_res_email` varchar(200) NOT NULL,
  `iso_res_message` text NOT NULL,
  `iso_res_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `mat_id` int(11) NOT NULL,
  `mat_formation` int(11) NOT NULL,
  `mat_nom` varchar(200) NOT NULL,
  `mat_nom_arab` varchar(200) NOT NULL,
  `mat_duree` int(11) NOT NULL,
  `mat_prof` varchar(200) NOT NULL,
  `mat_prof_arab` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`mat_id`, `mat_formation`, `mat_nom`, `mat_nom_arab`, `mat_duree`, `mat_prof`, `mat_prof_arab`) VALUES
(1, 1, 'Cours pratique', 'درس تطبيقي', 4, 'Hicham Louadi', 'هشام الوادي'),
(2, 1, 'Marketing', 'التسويق', 5, 'Yasmina Aboussabr', 'ياسمين أبوالصبر'),
(5, 2, 'Cours pratique', 'درس تطبيقي', 4, 'Abderahmane Bouhouch', 'عبدالرحمان بوحوش'),
(69, 2, 'Cours théorique', 'درس نظري', 3, 'Salim Guechich', 'سليم كشيش'),
(75, 10, 'Economie', 'الاقتصاد', 3, 'Jamal Bida', 'جمال بيدا'),
(76, 10, 'Comptabilité', 'المحاسبة', 3, 'Khaled Bessi', 'خالد بيسسي'),
(77, 1, 'Littérature Français', 'أدب فرنسي', 4, 'Salma Houma', 'سلمى حوما');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `not_id` int(11) NOT NULL,
  `not_formation` int(11) NOT NULL,
  `not_matiere` int(11) NOT NULL,
  `not_etudiant` int(11) NOT NULL,
  `not_note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`not_id`, `not_formation`, `not_matiere`, `not_etudiant`, `not_note`) VALUES
(82, 2, 5, 90, 10),
(83, 2, 69, 90, 10),
(84, 1, 1, 128, 11),
(85, 1, 2, 128, 14),
(86, 1, 77, 128, 11),
(87, 2, 5, 127, 12),
(88, 2, 69, 127, 14),
(89, 2, 5, 134, 8),
(90, 2, 69, 134, 7),
(91, 1, 1, 135, 10),
(92, 1, 2, 135, 10),
(93, 1, 77, 135, 10);

-- --------------------------------------------------------

--
-- Structure de la table `promos`
--

CREATE TABLE `promos` (
  `pro_id` int(11) NOT NULL,
  `pro_groupe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `promos`
--

INSERT INTO `promos` (`pro_id`, `pro_groupe`) VALUES
(1, '1'),
(3, '2'),
(4, '3'),
(5, '4');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `res_nom` varchar(200) NOT NULL,
  `res_telephone` varchar(200) NOT NULL,
  `res_email` varchar(200) NOT NULL,
  `res_salle` int(11) NOT NULL,
  `res_commentaire` varchar(200) NOT NULL,
  `res_date` date NOT NULL DEFAULT current_timestamp(),
  `time_debut` varchar(200) NOT NULL,
  `time_fin` varchar(200) NOT NULL,
  `res_ajout` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`res_id`, `res_nom`, `res_telephone`, `res_email`, `res_salle`, `res_commentaire`, `res_date`, `time_debut`, `time_fin`, `res_ajout`) VALUES
(12, 'Aimane Chnaif', '212644776612', 'a.chnaif2010@gmail.com', 4, 'Pas de commentaire', '2022-03-24', '08:00', '09:00', '2022-04-20'),
(13, 'Aimane', '212644776612', 'a.chnaif2010@gmail.com', 4, 'pas de commentaire', '2022-03-08', '08:00', '09:00', '2022-04-20'),
(14, 'Aimane Chnaif', '212644776612', 'a.chnaif2010@gmail.com', 4, 'pas de commentaire', '2022-03-25', '08:00', '10:00', '2022-04-20'),
(34, 'Aymane', '212644776612', 'a.chnaif2010@gmail.com', 4, 'salut', '2022-03-25', '11:00', '12:00', '2022-04-20'),
(35, 'Aymane', '212644776612', 'a.chnaif2010@gmail.com', 4, 'sd', '2022-03-31', '08:00', '09:00', '2022-04-20'),
(44, 'qsdqsd', '+212644776612', 'a.chnaif2010@gmail.com', 1, 'qsdqsd', '2022-04-28', '08:00', '09:00', '2022-04-20'),
(45, 'sdqsd', '+212644776612', 'a.chnaif2010@gmail.com', 1, 'wsdqsdqsd', '2022-04-27', '08:00', '09:00', '2022-04-20'),
(46, 'Aimane', '0644776612', 'a.chnaif2010@gmail.com', 1, 'hello', '2022-04-26', '11:00', '12:00', '2022-04-20'),
(47, 'Chnaif', '+212644776612', 'a.chnaif2010@gmail.com', 4, 'comm', '2022-04-28', '11:00', '12:00', '2022-04-21'),
(48, 'Chnaif', '+212644776612', 'a.chnaif2010@gmail.com', 4, 'lllllllll', '2022-04-28', '08:00', '09:00', '2022-04-21'),
(49, 'Aymane', 'Chnaif', 'a.chnaif2010@gmail.com', 1, 'Salut', '2022-06-20', '11:00', '12:00', '2022-06-17');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `sal_id` int(11) NOT NULL,
  `sal_nom` varchar(200) NOT NULL,
  `sal_nom_arab` varchar(200) NOT NULL,
  `sal_desc` text NOT NULL,
  `sal_desc_arab` varchar(200) NOT NULL,
  `sal_prix` float NOT NULL,
  `sal_personne` int(11) NOT NULL,
  `sal_image` varchar(200) NOT NULL,
  `sal_service` varchar(200) NOT NULL,
  `sal_service_arab` varchar(200) NOT NULL,
  `sal_service2` varchar(200) NOT NULL,
  `sal_service2_arab` varchar(200) NOT NULL,
  `sal_service3` varchar(200) NOT NULL,
  `sal_service3_arab` varchar(200) NOT NULL,
  `sal_service4` varchar(200) NOT NULL,
  `sal_service4_arab` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`sal_id`, `sal_nom`, `sal_nom_arab`, `sal_desc`, `sal_desc_arab`, `sal_prix`, `sal_personne`, `sal_image`, `sal_service`, `sal_service_arab`, `sal_service2`, `sal_service2_arab`, `sal_service3`, `sal_service3_arab`, `sal_service4`, `sal_service4_arab`) VALUES
(1, 'Salle 1', 'قاعة 1', '<p>Notre salle de formation est munie du wifi haute-vitesse, un projecteur, un paper board et ses accessoires, un microphone et des sonorisations. Tout est mis &agrave; votre disposition afin de vous permettre de r&eacute;aliser vos pr&eacute;sentations et vos projections, la salle de formation est aussi &eacute;quip&eacute;e d&rsquo;un syst&egrave;me audiovisuel de haute qualit&eacute; (Smart t&eacute;l&eacute;vision). La salle de&nbsp;</p>\r\n', '<p>قاعة 1</p>\r\n', 150, 20, './images/salles/location-salle-de-formation.jpg', 'Oridnateurs', 'حواسيب', 'Imprimante', 'آلة طباعة', 'Photocopieur', 'آلة نسخ', 'Restauration', 'أكل وجبة'),
(3, 'Salle 2', 'قاعة 2', '<p>Notre salle de formation est munie du wifi haute-vitesse, un projecteur, un paper board et ses accessoires, un microphone et des sonorisations. Tout est mis &agrave; votre disposition afin de vous permettre de r&eacute;aliser vos pr&eacute;sentations et vos projections, la salle de formation est aussi &eacute;quip&eacute;e d&rsquo;un syst&egrave;me audiovisuel de haute qualit&eacute; (Smart t&eacute;l&eacute;vision). La salle de formation est une salle ultramoderne, chic et &eacute;l&eacute;gante, facile d&rsquo;acc&egrave;s situ&eacute;e dans un endroit unique, &eacute;quip&eacute;e d&rsquo;une air climatis&eacute;e de premier ordre , d&rsquo;un ordinateur et de Multi-prises &eacute;lectriques. Notre salle de formation de Rabat est l&rsquo;endroit qu&rsquo;il faut pour vos formation &agrave; venir.</p>\r\n', '<p>قاعة 2</p>\r\n', 150, 20, './images/salles/salle.jfif', 'Oridnateurs', 'حواسيب', 'Imprimantes', 'آلة طباعة', 'Photocopieurs', 'آلة نسخ', 'Restauration', 'أكل وجبة'),
(4, 'Salle 3', 'قاعة 3', '<p>Notre salle de formation est munie du wifi haute-vitesse, un projecteur, un paper board et ses accessoires, un microphone et des sonorisations. Tout est mis &agrave; votre disposition afin de vous permettre de r&eacute;aliser vos pr&eacute;sentations et vos projections, la salle de formation est aussi &eacute;quip&eacute;e d&rsquo;un syst&egrave;me audiovisuel de haute qualit&eacute; (Smart t&eacute;l&eacute;vision). La salle de formation est une salle ultramoderne, chic et &eacute;l&eacute;gante, facile d&rsquo;acc&egrave;s situ&eacute;e dans un endroit unique, &eacute;quip&eacute;e d&rsquo;une air climatis&eacute;e de premier ordre , d&rsquo;un ordinateur et de Multi-prises &eacute;lectriques. Notre salle de formation de Rabat est l&rsquo;endroit qu&rsquo;il faut pour vos formation &agrave; venir.</p>\r\n', '<p>قاعة 3</p>\r\n', 150, 20, './images/salles/for.jfif', 'Oridnateurs', 'حواسيب', 'Imprimantes', 'آلة طباعة', 'Photocopieurs', 'آلة نسخ', 'Restauration', 'أكل وجبة'),
(5, 'Salle 4', 'قاعة 4', '<p>Notre salle de formation est munie du wifi haute-vitesse, un projecteur, un paper board et ses accessoires, un microphone et des sonorisations. Tout est mis &agrave; votre disposition afin de vous permettre de r&eacute;aliser vos pr&eacute;sentations et vos projections, la salle de formation est aussi &eacute;quip&eacute;e d&rsquo;un syst&egrave;me audiovisuel de haute qualit&eacute; (Smart t&eacute;l&eacute;vision). La salle de formation est une salle ultramoderne, chic et &eacute;l&eacute;gante, facile d&rsquo;acc&egrave;s situ&eacute;e dans un endroit unique, &eacute;quip&eacute;e d&rsquo;une air climatis&eacute;e de premier ordre , d&rsquo;un ordinateur et de Multi-prises &eacute;lectriques. Notre salle de formation de Rabat est l&rsquo;endroit qu&rsquo;il faut pour vos formation &agrave; venir.</p>\r\n', '<p>قاعة 4</p>\r\n', 220, 20, './images/salles/entropot.jpg', 'Oridnateurs', '', 'Imprimante', '', 'Photocopieur', '', 'Restauration', ''),
(8, 'wxcwxc', 'wxcwxc', '<p>wxcwxc</p>\r\n', '<p>wxcwxc123123</p>\r\n', 123123, 123, './images/salles/location-salle-de-formation.jpg', 'wxqsd', 'qsd', 'qsd', 'qsd', 'qsd', 'qsd', 'qsd', 'qsd'),
(9, 'qsdqsd', 'wxcwxc', '<p>Notre salle de formation est munie du wifi haute-vitesse, un projecteur, un paper board et ses accessoires, un microphone et des sonorisations. Tout est mis &agrave; votre disposition afin de vous permettre de r&eacute;aliser vos pr&eacute;sentations et vos projections, la salle de formation est aussi &eacute;quip&eacute;e d&rsquo;un syst&egrave;me audiovisuel de haute qualit&eacute; (Smart t&eacute;l&eacute;vision). La salle de&nbsp;</p>\r\n', '<p>wcwcwxc</p>\r\n', 31, 123, './images/salles/630.jpg', 'QSD', 'QSD', 'SDQSD', 'QSD', 'QSD', 'QSD', 'QSD', 'QSD');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`abs_id`),
  ADD KEY `absence` (`abs_formation`),
  ADD KEY `absence_etudiant` (`abs_etudiant`),
  ADD KEY `absence_matiere` (`abs_matiere`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`art_id`);

--
-- Index pour la table `attestation`
--
ALTER TABLE `attestation`
  ADD PRIMARY KEY (`att_id`),
  ADD KEY `attestation` (`att_etudiant`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `commetaires` (`com_article`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Index pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`dip_id`),
  ADD KEY `diplome` (`dip_etudiant`);

--
-- Index pour la table `douane`
--
ALTER TABLE `douane`
  ADD PRIMARY KEY (`dou_id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`etud_id`),
  ADD KEY `etud_form` (`etud_formation`),
  ADD KEY `etud_promos` (`etud_promos`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`for_id`);

--
-- Index pour la table `img_salle`
--
ALTER TABLE `img_salle`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `images` (`img_salle`);

--
-- Index pour la table `iso`
--
ALTER TABLE `iso`
  ADD PRIMARY KEY (`iso_id`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`mat_id`),
  ADD KEY `mat_forma` (`mat_formation`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`not_id`),
  ADD KEY `note_formation` (`not_formation`),
  ADD KEY `note_etudiant` (`not_etudiant`),
  ADD KEY `note_matiere` (`not_matiere`);

--
-- Index pour la table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`pro_id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `salles` (`res_salle`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`sal_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `abs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `attestation`
--
ALTER TABLE `attestation`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `dip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `douane`
--
ALTER TABLE `douane`
  MODIFY `dou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `etud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `for_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `img_salle`
--
ALTER TABLE `img_salle`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `iso`
--
ALTER TABLE `iso`
  MODIFY `iso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `promos`
--
ALTER TABLE `promos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence` FOREIGN KEY (`abs_formation`) REFERENCES `formation` (`for_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absence_etudiant` FOREIGN KEY (`abs_etudiant`) REFERENCES `etudiant` (`etud_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absence_matiere` FOREIGN KEY (`abs_matiere`) REFERENCES `matiere` (`mat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `attestation`
--
ALTER TABLE `attestation`
  ADD CONSTRAINT `attestation` FOREIGN KEY (`att_etudiant`) REFERENCES `etudiant` (`etud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commetaires` FOREIGN KEY (`com_article`) REFERENCES `article` (`art_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD CONSTRAINT `diplome` FOREIGN KEY (`dip_etudiant`) REFERENCES `etudiant` (`etud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etud_form` FOREIGN KEY (`etud_formation`) REFERENCES `formation` (`for_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etud_promos` FOREIGN KEY (`etud_promos`) REFERENCES `promos` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `img_salle`
--
ALTER TABLE `img_salle`
  ADD CONSTRAINT `images` FOREIGN KEY (`img_salle`) REFERENCES `salle` (`sal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `mat_forma` FOREIGN KEY (`mat_formation`) REFERENCES `formation` (`for_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_etudiant` FOREIGN KEY (`not_etudiant`) REFERENCES `etudiant` (`etud_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_formation` FOREIGN KEY (`not_formation`) REFERENCES `formation` (`for_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_matiere` FOREIGN KEY (`not_matiere`) REFERENCES `matiere` (`mat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `salles` FOREIGN KEY (`res_salle`) REFERENCES `salle` (`sal_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
