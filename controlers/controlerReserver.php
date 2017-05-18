<?php

require_once 'models/bddfunctions.php';
session_start();

if(isset($_SESSION['prenom'])){
    $idVehicule = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $vehicule = recupereVehicleSelonId($idVehicule);
}  else {
    header('location:accueil.html');
    exit;
}
include 'views/viewReservation.php';


