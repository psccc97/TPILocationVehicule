<?php

require_once 'models/bddfunctions.php';

session_start();
$idVehicule = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$details = recupereVehicleSelonId($idVehicule);

include 'views/viewDetails.php';
