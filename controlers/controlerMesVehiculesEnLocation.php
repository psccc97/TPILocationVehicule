<?php
require_once 'models/bddfunctions.php';
require_once 'models/flashmessage.php';
session_start();

if(isset($_SESSION['prenom'])){
   $vehicules = recupereVehicules($_SESSION['idUtilisateur']);
   foreach ($vehicules as $v){
   $dispos = recupereDispoSelonIdVehicule($v['idVehicule']);
   }
   $msgErrorSuppression = GetFlashMessage();
}
 else {
    header('location:accueil.html');
}
include 'views/viewMesVehiculesEnLocation.php';
