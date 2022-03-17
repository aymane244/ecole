-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 mars 2022 à 11:28
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
(2, 1, '2022-03-14', 1, 1, 'Présent'),
(3, 96, '2022-03-14', 1, 1, 'Présent'),
(4, 1, '2022-03-11', 1, 2, 'Absent'),
(5, 96, '2022-03-11', 1, 2, 'Présent'),
(6, 1, '2022-03-15', 1, 1, 'Absent'),
(7, 96, '2022-03-15', 1, 1, 'Absent'),
(8, 1, '2022-03-10', 1, 2, 'Absent'),
(9, 96, '2022-03-10', 1, 2, 'Absent');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `art_id` int(11) NOT NULL,
  `art_titre` varchar(200) NOT NULL,
  `art_texte` text NOT NULL,
  `art_image` varchar(200) NOT NULL,
  `art_ajout` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`art_id`, `art_titre`, `art_texte`, `art_image`, `art_ajout`) VALUES
(1, 'Parentologie : comment les parents se sont transformés en communicants de crise', 'Il y a deux ans, on a déjà dû faire assaut de pédagogie pour expliquer ce qu’était le Covid-19. La première difficulté, c’est que l’adulte, censé incarner un savoir sans limite, est souvent lui-même complètement largué. A la simple question « qu’est-ce qu’un virus ? », il lui faut, dans la majorité des cas, foncer en douce sur Wikipédia pour pouvoir ensuite asséner d’un ton docte : « Un virus est un agent infectieux nécessitant un hôte, souvent une cellule, dont les constituants et le métabolisme déclenchent la réplication. » Puis, son enfant haussant un sourcil en signe d’incompréhension, l’adulte devra entreprendre de traduire ce jargon comme il peut, en utilisant pourquoi pas des images mentales, des schémas, ou encore le pouvoir didactique de la mie de pain, en une sorte de remake domestique de l’émission « C’est pas sorcier ».', './images/etudiants/téléchargement.jfif', '2022-02-05'),
(2, 'Dans les supermarchés, les prix vont augmenter d’au moins 3 % sur 2022', 'Selon le gouvernement, certaines négociations se sont finalement achevées mercredi à 8 heures. A ce jour, le taux de signature des contrats dépasse les 80 % dans la plupart des enseignes, à une ou deux exceptions près. Dans les cas les plus conflictuels, le médiateur est saisi et une soixantaine de médiations sont en cours. Même s’il faudra attendre fin mars pour avoir une image claire des résultats, des tendances se dessinent d’ores et déjà.\r\n\r\nTout d’abord, les prix des produits alimentaires sont, globalement, en hausse, alors que ceux des produits d’hygiène, de beauté et d’entretien sont, eux, en déflation ou stables. Une conséquence directe de la loi EGalim 2, qui sanctuarise la part agricole dans les produits alimentaires. Les enseignes tentent ainsi de limiter l’inflation du panier de courses du consommateur en se rattrapant sur le non-alimentaire.', './images/etudiants/téléchar.jfif', '2022-02-05');

-- --------------------------------------------------------

--
-- Structure de la table `attestation`
--

