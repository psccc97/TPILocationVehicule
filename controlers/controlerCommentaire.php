<?php

require_once 'models/bddfunctions.php';

session_start();
if(filter_has_var(INPUT_POST, 'envoyer')){
    $commentaire = trim(filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING));
    $note = filter_input(INPUT_POST, 'note', FILTER_VALIDATE_INT);
    $idVehicule = filter_input(INPUT_POST, 'idVehicule', FILTER_VALIDATE_INT);
    
    ajouterCommentaireEtNote($commentaire, $note, $idVehicule, $_SESSION['idUtilisateur']);
    header('location:accueil.html');
    exit;
    
}


if (isset($_SESSION['prenom'])) {
    $idVehicule = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $vehicule = recupereVehicleSelonId($idVehicule);
    $dispos = recupereDispoSelonIdVehicule($idVehicule);
} else {
    header('location:accueil.html');
    exit;
}

include 'views/viewCommentaire.php';
