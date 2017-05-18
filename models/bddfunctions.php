<?php

/*
 * Fichier : modele bddfunctions
 * Auteur: Pascucci Lino
 * Date: 10.05.2017
 * Version : 1.0
 * Description : contient les fonctions intéragissant avec la base de donnée
 */

require_once 'connexionbdd.php';

//FONCTION DE CONNEXION////////////////////////////////////////////////////////////////////////
/**
 * Cette fonction récupère les donnée de la table utilisateur en fonction des paramètres
 * @param type $pseudo : le prenom de l'utilisateur
 * @param type $mdp : le mot de passe de l'utilisateur
 * @return type
 */
function verifIdentificationUtilisateur($prenom, $mdp) {
    $bdd = connexionBdd();
    $sql = "SELECT * FROM utilisateurs WHERE Prenom = :prenom AND motDePasse = :mdp";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':prenom', $prenom);
    $requete->bindParam(':mdp', $mdp);
    $requete->execute();
    $reslt = $requete->fetch(PDO::FETCH_ASSOC);
    return $reslt;
}

//FONCTION D'AFFICHAGE DE DONNEES/////////////////////////////////////////////////////////////////////
/**
 * Cette fonction récupèer toute les données du véhicule
 * J'utilise cette fonction pour afficher les données dans la page d'accueil
 * @return type
 */

/*function recupereVehicules() {
    $bdd = connexionBdd();
    $sql = "SELECT *" .
            "FROM vehicules AS v, marques AS m, modeles AS mo, kilometrages AS k, disponibilites AS d " .
            "WHERE v.idMarque = m.idMarque " .
            "AND v.idVehicule = d.idVehicule " .
            "AND v.idModele = mo.idModele " .
            "AND v.idKilometrage = k.idKilometrage";
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $reslt = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $reslt;
}
*/

/**
 * Cette fonction récupère les données d'un véhicule selon son id
 * de l'utilise par exemple pour afficher les détails d'un véhicule
 * @param type $idVehicule
 * @return type
 */
function recupereVehicleSelonId($idVehicule) {
    $bdd = connexionBdd();
    $sql = "SELECT * " .
            "FROM vehicules AS v, marques AS m, modeles AS mo, kilometrages AS k, disponibilites AS d " .
            "WHERE v.idMarque = m.idMarque " .
            "AND v.idVehicule = d.idVehicule " .
            "AND v.idModele = mo.idModele " .
            "AND v.idKilometrage = k.idKilometrage " .
            "AND v.idVehicule = :idVehicule";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(":idVehicule", $idVehicule);
    $requete->execute();
    $reslt = $requete->fetch(PDO::FETCH_ASSOC);
    return $reslt;
}

/**
 * 
 * @return type
 */
function recupereKilometrages() {
    $bdd = connexionBdd();
    $sql = "SELECT * FROM kilometrages";
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $reslt = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $reslt;
}

/**
 * 
 * @return type
 */
function recupereMarques() {
    $bdd = connexionBdd();
    $sql = "SELECT * FROM marques ORDER BY nomMarque ASC";
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $reslt = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $reslt;
}

function recupereModeles() {
    $bdd = connexionBdd();
    $sql = "SELECT * FROM modeles ORDER BY nomModele ASC";
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $reslt = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $reslt;
}

/**
 * J'utilise cette fonction pour pouvoir récuperer l'id d'une marque
 * Je l'utiise dans la fonction 'louerVehicule'
 * @param type $nomMarque
 * @return type
 */
function recupereIdMarque($nomMarque) {
    $bdd = connexionBdd();
    $sql = "SELECT idMarque FROM marques WHERE nomMarque = :nomMarque";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':nomMarque', $nomMarque);
    $requete->execute();
    $reslt = $requete->fetch(PDO::FETCH_ASSOC);
    return $reslt;
}

function recupereNomMarqueSelonIdMarque($idMarque) {
    $bdd = connexionBdd();
    $sql = "SELECT * FROM marques WHERE idMarque = :idMarque";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':idMarque', $idMarque);
    $requete->execute();
    $reslt = $requete->fetch(PDO::FETCH_ASSOC);
    return $reslt;
}

