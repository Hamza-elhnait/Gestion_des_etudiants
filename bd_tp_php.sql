-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 29 avr. 2020 à 15:17
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_tp_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `matricule` varchar(12) NOT NULL,
  `nom_etud` varchar(30) NOT NULL,
  `prenom_etud` varchar(30) NOT NULL,
  `date_nais` date NOT NULL,
  `sexe` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adresse` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`matricule`, `nom_etud`, `prenom_etud`, `date_nais`, `sexe`, `adresse`) VALUES
('K1348154', 'drief', 'Adnane', '1999-01-27', 'M', 'HHHHHHHHHHHHHHH'),
('10', 'Zathin', 'Probbin', '1995-03-11', 'Female', '7008 Oriole Court'),
('9', 'Redhold', 'Madill', '1984-01-24', 'Male', '93 Hoard Drive'),
('8', 'Ventosanzap', 'Shewring', '1985-10-19', 'Female', '67858 Oak Terrace'),
('7', 'Regrant', 'Iorillo', '1987-06-30', 'Female', '5 Canary Plaza'),
('6', 'Stringtough', 'Barizeret', '2004-09-23', 'Female', '80 Meadow Ridge Point'),
('4', 'Zaam-Dox', 'Raw', '2000-03-06', 'Male', '4335 Darwin Trail'),
('3', 'Ventosanzap', 'Norrey', '1980-02-06', 'Female', '30006 Banding Circle'),
('2', 'Vagram', 'Sarney', '1999-11-22', 'Male', '50 Hanson Way'),
('1', 'Bitwolf', 'Deer', '2002-01-04', 'Female', '99 Stang Circle');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
