<?php
require_once 'models/flashmessage.php';
require_once 'models/bddfunctions.php';
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
header('location:mesvehiculesenlocation.html');
exit;


