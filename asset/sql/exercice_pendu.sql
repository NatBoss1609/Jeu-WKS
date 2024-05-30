-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 mai 2024 à 09:08
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `exercice_pendu`
--

-- --------------------------------------------------------

--
-- Structure de la table `mots`
--

DROP TABLE IF EXISTS `mots`;
CREATE TABLE IF NOT EXISTS `mots` (
  `id_mot` int NOT NULL AUTO_INCREMENT,
  `mot` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mot`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mots`
--

INSERT INTO `mots` (`id_mot`, `mot`) VALUES
(1, 'SURICATE'),
(2, 'BANANE'),
(3, 'PLANTE'),
(4, 'DINOSAURE'),
(5, 'TRAMPOLINE'),
(6, 'PISCINE'),
(7, 'RENARD'),
(8, 'LAPIN'),
(9, 'LOUTRE'),
(10, 'FRAISE');

-- --------------------------------------------------------

--
-- Structure de la table `parties`
--

DROP TABLE IF EXISTS `parties`;
CREATE TABLE IF NOT EXISTS `parties` (
  `id_partie` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int NOT NULL,
  `id_mot` int NOT NULL,
  `lettre` varchar(50) NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id_partie`),
  KEY `id_mot` (`id_mot`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `parties`
--

INSERT INTO `parties` (`id_partie`, `id_utilisateur`, `id_mot`, `lettre`, `score`) VALUES
(1, 1, 2, '', 10);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `mdp`, `photo`) VALUES
(1, 'Borgugnons', 'Tamara', 'borgugnons1511@gmail.com', '$2y$10$CpR8FK2e8./CT9mK1Ni/TucDWbbfjBIim58ZOOKm.p.bzyktVRqkK', '../image/Plante1.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
