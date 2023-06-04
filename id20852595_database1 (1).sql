-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 04 juin 2023 à 20:28
-- Version du serveur : 10.5.20-MariaDB
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id20852595_database1`
--

-- --------------------------------------------------------

--
-- Structure de la table `Cb`
--

CREATE TABLE `Cb` (
  `Numero` text NOT NULL,
  `Nom` text NOT NULL,
  `CCV` int(11) NOT NULL,
  `Date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Cb`
--

INSERT INTO `Cb` (`Numero`, `Nom`, `CCV`, `Date`) VALUES
('3333 3333 3333 3333', 'Ekollo', 333, '06/24'),
('3333333333333333', 'Ekollo', 333, '06/24');

-- --------------------------------------------------------

--
-- Structure de la table `Offre`
--

CREATE TABLE `Offre` (
  `Id` int(11) NOT NULL,
  `IdPrdoduit` int(11) NOT NULL,
  `Prix` int(11) NOT NULL,
  `IdAcheteur` int(11) NOT NULL,
  `IdVendeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Offre`
--

INSERT INTO `Offre` (`Id`, `IdPrdoduit`, `Prix`, `IdAcheteur`, `IdVendeur`) VALUES
(1, 6, 500, 1, 1),
(2, 6, 600, 1, 1),
(3, 4, 122, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE `Produit` (
  `Id` int(11) NOT NULL,
  `Nom` text NOT NULL,
  `Photo` text NOT NULL,
  `Description` text NOT NULL,
  `Categorie` text NOT NULL,
  `Prix` int(11) NOT NULL,
  `TypeVente` text NOT NULL,
  `PrixDepart` int(11) NOT NULL,
  `Vendeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Produit`
--

INSERT INTO `Produit` (`Id`, `Nom`, `Photo`, `Description`, `Categorie`, `Prix`, `TypeVente`, `PrixDepart`, `Vendeur`) VALUES
(1, 'PS4 d\'occasion', 'PS4.png', 'PS4 d\'occasion utilisé pendant 1 ans fonctionne encore très bien.\r\nFournit avec 3 manettes et Fifa 16', 'Jeux-Vidéo', 150, 'normal', 0, 1),
(2, 'Machine a laver', 'Laver.png', 'Découvrez la machine à laver LavoTurbo, une solution pratique et efficace pour des vêtements d\'une propreté éclatante. Avec sa capacité généreuse de [capacité en kilogrammes], elle répond aux besoins de toute la famille. Dotée d\'un panneau de commande intuitif, elle propose une variété de programmes pour un lavage adapté à chaque type de vêtement. Son système de lavage optimisé élimine les taches tout en économisant l\'eau et l\'énergie. La sécurité est garantie grâce aux fonctionnalités de verrouillage de porte et de détection des fuites d\'eau. Enfin, son design moderne s\'intègre harmonieusement à votre intérieur.', 'Maison', 450, 'normal', 0, 1),
(3, 'Pull Nike', 'PullNike.png', 'Pule Nike bleu jamais porté acheté au nike store de chatlet. Ticket de caisse a l\'appuie', 'Vêtement ', 50, 'normal', 0, 1),
(4, 'Ballon de basket', 'BallonBasket.png', 'Ballon de basket Spalding taille 7 outdoor et indoor ', 'Sport', 30, 'normal', 0, 1),
(5, 'Iphone 8', 'Iphone8.png', 'Iphone 8 rouge en bon état', 'Multimédia', 290, 'normal', 0, 1),
(6, 'test', 'test', 'test', 'test', 100, 'enchere', 100, 1),
(7, 'test', 'test', 'test', 'test', 100, 'normal', 100, 1);

-- --------------------------------------------------------

--
-- Structure de la table `PromoDuJour`
--

CREATE TABLE `PromoDuJour` (
  `IdProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `PromoDuJour`
--

INSERT INTO `PromoDuJour` (`IdProduit`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `Transaction`
--

CREATE TABLE `Transaction` (
  `Id` int(11) NOT NULL,
  `IdAcheteur` int(11) NOT NULL,
  `Prix` int(11) NOT NULL,
  `NmbArticle` int(11) NOT NULL,
  `Date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Transaction`
--

INSERT INTO `Transaction` (`Id`, `IdAcheteur`, `Prix`, `NmbArticle`, `Date`) VALUES
(0, 1, 80, 2, '2023-06-03'),
(0, 1, 80, 2, '2023-06-03'),
(0, 1, 80, 2, '2023-06-03');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `Id` int(11) NOT NULL,
  `Nom` text NOT NULL,
  `Prenom` text NOT NULL,
  `Email` text NOT NULL,
  `Mdp` text NOT NULL,
  `Type` text NOT NULL,
  `Photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`Id`, `Nom`, `Prenom`, `Email`, `Mdp`, `Type`, `Photo`) VALUES
(1, 'benzidoune', 'fares', 'benzidoun87000@gmail.com', 'Joshua87', 'acheteur', 'b.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Offre`
--
ALTER TABLE `Offre`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Produit`
--
ALTER TABLE `Produit`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Offre`
--
ALTER TABLE `Offre`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Produit`
--
ALTER TABLE `Produit`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