/**
 * Cette fonction récupère les données de tout les véhicules mais si il y a le paramètre 'idUtilisateur' alors cette fonction récupère les véhicules d'un seul utilisateur
 * Je l'utilise pour afficher les véhicules à la page d'accueil et pour voir les véhicules qu'a mit en location un utilisateur
 * @param type $idUtilisateur
 * @return type
 */
function recupereVehicules($idUtilisateur = null) {
    $bdd = connexionBdd();
    $sql = 'SELECT * '
            . 'FROM `vehicules` AS v, modeles AS mo, marques AS m, kilometrages AS k, disponibilites AS d '
            . 'WHERE '
            . 'v.idVehicule = d.idVehicule AND '
            . 'v.idMarque = m.idMarque AND '
            . 'v.idModele = mo.idModele AND '
            . 'v.idKilometrage = k.idKilometrage ';
    if ($idUtilisateur != null)
        $sql .= 'AND idUtilisateur = :idUtilisateur';
    $requete = $bdd->prepare($sql);
    if ($idUtilisateur != null)
        $requete->bindParam(':idUtilisateur', $idUtilisateur);
    $requete->execute();
    $reslt = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $reslt;
}

/**
 * 
 * @param type $idMarque
 * @param type $idModele
 * @param type $idKilometrage
 * @param type $type
 * @param type $categorie
 * @param type $motorisation
 * @param type $annee
 * @param type $volumeUtile
 * @param type $nbrPlace
 * @param type $dateDebut
 * @param type $dateFin
 * @return type
 */
function recupereVehiculesSelonRecherche($idMarque, $idModele, $idKilometrage, $type, $categorie, $motorisation, $annee, $volumeUtile, $nbrPlace, $dateDebut, $dateFin) {
    $bdd = connexionBdd();
    $sql = "SELECT * FROM vehicules AS v, disponibilites AS d, modeles AS mo, marques AS m, kilometrages AS k " .
            "WHERE v.idMarque = m.idMarque " .
            "AND v.idVehicule = d.idVehicule " .
            "AND v.idModele = mo.idModele " .
            "AND v.idKilometrage = k.idKilometrage";
    if ($idMarque != "") {
        $sql .= " AND v.idMarque =:idMarque";
    }
    if ($idModele != "") {
        $sql .= " AND v.idModele = :idModele";
    }
    if ($idKilometrage != "") {
        $sql .= " AND v.idKilometrage = :idKilometrage";
    }
    if ($categorie != "") {
        $sql .= " AND v.Categorie = :categorie";
    }
    if ($motorisation != "") {
        $sql .= " AND v.Motorisation = :motorisation";
    }
    if ($annee != "") {
        $sql .= " AND v.Annee = :annee";
    }
    if ($volumeUtile != "") {
        $sql .= " AND v.volumeUtile = :volumeUtile";
    }
    if ($nbrPlace != "") {
        $sql .= " AND v.nbrPlace = :nbrPlace";
    }

    if ($dateDebut != "" && $dateFin != "") {
        $sql .= " AND ( :dateDebut >= d.dateDebut AND :dateFin <= d.dateFin)";
    }
    /*
      if($dateDebut !=""){
      $sql .= " AND d.dateDebut = :dateDebut";
      }
      if($dateFin !=""){
      $sql .= " AND d.dateFin = :dateFin";
      }
     */
    if ($type != "") {
        $sql .= " AND v.Type = :type";
    }

    $requete = $bdd->prepare($sql);

    if ($idMarque != "") {
        $requete->bindParam(':idMarque', $idMarque);
    }
    if ($idModele != "") {
        $requete->bindParam(':idModele', $idModele);
    }
    if ($idKilometrage != "") {
        $requete->bindParam(':idKilometrage', $idKilometrage);
    }
    if ($categorie != "") {
        $requete->bindParam(':categorie', $categorie);
    }
    if ($motorisation != "") {
        $requete->bindParam(':motorisation', $motorisation);
    }
    if ($annee != "") {
        $requete->bindParam(':annee', $annee);
    }
    if ($volumeUtile != "") {
        $requete->bindParam(':volumeUtile', $volumeUtile);
    }
    if ($nbrPlace != "") {
        $requete->bindParam(':nbrPlace', $nbrPlace);
    }
    if ($dateDebut != "" && $dateFin != "") {
        $requete->bindParam(':dateDebut', $dateDebut);
        $requete->bindParam(':dateFin', $dateFin);
    }
    /*
      if($dateDebut !=""){
      $requete->bindParam(':dateDebut', $dateDebut);
      }
      if($dateFin !=""){
      $requete->bindParam(':dateFin', $dateFin);
      }
     */
    if ($type != "") {
        $requete->bindParam(':type', $type);
    }

    $requete->execute();
    $reslt = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $reslt;
}

