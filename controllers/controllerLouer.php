<?php
require_once 'models/bddfunctions.php';

session_start();
if(filter_has_var(INPUT_POST, 'enregistrer')){
    $type = trim(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING));
    $description = trim(filter_has_var(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
}

if (isset($_SESSION['prenom'])) {
    
    $kilometrages = recupereKilometrages();
    include 'views/viewLouer.php';
}
 else {
    header('location:accueil.html');
}

