-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 28 jan. 2020 à 22:18
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
-- Base de données :  `image`
--

-- --------------------------------------------------------

--
-- Structure de la table `sary`
--

CREATE TABLE `sary` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `libeler` varchar(200) NOT NULL,
  `historique` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sary`
--

INSERT INTO `sary` (`id`, `image`, `libeler`, `historique`) VALUES
(2, 'uploadFile/work-3.jpg', 'Travail', 'Zone de travaille de l\'usine'),
(4, 'uploadFile/1 (6).jpg', 'Rabozaka', 'Mpahandro sakafo malaza'),
(5, 'uploadFile/1 (8).jpg', 'sofia', 'Mpivarotena'),
(6, 'uploadFile/1 (4).png', 'Icons', 'Web disigne'),
(7, 'uploadFile/2 (5).jpg', 'trano', 'AHOFA'),
(8, 'uploadFile/bg-2.jpg', 'background', 'image background'),
(9, 'uploadFile/team1.jpg', 'Mr jean', 'Deputer d\'antananarivo'),
(10, 'uploadFile/small1.jpg', 'Loenard', 'Desin Anime'),
(11, 'uploadFile/1.png', 'Mpampianatra', 'Filosofia malaza'),
(13, 'uploadFile/1 (9).jpg', 'jkdjkd', 'sdkldklsld'),
(14, 'uploadFile/1200x630bb.png', 'photo', 'cinema');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sary`
--
ALTER TABLE `sary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sary`
--
ALTER TABLE `sary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
