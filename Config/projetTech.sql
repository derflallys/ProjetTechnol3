-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 02 fév. 2018 à 14:38
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetTech`
--

-- --------------------------------------------------------

--
-- Structure de la table `occupancy`
--

CREATE TABLE `occupancy` (
  `id_user` int(11) NOT NULL,
  `id_officies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `occupancy`
--

INSERT INTO `occupancy` (`id_user`, `id_officies`) VALUES
(1, 1),
(15, 3);

-- --------------------------------------------------------

--
-- Structure de la table `officies`
--

CREATE TABLE `officies` (
  `id_officies` int(11) NOT NULL,
  `tel_officies` varchar(10) DEFAULT NULL,
  `nbr_postes` int(11) DEFAULT NULL,
  `number_office` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `officies`
--

INSERT INTO `officies` (`id_officies`, `tel_officies`, `nbr_postes`, `number_office`) VALUES
(1, '5633213243', 3, 24),
(3, 'dsqf', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(70) NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `datenaiss` date NOT NULL,
  `tel_perso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`nom`, `prenom`, `login`, `password`, `id_user`, `datenaiss`, code) VALUES
('sylla', 'alfred', 'derfla', '4a700ec84b5396a79b26539c2433c6a0fb998dab', 1, '0000-00-00', ''),
('sfg', 'sqdf', 'sqdf', '66951aa3e36a43d777724bdfa2cc6e2af20360c3', 15, '0000-00-00', ''),
('wfsg', 'fwg', 'der', 'b73e18baed5334c2b5b64a4157ab64ee7b79b01d', 16, '0000-00-00', ''),
('jkglk', 'sdfqjhsqdf', 'hjgkj', 'fddd8327db8fbe1fba0bbb876243690c3d5622b6', 17, '0000-00-00', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `occupancy`
--
ALTER TABLE `occupancy`
  ADD PRIMARY KEY (`id_user`,`id_officies`),
  ADD KEY `occupancy_officies_id_officies_fk` (`id_officies`);

--
-- Index pour la table `officies`
--
ALTER TABLE `officies`
  ADD PRIMARY KEY (`id_officies`),
  ADD UNIQUE KEY `officies_number_office_uindex` (`number_office`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `officies`
--
ALTER TABLE `officies`
  MODIFY `id_officies` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `occupancy`
--
ALTER TABLE `occupancy`
  ADD CONSTRAINT `occupancy_officies_id_officies_fk` FOREIGN KEY (`id_officies`) REFERENCES `officies` (`id_officies`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `occupancy_users_id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
