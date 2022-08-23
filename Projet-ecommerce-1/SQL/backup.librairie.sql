-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 août 2022 à 08:37
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
-- Base de données : `librairie`
--
CREATE DATABASE IF NOT EXISTS `librairie` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `librairie`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameCategorie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `nameCategorie`) VALUES
(1, 'amour', 'Amour'),
(2, 'aventure', 'Aventure'),
(3, 'bande-dessinee', 'Bande dessinée'),
(4, 'fantastique', 'Fantastique'),
(5, 'fantasy', 'Fantasy'),
(6, 'manga', 'Manga'),
(7, 'policier', 'Policier'),
(8, 'science-fiction', 'Science Fiction'),
(9, 'young-adult', 'Young Adult');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `idLivre` int(11) NOT NULL AUTO_INCREMENT,
  `titreLivre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorieLivre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionLivre` text COLLATE utf8mb4_unicode_ci,
  `auteurLivre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgLivre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etatLivre` tinyint(1) DEFAULT NULL,
  `reEditionLivre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stockLivre` int(11) DEFAULT NULL,
  `prixLivre` decimal(4,2) DEFAULT NULL,
  `codeBarreLivre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ISBN` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateParution` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`idLivre`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`idLivre`, `titreLivre`, `categorieLivre`, `descriptionLivre`, `auteurLivre`, `imgLivre`, `etatLivre`, `reEditionLivre`, `stockLivre`, `prixLivre`, `codeBarreLivre`, `ISBN`, `dateParution`, `date`) VALUES
(74, 'Les lettres à Juliette', '1', '&quot;Dans la vie comme dans les livres, certaines belles histoires ne sont pas destinées à être vécues.&quot;\r\nNina n&#039;a pas été épargnée par la vie. À 18 ans, c&#039;est une jeune écorchée vive.\r\nSon ceur a perdu toute envie de battre.\r\nPour qui, pour quoi le ferait-il ?\r\nImprégnée de l&#039;histoire de Roméo et Juliette, son couple modèle, elle entreprend, seule, un voyage sur la terre célébrée par Shakespeare.\r\nDe rencontres en découvertes, elle prendra conscience que la vie, si injuste soit-elle, sait aussi apporter des moments de bonheur.\r\nSaura-t-elle les reconnaître ?\r\nCe voyage lui permettra-t-il de trouver enfin un sens à sa vie ?\r\nDans sa nouvelle romance, Ninon Amey aborde, par une plume douce et délicate, des thèmes sensibles tels que la maladie, le deuil, ou encore le suicide.\r\nElle fait voyager son lecteur entre la France et l&#039;Italie. ', 'Ninon Amey', '62ea7b2c5bd331.27396286.jpg', 0, '0', 1, '0.00', '', '', NULL, '2022-08-01'),
(75, 'Eragon - L&#039;Héritage, Tome 1', '2', 'Eragon n&#039;a que quinze ans, mais le destin de l&#039;Empire eEragon n&#039;a que quinze ans, mais le destin de l&#039;Empire est désormais entre ses mains !C&#039;est en poursuivant une biche dans la montagne que le jeune Eragon, quinze ans, tombe sur une magnifique pierre bleue, qui s&#039;avère être... un oeuf de dragon ! Fasciné, il l&#039;emporte à Carvahall, le village où il vit pauvrement avec son oncle et son cousin. Il n&#039;imagine pas alors qu&#039;une dragonne, porteuse d&#039;un héritage ancestral, va en éclore...Très vite, la vie d&#039;Eragon est bouleversée. Contraint de quitter les siens, le jeune homme s&#039;engage dans une quête qui le mènera aux confins de l&#039;empire de l&#039;Alagaësia. Armé de son épée et guidé par les conseils de Brom, le vieux conteur, Eragon va devoir affronter avec sa dragonne les terribles ennemis envoyés par le roi Galbatorix, dont la malveillance démoniaque ne connaît aucune limite.', 'Christopher Paolini', '62d52a2dc8f610.36308190.jpg', 0, '0', 50, '4.00', '', '', NULL, NULL),
(76, 'Eragon - L&#039;aîné, Tome 2', '2', 'Une plongée dans les ténèbres : les certitudes s&#039;évanouissent et les forces du mal règnent.Eragon et sa dragonne, Saphira, sortent à peine de la victoire de Farthen Dûr contre les Urgals, qu&#039;une nouvelle horde de monstres surgit... Ajihad, le chef des Vardens, est tué. Nommée par le Conseil des Anciens, Nasuada, la fille du vieux chef, prend la tête des rebelles. Eragon et Saphira lui prêtent allégeance avant d&#039;entreprendre un long et périlleux voyage vers Ellesméra, le royaume des elfes, où ils doivent suivre leur formation.Là, ils découvrent avec stupeur qu&#039;Arya est la fille de la reine Islanzadì. Cette dernière leur présente en secret un dragon d&#039;or, Glaedr, chevauché par un Dragonnier, Oromis, qui n&#039;est autre que le Sage-en-Deuil, l&#039;Estropié-qui-est-Tout, le personnage qui était apparu à Eragon lorsqu&#039;il délirait, blessé par l&#039;Ombre. Oromis va devenir leur maître. Le jeune Dragonnier commence sa formation. Mais il n&#039;est pas au bout de ses découvertes. Des révélations dérangeantes entament sa confiance. Pendant longtemps, Eragon ne saura qui croire.Or, le danger n&#039;est toujours pas écarté : à Carvahall, Roran, son cousin, a engagé le combat contre les Ra&#039;zacs. Ceux-ci, persuadés qu&#039;il détient l&#039;oeuf qu&#039;Eragon avait trouvé sur la Crête, finissent par enlever sa fiancée. Prêt à tout pour la sauver, Roran comprend cependant qu&#039;il n&#039;est pas de taille à les affronter. Il convainc les villageois de traverser la Crête pour rejoindre les rebelles au Surda, en guerre contre le roi de l&#039;Empire, le cruel Galbatorix.', 'Christopher Paolini', '62d52b0b138b83.29228032.jpg', 0, '0', 58, '7.60', '', '', NULL, NULL),
(102, 'Da Vinci Code', '2', 'Robert Langdon, un éminent spécialiste de symbologie de Harvard, est convoqué d’urgence au Louvre. On a découvert un message codé sur le cadavre du conservateur en chef, retrouvé assassiné au milieu de la Grande Galerie. Pour examiner la série de pictogrammes, il est épaulé par Sophie Neveu, une brillante cryptographe membre de la police. À leur grande surprise, les premiers indices les conduisent à l&#039;œuvre de Léonard de Vinci. En déchiffrant le code, Langdon va mettre au jour l&#039;un des plus grands mystères de notre temps... et devenir un homme traqué.', 'Dan Brown', '62ea7be2381e76.84481369.jpg', 1, '1', 150, '12.50', '9782253001171 ', '2253001171', NULL, NULL),
(94, 'Le Petit Prince', '2', '&quot;Le premier soir je me suis donc endormi sur le sable à mille milles de toute terre habitée. J&#039;étais bien plus isolé qu&#039;un naufragé sur un radeau au milieu de l&#039;Océan. Alors vous imaginez ma surprise, au lever du jour, quand une drôle de petite voix m&#039;a réveillé. Elle disait : - S&#039;il vous plaît... dessine-moi un mouton !- Hein !- Dessine-moi un mouton...J&#039;ai sauté sur mes pieds comme si j&#039;avais été frappé par la foudre. J&#039;ai bien frotté mes yeux. J&#039;ai bien regardé.Et j&#039;ai vu un petit bonhomme tout à fait extraordinaire qui me considérait gravement.&quot;', 'Antoine de Saint-Exupéry', '62e7faeaa04aa0.79468090.jpg', 1, '0', 2, '50.00', '12324564', '4564654', NULL, NULL),
(96, 'Guerre et Paix', '1', 'Au début du XIX? siècle, Pierre Bézoukhov, fils illégitime héritier d&#039;une grande fortune, et son ami André Bolkonsky, officier tourmenté, évoluent dans une haute société russe francophile et mondaine qui ne tardera pas à être rattrapée par les tourments de la guerre qui s&#039;annonce. Le parcours spirituel et politique de Pierre, comme le trajet militaire d&#039;André, est inséparable du destin contrarié de la Russie : Saint-Pétersbourg et Moscou, la campagne et la ville, la Sibérie et l&#039;Europe... La Russie est bicéphale,...', 'Léon Tolstoï', '62e7fd48ce5123.70030219.jpg', 0, '0', 50, '12.00', '1232156456', '156465465641', NULL, NULL),
(107, 'Harry Potter La collection complète', '2', 'Les sept eBooks de la série Harry Potter au succès international et aux multiples récompenses sont disponibles en un seul téléchargement, avec une superbe couverture réalisée par Olly Moss. Profitez des histoires qui ont captivé l&#039;imagination de millions de personnes dans le monde entier.', 'J.K. Rowling', '62ea852cbe7729.11620050.jpg', 0, '1', 12, '7.50', '9781408856772', '1408856778', NULL, NULL),
(104, 'Harry Potter La collection complète', '2', 'test', 'JK', '62ea80201906f1.58784052.jpg', 1, '1', 20, '12.50', '123456', '654321', NULL, NULL),
(105, 'Harry Potter Tome 1', '2', 'Ecole des sorciers.', 'JK', '62ea8049c9b5a8.05802250.jpg', 1, '0', 20, '12.00', '12222548', '86465456', NULL, NULL),
(106, 'Harry Potter Tome 1', '2', '', 'KL', '62ea83e39f6222.68363369.jpg', 1, '1', 30, '23.00', '123456789', '987654321', NULL, NULL),
(108, 'De sang et de rage Tome 1', '5', 'Ils ont tué ma mère.\r\nIls ont pris notre magie.\r\nIls ont voulu nous éliminer.\r\nÀ présent, dressons-nous.\r\nIl fut un temps où la terre d&#039;Orïsha était baignée de magie. Mais une nuit, tout a basculé, le roi l&#039;a fait disparaître et a asservi le peuple des majis. Zélie Adebola n&#039;était alors qu&#039;une enfant. Aujourd&#039;hui, elle a le moyen de ramener la magie et de rendre la liberté à son peuple - même si face à elle se dresse le prince héritier du trône, prêt à tout pour la traquer.\r\nDans une Afrique imaginaire où rôdent les léopardaires blancs et où les esprits ont soif de vengeance, Zélie s&#039;élance dans une quête périlleuse...', 'Tomi Adeyemi', '62ea8c691b0b57.49970358.jpg', 0, '0', 0, '69.00', '01234567890', '09876543210', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=1016 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `password`, `gender`, `address`, `role`) VALUES
(1011, 'bob', 'bob', 'bob@example.com', '$2y$10$Z7pQNu3/a5bmkMpQtXD6Qe8TXceN.Y/UTGs2DZ5iK1MIgkMcaMKh6', '', NULL, 0),
(1005, 'Hervé', 'El Administrator', 'admin', '$2y$10$kVmd79p3cBcnH/20Rf/0B.2usQsXppFE.paJvezGtAcvjbfI.jmKS', 'administrator', NULL, 1),
(1015, 'Bob', 'Bobby', 'bob@example.com', '$2y$10$spWbUjm9rI3s1fhVhTBbN.m90.sMjVgDAWw4SApxNlRT8GP48kpee', '', NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
