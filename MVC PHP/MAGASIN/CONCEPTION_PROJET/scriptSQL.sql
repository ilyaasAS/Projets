-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 13 juil. 2023 à 15:03
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
-- Base de données : `rh_magasin`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  `quantite` int NOT NULL,
  `description` text,
  `image` varchar(50) DEFAULT NULL,
  `categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `libelle`, `prix`, `quantite`, `description`, `image`, `categorie`) VALUES
(1, 'Clavier', '50.00', 10, 'informatique informatique informatique informatique informatique informatique informatique informatique informatique informatique ', 'Fugiat reprehenderi', 'informatique'),
(2, 'souris', '20.00', 160, 'informatique informatique informatique informatique informatique informatique informatique informatique informatique informatique informatique informatique informatique ', 'souris', 'informatique');

-- --------------------------------------------------------

--
-- Structure de la table `article_panier`
--

DROP TABLE IF EXISTS `article_panier`;
CREATE TABLE IF NOT EXISTS `article_panier` (
  `article` int NOT NULL,
  `panier` int NOT NULL,
  `quantite` int DEFAULT NULL,
  PRIMARY KEY (`article`,`panier`),
  KEY `id_panier` (`panier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id_avis` int NOT NULL AUTO_INCREMENT,
  `avis` varchar(100) NOT NULL,
  `article` int NOT NULL,
  `utilisateur` int NOT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `article` (`article`),
  KEY `utilisateur` (`utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_cmd` datetime DEFAULT NULL,
  `client` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur` (`client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lignedecommande`
--

DROP TABLE IF EXISTS `lignedecommande`;
CREATE TABLE IF NOT EXISTS `lignedecommande` (
  `article` int NOT NULL,
  `commande` int NOT NULL,
  `quantite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`article`,`commande`),
  KEY `id_cmd` (`commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur` (`client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sexe` varchar(6) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `login` varchar(10) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `statut` varchar(10) NOT NULL,
  `adresse` varchar(440) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `tel` (`tel`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `sexe`, `prenom`, `nom`, `login`, `mdp`, `tel`, `email`, `statut`, `adresse`, `cp`, `ville`) VALUES
(1, 'homme', 'fgfgfg', 'fgfgfg', 'ilrtrrtr', 'rtrtrtrt', '', '', 'client', '', '', ''),
(2, 'homme', 'Harouna Djiby', 'Kane', 'rhalt1', '$2y$10$yWeJ/u/ah/3Rv3JFP5.eEenNZjhe77/EX5lxTrFk9EOB2w7VqaQ5i', 'lulu@gmail.com', '+1 (206) 863-5186', 'client', '63 A, rue des Bougimonts', '78130', 'Sira Mamadou Bocar'),
(3, 'homme', 'Rem id du', 'Odio recusa', 'Qudgdffg', 'Pauuiuiui', 'danyruq@mailina', 'Ut dolor aliqua Ius', 'client', 'Recusandae Sit ad ', 'Itaqu', 'Sit dolores sed enim'),
(4, 'homme', 'Nulla ipsum', 'In sit culpa ni', 'Totam e', '$2y$10$xSo0rBps5KS1K7Vam5hZsevroqH15FYOyxavuKAER9ms9pFsDnEUG', 'vugen@mailinato', 'Sed temporibus illum', 'client', 'Veniam quo aut labo', 'Corpo', 'Non dolorem rerum vo');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article_panier`
--
ALTER TABLE `article_panier`
  ADD CONSTRAINT `article_panier_ibfk_1` FOREIGN KEY (`article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `article_panier_ibfk_2` FOREIGN KEY (`panier`) REFERENCES `panier` (`id`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`client`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `lignedecommande`
--
ALTER TABLE `lignedecommande`
  ADD CONSTRAINT `lignedecommande_ibfk_1` FOREIGN KEY (`article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `lignedecommande_ibfk_2` FOREIGN KEY (`commande`) REFERENCES `commande` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`client`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
