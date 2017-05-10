-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 10 Mai 2017 à 12:55
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_location_vehicule`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `idCommentaire` int(11) NOT NULL,
  `Commentaire` text,
  `Note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `disponibiles`
--

CREATE TABLE `disponibiles` (
  `idDisponibilite` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idVehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `kilometrages`
--

CREATE TABLE `kilometrages` (
  `idKilometrage` int(11) NOT NULL,
  `nbrKilometrage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `kilometrages`
--

INSERT INTO `kilometrages` (`idKilometrage`, `nbrKilometrage`) VALUES
(1, '0-20\'000'),
(2, '20\'001-50\'000'),
(3, '50\'001-100\'000');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `dateDebut` date NOT NULL,
  `dateFin` date DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idCommentaire` int(11) NOT NULL,
  `idVehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `idMarque` int(11) NOT NULL,
  `nomMarque` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `marques`
--

INSERT INTO `marques` (`idMarque`, `nomMarque`) VALUES
(1, 'Alfa Romeo'),
(2, 'Opel');

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

CREATE TABLE `modeles` (
  `idModele` int(11) NOT NULL,
  `nomModele` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `modeles`
--

INSERT INTO `modeles` (`idModele`, `nomModele`) VALUES
(1, 'Giulia'),
(2, 'Corsa');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `prenom` text NOT NULL,
  `motDePasse` text NOT NULL,
  `statu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `prenom`, `motDePasse`, `statu`) VALUES
(1, 'Lino', 'Super', 0),
(2, 'Gabor', 'Super1', 1),
(3, 'Tony', 'Super4', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `idVehicule` int(11) NOT NULL,
  `Type` enum('Utilitaire','Voiture','2 roues','') DEFAULT NULL,
  `Annee` text,
  `Categorie` enum('Familiale','Citadine','Sportive','') NOT NULL,
  `nbrPlace` int(11) DEFAULT NULL,
  `volumeUtile` text,
  `Motorisation` enum('Essence','Diesel','Gaz','Hybride','Electrique') NOT NULL,
  `Image` text,
  `idMarque` int(11) NOT NULL,
  `idModele` int(11) NOT NULL,
  `idKilometrage` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`idVehicule`, `Type`, `Annee`, `Categorie`, `nbrPlace`, `volumeUtile`, `Motorisation`, `Image`, `idMarque`, `idModele`, `idKilometrage`, `idUtilisateur`) VALUES
(3, 'Utilitaire', '1999', 'Citadine', 5, NULL, 'Hybride', NULL, 1, 1, 2, 1),
(4, 'Voiture', '2004', 'Familiale', 9, NULL, 'Diesel', NULL, 2, 2, 3, 2),
(5, 'Voiture', NULL, 'Sportive', NULL, NULL, 'Electrique', NULL, 2, 2, 3, 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`idCommentaire`);

--
-- Index pour la table `disponibiles`
--
ALTER TABLE `disponibiles`
  ADD PRIMARY KEY (`idDisponibilite`),
  ADD KEY `FK_disponibiles_idVehicule` (`idVehicule`);

--
-- Index pour la table `kilometrages`
--
ALTER TABLE `kilometrages`
  ADD PRIMARY KEY (`idKilometrage`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`idUtilisateur`,`idCommentaire`,`idVehicule`),
  ADD KEY `FK_location_idCommentaire` (`idCommentaire`),
  ADD KEY `FK_location_idVehicule` (`idVehicule`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`idMarque`);

--
-- Index pour la table `modeles`
--
ALTER TABLE `modeles`
  ADD PRIMARY KEY (`idModele`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`idVehicule`),
  ADD KEY `FK_vehicule_idMarque` (`idMarque`),
  ADD KEY `FK_vehicule_idModele` (`idModele`),
  ADD KEY `FK_vehicule_idKilometrage` (`idKilometrage`),
  ADD KEY `FK_vehicule_idUtilisateur` (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `disponibiles`
--
ALTER TABLE `disponibiles`
  MODIFY `idDisponibilite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `kilometrages`
--
ALTER TABLE `kilometrages`
  MODIFY `idKilometrage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `idMarque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `idModele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `idVehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `disponibiles`
--
ALTER TABLE `disponibiles`
  ADD CONSTRAINT `FK_disponibiles_idVehicule` FOREIGN KEY (`idVehicule`) REFERENCES `vehicule` (`idVehicule`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `FK_location_idCommentaire` FOREIGN KEY (`idCommentaire`) REFERENCES `commentaires` (`idCommentaire`),
  ADD CONSTRAINT `FK_location_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `FK_location_idVehicule` FOREIGN KEY (`idVehicule`) REFERENCES `vehicule` (`idVehicule`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `FK_vehicule_idKilometrage` FOREIGN KEY (`idKilometrage`) REFERENCES `kilometrages` (`idKilometrage`),
  ADD CONSTRAINT `FK_vehicule_idMarque` FOREIGN KEY (`idMarque`) REFERENCES `marques` (`idMarque`),
  ADD CONSTRAINT `FK_vehicule_idModele` FOREIGN KEY (`idModele`) REFERENCES `modeles` (`idModele`),
  ADD CONSTRAINT `FK_vehicule_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
