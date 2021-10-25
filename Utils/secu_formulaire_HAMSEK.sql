-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 25 oct. 2021 à 15:30
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
-- Base de données : `secu_formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--
CREATE DATABASE IF NOT EXISTS secu_formulaire_HAMSEK;
USE secu_formulaire_HAMSEK;

DROP TABLE IF EXISTS `user_list_HAMSEK`;
CREATE TABLE IF NOT EXISTS `user_list_HAMSEK` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(33) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user_list_HAMSEK` (`id`, `login`, `mdp`) VALUES
(10, 'ridley7', '$2y$10$HMUB2HwnBfiKfEYgSlJBRe7eFdc6VjJzjYKF13.PBBHHnvZ/bjb6q');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
