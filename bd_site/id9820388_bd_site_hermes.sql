-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2019 at 08:01 PM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id9820388_bd_site_hermes`
--

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

CREATE TABLE `auteur` (
  `NumAuteur` int(11) NOT NULL,
  `NomAuteur` varchar(20) NOT NULL,
  `PrenomAuteur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`NumAuteur`, `NomAuteur`, `PrenomAuteur`) VALUES
(6, 'Rowling', 'J.K.'),
(7, 'Tolkien', 'J.R.R.'),
(8, 'Hugo', 'Victor'),
(9, 'Camus', 'Albert'),
(10, 'Martin', 'Georges R. R.');

-- --------------------------------------------------------

--
-- Table structure for table `categorielivre`
--

CREATE TABLE `categorielivre` (
  `NumCategorie` int(11) NOT NULL,
  `NomCategorie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorielivre`
--

INSERT INTO `categorielivre` (`NumCategorie`, `NomCategorie`) VALUES
(1, 'a'),
(3, 'test'),
(4, 'Fantastique'),
(5, 'Classique'),
(6, 'philosophique');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `NumCommande` int(11) NOT NULL,
  `NumLivre` int(11) NOT NULL,
  `NumMembre` int(11) NOT NULL,
  `DateCommande` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `formatlivre`
--

CREATE TABLE `formatlivre` (
  `NumFormat` int(11) NOT NULL,
  `NomFormat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formatlivre`
--

INSERT INTO `formatlivre` (`NumFormat`, `NomFormat`) VALUES
(1, 'Papier'),
(2, 'Electronique'),
(3, 'Audio');

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

CREATE TABLE `livre` (
  `IdLivre` int(5) NOT NULL,
  `NomLivre` varchar(500) NOT NULL,
  `DescriptionLivre` varchar(1000) NOT NULL,
  `NumFormat` int(1) NOT NULL,
  `NumCategorie` int(2) DEFAULT NULL,
  `NumCategorie2` int(2) DEFAULT NULL,
  `NumCategorie3` int(2) DEFAULT NULL,
  `NumAuteur` int(2) DEFAULT NULL,
  `NumMaison` int(2) DEFAULT NULL,
  `DateProd` date DEFAULT NULL,
  `Quantite` int(4) DEFAULT NULL,
  `Prix` double DEFAULT NULL,
  `Statut` tinyint(1) DEFAULT NULL,
  `Lien DL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`IdLivre`, `NomLivre`, `DescriptionLivre`, `NumFormat`, `NumCategorie`, `NumCategorie2`, `NumCategorie3`, `NumAuteur`, `NumMaison`, `DateProd`, `Quantite`, `Prix`, `Statut`, `Lien DL`) VALUES
(54, 'Harry Potter', 'Après la mort de ses parents, Harry Potter est recueilli par sa tante maternelle Pétunia et son oncle Vernon à l\'âge d\'un an. Ces derniers traitent froidement leur neveu et demeurent indifférents aux humiliations que leur fils Dudley lui fait subir. Harry ignore tout de l\'histoire de ses parents, si ce n\'est qu\'ils ont été, semble-t-il, tués dans un accident de voiture. Cependant, le jour des onze ans de Harry, un demi-géant du nom de Rubeus Hagrid vient le chercher pour l\'informer de son inscription à Poudlard, une école de sorcellerie où il est inscrit depuis sa naissance, et lui remettre sa lettre. Il lui révèle qu’il a toujours été un sorcier, tout comme l\'étaient ses parents, tués en réalité par le plus puissant mage noir du monde de la sorcellerie : Voldemort.', 1, 4, 1, 1, 6, 1, '1997-06-26', 100, 8, 1, NULL),
(55, 'Le seigneur des anneaux', 'Prenant place dans le monde de fiction de la Terre du Milieu, il suit la quête du hobbit Frodo Bessac, qui doit détruire l\'Anneau unique afin que celui-ci ne tombe pas entre les mains de Sauron, le Seigneur des ténèbres. Plusieurs personnages lui viennent en aide, parmi lesquels son serviteur Sam, le mage Gandalf ou encore l\'humain Aragorn, héritier d\'une longue lignée de rois.', 1, 4, 1, 1, 7, 1, '1954-01-01', 50, 10, 1, NULL),
(56, 'Le trône de fer', 'L\'histoire se déroule dans un monde imaginaire où la société est de type féodal et où la magie et des créatures légendaires (telles que les dragons) ont existé mais sont censées avoir disparu. Trois intrigues principales s\'y entremêlent : dans le royaume des Sept Couronnes, plusieurs maisons nobles rivalisent pour l\'obtention du trône ; dans les contrées glacées situées au nord du royaume, une race de créatures supposée appartenir aux légendes se réveille ; et sur le continent oriental, la dernière héritière des Targaryen (la dynastie royale des Sept Couronnes renversée quinze ans auparavant), cherche à reconquérir le trône.', 2, 4, 1, 1, 10, 1, '1996-03-09', 120, 12, 1, NULL),
(57, 'Les Misérables', 'L\'action se déroule en France au cours du premier tiers du xixe siècle, entre la bataille de Waterloo (1815) et les émeutes de juin 1832. On y suit, sur cinq tomes, la vie de Jean Valjean, de sa sortie du bagne jusqu\'à sa mort. Autour de lui gravitent les personnages, dont certains vont donner leur nom aux différents tomes du roman, témoins de la misère de ce siècle, misérables eux-mêmes ou proches de la misère : Fantine, Cosette, Marius, mais aussi les Thénardier (dont Éponine, Azelma et Gavroche) ainsi que le représentant de la loi, Javert.', 2, 5, 1, 1, 8, 1, '1862-05-21', 110, 6, 1, NULL),
(58, 'L\'Etranger', 'Le roman met en scène un personnage-narrateur nommé Meursault, vivant à Alger en Algérie française. \r\nAu début de la première partie, Meursault reçoit un télégramme annonçant que sa mère, qu\'il a internée à l’hospice de Marengo, vient de mourir. Il se rend en autocar à l’asile de vieillards, situé près d’Alger. Veillant la morte toute la nuit, il assiste le lendemain à la mise en bière et aux funérailles, sans avoir l\'attitude attendue d’un fils endeuillé ; le héros ne pleure pas, il ne veut pas simuler un chagrin qu\'il ne ressent pas.', 3, 6, 1, 1, 9, 1, '1942-01-28', 25, 11, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maisonedition`
--

CREATE TABLE `maisonedition` (
  `NumMaison` int(11) NOT NULL,
  `NomMaison` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maisonedition`
--

INSERT INTO `maisonedition` (`NumMaison`, `NomMaison`) VALUES
(1, 'Maison 1');

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `NumMembre` int(11) NOT NULL,
  `Login` varchar(20) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `Prenom` varchar(20) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Ville` varchar(255) DEFAULT NULL,
  `Pays` varchar(255) DEFAULT NULL,
  `CodePostal` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Statut` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`NumMembre`, `Login`, `Mdp`, `Mail`, `Nom`, `Prenom`, `Adresse`, `Ville`, `Pays`, `CodePostal`, `Telephone`, `Statut`) VALUES
(5, 'aaa', 'test', 'aaa@gmail.com', 'DUPONT', 'Jean', 'dsqfda', 'Marly le roi', 'France', '78160', '0123456789', 1),
(7, 'fff', 'abc', 'bbb@gmail.com', 'ADMIN', 'Admin', NULL, 'Marly le roi', 'France', '78160', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pdv`
--

CREATE TABLE `pdv` (
  `NumPDV` int(11) NOT NULL,
  `Adresse` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Telephone` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`NumAuteur`);

--
-- Indexes for table `categorielivre`
--
ALTER TABLE `categorielivre`
  ADD PRIMARY KEY (`NumCategorie`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`NumCommande`,`NumLivre`,`NumMembre`),
  ADD KEY `FK_Livre` (`NumLivre`),
  ADD KEY `FK_Membre` (`NumMembre`);

--
-- Indexes for table `formatlivre`
--
ALTER TABLE `formatlivre`
  ADD PRIMARY KEY (`NumFormat`);

--
-- Indexes for table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`IdLivre`),
  ADD KEY `FK_Categorie1` (`NumCategorie`),
  ADD KEY `FK_Categorie2` (`NumCategorie2`),
  ADD KEY `FK_Categorie3` (`NumCategorie3`),
  ADD KEY `FK_Format` (`NumFormat`),
  ADD KEY `FK_MaisonEdition` (`NumMaison`),
  ADD KEY `FK_Auteur` (`NumAuteur`);

--
-- Indexes for table `maisonedition`
--
ALTER TABLE `maisonedition`
  ADD PRIMARY KEY (`NumMaison`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`NumMembre`),
  ADD UNIQUE KEY `Unique Login` (`Login`);

--
-- Indexes for table `pdv`
--
ALTER TABLE `pdv`
  ADD PRIMARY KEY (`NumPDV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `NumAuteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categorielivre`
--
ALTER TABLE `categorielivre`
  MODIFY `NumCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `formatlivre`
--
ALTER TABLE `formatlivre`
  MODIFY `NumFormat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `livre`
--
ALTER TABLE `livre`
  MODIFY `IdLivre` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `maisonedition`
--
ALTER TABLE `maisonedition`
  MODIFY `NumMaison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `NumMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pdv`
--
ALTER TABLE `pdv`
  MODIFY `NumPDV` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_Livre` FOREIGN KEY (`NumLivre`) REFERENCES `livre` (`IdLivre`),
  ADD CONSTRAINT `FK_Membre` FOREIGN KEY (`NumMembre`) REFERENCES `membre` (`NumMembre`);

--
-- Constraints for table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `FK_Auteur` FOREIGN KEY (`NumAuteur`) REFERENCES `auteur` (`NumAuteur`),
  ADD CONSTRAINT `FK_Categorie1` FOREIGN KEY (`NumCategorie`) REFERENCES `categorielivre` (`NumCategorie`),
  ADD CONSTRAINT `FK_Categorie2` FOREIGN KEY (`NumCategorie2`) REFERENCES `categorielivre` (`NumCategorie`),
  ADD CONSTRAINT `FK_Categorie3` FOREIGN KEY (`NumCategorie3`) REFERENCES `categorielivre` (`NumCategorie`),
  ADD CONSTRAINT `FK_Format` FOREIGN KEY (`NumFormat`) REFERENCES `formatlivre` (`NumFormat`),
  ADD CONSTRAINT `FK_MaisonEdition` FOREIGN KEY (`NumMaison`) REFERENCES `maisonedition` (`NumMaison`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
