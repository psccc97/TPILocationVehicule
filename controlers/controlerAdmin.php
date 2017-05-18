<?php

require_once 'models/bddfunctions.php';

session_start();

if(isset($_SESSION['prenom']) && $_SESSION['status'] == 1){
    $vehicules = recupereVehicules();
}
 else {
    header('location:accueil.php');
}

include 'views/viewAdmin.php';

