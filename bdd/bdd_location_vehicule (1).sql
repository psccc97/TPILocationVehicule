-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 20 Mai 2017 à 18:51
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

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`idCommentaire`, `Commentaire`, `Note`) VALUES
(1, 'sdafasdfasfsd', 3),
(2, 'sdfgasdgdf', 4);

-- --------------------------------------------------------

--
-- Structure de la table `disponibilites`
--

CREATE TABLE `disponibilites` (
  `idDisponibilite` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idVehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `disponibilites`
--

INSERT INTO `disponibilites` (`idDisponibilite`, `dateDebut`, `dateFin`, `idVehicule`) VALUES
(14, '2017-05-20', '2017-05-30', 10),
(15, '2017-05-23', '2017-07-20', 11),
(19, '2017-05-31', '2017-06-07', 10);

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
(3, '50\'001-100\'000'),
(4, '+100\'000');

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

--
-- Contenu de la table `location`
--

INSERT INTO `location` (`dateDebut`, `dateFin`, `idUtilisateur`, `idCommentaire`, `idVehicule`) VALUES
('2017-05-22', '2017-05-25', 1, 1, 11),
('2017-05-21', '2017-05-27', 3, 2, 10);

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
(2, 'Opel'),
(3, 'Guzzi'),
(42, 'Renault'),
(44, 'Chevrolet');

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
(2, 'Corsa'),
(3, 'V9-Bobber'),
(33, 'Camaro'),
(36, 'Kagoo');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL,
  `Prenom` text NOT NULL,
  `motDePasse` text NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `Prenom`, `motDePasse`, `Status`) VALUES
(1, 'Lino', 'f6889fc97e14b42dec11a8c183ea791c5465b658', 0),
(2, 'Gabor', '897bfb876a90ab3aa16d9098fdde7aff22eaaa86', 1),
(3, 'Tony', '1b296a6518a5a002925b2abce29ee6ab4e865ae5', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `idVehicule` int(11) NOT NULL,
  `Type` enum('Utilitaire','Voiture','2 roues','') DEFAULT NULL,
  `Description` text,
  `Annee` int(11) DEFAULT NULL,
  `Categorie` enum('Familiale','Citadine','Sportive','') NOT NULL,
  `nbrPlace` int(11) DEFAULT NULL,
  `volumeUtile` int(11) DEFAULT NULL,
  `Motorisation` enum('Essence','Diesel','Gaz','Hybride','Electrique') NOT NULL,
  `Image` text NOT NULL,
  `Longitude` float NOT NULL,
  `Latitude` float NOT NULL,
  `idMarque` int(11) NOT NULL,
  `idModele` int(11) NOT NULL,
  `idKilometrage` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`idVehicule`, `Type`, `Description`, `Annee`, `Categorie`, `nbrPlace`, `volumeUtile`, `Motorisation`, `Image`, `Longitude`, `Latitude`, `idMarque`, `idModele`, `idKilometrage`, `idUtilisateur`) VALUES
(10, 'Utilitaire', 'dsfasdf', 2002, 'Citadine', 0, 200, 'Diesel', '591eedf0dc48erenault-kangoo.jpg', 46.2053, 6.18894, 42, 36, 3, 2),
(11, 'Voiture', 'sdfgdf', 2002, 'Citadine', 0, 20, 'Electrique', '591eeed351d85voiture.png', 46.1894, 6.10154, 2, 2, 1, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`idCommentaire`);

--
-- Index pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
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
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
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
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  MODIFY `idDisponibilite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `kilometrages`
--
ALTER TABLE `kilometrages`
  MODIFY `idKilometrage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `idMarque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `idModele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `idVehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  ADD CONSTRAINT `FK_disponibiles_idVehicule` FOREIGN KEY (`idVehicule`) REFERENCES `vehicules` (`idVehicule`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `FK_location_idCommentaire` FOREIGN KEY (`idCommentaire`) REFERENCES `commentaires` (`idCommentaire`),
  ADD CONSTRAINT `FK_location_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`),
  ADD CONSTRAINT `FK_location_idVehicule` FOREIGN KEY (`idVehicule`) REFERENCES `vehicules` (`idVehicule`);

--
-- Contraintes pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD CONSTRAINT `FK_vehicule_idKilometrage` FOREIGN KEY (`idKilometrage`) REFERENCES `kilometrages` (`idKilometrage`),
  ADD CONSTRAINT `FK_vehicule_idMarque` FOREIGN KEY (`idMarque`) REFERENCES `marques` (`idMarque`),
  ADD CONSTRAINT `FK_vehicule_idModele` FOREIGN KEY (`idModele`) REFERENCES `modeles` (`idModele`),
  ADD CONSTRAINT `FK_vehicule_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
