<?php
require_once 'models/flashmessage.php';
require_once 'models/bddfunctions.php';
session_start();
$idVehicule = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($idVehicule != false) {
    $vehicule = recupereVehicleSelonId($idVehicule);
    $location = recupereLocationSelonIdVehicule($idVehicule);
    if ($location == FALSE) {
        if (is_array($vehicule)) {
            $fileImage = "img/" . $vehicule['Image'];
            if (supprimerVehicule($idVehicule)) {
                if (file_exists($fileImage)) {
                    unlink($fileImage);
                }
            }
        }
    }else{
        $msgError = "Impossible de supprimer se véhicule. Des utilisateurs l'ont réservé";
        SetFlashMessage($msgError);
        
    }
}
if($_SESSION['status'] == '0'){
    header('location:mesvehiculesenlocation.html');
}  else {
    header('location:admin.html');
}

exit;