//FONCTION D'AJOUT//////////////////////////////////////////////////////////////////////////
/**
 * 
 * @param type $type
 * @param type $description
 * @param type $annee
 * @param type $categorie
 * @param type $nbrPlace
 * @param type $volumeUtile
 * @param type $motorisation
 * @param type $image
 * @param type $marque
 * @param type $modele
 * @param type $kilometrage
 * @param type $utilisateur
 * @param type $dateDebut
 * @param type $dateFin
 */
function louerVehicule($type, $description, $annee, $categorie, $nbrPlace, $volumeUtile, $motorisation, $image, $idMarque, $idModele, $idKilometrage, $idUtilisateur, $dateDebut, $dateFin, $longitude, $latitude) {
    $bdd = connexionBdd();
    $nbrPlace = intval($nbrPlace);
    $volumeUtile = intval($volumeUtile);

    //Ajout d'un véhicule//
    $sql = "INSERT INTO vehicules(Type, Description, Annee, Categorie, nbrPlace, volumeUtile, Motorisation, Image, Longitude, Latitude, idMarque, idModele, idKilometrage, idUtilisateur)" .
            "VALUES(:type, :description, :annee, :categorie, :nbrPlace, :volumeUtile, :motorisation, :image, :longitude, :latitude, :idMarque, :idModele, :idKilomtrage, :idUtilisateur)";
    $requete = $bdd->prepare($sql);
    $iduniq = uniqid();
    $nomImage = $image['name'];
    $destination = "img/" . $iduniq . $nomImage;
    $source = $image['tmp_name'];
    $nomImageFinal = $iduniq . $nomImage;

    $requete->bindParam(':type', $type);
    $requete->bindParam(':description', $description);
    $requete->bindParam(':annee', $annee);
    $requete->bindParam(':categorie', $categorie);
    $requete->bindParam(':nbrPlace', $nbrPlace, PDO::PARAM_INT);
    $requete->bindParam(':volumeUtile', $volumeUtile);
    $requete->bindParam(':motorisation', $motorisation);
    $requete->bindParam(':image', $nomImageFinal);
    $requete->bindParam(':idMarque', $idMarque);
    $requete->bindParam(':idModele', $idModele);
    $requete->bindParam(':idKilomtrage', $idKilometrage);
    $requete->bindParam(':idUtilisateur', $idUtilisateur);
    $requete->bindParam(':longitude', $longitude);
    $requete->bindParam(':latitude', $latitude);
    if ($requete->execute()) {
        $resultEnvoieFichierImage = move_uploaded_file($source, $destination);
        $lastidVehicule = $bdd->lastInsertId();
    }


    //Ajout d'une plage de diponibilié//
    $sql = "INSERT INTO disponibilites(dateDebut, dateFin, idVehicule)" .
            "VALUES(:dateDebut, :dateFin, :vehicule)";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':dateDebut', $dateDebut);
    $requete->bindParam(':dateFin', $dateFin);
    $requete->bindParam(':vehicule', $lastidVehicule);
    $requete->execute();
}

function reserverVehicule() {
    $bdd = connexionBdd();
}

//FONCTION DE SUPPRESSION DE DONNEES/////////////////////////////////////////////////////////////////////////////////////

/**
 * 
 * @param type $idVehicule
 * @return type
 */
