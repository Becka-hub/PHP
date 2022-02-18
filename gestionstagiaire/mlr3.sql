-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 28 jan. 2020 à 22:15
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mlr3`
--

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE `avoir` (
  `IDSTAGIAIRE` int(11) NOT NULL,
  `IDSPECIALITER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avoir`
--

INSERT INTO `avoir` (`IDSTAGIAIRE`, `IDSPECIALITER`) VALUES
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `IDDOMAINE` int(11) NOT NULL,
  `NOMDOMAINE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`IDDOMAINE`, `NOMDOMAINE`) VALUES
(3, 'Sience'),
(21, 'Histo'),
(22, 'math'),
(23, 'Informatique'),
(24, 'Filosolia'),
(25, 'Mathematique'),
(26, 'History'),
(27, 'EPS'),
(28, 'Hira'),
(29, 'Danse'),
(30, 'èyuuyuy'),
(31, 'filo');

-- --------------------------------------------------------

--
-- Structure de la table `encadreur`
--

CREATE TABLE `encadreur` (
  `IDENCADREUR` int(11) NOT NULL,
  `NOMENCADREUR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `encadreur`
--

INSERT INTO `encadreur` (`IDENCADREUR`, `NOMENCADREUR`) VALUES
(3, 'Mary'),
(21, 'Papa'),
(22, 'benaja'),
(23, 'WILY'),
(24, 'Erica'),
(25, 'Jean'),
(26, 'Beckas'),
(27, 'Sofia'),
(28, 'Tahina'),
(29, 'lolo'),
(30, 'h'),
(31, 'beckas');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `IDENTREPRISE` int(11) NOT NULL,
  `NOMENTREPRISE` varchar(255) NOT NULL,
  `ADRESSE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`IDENTREPRISE`, `NOMENTREPRISE`, `ADRESSE`) VALUES
