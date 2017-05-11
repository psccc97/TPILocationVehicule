<?php

require_once 'models/bddfunction.php';

$detailsVehicule = recupereVehicleSelonId($_GET['id']);

include 'views/viewDetails.php';
