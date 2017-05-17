<?php

require_once 'models/bddfunctions.php';
$kilometrages = recupereKilometrages();
$marques = recupereMarques();
$modeles = recupereModeles();
session_start();
if (filter_has_var(INPUT_POST, 'enregistrer')) {
    
    //Vérification : on reçoit bien les informations
    $type = trim(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING));
    $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
    $annee = trim(filter_input(INPUT_POST, 'annee', FILTER_SANITIZE_NUMBER_INT));
    $categorie = trim(filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_STRING));
    $nbrPlace = trim(filter_input(INPUT_POST, 'nbrPlace', FILTER_SANITIZE_NUMBER_INT));
    $volumeUtile = trim(filter_input(INPUT_POST, 'volume', FILTER_SANITIZE_NUMBER_INT));
    $motorisation = trim(filter_input(INPUT_POST, 'motorisation', FILTER_SANITIZE_STRING));
    $idMarque = trim(filter_input(INPUT_POST, 'marque', FILTER_SANITIZE_NUMBER_INT));
    $idModele = trim(filter_input(INPUT_POST, 'modele', FILTER_SANITIZE_NUMBER_INT));
    $idKilometrage = trim(filter_input(INPUT_POST, 'kilometrage', FILTER_SANITIZE_NUMBER_INT));
    $idUtilisateur = $_SESSION['idUtilisateur'];
    $dateDebut = filter_input(INPUT_POST, "dateDebut", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $dateFin = filter_input(INPUT_POST, "dateFin", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $longitude = trim(filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_NUMBER_FLOAT));
    $latitude = trim(filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_NUMBER_FLOAT));
    
    //Nombre de place//
    $msgErrorNbrPlace ="";
    if($nbrPlace > 9 || $nbrPlace < 0){
        $msgErrorNbrPlace = "Le nombre de place n'est pas valide";
        exit();
    }
    
    //Fichier image//
    $msgErrorFile = "";
    if (isset($_FILES) && is_array($_FILES)) {
        $image = $_FILES['image'];
        //le fichier a bien été reçut
        if ($image['error'] != 0) {
            $msgErrorFile = "Erreur dans le transfert";
            exit();
        }
    }
    
    //le fichier est de type image
    $validType = array('image/jpeg', 'image/pjpeg', 'image/gif', 'image/png');
    if(!in_array($image['type'], $validType)){
        $msgErrorFile = "Format non supporté";
        exit();
    }
    
    //Vérification de la taille du fichier image
    if($image['size']> 5000000){
        $msgErrorFile = "Le format de l'image est trop grande";
        exit();
    }



    $msgError = "";

    //Vérification des champs dates
    if ($dateFin < $dateDebut) {
        $msgError = "La date de fin ne peut pas être plus petite que la date de début";        
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



