<?php
/*
 * Script : controler controlerAdmin.php
 * Auteur: Pascucci Lino
 * Date: 9.05.2017
 * Description :controleur pour la page admin
*/


require_once 'models/bddfunctions.php';
require_once 'models/flashmessage.php';

session_start();

if(isset($_SESSION['prenom']) && $_SESSION['status'] == 1){
    $vehicules = recupereVehicules();
    $msgErrorSuppression = GetFlashMessage();
}
 else {
    header('location:accueil.php');
    exit;
}

include 'views/viewAdmin.php';

