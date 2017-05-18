<?php
require_once 'models/bddfunctions.php';

session_start();

if(isset($_SESSION['prenom'])){
   $vehicules = recupereVehiculesSelonIdUtilisateur($_SESSION['idUtilisateur']);
}
 else {
    header('location:accueil.html');
}
include 'views/viewMesVehiculesEnLocation.php';
