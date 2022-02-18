-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 01 juil. 2020 à 22:53
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quiz`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_table`
--

CREATE TABLE `admin_table` (
  `id_admin` int(11) NOT NULL,
  `mail_admin` varchar(150) NOT NULL,
  `password_admin` varchar(150) NOT NULL,
  `type_admin` varchar(250) NOT NULL,
  `create_admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin_table`
--

INSERT INTO `admin_table` (`id_admin`, `mail_admin`, `password_admin`, `type_admin`, `create_admin`) VALUES
(1, 'MAMINIAINAZAIN@gmail.com', '47ddff35decd8275bc26be203167ee8f', 'sub_master', '2020-06-22 19:21:49');

-- --------------------------------------------------------

--
-- Structure de la table `online_exam_table`
--

CREATE TABLE `online_exam_table` (
  `id_examOnline` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `exam_title` varchar(250) NOT NULL,
  `exam_datetime` datetime NOT NULL,
  `exam_duration` varchar(30) NOT NULL,
  `total_question` int(5) NOT NULL,
  `right_answer` varchar(30) NOT NULL,
  `wrong_answer` varchar(30) NOT NULL,
  `exam_create` varchar(252) NOT NULL,
  `exam_status` enum('Pending','Created','Started','Completed') NOT NULL,
  `exam_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `online_exam_table`
--

INSERT INTO `online_exam_table` (`id_examOnline`, `id_admin`, `exam_title`, `exam_datetime`, `exam_duration`, `total_question`, `right_answer`, `wrong_answer`, `exam_create`, `exam_status`, `exam_code`) VALUES
(5, 1, 'ANGLAIS', '2020-06-30 02:27:00', '15', 5, '1', '1.25', '2020-06-23 14:15:52', 'Pending', '9752e3bc66b3274c008973f3dd21ba78'),
(7, 1, 'ALGORITHME', '2020-06-29 20:00:00', '5', 5, '1', '1', '2020-06-28 20:23:38', 'Pending', 'dbfb0dd554a528e5864f9923898bfd22');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_number` int(2) NOT NULL,
  `option_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`option_id`, `question_id`, `option_number`, `option_title`) VALUES
(26, 6, 1, 'Serveur'),
(27, 6, 2, 'Client'),
(28, 6, 3, 'Balise'),
(29, 6, 4, 'ParamÃ¨tre Haut PrÃ©ssion'),
(30, 6, 5, 'Language'),
(36, 8, 1, 'L programation'),
(37, 8, 2, 'L balise'),
(38, 8, 3, 'L style'),
(39, 8, 4, 'Phrase'),
(40, 8, 5, 'Paragraphe'),
(41, 9, 1, 'L parametre'),
(42, 9, 2, 'L dynamisme'),
(43, 9, 3, 'L seveur'),
(44, 9, 4, 'L programation'),
(45, 9, 5, 'L style'),
(46, 10, 1, 'L balise'),
(47, 10, 2, 'L server'),
(48, 10, 3, 'L base'),
(49, 10, 4, 'L programation'),
(50, 10, 5, 'L Francias'),
(51, 11, 1, 'L programation'),
(52, 11, 2, 'Framework js'),
(53, 11, 3, 'Framework css'),
(54, 11, 4, 'Framework php'),
(55, 11, 5, 'Framework html'),
(56, 12, 1, 'a'),
(57, 12, 2, 'b'),
(58, 12, 3, 'c'),
(59, 12, 4, 'd'),
(60, 12, 5, 'e'),
(61, 13, 1, 'A'),
(62, 13, 2, 'B'),
(63, 13, 3, 'C'),
(64, 13, 4, 'D'),
(65, 13, 5, 'E'),
(66, 14, 1, 'java script'),
(67, 14, 2, 'php'),
(68, 14, 3, 'java'),
(69, 14, 4, 'css'),
(70, 14, 5, 'html'),
(71, 15, 1, 'html'),
(72, 15, 2, 'Oriente objet'),
(73, 15, 3, 'procedurale'),
(74, 15, 4, 'autre'),
(75, 15, 5, 'css'),
(76, 16, 1, 'web'),
(77, 16, 2, 'logiciel'),
(78, 16, 3, 'language'),
(79, 16, 4, 'orienter '),
(80, 16, 5, 'procedurale'),
(81, 17, 1, 'Language '),
(82, 17, 2, 'phrase'),
(83, 17, 3, 'Programation'),
(84, 17, 4, 'celetron'),
(85, 17, 5, 'autre'),
(86, 18, 1, 'java'),
(87, 18, 2, 'css'),
(88, 18, 3, 'html'),
(89, 18, 4, 'Python'),
(90, 18, 5, 'C#'),
(91, 19, 1, 'Autre'),
(92, 19, 2, 'Autre'),
(93, 19, 3, 'Autre'),
(94, 19, 4, 'Autre'),
(95, 19, 5, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `id_examOnline` int(11) NOT NULL,
  `question_titre` text NOT NULL,
  `answer_option` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`question_id`, `id_examOnline`, `question_titre`, `answer_option`) VALUES
(6, 5, 'Whats PHP?', '1'),
(8, 5, 'Whats HTML?', '2'),
(9, 5, 'Whats CSS?', '5'),
(10, 5, 'Whats JAVA SCRIPT?', '4'),
(11, 5, 'Whats Jquery?', '2'),
(15, 7, 'JAVA?', '2'),
(16, 7, 'Python?', '4'),
(17, 7, 'what C#?', '1'),
(18, 7, 'What django?', '4'),
(19, 7, 'Whats Angular?', '1');

-- --------------------------------------------------------

--
-- Structure de la table `user_exam`
--

CREATE TABLE `user_exam` (
  `user_exam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_examOnline` int(11) NOT NULL,
  `attendance_status` enum('Absent','Present') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_exam`
--

INSERT INTO `user_exam` (`user_exam_id`, `user_id`, `id_examOnline`, `attendance_status`) VALUES
(66, 6, 5, 'Present'),
(67, 6, 7, 'Present');

-- --------------------------------------------------------

--
-- Structure de la table `user_exam_question`
--

CREATE TABLE `user_exam_question` (
  `user_exam_question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_examOnline` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_answer_option` enum('0','1','2','3','4') NOT NULL,
  `marks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_exam_question`
--

INSERT INTO `user_exam_question` (`user_exam_question_id`, `user_id`, `id_examOnline`, `question_id`, `user_answer_option`, `marks`) VALUES
(263, 6, 5, 6, '1', '+1'),
(264, 6, 5, 8, '2', '+1'),
(265, 6, 5, 9, '3', '-1.25'),
(266, 6, 5, 10, '1', '-1.25'),
(267, 6, 5, 11, '4', '-1.25'),
(268, 6, 7, 15, '2', '+1'),
(269, 6, 7, 16, '2', '-1'),
(270, 6, 7, 17, '3', '-1'),
(271, 6, 7, 18, '4', '+1'),
(272, 6, 7, 19, '2', '-1');

-- --------------------------------------------------------

--
-- Structure de la table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_mail` varchar(250) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_v_code` varchar(100) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_gender` enum('Male','Female') NOT NULL,
  `user_adresse` text NOT NULL,
  `user_mobile` varchar(30) NOT NULL,
  `user_image` varchar(150) NOT NULL,
  `user_create` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_mail`, `user_password`, `user_v_code`, `user_name`, `user_gender`, `user_adresse`, `user_mobile`, `user_image`, `user_create`) VALUES
(6, 'MAMINIAINAZAIN@gmail.com', 'maminiaina', 'bc74d326bfe32c2ded371dd666660120', 'Maminiaina', 'Male', 'Lot vv 93 bis Ankerakely', '0326865274', 'uploadFile/animal-africa-zoo-lion-33045.jpg', '2020-06-27 20:03:36');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `online_exam_table`
--
ALTER TABLE `online_exam_table`
  ADD PRIMARY KEY (`id_examOnline`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Index pour la table `user_exam`
--
ALTER TABLE `user_exam`
  ADD PRIMARY KEY (`user_exam_id`);

--
-- Index pour la table `user_exam_question`
--
ALTER TABLE `user_exam_question`
  ADD PRIMARY KEY (`user_exam_question_id`);

--
-- Index pour la table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `online_exam_table`
--
ALTER TABLE `online_exam_table`
  MODIFY `id_examOnline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `user_exam`
--
ALTER TABLE `user_exam`
  MODIFY `user_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `user_exam_question`
--
ALTER TABLE `user_exam_question`
  MODIFY `user_exam_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT pour la table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
