<?php

require_once 'models/bddfunctions.php';

session_start();

if (filter_has_var(INPUT_POST, 'modifier')) {
    //Vérification des données dans les champs
    $type = trim(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING));
    $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
    $annee = trim(filter_input(INPUT_POST, 'annee', FILTER_SANITIZE_NUMBER_INT));
    $categorie = trim(filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_STRING));
    $nbrPlace = trim(filter_input(INPUT_POST, 'nbrPlace', FILTER_SANITIZE_NUMBER_INT));
    $volumeUtile = trim(filter_input(INPUT_POST, 'volume', FILTER_SANITIZE_NUMBER_INT));
    $motorisation = trim(filter_input(INPUT_POST, 'motorisation', FILTER_SANITIZE_STRING));
    $idMarque = trim(filter_input(INPUT_POST, 'marque', FILTER_SANITIZE_STRING));
    $idModele = trim(filter_input(INPUT_POST, 'modele', FILTER_SANITIZE_STRING));
    $idKilometrage = trim(filter_input(INPUT_POST, 'kilometrage', FILTER_VALIDATE_INT));
    $utilisateur = $_SESSION['idUtilisateur'];
    $nomAncienneImage = trim(filter_input(INPUT_POST, 'nomAncienneImage', FILTER_SANITIZE_STRING));
    $dateDebut = filter_input(INPUT_POST, "dateDebut", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $dateFin = filter_input(INPUT_POST, "dateFin", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $idVehicule = trim(filter_input(INPUT_POST, "idVehicule", FILTER_SANITIZE_NUMBER_INT));
    $longitude = trim(filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_NUMBER_FLOAT));
    $latitude = trim(filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_NUMBER_FLOAT));

    //Fichier image//
    $msgErrorFile = "";
    if (isset($_FILES['image']) && is_array($_FILES['image'])) {
        $image = $_FILES['image'];

        if ($image['error'] === 4) {
            if (file_exists("img/" . $image['name'])) {
                $nomImage = "";
            }
        } else {
            //le fichier est de type image
            $validType = array('image/jpeg', 'image/pjpeg', 'image/gif', 'image/png');
            if (!in_array($image['type'], $validType)) {
                $msgErrorFile = "Format non supporté";
                exit();
            }

            //Vérification de la taille du fichier image
            if ($image['size'] > 5000000) {
                $msgErrorFile = "Le format de l'image est trop grande";
                exit();
            }
            //Vérification si l'image éxiste déjà        
            //Si il n'éxiste pas alors on supprimme l'ancienne image et on met la nouvel à la place
            unlink("img/" . $nomAncienneImage);
            $idUniq = uniqid();
            $sourceImage = $image['tmp_name'];
            $nomImage = $idUniq . $image['name'];
            $destinationImage = "img/" . $nomImage;

            move_uploaded_file($sourceImage, $destinationImage);
        }
    }


    //Vérification des champs dates
    $msgError = "";
    if ($dateFin < $dateDebut) {

        $msgError = "La date de fin ne peut pas être plus petite que la date de début";
    } else {
        if (modifVehicule($idVehicule, $type, $description, $annee, $categorie, $nbrPlace, $volumeUtile, $motorisation, $nomImage, $idMarque, $idModele, $idKilometrage, $dateDebut, $dateFin, $longitude, $latitude)) {
            header('location:mesvehiculesenlocation.html');
        }
    }
}

//Vérification de connexion
if (isset($_SESSION['prenom'])) {
    $idVehicule = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $vehicule = recupereVehicleSelonId($idVehicule);
    $kilometrages = recupereKilometrages();
    $marques = recupereMarques();
    $modeles = recupereModeles();
} else {
    header('location:accueil.html');
}

include 'views/viewModif.php';
