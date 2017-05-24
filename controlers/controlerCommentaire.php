<?php

/*
 * Script : controler controlerCommentaire.php
 * Auteur: Pascucci Lino
 * Date: 19.05.2017
 * Description :controleur pour la page commentaire
*/

require_once 'models/bddfunctions.php';
require_once 'models/flashmessage.php';

session_start();
if(filter_has_var(INPUT_POST, 'envoyer')){
    $commentaire = trim(filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING));
    $note = filter_input(INPUT_POST, 'note', FILTER_VALIDATE_INT);
    $idVehicule = filter_input(INPUT_POST, 'idVehicule', FILTER_VALIDATE_INT);
    
    if($commentaires == "" && $note == ""){
        $msgError = "Aucun champs n'a été saisi";
        SetFlashMessage($msgError);
        header("location:commentaire-".$idVehicule.".html");
        exit;
    }
    
    if($commentaire == ""){
        $commentaire = NULL;
    }
    if($note == ""){
        $note = NULL;
    }
    
    
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
