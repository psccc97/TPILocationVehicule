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
function verifIdentificationUtilisateur($prenom, $mdp)
{
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
 * @return type
 */
function recupereVehicules()
{
    $bdd = connexionBdd();
    $sql = "SELECT idVehicule, Type, Annee, Categorie, nbrPlace, volumeUtile, Motorisation, Image, nbrKilometrage, nomMarque, nomModele, Image, Description".
            " FROM vehicules AS v, marques AS m, modeles AS mo, kilometrages AS k ".
            "WHERE v.idMarque = m.idMarque".
            " AND v.idModele = mo.idModele ".
            "AND v.idKilometrage = k.idKilometrage";
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $reslt = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $reslt;
}

/**
 * 
 * @param type $idVehicule
 * @return type
 */
function recupereVehicleSelonId($idVehicule)
{
    $bdd = connexionBdd();
    $sql = "SELECT idVehicule, Type, Annee, Categorie, nbrPlace, volumeUtile, Motorisation, Image, nbrKilometrage, nomMarque, nomModele, Image, Description ".
            "FROM vehicules AS v, marques AS m, modeles AS mo, kilometrages AS k ".
            "WHERE v.idMarque = m.idMarque ".
            "AND v.idModele = mo.idModele ".
            "AND v.idKilometrage = k.idKilometrage ".
            "AND idVehicule = :idVehicule";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(":idVehicule", $idVehicule);
    $requete->execute();
    $reslt = $requete->fetch(PDO::FETCH_ASSOC);
    return $reslt;
}

function louerVehicule($type, $description, $annee, $categorie, $nbrpPlace, $volumeUtile, $motorisation, $image, $marque, $modele, $kilometrage, $utilisateur)
{
    $bdd = connexionBdd();
    
    //Ajout de la marque//
    $sql = "INSERT INTO marques(nomMarque)".
            "VALUES(:marque)";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':marque', $marque);
    $requete->execute();
    $lastidMarque = $bdd->lastInsertId();
    
    //Ajout du modele//
    $sql = "INSERT INTO modeles(nomModele)".
            "VALUES(:modele)";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':modele', $modele);
    $requete->execute();
    $lastidModele = $bdd->lastInsertId();
    
    //Ajout du kilometrage//
    $sql = "INSERT INTO kilometrages(nbrKilometrage)".
            "VALUES(:kilometrage)";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':kilometrage', $kilometrage);
    $requete->execute();
    $lastidKilomtrage = $bdd->lastInsertId();
    
    //Ajout d'un véhicule//
    $sql = "INSERT INTO vehicules(Type, Description, Annee, Categorie, nbrPlace, volumeUtile, Motorisation, Image, idMarque, idModele, idKilometrage, idUtilisateur)".
           "VALUES(:type, :description, :annee, :categorie, :nbrPlace, :volumeUtile, :motorisation, :image, :lastidMarque, :lastidModele, :lastidKilomtrage, :utilisateur)";
    $requete = $bdd->prepare($sql);
    $iduniq = uniqid();
    $nomImage = $_FILES['img']['name'];
    $destination = "img/".$nomImage.$iduniq;
    $source = $_FILES['img']['tmp_name'];
    
    $requete->bindParam(':type', $type);
    $requete->bidnParam(':description', $description);
    $requete->bindParam(':annee', $annee);
    $requete->bindParam(':categorie', $categorie);
    $requete->bindParam(':nbrPlace', $nbrpPlace);
    $requete->bindParam(':volumeUtile', $volumeUtile);
    $requete->bindParam(':motorisation', $motorisation);
    $requete->bindParam(':image', $nomImage);
    $requete->bindParam(':lastidMarque', $lastidMarque);
    $requete->bindParam(':lastidModele', $lastidModele);
    $requete->bindParam(':lastidKilomtrage', $lastidKilomtrage);
    $requete->bindParam(':utilisateur', $utilisateur);
    $requete->execute();
    $resultEnvoieFichierImage = move_uploaded_file($source, $destination);
}

function recupereKilometrages()
{
    $bdd = connexionBdd();
    $sql = "SELECT * FROM kilometrages";
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $reslt = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $reslt;
}