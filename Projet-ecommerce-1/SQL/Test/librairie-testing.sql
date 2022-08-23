-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 12 juil. 2022 à 07:54
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
-- Base de données : `librairie-testing`
--
CREATE DATABASE IF NOT EXISTS `librairie-testing` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `librairie-testing`;

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `ip_address`) VALUES
(1002, 'Prénom Admin', 'Nom Admin', 'admin', '$2y$10$4ZuZ.Y2QABDJY3dYUdanhuNWOg4GPAazxyiFhgooshOozeJOSCdGW', 'Administrateur', NULL),
(1001, 'Dany', 'Landrin', 'dany.landrin@gmail.com', '$2y$10$22YRNM2RCwePANEnVJEpu.t.6koeQj3sy4c4N0SIEZzZ.23h.6Lfm', 'Homme', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `idLivre` int(11) NOT NULL AUTO_INCREMENT,
  `titreLivre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorieLivre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptionLivre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auteurLivre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgLivre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etatLivre` tinyint(1) DEFAULT NULL,
  `reEditionLivre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stockLivre` int(11) DEFAULT NULL,
  `prixNeufLivre` decimal(4,2) DEFAULT NULL,
  `prixOccasionLivre` decimal(4,2) DEFAULT NULL,
  `codeBarreLivre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ISBN` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idLivre`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`idLivre`, `titreLivre`, `categorieLivre`, `descriptionLivre`, `auteurLivre`, `imgLivre`, `etatLivre`, `reEditionLivre`, `stockLivre`, `prixNeufLivre`, `prixOccasionLivre`, `codeBarreLivre`, `ISBN`) VALUES
(56, 'Le cinquième coeurs', 'Héroïque|Fantasy', NULL, 'Dan Simmons', './img/62cc32c6ab2534.97153984.jpg', NULL, NULL, NULL, '20.00', '12.00', NULL, NULL),
(57, 'La quête d\'Ewilan Tome 1', 'Héroïque|Fantasy', NULL, 'Dan Simmons', './img/62cc3b709299d8.26785512.jpg', NULL, NULL, NULL, '48.00', '48.00', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
