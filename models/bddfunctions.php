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
 * Cette récupère les donnée de la table utilisateur en fonction des paramètres
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

function recupereVehicleSelonId($idVehicule)
{
    $bdd = connexionBdd();
    $sql = "SELECT idVehicule, Type, Annee, Categorie, nbrPlace, volumeUtile, Motorisation, Image, nbrKilometrage, nomMarque, nomModele, Image, Description".
            " FROM vehicules AS v, marques AS m, modeles AS mo, kilometrages AS k ".
            "WHERE v.idMarque = m.idMarque".
            " AND v.idModele = mo.idModele ".
            "AND v.idKilometrage = k.idKilometrage".
            "AND idVehicule = :idVehicule";
    $requete = $bdd->prepare($sql);
    $requete->binParam(":idVehicule", $idVehicule);
    $requete->execute();
    $reslt = $requete->fetch(PDO::FETCH_ASSOC);
    return $reslt;
}