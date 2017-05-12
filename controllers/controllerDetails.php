<?php

require_once 'models/bddfunctions.php';

session_start();
$details = recupereVehicleSelonId($_GET['id']);

include 'views/viewDetails.php';
