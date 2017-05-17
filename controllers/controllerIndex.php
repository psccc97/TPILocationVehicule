<?php
require_once 'models/bddfunctions.php';



$vehicules = recupereVehicules();

include 'views/viewIndex.php';

