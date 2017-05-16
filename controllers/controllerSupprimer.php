<?php

require_once 'models/bddfunctions.php';

if(supprimerVehicule($_GET['id'])){
    header('location:mesvehiculesenlocation.html');
    exit;
}