CREATE TABLE `attestation` (
  `att_id` int(11) NOT NULL,
  `att_etudiant` int(11) NOT NULL,
  `att_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `attestation`
--

INSERT INTO `attestation` (`att_id`, `att_etudiant`, `att_image`) VALUES
(9, 1, '');

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
(24, 'Aimane', 'Chnaif', 'On présente', 1, '2022-03-05');

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
(13, 'Aimane', 'Chnaif', 'Test', 'Test message', '2022-02-20');

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE `diplome` (
  `dip_id` int(11) NOT NULL,
  `dip_etudiant` int(11) NOT NULL,
  `dip_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `diplome`
--

INSERT INTO `diplome` (`dip_id`, `dip_etudiant`, `dip_image`) VALUES
(13, 1, './demande/diplomes/Bac.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `douane`
--

CREATE TABLE `douane` (
  `dou_id` int(11) NOT NULL,
  `dou_nom` varchar(200) NOT NULL,
  `dou_res_nom` varchar(200) NOT NULL,
  `dou_res_email` varchar(200) NOT NULL,
  `dou_res_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `douane`
--

INSERT INTO `douane` (`dou_id`, `dou_nom`, `dou_res_nom`, `dou_res_email`, `dou_res_message`) VALUES
(4, 'Classe B', 'Aimane', 'a.chnaif2010@gmail.com', 'sqdqsdqsd');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `etud_id` int(11) NOT NULL,
  `etud_nom` varchar(200) NOT NULL,
  `etud_prenom` varchar(200) NOT NULL,
  `etud_email` varchar(200) NOT NULL,
  `etud_telephone` varchar(200) NOT NULL,
  `etud_motdepasse` varchar(200) NOT NULL,
  `etud_cin` varchar(200) NOT NULL,
  `etud_formation` int(11) NOT NULL,
  `etud_naissance` date NOT NULL,
  `etud_diplome` varchar(200) NOT NULL,
  `etud_promos` int(11) NOT NULL,
  `etud_image` varchar(500) NOT NULL,
  `etud_inscription` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`etud_id`, `etud_nom`, `etud_prenom`, `etud_email`, `etud_telephone`, `etud_motdepasse`, `etud_cin`, `etud_formation`, `etud_naissance`, `etud_diplome`, `etud_promos`, `etud_image`, `etud_inscription`) VALUES
(1, 'Chnaif', 'Aimane', 'a.chnaif2010@gmail.com', '0644776612', '25f9e794323b453885f5181f1b624d0b', 'G621092', 1, '1999-11-26', '', 1, './images/etudiants/DSC_27762.jpg', '2022-02-03'),
(90, 'Aboussabr', 'Othmane', 'aboussabryanina@gmail.com', '0606118291', '25f9e794323b453885f5181f1b624d0b', 'G621097', 2, '1991-11-26', '', 1, './images/etudiants/IMG_20191229_020502_262.jpg', '2022-02-01'),
(91, 'Souiri', 'Chaimae', 'chaimaesouiri8@gmail.com', '0659499427', '25f9e794323b453885f5181f1b624d0b', 'G621099', 2, '2001-02-11', '', 1, './images/etudiants/', '2022-02-04'),
(95, 'Aboussabr', 'Yasmina', 'q.chnaif@gmail.com', '+212644776612', '25f9e794323b453885f5181f1b624d0b', 'G111', 2, '1999-11-11', './diplomes/Accounting Certificate.pdf', 1, './images/etudiants/', '2022-03-04'),
(96, 'Chnaif', 'Ayoub', 'a.chnaif20hh10@gmail.com', '655778899', '25f9e794323b453885f5181f1b624d0b', 'G555', 1, '1999-11-11', './diplomes/Attestation 1001 Evasions.pdf', 1, './images/etudiants/', '2022-03-04'),
(97, 'Bendaoud', 'Mouad', 'mouad@gmail.com', '644776612', '25f9e794323b453885f5181f1b624d0b', 'G621090', 2, '2000-11-11', './diplomes/Certificat Udemey Allemand.pdf', 1, './images/etudiants/', '2022-03-05');

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
  `for_desc_arab` text NOT NULL,
  `for_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`for_id`, `for_nom`, `for_nom_arab`, `for_pres`, `for_pres_arab`, `for_descr`, `for_desc_arab`, `for_image`) VALUES
(1, 'Formation Qualifiante Initiale Minimum Obligatoire (FQIMO) des conducteurs professionnels', 'الحد الأدنى الإلزامي من تدريب التأهيل الأولي للسائقين \nالمحترفين (FQIMO)', 'Formation pour toute personne intéressée d\'avoir un permis de conduite professionnel des camions', 'تدريب أي شخص مهتم بالحصول على رخصة قيادة شاحنة مهنية', 'Tout conducteur de véhicule de transport de marchandises dont le poids total autorisé en charge (PTAC) excède 3,5 tonnes doit avoir satisfait, préalablement à l’exercice de son activité de conduite, à une obligation de qualification initiale. Cette qualification initiale est\nobtenue à l’issue d’une formation professionnelle qui peut être longue ou accélérée. La qualification initiale peut être obtenue à l’issue d’une formation professionnelle longue de 280 heures minimum, sanctionnée par l’obtention d’un titre professionnel de conduite routière ou d’un diplôme de niveau V de conducteur routier.\nSont ainsi visés :\n- le Certificat d’Aptitude Professionnelle (CAP) conducteur routier de marchandises,\n- le Brevet d’Études Professionnelles (BEP) conduite et services dans le transport routier,\n- le titre professionnel de Conducteur du Transport Routier de Marchandises sur tous Véhicules (CTRMV) délivré par le Ministre chargé de l’emploi et de la formation professionnelle,\n- le titre professionnel de Conducteur du Transport Routier de Marchandises sur Porteur (CTRMP) délivré par le Ministre chargé de l’emploi et de la  formation professionnelle.\nL’obtention de l’un de ces titres ou diplômes permet à son titulaire de conduire, dès l’âge de 18 ans, les véhicules pour lesquels un permis de conduire des catégories C ou EC est requis.\nAu vu du diplôme ou du titre professionnel, le préfet du département dans lequel a été délivré le titre ou le diplôme, délivre au conducteur, après avoir vérifié la validité de son permis de conduire, une carte de qualification de conducteur (modèle à paraître prochainement). Cette carte doit être renouvelée tous les 5 ans après chaque session de formation continue', 'تدريب أي شخص مهتم بالحصول على رخصة قيادة شاحنة مهنية', './images/etudiants/library.jpg'),
(2, 'Formation des conducteurs professionnels', 'تدريب السائقين المحترفين', 'Formation pour toute personne intéreseé d\'avoir un permis de conduite professionnel des camions', 'تدريب أي شخص مهتم بالحصول على رخصة قيادة شاحنة مهنية', 'Tout conducteur de véhicule de transport de marchandises dont le poids total autorisé en charge (PTAC) excède 3,5 tonnes doit avoir satisfait, préalablement à l’exercice de son activité de conduite, à une obligation de qualification initiale. Cette qualification initiale est\r\nobtenue à l’issue d’une formation professionnelle qui peut être longue ou accélérée. La qualification initiale peut être obtenue à l’issue d’une formation professionnelle longue de 280 heures minimum, sanctionnée par l’obtention d’un titre professionnel de conduite routière ou d’un diplôme de niveau V de conducteur routier.\r\nSont ainsi visés :\r\n- le Certificat d’Aptitude Professionnelle (CAP) conducteur routier de marchandises,\r\n- le Brevet d’Études Professionnelles (BEP) conduite et services dans le transport routier,\r\n- le titre professionnel de Conducteur du Transport Routier de Marchandises sur tous Véhicules (CTRMV) délivré par le Ministre chargé de l’emploi et de la \r\n   formation professionnelle,\r\n- le titre professionnel de Conducteur du Transport Routier de Marchandises sur Porteur (CTRMP) délivré par le Ministre chargé de l’emploi et de la \r\n   formation professionnelle.\r\n\r\nL’obtention de l’un de ces titres ou diplômes permet à son titulaire de conduire, dès l’âge de 18 ans, les véhicules pour lesquels un permis de conduire des catégories C ou EC est requis.\r\nAu vu du diplôme ou du titre professionnel, le préfet du département dans lequel a été délivré le titre ou le diplôme, délivre au conducteur, après avoir vérifié la validité de son permis de conduire, une carte de qualification de conducteur (modèle à paraître prochainement). Cette carte doit être renouvelée tous les 5 ans après chaque session de formation continue', 'تدريب أي شخص مهتم بالحصول على رخصة قيادة شاحنة مهنية', './images/etudiants/library.jpg');

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
(8, 4, './images/salles/salle1.jfif', './images/salles/salle2.jfif', './images/salles/salle3.jfif', './images/salles/Tangier.jpg');

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
  `iso_res_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `iso`
--

INSERT INTO `iso` (`iso_id`, `iso_nom`, `iso_presentation`, `iso_res_nom`, `iso_res_email`, `iso_res_message`) VALUES
(6, 'ISO 45001', '', 'Fahd', 'Houta@gmail.com', 'sqdqsdqsd');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE `langue` (
  `lang_id` int(11) NOT NULL,
  `lang_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`lang_id`, `lang_type`) VALUES
(1, 'fr'),
(2, 'ar');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `mat_id` int(11) NOT NULL,
  `mat_formation` int(11) NOT NULL,
  `mat_nom` varchar(200) NOT NULL,
  `mat_duree` varchar(200) NOT NULL,
  `mat_prof` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`mat_id`, `mat_formation`, `mat_nom`, `mat_duree`, `mat_prof`) VALUES
