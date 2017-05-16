<?php

require_once 'models/bddfunctions.php';
$kilometrages = recupereKilometrages();
$marques = recupereMarques();
$modeles = recupereModeles();
session_start();
if (filter_has_var(INPUT_POST, 'enregistrer')) {    
    $type = trim(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING));
    $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
    $annee = trim(filter_input(INPUT_POST, 'annee', FILTER_SANITIZE_NUMBER_INT));
    $categorie = trim(filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_STRING));
    $nbrPlace = trim(filter_input(INPUT_POST, 'nbrPlace', FILTER_SANITIZE_NUMBER_INT));
    $volumeUtile = trim(filter_input(INPUT_POST, 'volume', FILTER_SANITIZE_NUMBER_INT));
    $motorisation = trim(filter_input(INPUT_POST, 'motorisation', FILTER_SANITIZE_STRING));
    $image = $_FILES;
    $idMarque = trim(filter_input(INPUT_POST, 'marque', FILTER_SANITIZE_NUMBER_INT));
    $idModele = trim(filter_input(INPUT_POST, 'modele', FILTER_SANITIZE_NUMBER_INT));
    $idKilometrage = trim(filter_input(INPUT_POST, 'kilometrage', FILTER_SANITIZE_NUMBER_INT));
    $idUtilisateur = $_SESSION['idUtilisateur'];
    $dateDebut = filter_input(INPUT_POST, "dateDebut", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $dateFin = filter_input(INPUT_POST, "dateFin", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $longitude = trim(filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_NUMBER_FLOAT));
    $latitude = trim(filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_NUMBER_FLOAT));


    $msgError = "";
    if ($dateFin < $dateDebut) {

        $msgError = "La date de fin ne peut pas être plus petite que la date de début";
        //s$nomMarque = recupereNomMarqueSelonIdMarque($idMarque);
        
    } else {

        louerVehicule($type, $description, $annee, $categorie, $nbrPlace, $volumeUtile, $motorisation, $image, $idMarque, $idModele, $idKilometrage, $idUtilisateur, $dateDebut, $dateFin, $longitude, $latitude);
        $type = NULL;
        $description = null;
        $annee = null;
        $categorie = null;
        $nbrPlace = null;
        $volumeUtile = null;
        $motorisation = null;
        $image = null;
        $idMarque = NULL;
        $idModele = NULL;
        $idKilometrage = NULL;
        $idUtilisateur = NULL;
        $dateDebut = NULL;
        $dateFin = NULL;
        $longitude = NULL;
        $latitude = NULL;

        header('location:accueil.html');
        exit;
    }
} else {
    if (isset($_SESSION['prenom'])) {

        
    } else {
        header('location:accueil.html');
        exit;
    }
}
include 'views/viewLouer.php';



