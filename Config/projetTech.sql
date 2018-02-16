-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 16 fév. 2018 à 01:45
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
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(70) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `codepostale` varchar(10) NOT NULL,
  `verified` int(11) DEFAULT '0',
  `hashmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`nom`, `prenom`, `login`, `password`, `id_user`, `codepostale`, `verified`, `hashmail`) VALUES
('Aboubacar', 'Aboubac', 'dev@gmail.com', 'b73e18baed5334c2b5b64a4157ab64ee7b79b01d', 34, '33600', 1, '157c59bacb2592bae613adf2b3ed078e7a7fa8a0'),
('dsfgsr, n', 'sfd, dsfv', 'derfladev@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 35, '33300', 1, 'a19ed09cb141d3083d2cb48206db253476368e9a'),
('DIOP', 'Aissatou', 'test@test.sn', 'e3be69be474833e8fd39b34df9db9fa8e1150ada', 37, '17400', 1, 'ccc93d923f1335b907382b782ab7c11938721d96'),
('sqdf', 'tyuru', 'qsdf@dfg.fdg', '9c2a1bdc08bcff8b84b79af93aa77d633be036f0', 69, 'sqdf', 1, 'df0c8a3d4f65185101560daab68988c660a0e93b'),
('gffdg', 'sfgsdgf', 'dsfsf@gmail.com', 'b73e18baed5334c2b5b64a4157ab64ee7b79b01d', 74, 'sdfsdfs', 0, '30a669dcfe9d0ef46dc5ffd012b573b63cfd71b3'),
('SYLLA', 'Alfred', 'a.aboubacar.sylla@gmail.com', '31017a722665e4afce586950f42944a6d331dabf', 75, '17000', 1, '74f42a65cdf521f55f630698ce10b382675eb3b6'),
('Hamza', 'Seye', 'hamzatou10@hotmail.fr', 'b73e18baed5334c2b5b64a4157ab64ee7b79b01d', 76, '33600', 1, '1be47b8d8d2bf2bab6b2b3e604c63f660d40bca9');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