function supprimerVehicule($idVehicule) {
    //Suppression de la disponibiliter en fonction de l'id du véhicule//
    $bdd = connexionBdd();
    $sql = "DELETE FROM disponibilites WHERE idVehicule = :idVehicule";
    $requete = $bdd->prepare($sql);
    $requete->bindParam('idVehicule', $idVehicule);
    $requete->execute();

    //Suppression du véhicule en fonction de son id//
    $sql = "DELETE FROM vehicules WHERE idVehicule = :idVehicule";
    $requete = $bdd->prepare($sql);
    $requete->bindParam('idVehicule', $idVehicule);
    $reslt = $requete->execute();
    return $reslt;
}

//FONCTION DE MODIFICATION DE DONNEES/////////////////////////////////////////////////////////////////////////////////////
function modifVehicule($idVehicule, $type, $description, $annee, $categorie, $nbrPlace, $volumeUtile, $motorisation, $image = "", $idMarque, $idModele, $idKilometrage, $dateDebut, $dateFin, $longitude, $latitude) {
    $bdd = connexionBdd();
    if ($image == "") {
        $sql = "UPDATE vehicules, disponibilites " .
                "SET "
                . "Type=:type, "
                . "Description=:description, "
                . "Annee=:annee, "
                . "Categorie=:categorie, "
                . "nbrPlace=:nbrPlace, "
                . "volumeUtile=:volumeUtile, "
                . "Motorisation=:motorisation, "
                . "idMarque=:idMarque, "
                . "idModele=:idModele, "
                . "idKilometrage=:idKilometrage, "
                . "dateDebut=:dateDebut, "
                . "dateFin=:dateFin, "
                . "Longitude=:longitude, "
                . "Latitude=:latitude " .
                "WHERE vehicules.idVehicule=:idVehicule";
        $requete = $bdd->prepare($sql);

        $requete->bindParam(':type', $type);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':annee', $annee);
        $requete->bindParam(':categorie', $categorie);
        $requete->bindParam(':nbrPlace', $nbrPlace);
        $requete->bindParam(':volumeUtile', $volumeUtile);
        $requete->bindParam(':motorisation', $motorisation);
        $requete->bindParam(':idMarque', $idMarque);
        $requete->bindParam(':idModele', $idModele);
        $requete->bindParam(':idKilometrage', $idKilometrage);
        $requete->bindParam(':dateDebut', $dateDebut);
        $requete->bindParam(':dateFin', $dateFin);
        $requete->bindParam(':longitude', $longitude);
        $requete->bindParam(':latitude', $latitude);
        $requete->bindParam(':idVehicule', $idVehicule);


        $reslt = $requete->execute();
        if ($reslt) {
            return true;
        } else {
            return FALSE;
        }
    } else {
        $sql = "UPDATE vehicules, disponibilites " .
                "SET Type=:type, Description=:description, Annee=:annee, Categorie=:categorie, nbrPlace=:nbrPlace, volumeUtile=:volumeUtile, Motorisation=:motorisation, Image=:image, idMarque=:idMarque, idModele=:idModele, idKilometrage=:idKilometrage, dateDebut=:dateDebut, dateFin=:dateFin, Longitude=:longitude Latitude=:latitude " .
                "WHERE vehicules.idVehicule=:idVehicule";
        $requete = $bdd->prepare($sql);
        $requete->bindParam(':type', $type);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':annee', $annee);
        $requete->bindParam(':categorie', $categorie);
        $requete->bindParam(':nbrPlace', $nbrPlace);
        $requete->bindParam(':volumeUtile', $volumeUtile);
        $requete->bindParam(':motorisation', $motorisation);
        $requete->bindParam(':image', $image);
        $requete->bindParam(':idMarque', $idMarque);
        $requete->bindParam(':idModele', $idModele);
        $requete->bindParam(':idKilometrage', $idKilometrage);
        $requete->bindParam(':dateDebut', $dateDebut);
        $requete->bindParam(':dateFin', $dateFin);
        $requete->bindParam(':longitude', $longitude);
        $requete->bindParam(':latitude', $latitude);
        $requete->bindParam(':idVehicule', $idVehicule);


        $reslt = $requete->execute();
        if ($reslt) {
            return true;
        } else {
            return FALSE;
        }
    }
}
