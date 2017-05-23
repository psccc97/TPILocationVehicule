<?php

require_once 'models/bddfunctions.php';
require_once 'models/calculfunctions.php';

session_start();

if (filter_has_var(INPUT_POST, 'rechercher')) {
    $idMarque = trim(filter_input(INPUT_POST, 'marque', FILTER_SANITIZE_NUMBER_INT));
    $idModele = trim(filter_input(INPUT_POST, 'modele', FILTER_SANITIZE_NUMBER_INT));
    $idKilometrage = trim(filter_input(INPUT_POST, 'kilometrage', FILTER_SANITIZE_NUMBER_INT));
    $type = trim(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING));
    $categorie = trim(filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_STRING));
    $motorisation = trim(filter_input(INPUT_POST, 'motorisation', FILTER_SANITIZE_STRING));
    $annee = trim(filter_input(INPUT_POST, 'annee', FILTER_SANITIZE_NUMBER_INT));
    $volumeUtile = trim(filter_input(INPUT_POST, 'volume', FILTER_SANITIZE_NUMBER_INT));
    $nbrPlace = trim(filter_input(INPUT_POST, 'nbrPlace', FILTER_SANITIZE_NUMBER_INT));
    $longitude = trim(filter_input(INPUT_POST, 'longitude', FILTER_VALIDATE_FLOAT));
    $latitude = trim(filter_input(INPUT_POST, 'latitude', FILTER_VALIDATE_FLOAT));
    $dateDebut = filter_input(INPUT_POST, "dateDebut", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $dateFin = filter_input(INPUT_POST, "dateFin", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);

    if ($dateFin < $dateDebut) {
        $msgError = "La date de fin ne peut pas être plus petite que la date de début";
    } else {
        if ($longitude != "" && $latitude != "") {
            $vehicules = recupereVehicules();
            foreach ($vehicules as $ve) {
                $resultatDistance[$ve['idVehicule']]= distanceCalculation($latitude, $longitude, $ve['Latitude'], $ve['Longitude']);
                
            }
        }
        
        $vehiculesFiltrer = recupereVehiculesSelonRecherche($idMarque, $idModele, $idKilometrage, $type, $categorie, $motorisation, $annee, $volumeUtile, $nbrPlace, $dateDebut, $dateFin);
    }
}

$vehicules = recupereVehicules();

if(!empty($_SESSION)){
$reservation = recupereReservation($_SESSION['idUtilisateur']);
}
$marques = recupereMarques();
$modeles = recupereModeles();
$kilometrages = recupereKilometrages();

include 'views/viewIndex.php';

