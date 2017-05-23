<?php

require_once 'models/bddfunctions.php';
session_start();

if(isset($_SESSION['prenom'])){
    $vehiculesReserver = recupereReservation($_SESSION['idUtilisateur']);
    
}  else {
    header('location:accueil.html');
    exit;
}

include 'views/viewMesVehiculesReserve.php';