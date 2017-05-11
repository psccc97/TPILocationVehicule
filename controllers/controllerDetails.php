<?php

require_once 'models/bddfunctions.php';

$details = recupereVehicleSelonId($_GET['id']);

include 'views/viewDetails.php';
