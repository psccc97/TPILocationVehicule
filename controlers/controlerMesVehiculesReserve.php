<?php

require_once 'models/bddfunctions.php';
session_start();

if(filter_has_var(INPUT_POST, 'annuler')){
    $nouvelDateDebut = filter_input(INPUT_POST, "dateDebut", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $nouvelDateFin = filter_input(INPUT_POST, "dateFin", FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/\d{4}-[01][0-9]-[0123][0-9]/']]);
    $idVehicule = filter_input(INPUT_POST, "idVehicule", FILTER_VALIDATE_INT);
}

if(isset($_SESSION['prenom'])){
    $vehiculesReserver = recupereReservation($_SESSION['idUtilisateur']);
    
}  else {
    header('location:accueil.html');
    exit;
}

include 'views/viewMesVehiculesReserve.php';