<?php

require_once 'models/bddfunctions.php';
session_start();

if (filter_has_var(INPUT_POST, 'reserver')) {

    //Vérification : on reçoit bien les informations
    $idVehicule = trim(filter_input(INPUT_POST, 'idVehicule', FILTER_VALIDATE_INT));
    $dateDebut = filter_input(INPUT_POST, "dateDebut", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $dateFin = filter_input(INPUT_POST, "dateFin", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $ancienneDateDebut = filter_input(INPUT_POST, "acienneDateDebut", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $ancienneDateFin = filter_input(INPUT_POST, "ancienneDateFin", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    
    $locations = recupereReservationSelonIdVehicule($idVehicule);
    foreach ($locations as $l){
        if($l['dateDebut'] >= $dateDebut || $l['dateFin'] <= $dateFin){
            $msgErrorDate = "Une personne a déjà réservé à ces dates";
        }        
    }
    
    if ($dateDebut < date("Y-m-d")) {
        $msgErrorDateDebut = "Date de début trop petite";
    }

    if ($dateFin < $dateDebut) {
        $msgError = "La date de fin ne peut pas être plus petite";
    }
    if($dateDebut < $ancienneDateDebut){
        $msgErrorAncienneDateDebut = "La date de début ne peut pas être plus petite que la date de disponibilité";
    }        
    
    if (empty($msgError) && empty($msgErrorDateDebut) && empty($msgErrorAncienneDateDebut) && empty($msgErrorDate)) {
        reservationEtAjoutNouvelDispo($ancienneDateDebut, $dateDebut, $dateFin, $ancienneDateFin, $idVehicule, $_SESSION['idUtilisateur']);
        header('location:accueil.html');
        exit;
    }
}


if (isset($_SESSION['prenom'])) {
    if(!empty($_POST)){
        $idVehicule = trim(filter_input(INPUT_POST, 'idVehicule', FILTER_VALIDATE_INT));
    }else{
    $idVehicule = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    }
    $vehicule = recupereVehicleSelonId($idVehicule);
    $dispos = recupereDispoSelonIdVehicule($idVehicule);
} else {
    header('location:accueil.html');
    exit;
}
include 'views/viewReservation.php';


