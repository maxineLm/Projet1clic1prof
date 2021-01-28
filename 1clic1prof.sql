-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 19, 2021 at 10:48 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1clic1prof`
--

-- --------------------------------------------------------

--
-- Table structure for table `enseignement`
--

DROP TABLE IF EXISTS `enseignement`;
CREATE TABLE IF NOT EXISTS `enseignement` (
  `enseignement_id` int NOT NULL,
  `etudiant_id` int DEFAULT NULL,
  `professeur_id` int DEFAULT NULL,
  `matiere_id` int DEFAULT NULL,
  PRIMARY KEY (`enseignement_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enseignement`
--

INSERT INTO `enseignement` (`enseignement_id`, `etudiant_id`, `professeur_id`, `matiere_id`) VALUES
(0, 0, 0, 1),
(1, 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `professeur_id` int NOT NULL,
  PRIMARY KEY (`professeur_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `professeur`
--

INSERT INTO `professeur` (`professeur_id`) VALUES
(0),
(1);

-- --------------------------------------------------------

--
-- Table structure for table `type_matiere`
--

DROP TABLE IF EXISTS `type_matiere`;
CREATE TABLE IF NOT EXISTS `type_matiere` (
  `matiere_id` int NOT NULL,
  `nom_matiere` varchar(64) NOT NULL,
  PRIMARY KEY (`matiere_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `type_matiere`
--

INSERT INTO `type_matiere` (`matiere_id`, `nom_matiere`) VALUES
(0, 'Français'),
(1, 'Mathématique'),
(2, 'Physique');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `user_id` int UNSIGNED NOT NULL,
  `usr_nom` varchar(64) NOT NULL,
  `usr_prenom` varchar(64) NOT NULL,
  `usr_cp` int NOT NULL,
  `usr_telephone` varchar(64) NOT NULL,
  `usr_niveauEtude` varchar(64) NOT NULL,
  `usr_descriptionProfil` text NOT NULL,
  `usr_souhait` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`user_id`, `usr_nom`, `usr_prenom`, `usr_cp`, `usr_telephone`, `usr_niveauEtude`, `usr_descriptionProfil`, `usr_souhait`) VALUES
(0, 'Bievliet', 'Benjamin', 0, '0633097819', 'Desco', 'je suis un professeur', 'souhait ici'),
(1, 'Tothe', 'Maximilien', 0, '78098700878', 'Grocervo', 'description', 'un souhait');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
