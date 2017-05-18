<?php
require_once 'models/bddfunctions.php';

session_start();

if(isset($_SESSION['prenom'])){
   $vehicules = recupereVehicules($_SESSION['idUtilisateur']);
}
 else {
    header('location:accueil.html');
}
include 'views/viewMesVehiculesEnLocation.php';