(1, 1, 'Traduction', '4h', 'Mohamed Louadi'),
(2, 1, 'Marketing', '5h', 'Yasmina Aboussabr'),
(5, 2, 'Cours pratique', '4h', 'Abderahmane Bouhouch'),
(69, 2, 'Cours théorique', '3h', 'Salim Guechich');

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
(4, 1, 1, 1, 18),
(19, 1, 2, 1, 12),
(29, 2, 69, 90, 12),
(30, 2, 5, 90, 20),
(50, 2, 5, 91, 12),
(51, 2, 69, 95, 19),
(52, 2, 5, 95, 12),
(53, 2, 69, 91, 13),
(60, 1, 1, 96, 14),
(61, 2, 5, 97, 11);

-- --------------------------------------------------------

--
-- Structure de la table `promos`
--

CREATE TABLE `promos` (
  `pro_id` int(11) NOT NULL,
  `pro_année` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `promos`
--

INSERT INTO `promos` (`pro_id`, `pro_année`) VALUES
(1, 'promos 2022/2023');

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
  `time_fin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`res_id`, `res_nom`, `res_telephone`, `res_email`, `res_salle`, `res_commentaire`, `res_date`, `time_debut`, `time_fin`) VALUES
(12, 'Aimane Chnaif', '212644776612', 'a.chnaif2010@gmail.com', 4, 'Pas de commentaire', '2022-03-24', '08:00', '09:00'),
(13, 'Aimane', '212644776612', 'a.chnaif2010@gmail.com', 4, 'pas de commentaire', '2022-03-08', '08:00', '09:00'),
(14, 'Aimane Chnaif', '212644776612', 'a.chnaif2010@gmail.com', 4, 'pas de commentaire', '2022-03-25', '08:00', '10:00'),
(34, 'Aymane', '212644776612', 'a.chnaif2010@gmail.com', 4, 'salut', '2022-03-25', '11:00', '12:00'),
(35, 'Aymane', '212644776612', 'a.chnaif2010@gmail.com', 4, 'sd', '2022-03-31', '08:00', '09:00');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `sal_id` int(11) NOT NULL,
  `sal_nom` varchar(200) NOT NULL,
  `sal_desc` text NOT NULL,
  `sal_prix` float NOT NULL,
  `sal_personne` int(11) NOT NULL,
  `sal_image` varchar(200) NOT NULL,
  `sal_service` varchar(200) NOT NULL,
  `sal_service2` varchar(200) NOT NULL,
  `sal_service3` varchar(200) NOT NULL,
  `sal_service4` varchar(200) NOT NULL,
  `sal_service5` varchar(200) NOT NULL,
  `sal_service6` varchar(200) NOT NULL,
  `sal_service7` varchar(200) NOT NULL,
  `sal_service8` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`sal_id`, `sal_nom`, `sal_desc`, `sal_prix`, `sal_personne`, `sal_image`, `sal_service`, `sal_service2`, `sal_service3`, `sal_service4`, `sal_service5`, `sal_service6`, `sal_service7`, `sal_service8`) VALUES
(1, 'Salle 1', 'Notre salle de formation est munie du wifi haute-vitesse, un projecteur, un paper board et ses accessoires, un microphone et des sonorisations. Tout est mis à votre disposition afin de vous permettre de réaliser vos présentations et vos projections, la salle de formation est  aussi équipée d’un système audiovisuel de haute qualité (Smart télévision).\r\n\r\nLa salle de formation est une salle ultramoderne, chic et élégante, facile d’accès située dans un endroit unique, équipée d’une air climatisée de premier ordre , d’un ordinateur et de Multi-prises électriques. Notre salle de formation de Rabat est l’endroit qu’il faut pour vos formation à venir.', 150, 20, './images/salles/location-salle-de-formation.jpg', 'Oridnateurs', 'Imprimante', 'Photocopieur', 'Restauration', '', '', '', ''),
(3, 'Salle 2', 'Notre salle de formation est munie du wifi haute-vitesse, un projecteur, un paper board et ses accessoires, un microphone et des sonorisations. Tout est mis à votre disposition afin de vous permettre de réaliser vos présentations et vos projections, la salle de formation est  aussi équipée d’un système audiovisuel de haute qualité (Smart télévision).\r\n\r\nLa salle de formation est une salle ultramoderne, chic et élégante, facile d’accès située dans un endroit unique, équipée d’une air climatisée de premier ordre , d’un ordinateur et de Multi-prises électriques. Notre salle de formation de Rabat est l’endroit qu’il faut pour vos formation à venir.', 150, 20, './images/salles/salle.jfif', 'Oridnateurs', 'Imprimantes', 'Photocopieurs', 'Restauration', '', '', '', ''),
(4, 'Salle 3', 'Notre salle de formation est munie du wifi haute-vitesse, un projecteur, un paper board et ses accessoires, un microphone et des sonorisations. Tout est mis à votre disposition afin de vous permettre de réaliser vos présentations et vos projections, la salle de formation est  aussi équipée d’un système audiovisuel de haute qualité (Smart télévision).\r\n\r\nLa salle de formation est une salle ultramoderne, chic et élégante, facile d’accès située dans un endroit unique, équipée d’une air climatisée de premier ordre , d’un ordinateur et de Multi-prises électriques. Notre salle de formation de Rabat est l’endroit qu’il faut pour vos formation à venir.', 150, 20, './images/salles/for.jfif', 'Oridnateurs', 'Imprimantes', 'Photocopieurs', 'Restauration', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `sea_id` int(11) NOT NULL,
  `sea_nom` varchar(200) NOT NULL,
  `sea_date_debut` date NOT NULL DEFAULT current_timestamp(),
  `sea_date_fin` date NOT NULL DEFAULT current_timestamp(),
  `sea_formation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`sea_id`, `sea_nom`, `sea_date_debut`, `sea_date_fin`, `sea_formation`) VALUES
