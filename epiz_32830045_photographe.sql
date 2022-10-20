-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 102.219.176.39:3306
-- Généré le : lun. 25 juil. 2022 à 21:41
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jrxajqch_photographe`
--
jdbc:mysql://localhost:3306
-- --------------------------------------------------------

--
-- Structure de la table `contacter`
--

CREATE TABLE `contacter` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` longtext NOT NULL,
  `message` longtext NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `description`, `title`) VALUES
(33, 'IMG_20210210_113448.jpg', '2022-06-24 23:35:57', '', 'Sidi yati'),
(34, '20211031_173043~2.jpg', '2022-06-24 23:36:21', '', 'Sunset'),
(36, 'IMG_7130~2.jpg', '2022-06-24 23:37:19', '', 'Animals'),
(37, 'IMG_8196~2.jpg', '2022-06-24 23:37:49', '', 'Traditional'),
(38, 'nwdn_file_temp_1617915033452.jpg', '2022-06-24 23:38:24', '', 'Guellala Museum'),
(39, 'IMG_20180813_182844.jpg', '2022-06-24 23:38:47', '', 'Guellala Museum'),
(40, 'Stars_1-2.jpg', '2022-06-24 23:39:02', '', 'Sidi yati'),
(41, 'DSC_7759~2.jpg', '2022-06-24 23:40:58', '', 'Sunset'),
(42, 'IMG_20180414_164251.jpg', '2022-06-24 23:45:21', '', 'Houmt souk'),
(43, 'p (50).jpg', '2022-06-24 23:46:12', '', 'Flower'),
(44, 'DSC_7849~2.jpg', '2022-06-24 23:46:26', '', 'Flowers'),
(45, 'b.jpg', '2022-06-24 23:50:12', '', 'Djerba'),
(46, 'IMG_20200415_120509_487.jpg', '2022-06-25 17:37:31', '', 'Traditional'),
(47, 'p (460).jpg', '2022-06-28 15:49:55', '', ''),
(48, 'IMG_20161028_183024.jpg', '2022-06-28 15:50:08', '', ''),
(49, 'IMG_20190908_131542.jpg', '2022-06-28 15:52:17', '', ''),
(50, 'IMG_20181019_174837.jpg', '2022-07-05 19:25:42', '', ''),
(51, 'IMG_20180129_172945.jpg', '2022-07-05 19:25:58', '', ''),
(52, 'IMG_20191227_124714_637.jpg', '2022-07-05 19:26:16', '', ''),
(53, 'p (1).jpg', '2022-07-05 19:26:26', '', ''),
(54, 'original_0ac051a9-ed12-4305-9592-18c5feecac37_IMG_20180504_121405.jpg', '2022-07-05 19:26:53', '', ''),
(55, 'IMG_20200108_173259.jpg', '2022-07-05 19:28:57', '', ''),
(56, 'DSC_7759~2.jpg', '2022-07-05 19:29:11', '', ''),
(57, 'DSC_7769~2.jpg', '2022-07-05 19:29:20', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contacter`
--
ALTER TABLE `contacter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contacter`
--
ALTER TABLE `contacter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
