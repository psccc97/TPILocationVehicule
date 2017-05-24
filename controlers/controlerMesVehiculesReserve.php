<?php

require_once 'models/bddfunctions.php';
session_start();

if(filter_has_var(INPUT_POST, 'annuler')){    
    $idVehicule = filter_input(INPUT_POST, "idVehicule", FILTER_VALIDATE_INT);
            
    annulerReservation($idVehicule, $_SESSION['idUtilisateur']);
    header('location:mesvehiculesreserver.html');
    exit;
}

if(isset($_SESSION['prenom'])){
    $vehiculesReserver = recupereReservation($_SESSION['idUtilisateur']);
    
}  else {
    header('location:accueil.html');
    exit;
}

include 'views/viewMesVehiculesReserve.php';