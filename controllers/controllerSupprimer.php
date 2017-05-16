<?php

require_once 'models/bddfunctions.php';
$idVehicule = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$messageError = "fhskjd";
if ($idVehicule != false) {
    $vehicule = recupereVehicleSelonId($idVehicule);
    if (is_array($vehicule)) {
        $fileImage = "img/" . $vehicule['Image'];
        if (supprimerVehicule($idVehicule)) {
            if (file_exists($fileImage)) {
                unlink($fileImage);
            }
        }                
    }
}
header('location:mesvehiculesenlocation.html');
exit;


