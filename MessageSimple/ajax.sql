-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 28 jan. 2020 à 22:26
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
-- Base de données :  `ajax`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `nom`, `message`) VALUES
(1, 'Beckas', 'Tena tsy mety le jQuery le'),
(2, 'Beckas', 'Tena vo mitest e'),
(3, 'Bozaka', 'Masiso'),
(4, 'Tsiory', 'D aon les beckas a'),
(5, 'Vonjy', 'HO an ny kakana'),
(6, 'Sofia', 'Andaw ana sakafo isika'),
(7, 'Beckas', 'Ande ody ah zaw'),
(8, 'Wily', 'mody dooly'),
(9, 'Vero', 'Kakana'),
(10, 'Solofo', 'Vonoy le saka'),
(11, 'Cyber', 'zaw de zaw'),
(12, 'faniry', 'salut'),
(13, 'Tsiky', 'Nga nareo ef nande omaly'),
(14, 'Tsiky', 'Mantany fotson ka'),
(15, 'faniry', 'ie f aon?'),
(16, 'Mickael', 'D aon e?'),
(17, 'mICKAEL', 'SALUT'),
(18, 'Nandry', 'Kez les'),
(19, 'Beckas', 'd aon lty?'),
(20, 'zozefa', 'kez e'),
(21, 'Beckas', 'de aon on'),
(22, 'beckas', 'salut'),
(23, 'dhfjj', 'sdhsjdh'),
(24, 'mickas', 'kez');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
