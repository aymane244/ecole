-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 01 mars 2022 à 12:00
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
(1, 'Test', 'This is a test messages', './images/etudiants/1569162702507.jpg', '2022-02-05'),
(2, 'Test 2', 'This is a test message 3', './images/articles/0001.jpg', '2022-02-05');

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
(1, 1, ''),
(2, 92, '');

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
(5, 'Aimane', 'Chnaif', 'Malkom 3la had lhala qado ghir tsswira be3da', 1, '2022-02-15');

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
(1, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'Reclamation', 'This is a reclamation', '2022-02-05'),
(3, 'eaze', 'a.chnaif2010@gmail.com', 'a.chnaif2010@gmail.com', 'dqsdqsd', '2022-02-06'),
(4, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'a.chnaif2010@gmail.com', 'sdsdzezaeazeaze', '2022-02-06'),
(5, 'uioui', 'a.chnaif2010@gmail.com', 'a.chnaif2010@gmail.com', 'n;,n;,njhg', '2022-02-06'),
(6, 'hjghjg', 'a.chnaif2010@gmail.com', 'a.chnaif2010@gmail.com', 'nnnnnnnnnnnnnn', '2022-02-06'),
(7, 'Aimane', '', '', '', '2022-02-15'),
(8, 'Aimane', '', '', '', '2022-02-15'),
(9, 'Jamil', '', '', '', '2022-02-15'),
(10, 'Jamal', '', '', '', '2022-02-15'),
(11, 'Aimane', 'a.chnaif2010@gmail.com', 'Message test', 'Test', '2022-02-19'),
(12, 'Aimane', 'Chnaif', 'Test', 'Test message', '2022-02-20'),
(13, 'Aimane', 'Chnaif', 'Test', 'Test message', '2022-02-20'),
(14, 'X be x', 'aymane.chaif@gmail.com', 'Balcon', 'NNNNNNNNNNNN', '2022-02-20'),
(15, 'X be x', 'aymane.chaif@gmail.com', 'Balcon', 'NNNNNNNNNNNN', '2022-02-20'),
(16, 'Y ben', 'aymane.chnaif@gmail.com', 'LOL', 'LOLOLOLOL', '2022-02-20'),
(17, 'Y ben', 'aymane.chnaif@gmail.com', 'LOL', 'LOLOLOLOL', '2022-02-20'),
(18, 'KKK', 'a.chnaif2010@gmail.com', 'SDQSD', 'QSDQSD', '2022-02-20'),
(19, 'Test', 'a.chnaif2010@gmail.com', 'qsd', 'qsdqsd', '2022-02-20'),
(20, 'Aimane Chnaif', 'a.chnaif2010@gmail.com', 'sd', 'sd', '2022-02-20');

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
(1, 1, './diplomes/CV Aimane Chnaif.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `etud_id` int(11) NOT NULL,
  `etud_nom` varchar(200) NOT NULL,
  `etud_prenom` varchar(200) NOT NULL,
  `etud_email` varchar(200) NOT NULL,
  `etud_motdepasse` varchar(200) NOT NULL,
  `etud_cin` varchar(200) NOT NULL,
  `etud_formation` int(11) NOT NULL,
  `etud_naissance` date NOT NULL,
  `etud_diplome` varchar(200) NOT NULL,
  `etud_image` varchar(500) NOT NULL,
  `etud_inscription` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`etud_id`, `etud_nom`, `etud_prenom`, `etud_email`, `etud_motdepasse`, `etud_cin`, `etud_formation`, `etud_naissance`, `etud_diplome`, `etud_image`, `etud_inscription`) VALUES
(1, 'Chnaif', 'Aimane', 'a.chnaif2010@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'G621092', 1, '1999-11-26', '', './images/etudiants/1569162702507.jpg', '2022-02-03'),
(90, 'Abouleaoufa', 'Hicham', 'aymane.chnaif@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'G621097', 2, '1991-11-26', '', './images/etudiants/IMG_20191229_020502_262.jpg', '2022-02-01'),
(91, 'Houfi', 'Jamal', 'aymane@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'G621099', 2, '2001-02-11', '', './images/etudiants/', '2022-02-04'),
(92, 'Milioiu', 'Fadwa', 'fadwa@gmail01.com', '25f9e794323b453885f5181f1b624d0b', 'G621022', 2, '1990-12-31', '', './images/etudiants/', '2022-02-10'),
(93, 'Lferda', 'Aziz', 'azeaze@gfgfg.fr', '7c37be7260f8cd7c1f5e4dbdd7bc5b23', 'aze', 2, '1999-11-11', './diplomes/CV Aimane Chnaif.pdf', './images/etudiants/', '2022-02-10');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `for_id` int(11) NOT NULL,
  `for_nom` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `for_pres` varchar(200) NOT NULL,
  `for_descr` text NOT NULL,
  `for_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`for_id`, `for_nom`, `for_pres`, `for_descr`, `for_image`) VALUES
(1, 'n\'est pas une formation', 'Formation obligatoire', 'Vous pouvez conduire le véhicule en toute sécuritéjhjj', './images/etudiants/1569162702507.jpg'),
(2, 'c\'est une formation1', 'Formation profesionnel jj', 'Hey coucou', '');

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
(4, 1, './images/salles/Tangier.jpg', './images/salles/location-salle-de-formation.jpg', './images/salles/library.jpg', './images/salles/contacts.png'),
(7, 3, './images/salles/library.jpg', './images/salles/notebook.jpg', './images/salles/Tangier.jpg', './images/salles/transportation.jpg'),
(8, 4, './images/salles/library.jpg', './images/salles/notebook.jpg', './images/salles/transportation.jpg', './images/salles/Tangier.jpg');

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
(1, 1, 'Introduction logistique et transport', '4h', 'Mohamed Louadi'),
(2, 1, 'Commerce International', '5h', 'Hajiba Maarouf'),
(5, 2, 'Marketing', '4h', 'Salim Bouhouch'),
(69, 2, 'Traduction', '3h', 'Salima Guechich');

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
(8, 2, 5, 93, 19),
(19, 1, 2, 1, 12),
(29, 2, 69, 90, 10),
(30, 2, 5, 90, 20),
(35, 2, 5, 92, 11),
(36, 2, 69, 92, 12),
(49, 2, 69, 93, 17),
(50, 2, 5, 91, 12);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `res_nom` varchar(200) NOT NULL,
  `res_telephone` varchar(200) NOT NULL,
  `res_email` varchar(200) NOT NULL,
  `res_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Salle 1', 'C\'est une salle luxieuse qui a une vue sur Mer', 150, 20, './images/salles/location-salle-de-formation.jpg', 'Oridnateurs', 'Imprimante', 'Photocopieur', '', '', '', '', ''),
(3, 'Salle 2', 'Salle 2', 150, 20, './images/salles/notebook.jpg', 'Oridnateurs', 'Imprimantes', 'Photocopieurs', '', '', '', '', ''),
(4, 'Salle 3', 'Salle 3', 150, 20, './images/salles/transportation.jpg', 'Oridnateurs', 'Imprimantes', 'Photocopieurs', '', '', '', '', '');

--
-- Index pour les tables déchargées
--

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
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`etud_id`),
  ADD KEY `etud_form` (`etud_formation`);

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
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `attestation`
--
ALTER TABLE `attestation`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `dip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `etud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `for_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `img_salle`
--
ALTER TABLE `img_salle`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

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
  ADD CONSTRAINT `etud_form` FOREIGN KEY (`etud_formation`) REFERENCES `formation` (`for_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
