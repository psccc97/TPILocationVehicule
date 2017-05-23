<?php

require_once 'models/bddfunctions.php';

session_start();
$idVehicule = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$dispos = recupereDispoSelonIdVehicule($idVehicule);
$details = recupereVehicleSelonId($idVehicule);
$commentaires = recupereCommentaireEtNoteSelonIdVehicule($idVehicule);

include 'views/viewDetails.php';
