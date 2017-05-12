<?php

require_once 'models/bddfunctions.php';

session_start();
if (filter_has_var(INPUT_POST, 'enregistrer')) {
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    $type = trim(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING));
    $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
    $annee = trim(filter_input(INPUT_POST, 'annee', FILTER_SANITIZE_NUMBER_INT));
    $categorie = trim(filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_STRING));
    $nbrPlace = trim(filter_input(INPUT_POST, 'nbrPlace', FILTER_SANITIZE_NUMBER_INT));
    $volumeUtile = trim(filter_input(INPUT_POST, 'volume', FILTER_SANITIZE_NUMBER_INT));
    $motorisation = trim(filter_input(INPUT_POST, 'motorisation', FILTER_SANITIZE_STRING));
    $image = $_FILES;
    $marque = trim(filter_input(INPUT_POST, 'marque', FILTER_SANITIZE_STRING));
    $modele = trim(filter_input(INPUT_POST, 'modele', FILTER_SANITIZE_STRING));
    $kilometrage = trim(filter_input(INPUT_POST, 'kilometrage', FILTER_VALIDATE_INT));
    $utilisateur = $_SESSION['idUtilisateur'];
    $dateDebut = filter_input(INPUT_POST, "dateDebut", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $dateFin = filter_input(INPUT_POST, "dateFin", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);

    
    $msgError = "";
    if ($dateDebut > $dateFin || $dateDebut< date("Y-m-d")) {
        
        $msgError = "La date est fausse";
        header('location:louer.html');
    }
    if($annee> date("Y")){
       $msgError = "L'Année ne coréspond pas";
       header('location:louer.html');
    }
    if($nbrPlace > 9){
        $msgError = "Le nombre de place est trop grand";
        header('location:louer.html');
    }

    louerVehicule($type, $description, $annee, $categorie, $nbrPlace, $volumeUtile, $motorisation, $image, $marque, $modele, $kilometrage, $utilisateur, $dateDebut, $dateFin);
    
    header('location:accueil.html');
} else {
    if (isset($_SESSION['prenom'])) {

        $kilometrages = recupereKilometrages();        
    } else {
        header('location:accueil.html');
    }
}
include 'views/viewLouer.php';



