-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 09 mars 2018 à 12:52
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
-- Structure de la table `commentaire_forum`
--

CREATE TABLE `commentaire_forum` (
  `id_commentForum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `contenu_com` longtext NOT NULL,
  `date_com` datetime NOT NULL,
  `id_forum` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `alert` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` longtext NOT NULL,
  `statut` varchar(6) NOT NULL DEFAULT 'Ouvert',
  `date_creation` datetime NOT NULL,
  `alert` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id_forum`, `id_user`, `titre`, `contenu`, `statut`, `date_creation`, `alert`) VALUES
(1, 77, 'lJe teste mon Forum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dictum est vitae ipsum ornare faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam laoreet urna accumsan, mattis eros et, commodo purus. Sed a tristique lacus. Sed blandit condimentum justo, eget rutrum justo pharetra sed. Cras aliquet non eros id euismod. Morbi ligula odio, pretium eu sapien eget, euismod feugiat magna. Duis a lorem eu ante vulputate sodales. Vestibulum suscipit ex lacus, a varius elit porta vel. Suspendisse cursus mi dolor, non fringilla orci commodo vel. Nunc ante ligula, sodales id purus at, pretium faucibus nunc. Suspendisse ultrices condimentum nisl ac blandit. Sed aliquet dapibus lectus, at sollicitudin risus porttitor ac. In dignissim, velit sed tincidunt malesuada, nisl nulla fringilla quam, a congue lacus est vel erat. Pellentesque et ornare mi.', 'Ouvert', '2018-03-09 12:38:03', 0),
(2, 77, 'PUBG J\'aime bien', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dictum est vitae ipsum ornare faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam laoreet urna accumsan, mattis eros et, commodo purus. Sed a tristique lacus. Sed blandit condimentum justo, eget rutrum justo pharetra sed. Cras aliquet non eros id euismod. Morbi ligula odio, pretium eu sapien eget, euismod feugiat magna. Duis a lorem eu ante vulputate sodales. Vestibulum suscipit ex lacus, a varius elit porta vel. Suspendisse cursus mi dolor, non fringilla orci commodo vel. Nunc ante ligula, sodales id purus at, pretium faucibus nunc. Suspendisse ultrices condimentum nisl ac blandit. Sed aliquet dapibus lectus, at sollicitudin risus porttitor ac. In dignissim, velit sed tincidunt malesuada, nisl nulla fringilla quam, a congue lacus est vel erat. Pellentesque et ornare mi.', 'Ouvert', '2018-03-09 12:39:13', 0);

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
('Hamza', 'Seye', 'hamzatou10@hotmail.fr', 'b73e18baed5334c2b5b64a4157ab64ee7b79b01d', 76, '33600', 1, '1be47b8d8d2bf2bab6b2b3e604c63f660d40bca9'),
('SYLLA', 'Alfred', 'a.aboubacar.sylla@gmail.com', 'b73e18baed5334c2b5b64a4157ab64ee7b79b01d', 77, '17000', 1, '867ac4ee5638ad4d85855c7e56355c445479a99a'),
('SYLLA', 'Alfred', 'alfsylla@esp.sn', 'b73e18baed5334c2b5b64a4157ab64ee7b79b01d', 78, '78200', 1, '74f42a65cdf521f55f630698ce10b382675eb3b6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire_forum`
--
ALTER TABLE `commentaire_forum`
  ADD PRIMARY KEY (`id_commentForum`,`id_user`),
  ADD KEY `commentaire_forum_users_id_user_fk` (`id_user`),
  ADD KEY `commentaire_forum_forum_id_forum_fk` (`id_forum`),
  ADD KEY `commentaire_forum_commentaire_forum_id_commentForum_fk` (`id_parent`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`,`id_user`),
  ADD KEY `forum_users_id_user_fk` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire_forum`
--
ALTER TABLE `commentaire_forum`
  MODIFY `id_commentForum` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire_forum`
--
ALTER TABLE `commentaire_forum`
  ADD CONSTRAINT `commentaire_forum_commentaire_forum_id_commentForum_fk` FOREIGN KEY (`id_parent`) REFERENCES `commentaire_forum` (`id_commentForum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_forum_forum_id_forum_fk` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id_forum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_forum_users_id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_users_id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;