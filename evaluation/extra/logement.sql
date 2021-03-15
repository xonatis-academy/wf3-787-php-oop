-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 11 mars 2021 à 15:47
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eval`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE IF NOT EXISTS `logement` (
  `id_logement` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `surface` int NOT NULL,
  `prix` decimal(9,2) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id_logement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