(1, 'Séance 1', '2022-03-14', '2022-03-18', 1),
(2, 'Séance 2', '2022-03-21', '2022-03-25', 1);

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
  ADD KEY `promotion` (`etud_promos`);

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
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`lang_id`);

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
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`sea_id`),
  ADD KEY `séances` (`sea_formation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `abs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `attestation`
--
ALTER TABLE `attestation`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `dip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `douane`
--
ALTER TABLE `douane`
  MODIFY `dou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `etud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `for_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `img_salle`
--
ALTER TABLE `img_salle`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `iso`
--
ALTER TABLE `iso`
  MODIFY `iso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `promos`
--
ALTER TABLE `promos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `sea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence` FOREIGN KEY (`abs_formation`) REFERENCES `formation` (`for_id`),
  ADD CONSTRAINT `absence_etudiant` FOREIGN KEY (`abs_etudiant`) REFERENCES `etudiant` (`etud_id`),
  ADD CONSTRAINT `absence_matiere` FOREIGN KEY (`abs_matiere`) REFERENCES `matiere` (`mat_id`);

--
-- Contraintes pour la table `attestation`
--
ALTER TABLE `attestation`
  ADD CONSTRAINT `attestation` FOREIGN KEY (`att_etudiant`) REFERENCES `etudiant` (`etud_id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commetaires` FOREIGN KEY (`com_article`) REFERENCES `article` (`art_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD CONSTRAINT `diplome` FOREIGN KEY (`dip_etudiant`) REFERENCES `etudiant` (`etud_id`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etud_form` FOREIGN KEY (`etud_formation`) REFERENCES `formation` (`for_id`),
  ADD CONSTRAINT `promotion` FOREIGN KEY (`etud_promos`) REFERENCES `promos` (`pro_id`);

--
-- Contraintes pour la table `img_salle`
--
ALTER TABLE `img_salle`
  ADD CONSTRAINT `images` FOREIGN KEY (`img_salle`) REFERENCES `salle` (`sal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `mat_forma` FOREIGN KEY (`mat_formation`) REFERENCES `formation` (`for_id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_etudiant` FOREIGN KEY (`not_etudiant`) REFERENCES `etudiant` (`etud_id`),
  ADD CONSTRAINT `note_formation` FOREIGN KEY (`not_formation`) REFERENCES `formation` (`for_id`),
  ADD CONSTRAINT `note_matiere` FOREIGN KEY (`not_matiere`) REFERENCES `matiere` (`mat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `salles` FOREIGN KEY (`res_salle`) REFERENCES `salle` (`sal_id`);

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `séances` FOREIGN KEY (`sea_formation`) REFERENCES `formation` (`for_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
