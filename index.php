<?php

/*
 * Script : index.php
 * Auteur: Pascucci Lino
 * Date: 9.05.2017
 * Version : 1.0
 * Description :controlleur principale il permet de rediriger dans les différents controlleurs
*/

$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_URL);
if (empty($action)) {
    $action = 'accueil';
}

    switch ($action) {
        case 'accueil':
            require_once 'controlers/controlerIndex.php';
            break;
        case 'connexion':
            require_once 'controlers/controlerConnexion.php';
            break;
        case 'details':
            require_once 'controlers/controlerDetails.php';
            break;
        case 'deconnexion':
            require_once 'controlers/controlerDeconnexion.php';
            break;
        case 'louer':
            require_once 'controlers/controlerLouer.php';
            break;
        case 'mesvehiculesenlocation':
            require_once 'controlers/controlerMesVehiculesEnLocation.php';
            break;
        case 'supprimer':
            require_once 'controlers/controlerSupprimer.php';
            break;
        case 'admin':
            require_once 'controlers/controlerAdmin.php';
            break;
        case 'modificaton':
            require_once 'controlers/controlerModif.php';
            break;
        case 'rechercher':
            require_once 'controlers/controlerRechercher.php';
            break;
        
    }