(11, 'beckas', 'Lot VV 5'),
(12, 'Marika', 'Lot 552'),
(13, 'sosona', 'momo'),
(14, '', ''),
(15, 'Felana', 'Lot Tsiadana'),
(16, 'sofina', 'makaina'),
(17, 'sofina', 'makaina'),
(18, '', ''),
(19, '', ''),
(20, 'marino', 'Kambaly'),
(21, 'Telma', 'Lo vv47'),
(22, 'Telma', 'lot vv 55');

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE `posseder` (
  `IDENCADREUR` int(11) NOT NULL,
  `IDDOMAINE` int(11) NOT NULL,
  `IDENTREPRISE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posseder`
--

INSERT INTO `posseder` (`IDENCADREUR`, `IDDOMAINE`, `IDENTREPRISE`) VALUES
(22, 22, 14),
(23, 23, 14),
(24, 24, 14),
(25, 25, 14),
(26, 26, 14),
(27, 27, 14),
(28, 28, 14),
(29, 29, 14),
(30, 30, 14),
(31, 31, 14);

-- --------------------------------------------------------

--
-- Structure de la table `specialiter`
--

CREATE TABLE `specialiter` (
  `IDSPECIALITER` int(11) NOT NULL,
  `NOMSPECIALITER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `specialiter`
--

INSERT INTO `specialiter` (`IDSPECIALITER`, `NOMSPECIALITER`) VALUES
(1, 'programing'),
(2, 'programing'),
(3, 'info'),
(4, 'info'),
(5, 'info'),
(6, 'info'),
(7, 'info'),
(8, 'suite'),
(9, 'suite'),
(10, 'suite'),
(11, 'autre'),
(12, 'vary'),
(13, 'Vary');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `IDSTAGIAIRE` int(11) NOT NULL,
  `IDENTREPRISE` int(11) NOT NULL,
  `NOMSTAGIAIRE` varchar(255) DEFAULT NULL,
  `ADRESSESTAGIAIRE` varchar(255) DEFAULT NULL,
  `PHOTO` varchar(255) NOT NULL,
  `DATEDEBUT` varchar(255) DEFAULT NULL,
  `DATEFIN` varchar(255) NOT NULL,
  `IDDOMAINE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`IDSTAGIAIRE`, `IDENTREPRISE`, `NOMSTAGIAIRE`, `ADRESSESTAGIAIRE`, `PHOTO`, `DATEDEBUT`, `DATEFIN`, `IDDOMAINE`) VALUES
(7, 14, 'beckas', 'Lot VV 122', 'hkk.jpg already exists. ', '01', '30', 23),
(8, 14, 'Michel', 'Itosy', 'uploadFile/IMG_5453.JPG', '02', '05', 22),
(9, 14, 'Michel', 'Itosy', 'IMG_5453.JPG already exists. ', '02', '05', 22),
(10, 14, 'Michel', 'Itosy', 'IMG_5453.JPG already exists. ', '02', '05', 22),
(11, 14, 'mamy', 'ampirihy', 'hjjk.jpg already exists. ', '02', '05', 26),
(12, 14, 'solofo', 'analakely', 'hjjk.jpg already exists. ', '2', '15', 26),
(13, 14, 'Holy', 'Lo tx ', 'uploadFile/IMG_1180.JPG', '1', '03', 21);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IDUTILISATEUR` int(11) NOT NULL,
  `IDENTREPRISE` int(11) NOT NULL,
  `NOMUTILISATEUR` varchar(255) NOT NULL,
  `MDPUTILISATEUR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDUTILISATEUR`, `IDENTREPRISE`, `NOMUTILISATEUR`, `MDPUTILISATEUR`) VALUES
(1, 11, 'sekoly', 'kakana'),
(2, 12, 'Beckas', 'sofina'),
(3, 13, 'vikina', 'sakana'),
(4, 14, 'sekoly', 'kakana'),
(5, 15, 'Mamy', 'Mamy'),
(6, 20, 'Bekas', 'min'),
(7, 21, 'kaky', 'benja'),
(8, 22, 'beckas', 'beckas');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD PRIMARY KEY (`IDSTAGIAIRE`,`IDSPECIALITER`),
  ADD KEY `I_FK_AVOIR_STAGIAIRE` (`IDSTAGIAIRE`),
  ADD KEY `I_FK_AVOIR_SPECIALITER` (`IDSPECIALITER`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`IDDOMAINE`);

--
-- Index pour la table `encadreur`
--
ALTER TABLE `encadreur`
  ADD PRIMARY KEY (`IDENCADREUR`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`IDENTREPRISE`);

--
-- Index pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD PRIMARY KEY (`IDENCADREUR`,`IDDOMAINE`,`IDENTREPRISE`),
  ADD KEY `I_FK_POSSEDER_ENCADREUR` (`IDENCADREUR`),
  ADD KEY `I_FK_POSSEDER_DOMAINE` (`IDDOMAINE`),
  ADD KEY `I_FK_POSSEDER_ENTREPRISE` (`IDENTREPRISE`);

--
-- Index pour la table `specialiter`
--
ALTER TABLE `specialiter`
  ADD PRIMARY KEY (`IDSPECIALITER`);

--
-- Index pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`IDSTAGIAIRE`),
  ADD KEY `I_FK_STAGIAIRE_ENTREPRISE` (`IDENTREPRISE`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDUTILISATEUR`),
  ADD KEY `I_FK_UTILISATEUR_ENTREPRISE` (`IDENTREPRISE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `IDDOMAINE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `encadreur`
--
ALTER TABLE `encadreur`
  MODIFY `IDENCADREUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `IDENTREPRISE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `specialiter`
--
ALTER TABLE `specialiter`
  MODIFY `IDSPECIALITER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  MODIFY `IDSTAGIAIRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDUTILISATEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `FK_AVOIR_SPECIALITER` FOREIGN KEY (`IDSPECIALITER`) REFERENCES `specialiter` (`IDSPECIALITER`),
  ADD CONSTRAINT `FK_AVOIR_STAGIAIRE` FOREIGN KEY (`IDSTAGIAIRE`) REFERENCES `stagiaire` (`IDSTAGIAIRE`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `FK_POSSEDER_DOMAINE` FOREIGN KEY (`IDDOMAINE`) REFERENCES `domaine` (`IDDOMAINE`),
  ADD CONSTRAINT `FK_POSSEDER_ENCADREUR` FOREIGN KEY (`IDENCADREUR`) REFERENCES `encadreur` (`IDENCADREUR`),
  ADD CONSTRAINT `FK_POSSEDER_ENTREPRISE` FOREIGN KEY (`IDENTREPRISE`) REFERENCES `entreprise` (`IDENTREPRISE`);

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `FK_STAGIAIRE_ENTREPRISE` FOREIGN KEY (`IDENTREPRISE`) REFERENCES `entreprise` (`IDENTREPRISE`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_UTILISATEUR_ENTREPRISE` FOREIGN KEY (`IDENTREPRISE`) REFERENCES `entreprise` (`IDENTREPRISE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
