<?php

/*
 * Fichier : modele bddfunctions
 * Auteur: Pascucci Lino
 * Date: 10.05.2017
 * Version : 1.0
 * Description : contient les fonctions intéragissant avec la base de donnée
 */

require_once 'connexionbdd.php';

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

/**
 * Cette fonction récupèer toute les données du véhicule
 * J'utilise cette fonction pour afficher les données dans la page d'accueil
 * @return type
 */
function recupereVehicules() {
    $bdd = connexionBdd();
    $sql = "SELECT *" .
            "FROM vehicules AS v, marques AS m, modeles AS mo, kilometrages AS k, disponibilites AS d " .
            "WHERE v.idMarque = m.idMarque " .
            "AND v.idVehicule = d.idVehicule ".
            "AND v.idModele = mo.idModele " .
            "AND v.idKilometrage = k.idKilometrage";
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $reslt = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $reslt;
}

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
            "AND v.idVehicule = d.idVehicule ".
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
function louerVehicule($type, $description, $annee, $categorie, $nbrPlace, $volumeUtile, $motorisation, $image, $marque, $modele, $kilometrage, $utilisateur, $dateDebut, $dateFin) {
    $bdd = connexionBdd();
    $marques = recupereMarques();
    $nbrPlace = intval($nbrPlace);
    $volumeUtile = intval($volumeUtile);
    $dot = 0;
    foreach ($marques as $m) {

        if ($marque == $m) {
            $idMarque = recupereIdMarque($marque);
            $dot += 1;
        }
    }
    //Ajout de la marque avec condition//
    // Cette condition nous permet de savoir si une marque existe déjà
    if ($dot == 0) {
        
        $sql = "INSERT INTO marques(nomMarque)" .
                "VALUES(:marque)";
        $requete = $bdd->prepare($sql);
        $requete->bindParam(':marque', $marque);
        if ($requete->execute()) {
            $lastidMarque = $bdd->lastInsertId();
        }
    }

    //Ajout du modele//
    $sql = "INSERT INTO modeles(nomModele)" .
            "VALUES(:modele)";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':modele', $modele);
    if ($requete->execute()) {
        $lastidModele = $bdd->lastInsertId();
    }

    //Ajout d'un véhicule//
    $sql = "INSERT INTO vehicules(Type, Description, Annee, Categorie, nbrPlace, volumeUtile, Motorisation, Image, idMarque, idModele, idKilometrage, idUtilisateur)" .
            "VALUES(:type, :description, :annee, :categorie, :nbrPlace, :volumeUtile, :motorisation, :image, :lastidMarque, :lastidModele, :lastidKilomtrage, :utilisateur)";
    $requete = $bdd->prepare($sql);
    $iduniq = uniqid();
    $nomImage = $image['image']['name'];
    $destination = "img/" .$iduniq .$nomImage;    
    $source = $image['image']['tmp_name'];
    $nomImageFinal = $iduniq.$nomImage;

    $requete->bindParam(':type', $type);
    $requete->bindParam(':description', $description);
    $requete->bindParam(':annee', $annee);
    $requete->bindParam(':categorie', $categorie);
    $requete->bindParam(':nbrPlace', $nbrPlace, PDO::PARAM_INT);
    $requete->bindParam(':volumeUtile', $volumeUtile);
    $requete->bindParam(':motorisation', $motorisation);
    $requete->bindParam(':image', $nomImageFinal);
    //Si une marque que l'utilisateur à ajouter éxiste déjà on prend l'Id de la marque en question et on ajoute au véhicule
    if (isset($idMarque)) {
        $requete->bindParam(':lastidMarque', $idMarque);
        //Sinon une ajoute une nouvel marque qui n'éxiste pas encore dans le tableau des marques et on ajoute l'id (lastId) en de nouvel marque au véhicule 
    } else {
        $requete->bindParam(':lastidMarque', $lastidMarque);
    }
    $requete->bindParam(':lastidModele', $lastidModele);
    $requete->bindParam(':lastidKilomtrage', $kilometrage);
    $requete->bindParam(':utilisateur', $utilisateur);
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
    $sql = "SELECT * FROM marques";
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

function reserverVehicule()
{
    $bdd = connexionBdd();
}

/**
 * Cette fonction récupere les données d'un véhicule selon un l'id d'un utilisateur
 * Je l'utilise pour afficher les véhicules qu'a mis un utilisateur en location
 * @param type $idUtilisateur
 * @return type
 */
function recupereVehiculesSelonIdUtilisateur($idUtilisateur)
{
    $bdd = connexionBdd();
    $sql = 'SELECT * FROM `vehicules` AS v, modeles AS mo, marques AS m, kilometrages AS k WHERE v.idMarque = m.idMarque AND v.idModele = mo.idModele AND v.idKilometrage = k.idKilometrage AND idUtilisateur = :idUtilisateur';
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':idUtilisateur', $idUtilisateur);
    $requete->execute();
    $reslt = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $reslt;
}

/**
 * 
 * @param type $idVehicule
 * @return type
 */
function supprimerVehicule($idVehicule)
{
    //Suppression de la disponibiliter en fonction de l'id du véhicule//
    $bdd=  connexionBdd();
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

function modifVehicule($idVehicule)
{
    $bdd = connexionBdd();
    $sql = "UPDATE vehicules ".
           "SET ";
}