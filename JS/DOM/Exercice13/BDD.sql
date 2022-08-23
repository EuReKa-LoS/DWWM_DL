-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 23 août 2022 à 13:00
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `doucefrance`
--
CREATE DATABASE IF NOT EXISTS `doucefrance` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `doucefrance`;

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `population` int(11) NOT NULL,
  `superficie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `slug`, `nom`, `population`, `superficie`) VALUES
(9, 'region-I', 'Occitanie', 6053548, 72724),
(8, 'region-H', 'Île-de-France', 12395148, 12011),
(7, 'region-G', 'Corse', 349465, 8680),
(6, 'region-F', 'Centre-Val de Loire', 2564915, 39151),
(5, 'region-E', 'Bretagne', 3402932, 27208),
(4, 'region-D', 'Bourgogne-Franche-Comté', 2785393, 47784),
(3, 'region-C', 'Auvergne-Rhône-Alpes', 8153233, 69711),
(2, 'region-B', 'Nouvelle-Aquitaine', 6081985, 84036),
(1, 'region-A', 'Grand Est', 5542094, 57441),
(10, 'region-J', 'Hauts-de-France', 5987172, 31806),
(11, 'region-K', 'Normandie', 3307286, 29907),
(12, 'region-L', 'Pays-de-la-Loire', 3873096, 32082),
(13, 'region-M', 'Provence-Alpes-Côte d\'Azur', 5131187, 31400);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
