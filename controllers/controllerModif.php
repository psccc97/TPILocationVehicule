<?php

require_once 'models/bddfunctions.php';

session_start();

if(isset($_SESSION['prenom'])){
    
}
else{
    header('location:accueil.html');
}

include 'views/viewModif.php';