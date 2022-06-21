-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 juin 2022 à 13:28
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `element_chimique`
--

CREATE TABLE `element_chimique` (
  `id_element` int(11) NOT NULL,
  `nom_element` varchar(25) NOT NULL,
  `pourcentage` double NOT NULL,
  `debit_massique` double NOT NULL,
  `masse_molaire` double NOT NULL,
  `debit_molaire` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `element_chimique`
--

INSERT INTO `element_chimique` (`id_element`, `nom_element`, `pourcentage`, `debit_massique`, `masse_molaire`, `debit_molaire`) VALUES
(1, 'Carbone', 0.87, 1305, 0.012, 108750),
(2, 'Hydrogéne', 0.12, 87.12, 0.001, 87120),
(3, 'Soufre', 0.006, 4.356, 0.032, 136.125),
(4, 'Oxygéne', 0.0035, 2.541, 0.016, 158.8125),
(5, 'Azote', 0.0024, 1.7424, 0.014, 124.45714285714);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `element_chimique`
--
ALTER TABLE `element_chimique`
  ADD PRIMARY KEY (`id_element`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `element_chimique`
--
ALTER TABLE `element_chimique`
  MODIFY `id_element` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
