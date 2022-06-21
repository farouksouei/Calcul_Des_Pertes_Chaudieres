-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 21 nov. 2020 à 17:34
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestioncb`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datenaissance` date NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `datenaissance`, `adresse`, `tel`) VALUES
(1, 'Sekma', 'Mounir', '1981-08-17', 'Kuweit', 25132413),
(3, 'Abidi', 'Mohamed Ali', '1983-03-01', 'Rades', 98412365),
(4, 'Meherzi', 'Jamel', '1978-06-14', 'Bizerte', 20149875),
(5, 'Hamdoun', 'Mariem', '1980-11-12', 'ISET Bizerte', 111111111),
(6, 'Ouali', 'Mohamed', '2020-10-28', 'ISET Bizerte', 1212121),
(7, 'iset', 'iset', '2020-11-11', 'iset bizerte', 111111111);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `numcompte` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codebank` int(11) NOT NULL,
  `codeguichet` int(11) NOT NULL,
  `clerib` int(11) NOT NULL,
  `titulaire` int(25) NOT NULL,
  `solde` double NOT NULL,
  `devise` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'TND',
  `datecreation` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `numcompte`, `codebank`, `codeguichet`, `clerib`, `titulaire`, `solde`, `devise`, `datecreation`) VALUES
(1, '53326429272', 92324, 68623, 39, 1849616396, 1000, 'TND', '18-5-2017'),
(2, '90383584188', 64892, 84319, 71, 587075625, 3705, 'TND', '18-5-2017');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'bond', 'bond@bond.com', '$2y$10$Aftbq96utZq4gjXf9h6G6ulirIn0eYqlCWQzG2HjlZvWhgtsdQEmW'),
(2, 'meriem', 'meriem@gmail.com', '$2y$10$HXxCR.xYsJznixiQWGn0dOCSAQRg7TdEeBhCcmxshcD1Pb8AMkJY2'),
(3, 'sekma', 'sekma@gmail.com', '$2y$10$fSKQH5z2FaG4GGlm7mrOheAiM.QNFnTPqCvvTUs1vZGHYo05OHzZ.'),
(5, 'maher', 'ouali@gmail.com', 'aaaaaaa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
